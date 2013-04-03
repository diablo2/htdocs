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
define('LIB_PATH', 	"myspace_app/source/");
define('CONFIG_PATH', 	"myspace_app/config/");
define('LOCAL', false);
$path_extra = dirname(dirname(dirname(__FILE__)));
$path = ini_get('include_path');
$path = CONFIG_PATH . PATH_SEPARATOR
		.	LIB_PATH . PATH_SEPARATOR
		.	$path_extra . PATH_SEPARATOR
		.	$path;
ini_set('include_path', $path);

global $config;
define('CONSUMER_KEY', $config['al_ms_ckey']);
define('CONSUMER_SECRET', $config['al_ms_csecret']);

	$user->session_begin();
	$auth->acl($user->data);
	$user->setup('ucp'); 
	$user->add_lang('mods/info_ucp_alternatelogin');
	$user->add_lang('mods/alternatelogin');



//echo 'CK' . CONSUMER_KEY;


$al_settings = get_al_settings($config['al_settings']);

if($al_settings[AL_MYSPACE_LOGIN] == 0)
{
	trigger_error(sprintf($user->lang['AL_LOGIN_UNAVAILABLE'], $user->lang['MYSPACE']));
}

//require_once LOCAL ? "config.MySpace.local.php" : "config.MySpace.php";

//loads the myspaceid api sdk
require_once "MySpaceID/myspace.php";

$ms_key = CONSUMER_KEY;			//we get this from config.MySpace.php
$ms_secret = CONSUMER_SECRET;

function getScheme() {
    $scheme = 'http';
    if (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') {
        $scheme .= 's';
    }
    return $scheme;
}

function getReturnTo() {
    return sprintf("%s://%s:%s%s/al_ms_connect.php?f=callback",
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

if (@$_GET['f'] == 'start') 
{
	$str_url = getReturnTo();

	//trigger_error($str_url);
  	// get a request token + secret from MySpace and redirect to the authorization page
  	//
  	$ms = new MySpace($ms_key, $ms_secret);
	$tok = $ms->getRequestToken($str_url);
	if (!isset($tok['oauth_token'])
		|| !is_string($tok['oauth_token'])
		|| !isset($tok['oauth_token_secret'])
		|| !is_string($tok['oauth_token_secret'])) 
	{
		trigger_error($user->lang['MYSPACE_ERROR']);
	}
	
	$_SESSION['auth_state'] = "start";
	$_SESSION['request_token'] = $token = $tok['oauth_token'];
	$_SESSION['request_secret'] = $tok['oauth_token_secret'];
	$_SESSION['callback_confirmed'] = $tok['oauth_callback_confirmed'];
		  
	header("Location: ".$ms->getAuthorizeURL($token));
} 
else if (@$_GET['f'] == 'callback') 
{
  	// the user has authorized us at MySpace, so now we can pick up our access token + secret
  	//
	if (@$_SESSION['auth_state'] != "start") 
	{
		trigger_error($user->lang['MYSPACE_ERROR']);
	}
		  
	$oauth_verifier = @$_GET['oauth_verifier'];
		  
	if (!isset($oauth_verifier))
	{
		trigger_error($user->lang['MYSPACE_ERROR']);
	}
		  
//		  if ($_GET['oauth_token'] != $_SESSION['request_token']) {
//		   echo "Token mismatch.";
//		   exit;
//		  }

	$ms = new MySpace($ms_key, $ms_secret, $_SESSION['request_token'], $_SESSION['request_secret'], true, $oauth_verifier);
		  
	$tok = $ms->getAccessToken();
		  
	if (!is_string($tok->key) || !is_string($tok->secret)) 
	{
		error_log("Bad token from MySpace::getAccessToken(): ".var_export($tok, TRUE));
		trigger_error($user->lang['MYSPACE_ERROR']);
	}

	$_SESSION['access_token'] = $tok->key;
	$_SESSION['access_secret'] = $tok->secret;

	$_SESSION['auth_state'] = "done";
	header("Location: ".$_SERVER['SCRIPT_NAME']);
} 
else if (@$_SESSION['auth_state'] == 'done') 
{
	// we have our access token + secret, so now we can actually *use* the api
	//
	$ms = new MySpace($ms_key, $ms_secret, $_SESSION['access_token'], $_SESSION['access_secret']);

	// First get the user id.

	$ms_user = $ms->getCurrentUserId();
	
	// Select the user_id from the Alternate Login user data table which has the same MySpace Id.
	$sql = 'SELECT user_id
			FROM ' . AL_USER_DATA
			. " WHERE al_ms_id='$ms_user'";
	
	// Execute the query.
	$result = $db->sql_query($sql);
	
	// Retrieve the row data.
	$row = $db->sql_fetchrow($result);
	
	// Free up the result handle from the query.
	$db->sql_freeresult($result);
	
	// Check to see if we found a user_id with the associated MySpace Id.
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
		// No user was registered with the associate MySpace Id.
		// We need to see if they are anonymous.
		// If they are then that means they might want to register.
		// We will check to see if they wish to register.
		if($user->data['user_id'] == ANONYMOUS)
		{
			if(confirm_box(true))
			{
				if(!isset($_REQUEST['al_ms_user']))
				{
					$ms_user = request_var('al_ms_user', '');
				}
				// Most of this code comes straight out of ucp_register.php
				$message = 'TERMS_OF_USE_CONTENT';
				$title = 'TERMS_USE';
			
				if (empty($user->lang[$message]))
				{
					if ($user->data['is_registered'])
					{
						redirect(append_sid("{$phpbb_root_path}index.$phpEx"));
					}
			
					login_box();
				}
			
				$template->set_filenames(array(
					'body'		=> 'ucp_agreement.html')
				);
			
				// Disable online list
				page_header($user->lang[$title], false);
					
				$s_hidden_fields = array(	'al_login' 		=> 1,
											'al_login_type'	=> AL_MYSPACE_LOGIN,
											'al_ms_user'	=> $ms_user
				);
					
				$coppa				= (isset($_REQUEST['coppa'])) ? ((!empty($_REQUEST['coppa'])) ? 1 : 0) : false;
					if ($coppa === false && $config['coppa_enable'])
					{
						$now = getdate();
						$coppa_birthday = $user->format_date(mktime($now['hours'] + $user->data['user_dst'], $now['minutes'], $now['seconds'], $now['mon'], $now['mday'] - 1, $now['year'] - 13), $user->lang['DATE_FORMAT']);
						unset($now);
		
						$template->assign_vars(array(
							'L_COPPA_NO'		=> sprintf($user->lang['UCP_COPPA_BEFORE'], $coppa_birthday),
							'L_COPPA_YES'		=> sprintf($user->lang['UCP_COPPA_ON_AFTER'], $coppa_birthday),
		
							'U_COPPA_NO'		=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=register&amp;coppa=0' . $add_lang),
							'U_COPPA_YES'		=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=register&amp;coppa=1' . $add_lang),
		
							'S_SHOW_COPPA'		=> true,
							'S_HIDDEN_FIELDS'	=> build_hidden_fields($s_hidden_fields),
							'S_UCP_ACTION'		=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=register' . $add_lang),
						));
					}
					else
					{
						$template->assign_vars(array(
							'L_TERMS_OF_USE'	=> sprintf($user->lang['TERMS_OF_USE_CONTENT'], $config['sitename'], generate_board_url()),
		
							'S_SHOW_COPPA'		=> false,
							'S_REGISTRATION'	=> true,
							'S_HIDDEN_FIELDS'	=> build_hidden_fields($s_hidden_fields),
							'S_UCP_ACTION'		=> append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=register' . $add_lang . $add_coppa),
							)
						);
					}
			
				page_footer();
			}
			else
			{
				$s_hidden_fields = array(	'al_login' 		=> 1,
											'al_login_type'	=> AL_MYSPACE_LOGIN,
											'al_ms_user'	=> $ms_user
				);

				confirm_box(false, sprintf($user->lang['AL_REGISTER_QUERY'], $user->lang['MYSPACE']), build_hidden_fields($s_hidden_fields));
				// They said no so send them to the home page.
				redirect(append_sid("{$phpbb_root_path}index.$phpEx"));
			}
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
				
				// Flip the switch for the MySpace login.
				$al_user_settings[AL_MYSPACE_LOGIN] = 1;
				
				// Convert the array to its decimal equivalent.
				$al_user_settings = set_al_settings($al_user_settings);
				
				// Prepare the query to update the users Alternate Login record.
				$sql = 'UPDATE ' . AL_USER_DATA
				. " SET al_user_settings=$al_user_settings, al_ms_id='{$ms_user}',"
				. ' al_oi_id=NULL, al_wl_id=NULL, al_fb_id=NULL'
				. " WHERE user_id='{$user->data['user_id']}'";
					
						
			}
			else
			{
				
				// Prepare the user settings array.
				$al_user_settings = array_fill(0, AL_USER_OPTION_COUNT, 0);
				
				// Flip the switch for the MySpace login.
				$al_user_settings[AL_MYSPACE_LOGIN] = 1;
				
				// Convert the array to its decimal equivalent.
				$al_user_settings = set_al_settings($al_user_settings);
				
				// Prepare the query to insert a new record for the user.
				$sql = 'INSERT INTO ' . AL_USER_DATA
				. "(user_id, al_user_settings, al_ms_id)"
				. " VALUES('{$user->data['user_id']}', '$al_user_settings', '{$ms_user}')";
						
	
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
				trigger_error(sprintf($user->lang['AL_LINK_SUCCESS'], $user->lang['MYSPACE'], $user->lang['MYSPACE']));
			}
		}
		
	}

} 
else 
{
	trigger_error(sprintf($user->lang['SIGN_IN'] . "<br /><br /><a href='%s?f=start'>Click to sign in...</a>", $_SERVER['REQUEST_URI']));
}
?> 
