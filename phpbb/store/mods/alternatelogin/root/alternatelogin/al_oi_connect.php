<?php
/*
	COPYRIGHT 2009 Michael J Goonawardena
		
	This file is part of ConSof Alternate Login.

    ConSof Alternate Login is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    ConSof Alternate Login is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with ConSof Alternate Login.  If not, see <http://www.gnu.org/licenses/>.*/

session_start();


define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_alternatelogin.' . $phpEx);
define('LIB_PATH', 	"./openid/");
define('CONFIG_PATH', 	"./config/");
define('LOCAL', false);


$path_extra = dirname(dirname(dirname(__FILE__)));
$path = ini_get('include_path');
$path = CONFIG_PATH . PATH_SEPARATOR
		.	LIB_PATH . PATH_SEPARATOR
		.	$path_extra . PATH_SEPARATOR
		.	$path;
ini_set('include_path', $path);

function getScheme() {
    $scheme = 'http';
    if (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') {
        $scheme .= 's';
    }
    return $scheme;
}

function getReturnTo() {
    return sprintf("%s://%s:%s%s/al_oi_connect.php",
                   getScheme(), $_SERVER['SERVER_NAME'],
                   $_SERVER['SERVER_PORT'],
                   dirname($_SERVER['PHP_SELF']));
}

function getTrustRoot() {
    return sprintf("%s://%s:%s%s/",
                   getScheme(), $_SERVER['SERVER_NAME'],
                   $_SERVER['SERVER_PORT'],
                   dirname($_SERVER['PHP_SELF']));
}
global $config;
$al_settings = get_al_settings($config['al_settings']);

if($al_settings[AL_OPENID_LOGIN] == 0)
{
	trigger_error(sprintf($user->lang['AL_LOGIN_UNAVAILABLE'], $user->lang['OPENID']));
}

$user->session_begin();
$auth->acl($user->data);
$user->setup('ucp'); 
$user->add_lang('mods/alternatelogin');
$user->add_lang('mods/info_ucp_alternatelogin');

require_once $phpbb_root_path . "alternatelogin/openid/Auth/OpenID/Consumer." . $phpEx;
require_once $phpbb_root_path . "alternatelogin/openid/Auth/OpenID/FileStore." . $phpEx;
require_once $phpbb_root_path . "alternatelogin/openid/Auth/OpenID/SReg." . $phpEx;

$verify_oi      = (bool)request_var('verify_oi', 0);
$validate       = (bool)request_var('validate', 0);
$submit         = (bool)request_var('submit', false);

$al_settings = get_al_settings($config['al_settings']);

if($al_settings[AL_OPENID_LOGIN] == 0)
{
	trigger_error('OpenID is unavailable on this site.');
}

if($submit)
{
    $openid =       request_var('al_oi_id', '');
    
    $store = new Auth_OpenID_FileStore('./oid_store');

    $consumer = new Auth_OpenID_Consumer($store);

    $auth = $consumer->begin($openid);

    if(!$auth)
    {
        die("ERROR: Please enter a valid OpenID - " . $openid);
    }
    
    $sreg = Auth_OpenID_SRegRequest::build(array('email', 'fullname', 'dob', 'language'), array('nickname'));

    if (!$sreg)
    {
        die("ERROR: Unable to build Simple Registration request");
    }

    $auth->addExtension($sreg);

    $url = $auth->redirectURL(getTrustRoot(), getReturnTo() . '?validate=1&al_oi_id=' . urlencode($openid));
    header('Location: ' . $url);
}
elseif($validate)
{
    $openid =       request_var('al_oi_id', '');
    $store = new Auth_OpenID_FileStore('./oid_store');

    $consumer = new Auth_OpenID_Consumer($store);
    $response = $consumer->complete(getReturnTo());
    
    if ($response->status == Auth_OpenID_SUCCESS)
    {
        $sreg = new Auth_OpenID_SRegResponse();
        $obj = $sreg->fromSuccessResponse($response);
        $data = $obj->contents();

        $sql = 'SELECT user_id
                FROM ' . AL_USER_DATA
                . " WHERE al_oi_id='" . urldecode($openid) . "'";
                //die($sql);

        // Execute the query.
        $result = $db->sql_query($sql);

        // Retrieve the row data.
        $row = $db->sql_fetchrow($result);

        // Free up the result handle from the query.
        $db->sql_freeresult($result);

        // Check to see if we found a user_id with the associated OPENID Id.
        if ($row)   // User is registered already, let's log him in!
        {
                
                // Check for user ban.
                if($user->check_ban($row['user_id']))
                {
                        trigger_error($user->lang['BAN_TRIGGERED_BY_USER']);
                }

                // Log user in.
                $result = $user->session_create($row['user_id'], 0, 0, 1);

                // Alert user if we failed to log them in.
                if(!$result)
                {
                        trigger_error($user->lang['LOGIN_FAILURE']);
                }

                trigger_error(sprintf($user->lang['LOGIN_SUCCESS'] . "<br /><br />" . sprintf($user->lang['RETURN_INDEX'], "<a href='{$phpbb_root_path}index.php'>", "</a>")));


        }
        else
        {

            // No user was registered with the associate OPENID Id.
            // We need to see if they are anonymous.
            // If they are then that means they might want to register.
            // We will check to see if they wish to register.
            if($user->data['user_id'] == ANONYMOUS)
            {

                $openid = request_var('al_oi_id', '');

                $template->set_filenames(array(
                    'body'                  => 'create_account.html')
                );

                page_header($user->lang[$title], false);
                $s_hidden_fields = array(
                    'al_login'              => 1,
                    'al_login_type'         => AL_OPENID_LOGIN,
                    'openid'                => $openid
                );
                $template->assign_vars(array(
                    'S_ID'                  => $openid,
                    'S_EMAIL'               => $data['email'],
                    'S_NICKNAME'            => $data['nickname'],
                    'S_DOB'                 => $data['dob'],
                    'U_ACTION'              => $phpbb_root_path . 'alternatelogin/create_account.' . $phpEx,
                    'S_HIDDEN_FIELDS'       => build_hidden_fields($s_hidden_fields),
                ));

                


                page_footer();

            }
            else
            {

                    // If they are not anonymous then we can assume they are current users wishing
                    // to link their accounts.

                    // Build a query to see if the user already has a linked account
                    // with another site.
                    $sql = 'SELECT *
                            FROM ' . AL_USER_DATA
                            . " WHERE user_id='{$user->data['user_id']}'";

                    // Execute query.
                    $result = $db->sql_query($sql);

                    // Get the row data.
                    $row = $db->sql_fetchrow($result);

                    // Free up the database result.
                    $db->sql_freeresult($result);

                    // Did we get data, if yes then the user has another account registered.
                    // We need to unlink that account as well.
                    if ($row)
                    {
                            // Prepare the user settings array.
                            $al_user_settings = array_fill(0, AL_USER_OPTION_COUNT, 0);

                            // Flip the switch for the OPENID login.
                            $al_user_settings[AL_OPENID_LOGIN] = 1;

                            // Convert the array to its decimal equivalent.
                            $al_user_settings = set_al_settings($al_user_settings);

                            // Prepare the query to update the users Alternate Login record.
                            $sql = 'UPDATE ' . AL_USER_DATA
                            . " SET al_user_settings=$al_user_settings, al_oi_id='{$openid}',"
                            . ' al_ms_id=NULL, al_wl_id=NULL, al_fb_id=NULL'
                            . " WHERE user_id='{$user->data['user_id']}'";


                    }
                    else
                    {

                            // Prepare the user settings array.
                            $al_user_settings = array_fill(0, AL_USER_OPTION_COUNT, 0);

                            // Flip the switch for the OPENID login.
                            $al_user_settings[AL_OPENID_LOGIN] = 1;

                            // Convert the array to its decimal equivalent.
                            $al_user_settings = set_al_settings($al_user_settings);

                            // Prepare the query to insert a new record for the user.
                            $sql = 'INSERT INTO ' . AL_USER_DATA
                            . "(user_id, al_user_settings, al_oi_id)"
                            . " VALUES('{$user->data['user_id']}', '$al_user_settings', '{$openid}')";


                    }

                    // Execute the query.
                    $result = $db->sql_query($sql);

                    // Tell the user if they suceeded or not.
                    if(!$result)
                    {
                            trigger_error($user->lang['AL_PHPBB_DB_FAILURE']);
                    }
                    else
                    {
                            trigger_error(sprintf($user->lang['AL_LINK_SUCCESS'], $user->lang['OPENID'], $user->lang['OPENID']));
                    }
            }
        }
    }
    else
    {
        $_SESSION['OPENID_AUTH'] = false;

        trigger_error($user->lang['OPENID_AUTH_FAIL']);
    }
}
else
{
	// Take the user to the OpenID login page.
	page_header('OpenID Identifier');

	$template->set_filenames(array(
		'body' => 'al_oi_login.html')
	);


	$template->assign_vars(array(
		'AL_LOGIN_HEADER'		=> $user->lang['OPENID_LOGIN_PAGE'],
		'AL_LOGIN_INFO'			=> $user->lang['OPENID_LOGIN_INFO'],
		'S_HIDDEN_FIELDS'		=> $s_hidden_fields,
		'U_ACTION'				=> $phpbb_root_path . $config['al_path'] . 'al_oi_connect.' . $phpEx,
	));

	page_footer();

}
?> 
