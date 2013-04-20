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
// Basic setup of phpBB variables.
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : '../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

// Load include files.
include($phpbb_root_path . 'common.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_user.' . $phpEx);
include($phpbb_root_path . 'includes/functions_profile_fields.' . $phpEx);
include_once($phpbb_root_path . 'includes/functions_alternatelogin.' . $phpEx);// Add the custom phpBB Alternate Login functions file


// Retrieve the global Alternate Settings and convert it to a binary array.
$al_settings = get_al_settings($config['al_settings']);

// Make sure that Facebook login is enabled for this site.
if($al_settings[AL_WINDOWSLIVE_LOGIN] == 0)
{
	// Inform the user that this feature is unavailable
	trigger_error(sprintf($user->lang['AL_LOGIN_UNAVAILABLE'], $user->lang['WINDOWSLIVE']));
}

// Set up a new user session.
$user->session_begin();
$auth->acl($user->data);
$user->setup('ucp'); 
$user->add_lang('mods/alternatelogin');
$user->add_lang('mods/info_ucp_alternatelogin');// Global Alternate Login language file.
$template->assign_var('S_IN_UCP', true);

// Load the Windows Live API.
include_once($phpbb_root_path . $config['al_path'] . 'windowslive_app/windowslive-sdk/lib/windowslivelogin.php');

	
// Check to see if we already have a WindowsLiveLogin object.
if(!$al_wll)
{
	// Initialise the WindowsLiveLogin object with the settings xml file.
	$al_wll = WindowsLiveLogin::initFromXml($phpbb_root_path . $config['al_path'] . 'windowslive_app/windowslive-sdk/Application-Key.xml');
	$al_wll->setDebug(true);
}

// Retrieve and store the Windows Live Application Id.
$APPID = $al_wll->getAppId();

// Prepare some variables.
$userid = null;
$username = null;

// Retrieve the current action invoked when the user clicked the Windows Sign-in/Sign-out button.
$action = @$_REQUEST['action'];

// Process the action.
switch ($action) {
    case 'logout': // The use wants to log out.
    
    	// Clear the cookie.
        setcookie(WL_COOKIE);
        
        // Log the user out of the phpBB
        $user->session_kill();
        
        // We need a genric object to retrieve the language file.
		$user->session_begin();
		//echo 'Cookie' . $_COOKIE['al_wl_logout'];
		if($_SESSION['al_wl_logout'] == 'registration_success')
		{
			
			$message = $_SESSION['al_wl_message'];
			$message = $message . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
			$_SESSION['al_wl_message'] = NULL;
			$_SESSION['al_wl_logout'] = NULL;
		    trigger_error($message);
		}
				
		// Prepare the logged out message.
		$message = $user->lang['LOGOUT_REDIRECT'];
		$message = $message . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a> ');
		
		// Display the message.
		trigger_error($message);
        break;
        
    case "clearcookie": // Not quite sure what this is exactly used for, but I included it as it was part of the SDK example.
        ob_start();
        setcookie(WL_COOKIE);

        list($type, $response) = $al_wll->getClearCookieResponse();
        header("Content-Type: $type");
        print($response);

        ob_end_flush();
        if(isset($_GET['redirect']))
        {
        	$redirect = urldecode($_GET['redirect']);
        	meta_refresh(0, $redirect);
        }
        break;
    default:  // Only thing left is to login.
    
    	// Do we already have a login cookie?
    	if(empty($_COOKIE[WL_COOKIE]))
    	{
    		// Process the login and retrieve the user object.
	    	$wl_user = $al_wll->processLogin($_REQUEST);
		    
			// Make sure we have a user object.  
		    if ($wl_user) 
		    {
		    	// Get the authentication cookie.
		    	$wl_cookie = $wl_user->getToken();
		        
		        if ($wl_user->usePersistentCookie()) 
		        {
		            // Attempt to set the cookie.
		    		if(!setcookie(WL_COOKIEE, $wl_user->getToken(), PCOOKIE))
		            {
		            	trigger_error($user->lang['WINDOWSLIVE_ERROR']);
		            }
		        }
		        else 
		        {
		        	// Attempt to set the cookie.
		         	if(!setcookie(WL_COOKIE, $wl_user->getToken()))
		        	{
		        		trigger_error($user->lang['WINDOWSLIVE_ERROR']);
		        	}
		        }
			}
			else 
			{
				// Clear the cookie as we failed to get a user object.
				setcookie(WL_COOKIE);
		
			}
        }
        else
        {
        	// We have a cookie so we can process that rather than the login.
        	$wl_cookie = $_COOKIE[WL_COOKIE];
			
        	$wl_user = $al_wll->processToken($wl_cookie);
        }
        
        if ($wl_user) 
		{
			// Now that we have logged the user into Windows Live
			// we need to see if there was a specific action they wanted performed.
			$wl_context = $wl_user->getContext();
			
			// User wants to change their login method to use Windows Live
			if($wl_context == 'change_login_method')
			{
				// Build a query to see if the user already has a linked account
				// with another site.
				$sql = 'SELECT * 
					FROM ' . AL_USER_DATA
					. " WHERE user_id='{$user->data['user_id']}'";
				
				// Execute the query.
				$result = $db->sql_query($sql);
					
				// Get the data.
				$row = $db->sql_fetchrow($result);
				
				// Free up the result.
				$db->sql_freeresult($result);
				
				// Did we get data, if yes then the user has another account registered.
				// We need to unlink that account as well.
				if ($row)
				{
					// Prepare the user settings array.
					$al_user_settings = array_fill(0, AL_USER_OPTION_COUNT, 0);
					
					// Flip the switch for the Windows Live login.
					$al_user_settings[AL_WINDOWSLIVE_LOGIN] = 1;
					
					// Convert the array to its decimal equivalent.
					$al_user_settings = set_al_settings($al_user_settings);
					
					// Prepare the query to update the users Alternate Login record
					$sql = 'UPDATE ' . AL_USER_DATA
					. " SET al_user_settings=$al_user_settings, al_wl_id='{$wl_user->getId()}',"
					. ' al_oi_id=NULL, al_fb_id=NULL, al_ms_id=NULL'
					. " WHERE user_id='{$user->data['user_id']}'";
					
					
				}
				else
				{
					// Prepare the user settings array.
					$al_user_settings = array_fill(0, AL_USER_OPTION_COUNT, 0);
					
					// Flip the switch for the Windows Live login
					$al_user_settings[AL_WINDOWSLIVE_LOGIN] = 1;
					
					// Convert the array to its decimal equivalent.
					$al_user_settings = set_al_settings($al_user_settings);
					
					// Prepare the query to update the users Alternate Login record
					$sql = 'INSERT INTO ' . AL_USER_DATA
					. "(user_id, al_user_settings, al_wl_id)"
					. " VALUES('{$user->data['user_id']}', '$al_user_settings', '{$wl_user->getId()}')";
					

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
					trigger_error(sprintf($user->lang['AL_LINK_SUCCESS'], $user->lang['WINDOWSLIVE'], $user->lang['WINDOWSLIVE']));
				}
			}
				    
			
			// Prepare a query to check if the user already uses an Alternate Login.
			$sql = 'SELECT user_id 
					FROM ' . AL_USER_DATA
					. " WHERE al_wl_id='{$wl_user->getId()}'";
									
			// Execute the query.
			$result = $db->sql_query($sql);
								
			// Retrieve the data.
			$row = $db->sql_fetchrow($result);
			
			// Free up the result.
			$db->sql_freeresult($result);
						
			if ($row)   // If we retrieved data then the user already exists.
			{
				// Check for user bans.
				if($user->check_ban($row['user_id']))
				{
					trigger_error($user->lang['BAN_TRIGGERED_BY_USER']); 
				}
				
				// Log the user in.
				$result = $user->session_create($row['user_id'], 0, 0, 1);
				
				// Log in failed, tell the user.
				if(!$result)
				{
					trigger_error($user->lang['LOGIN_FAILURE']);
				}
				
				// Store the authentication data for later use.
				$user->data[WL_COOKIE] = $wl_cookie;
				
				// Show the appropriate redirect notice and successful log in alert.
				trigger_error(sprintf($user->lang['LOGIN_SUCCESS'] . "<br /><br />" . sprintf($user->lang['RETURN_INDEX'], "<a href='" . $phpbb_root_path . "index.php'>", "</a>")));
				
						
			}
			else
			{
				// The user doesn't exist so we ask them if they want to register.
				if(confirm_box(true))
				{
					// Most of this code comes from ucp_register.php
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
												'al_login_type'	=> AL_WINDOWSLIVE_LOGIN,
												WL_COOKIE		=> $wl_cookie
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
												'al_login_type'	=> AL_WINDOWSLIVE_LOGIN,
												WL_COOKIE		=> $wl_cookie
					);
					confirm_box(false, sprintf($user->lang['AL_REGISTER_QUERY'], $user->lang['WINDOWSLIVE']), build_hidden_fields($s_hidden_fields));
					
					// User said no to registration.
					
					// This is important to implement otherwise the user will not be logged in but according to the
					// Windows Live Login button they ARE logged in.
					
					// This will manually redirect them to the Windows Live Logout page and ensure they are not accidentally
					// still logged in.
					if(!$al_wll)
					{
						trigger_error($user->lang['WINDOWSLIVE_ERROR']);
					}
					header("Location: " . $al_wll->getLogoutUrl());

				}
							
			}			  
		}
		else 
		{
					
		  		trigger_error($user->lang['WINDOWSLIVE_ERROR']);
		}
}


?>