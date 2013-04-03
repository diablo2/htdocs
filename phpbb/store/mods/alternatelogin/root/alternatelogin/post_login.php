<?php

define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_alternatelogin.' . $phpEx);

global $db, $config, $user;
$user->session_begin();
$auth->acl($user->data);
$user->setup('ucp');
$user->add_lang('mods/alternatelogin');
$user->add_lang('mods/info_ucp_alternatelogin');

$openid = request_var('openid', '');
// Select the user_id from the Alternate Login user data table which has the same OPENID Id.
$sql = 'SELECT user_id
                FROM ' . AL_USER_DATA
                . " WHERE al_oi_id='" . urldecode($openid) . "'";

// Execute the query.
$result = $db->sql_query($sql);

// Retrieve the row data.
$row = $db->sql_fetchrow($result);

// Free up the result handle from the query.
$db->sql_freeresult($result);

// Check to see if we found a user_id with the associated OPENID Id.
if ($row)   // User is registered already, let's log him in!
{
        echo 'here';
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

        $openid = request_var('openid', '');
        
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
                                                                'al_login_type'	=> AL_OPENID_LOGIN,
                                                                'openid'	=> $openid
        );

        $template->assign_vars(array(
            'S_AL_LOGIN'            => true,
        ));

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

?>
