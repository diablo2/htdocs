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
    
    
// Basic setup of phpBB variables.
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

// Load include files.
include($phpbb_root_path . 'common.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_alternatelogin.' . $phpEx);	// Custom Alternate Login functions.

// Set up a new user session.
$user->session_begin();
$auth->acl($user->data);
$user->setup('ucp'); 
$user->add_lang('mods/alternatelogin');	// Global Alternate Login language file.
$user->add_lang('mods/info_ucp_alternatelogin');

// Create the path to the Facebook API.
$al_path = $phpbb_root_path . $config['al_path'] . 'facebook_app/php/facebook.php';

// Load the Facebook API.
require_once($al_path); 

// Retrieve the global Alternate Settings and convert it to a binary array.
$al_settings = get_al_settings($config['al_settings']);

// Make sure that Facebook login is enabled for this site.
if($al_settings[AL_FACEBOOK_LOGIN] == 0)
{
	// Inform the user that this feature is unavailable
	trigger_error(sprintf($user->lang['AL_LOGIN_UNAVAILABLE'], $user->lang['FACEBOOK']));
}

// Initialize the facebook API with your application API Key and Secret.
// These are two values you need to retrieve by signing up to the free developer site at Facebook.
$facebook = new Facebook($config['al_fb_appkey'], $config['al_fb_secret']); 

// Make sure the user is logged in to Facebook.
// If they are not they will be taken to a Facebook website to log in.  They are then redirected
// back to this page.
$fb_user = $facebook->require_login();

// Check to see if we have a valid Facebook user.
if(!$fb_user)
{
	// Inform the user that we couldn't get their Facebook Id.
	trigger_error(sprintf($user->lang['AL_CONNECT_FAILURE'], $user->lang['FACEBOOK']));
} 

// Select the user_id from the Alternate Login user data table which has the same Facebook Id.
$sql = 'SELECT user_id
		FROM ' . AL_USER_DATA
		. " WHERE al_fb_id='$fb_user'";

// Execute the query.
$result = $db->sql_query($sql);

// Retrieve the row data.
$row = $db->sql_fetchrow($result);

// Free up the result handle from the query.
$db->sql_freeresult($result);

// Check to see if we found a user_id with the associated Facebook Id.
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
	// No user was registered with the associate Facebook Id.
	// We need to see if they are anonymous.
	// If they are then that means they might want to register.
	// We will check to see if they wish to register.
	if($user->data['user_id'] == ANONYMOUS)
	{
		if(confirm_box(true))
		{
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
										'al_login_type'	=> AL_FACEBOOK_LOGIN,
										'al_fb_user'	=> $fb_user
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
			confirm_box(false, sprintf($user->lang['AL_REGISTER_QUERY'], $user->lang['FACEBOOK']));
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
			
			// Flip the switch for the Facebook login.
			$al_user_settings[AL_FACEBOOK_LOGIN] = 1;
			
			// Convert the array to its decimal equivalent.
			$al_user_settings = set_al_settings($al_user_settings);
			
			// Prepare the query to update the users Alternate Login record.
			$sql = 'UPDATE ' . AL_USER_DATA
			. " SET al_user_settings=$al_user_settings, al_fb_id='{$fb_user}',"
			. ' al_oi_id=NULL, al_wl_id=NULL, al_ms_id=NULL'
			. " WHERE user_id='{$user->data['user_id']}'";
				
					
		}
		else
		{
			
			// Prepare the user settings array.
			$al_user_settings = array_fill(0, AL_USER_OPTION_COUNT, 0);
			
			// Flip the switch for the Facebook login.
			$al_user_settings[AL_FACEBOOK_LOGIN] = 1;
			
			// Convert the array to its decimal equivalent.
			$al_user_settings = set_al_settings($al_user_settings);
			
			// Prepare the query to insert a new record for the user.
			$sql = 'INSERT INTO ' . AL_USER_DATA
			. "(user_id, al_user_settings, al_fb_id)"
			. " VALUES('{$user->data['user_id']}', '$al_user_settings', '{$fb_user}')";
					

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
			trigger_error(sprintf($user->lang['AL_LINK_SUCCESS'], $user->lang['FACEBOOK'], $user->lang['FACEBOOK']));
		}
	}
	
}

?> 
