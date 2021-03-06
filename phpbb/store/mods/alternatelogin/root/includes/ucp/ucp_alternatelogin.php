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

if (!defined('IN_PHPBB'))
{
	exit;
}

class ucp_alternatelogin
{
	var $p_master;
	var $u_action;

	function ucp_alternatelogin(&$p_master)
	{
		$this->p_master = &$p_master;
	}

	function main($id, $mode)
	{
		global $config, $db, $user, $auth, $template, $phpbb_root_path, $phpEx;
		
		// Include the Alternate Login functions.
		include_once($phpbb_root_path . 'includes/functions_alternatelogin.' . $phpEx);
		
		// Include the AL language files.
		$user->add_lang('mods/info_ucp_alternatelogin');
		$user->add_lang('mods/alternatelogin');
		$user->add_lang('ucp');

		$submit = isset($_POST['submit']) ? true : false;

		// Get the users current AL settings.
		$al_user_settings		= get_al_user_settings($user->data['user_id']);
		
		$al_user_settings 		= get_al_settings($al_user_settings);
		
		if($submit)
		{
			switch ($mode)
			{
				case 'windowslive':
					
					// The user is trying to unlink their account.
					if($al_user_settings[AL_WINDOWSLIVE_LOGIN])
					{
						if(confirm_box(true))
						{
							// Delete the record from the AL User table
							$sql = 'DELETE FROM ' . AL_USER_DATA
									. " WHERE user_id = '{$user->data['user_id']}'";
									
							$result = $db->sql_query($sql);
							
							if(!$result)
							{
								trigger_error($user->lang['AL_PHPBB_DB_FAILURE']);
							}
							
							// The following code is copied from the 'forgot password' section.
							
							// The user will be sent a random password they need to activate.
							$sql = 'SELECT user_id, username, user_permissions, user_email, user_jabber, user_notify_type, user_type, user_lang, user_inactive_reason
								FROM ' . USERS_TABLE . "
								WHERE user_email = '" . $db->sql_escape($user->data['user_email']) . "'
								AND username_clean = '" . $db->sql_escape(utf8_clean_string($user->data['username'])) . "'";
							$result = $db->sql_query($sql);
							$user_row = $db->sql_fetchrow($result);
							$db->sql_freeresult($result);
					
							if (!$user_row)
							{
								trigger_error('NO_EMAIL_USER');
							}
					
							if ($user_row['user_type'] == USER_IGNORE)
							{
								trigger_error('NO_USER');
							}
					
							if ($user_row['user_type'] == USER_INACTIVE)
							{
								if ($user_row['user_inactive_reason'] == INACTIVE_MANUAL)
								{
									trigger_error('ACCOUNT_DEACTIVATED');
								}
								else
								{
									trigger_error('ACCOUNT_NOT_ACTIVATED');
								}
							}
							$auth2 = new auth();
							$auth2->acl($user_row);
								
							if (!$auth2->acl_get('u_chgpasswd'))
							{
								trigger_error('NO_AUTH_PASSWORD_REMINDER');
							}
							
							$server_url = generate_board_url();
							
							$key_len = 54 - strlen($server_url);
							$key_len = max(6, $key_len); // we want at least 6
							$key_len = ($config['max_pass_chars']) ? min($key_len, $config['max_pass_chars']) : $key_len; // we want at most $config['max_pass_chars']
							$user_actkey = substr(gen_rand_string(10), 0, $key_len);
							$user_password = gen_rand_string(8);
							
							$sql = 'UPDATE ' . USERS_TABLE . "
								SET user_newpasswd = '" . $db->sql_escape(phpbb_hash($user_password)) . "', user_actkey = '" . $db->sql_escape($user_actkey) . "'
								WHERE user_id = " . $user_row['user_id'];
							$db->sql_query($sql);
								
							include_once($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
								
							$messenger = new messenger(false);
								
							$messenger->template('user_activate_passwd', $user_row['user_lang']);
							
							$messenger->to($user_row['user_email'], $user_row['username']);
							$messenger->im($user_row['user_jabber'], $user_row['username']);
								
							$messenger->assign_vars(array(
								'USERNAME'		=> htmlspecialchars_decode($user_row['username']),
								'PASSWORD'		=> htmlspecialchars_decode($user_password),
								'U_ACTIVATE'	=> "$server_url/ucp.$phpEx?mode=activate&u={$user_row['user_id']}&k=$user_actkey")
							);
								
							$messenger->send($user_row['user_notify_type']);
							
								
							$message = $user->lang['PASSWORD_UPDATED'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
							
														
						}
						else
						{
							// Confirm that the user actually want to unlink their account.
							confirm_box(false, sprintf($user->lang['UCP_AL_UNLINK'], $user->lang['WINDOWSLIVE']), build_hidden_fields(array(
											'i'						=> $id,
											'mode'					=> $mode,
											'fb_h_enabled'			=> $facebook_enabled,
											'submit'				=> true)));
	
						}
					}
	
				break;
				
				case 'facebook':
				
					if(confirm_box(true))
					{
						$sql = 'DELETE FROM ' . AL_USER_DATA
								. " WHERE user_id = '{$user->data['user_id']}'";
									
						$result = $db->sql_query($sql);
							
						if(!$result)
						{
							trigger_error($user->lang['AL_PHPBB_DB_FAILURE']);
						}
							
						$sql = 'SELECT user_id, username, user_permissions, user_email, user_jabber, user_notify_type, user_type, user_lang, user_inactive_reason
							FROM ' . USERS_TABLE . "
							WHERE user_email = '" . $db->sql_escape($user->data['user_email']) . "'
							AND username_clean = '" . $db->sql_escape(utf8_clean_string($user->data['username'])) . "'";
						$result = $db->sql_query($sql);
						$user_row = $db->sql_fetchrow($result);
						$db->sql_freeresult($result);
					
						if (!$user_row)
						{
							trigger_error('NO_EMAIL_USER');
						}
					
						if ($user_row['user_type'] == USER_IGNORE)
						{
							trigger_error('NO_USER');
						}
					
						if ($user_row['user_type'] == USER_INACTIVE)
						{
							if ($user_row['user_inactive_reason'] == INACTIVE_MANUAL)
							{
								trigger_error('ACCOUNT_DEACTIVATED');
							}
							else
							{
								trigger_error('ACCOUNT_NOT_ACTIVATED');
							}
						}
						$auth2 = new auth();
						$auth2->acl($user_row);
							
						if (!$auth2->acl_get('u_chgpasswd'))
						{
							trigger_error('NO_AUTH_PASSWORD_REMINDER');
						}
							
						$server_url = generate_board_url();
							
						$key_len = 54 - strlen($server_url);
						$key_len = max(6, $key_len); // we want at least 6
						$key_len = ($config['max_pass_chars']) ? min($key_len, $config['max_pass_chars']) : $key_len; // we want at most $config['max_pass_chars']
						$user_actkey = substr(gen_rand_string(10), 0, $key_len);
						$user_password = gen_rand_string(8);
						
						$sql = 'UPDATE ' . USERS_TABLE . "
							SET user_newpasswd = '" . $db->sql_escape(phpbb_hash($user_password)) . "', user_actkey = '" . $db->sql_escape($user_actkey) . "'
							WHERE user_id = " . $user_row['user_id'];
						$db->sql_query($sql);
							
						include_once($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
								
						$messenger = new messenger(false);
								
						$messenger->template('user_activate_passwd', $user_row['user_lang']);
							
						$messenger->to($user_row['user_email'], $user_row['username']);
						$messenger->im($user_row['user_jabber'], $user_row['username']);
								
						$messenger->assign_vars(array(
							'USERNAME'		=> htmlspecialchars_decode($user_row['username']),
							'PASSWORD'		=> htmlspecialchars_decode($user_password),
							'U_ACTIVATE'	=> "$server_url/ucp.$phpEx?mode=activate&u={$user_row['user_id']}&k=$user_actkey")
						);
								
						$messenger->send($user_row['user_notify_type']);
						
						meta_refresh(3, append_sid("{$phpbb_root_path}index.$phpEx"));
								
						$message = $user->lang['PASSWORD_UPDATED'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
										
						trigger_error($message);

					}
					else
					{
						confirm_box(false, sprintf($user->lang['UCP_AL_UNLINK'], $user->lang['FACEBOOK']), build_hidden_fields(array(
										'i'						=> $id,
										'mode'					=> $mode,
										'submit'				=> true)));
					}
				
				break;
				
				case 'myspace':
				
					if(confirm_box(true))
					{
						$sql = 'DELETE FROM ' . AL_USER_DATA
								. " WHERE user_id = '{$user->data['user_id']}'";
									
						$result = $db->sql_query($sql);
							
						if(!$result)
						{
							trigger_error($user->lang['AL_PHPBB_DB_FAILURE']);
						}
							
						$sql = 'SELECT user_id, username, user_permissions, user_email, user_jabber, user_notify_type, user_type, user_lang, user_inactive_reason
							FROM ' . USERS_TABLE . "
							WHERE user_email = '" . $db->sql_escape($user->data['user_email']) . "'
							AND username_clean = '" . $db->sql_escape(utf8_clean_string($user->data['username'])) . "'";
						$result = $db->sql_query($sql);
						$user_row = $db->sql_fetchrow($result);
						$db->sql_freeresult($result);
					
						if (!$user_row)
						{
							trigger_error('NO_EMAIL_USER');
						}
					
						if ($user_row['user_type'] == USER_IGNORE)
						{
							trigger_error('NO_USER');
						}
					
						if ($user_row['user_type'] == USER_INACTIVE)
						{
							if ($user_row['user_inactive_reason'] == INACTIVE_MANUAL)
							{
								trigger_error('ACCOUNT_DEACTIVATED');
							}
							else
							{
								trigger_error('ACCOUNT_NOT_ACTIVATED');
							}
						}
						$auth2 = new auth();
						$auth2->acl($user_row);
							
						if (!$auth2->acl_get('u_chgpasswd'))
						{
							trigger_error('NO_AUTH_PASSWORD_REMINDER');
						}
							
						$server_url = generate_board_url();
							
						$key_len = 54 - strlen($server_url);
						$key_len = max(6, $key_len); // we want at least 6
						$key_len = ($config['max_pass_chars']) ? min($key_len, $config['max_pass_chars']) : $key_len; // we want at most $config['max_pass_chars']
						$user_actkey = substr(gen_rand_string(10), 0, $key_len);
						$user_password = gen_rand_string(8);
						
						$sql = 'UPDATE ' . USERS_TABLE . "
							SET user_newpasswd = '" . $db->sql_escape(phpbb_hash($user_password)) . "', user_actkey = '" . $db->sql_escape($user_actkey) . "'
							WHERE user_id = " . $user_row['user_id'];
						$db->sql_query($sql);
							
						include_once($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
								
						$messenger = new messenger(false);
								
						$messenger->template('user_activate_passwd', $user_row['user_lang']);
							
						$messenger->to($user_row['user_email'], $user_row['username']);
						$messenger->im($user_row['user_jabber'], $user_row['username']);
								
						$messenger->assign_vars(array(
							'USERNAME'		=> htmlspecialchars_decode($user_row['username']),
							'PASSWORD'		=> htmlspecialchars_decode($user_password),
							'U_ACTIVATE'	=> "$server_url/ucp.$phpEx?mode=activate&u={$user_row['user_id']}&k=$user_actkey")
						);
								
						$messenger->send($user_row['user_notify_type']);
						
						meta_refresh(3, append_sid("{$phpbb_root_path}index.$phpEx"));
								
						$message = $user->lang['PASSWORD_UPDATED'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
										
						trigger_error($message);

					}
					else
					{
						confirm_box(false, sprintf($user->lang['UCP_AL_UNLINK'], $user->lang['MYSPACE']), build_hidden_fields(array(
										'i'						=> $id,
										'mode'					=> $mode,
										'submit'				=> true)));
					}

				
				break;
				
				case 'openid':
				
					if(confirm_box(true))
					{
						$sql = 'DELETE FROM ' . AL_USER_DATA
								. " WHERE user_id = '{$user->data['user_id']}'";
									
						$result = $db->sql_query($sql);
							
						if(!$result)
						{
							trigger_error($user->lang['AL_PHPBB_DB_FAILURE']);
						}
							
						$sql = 'SELECT user_id, username, user_permissions, user_email, user_jabber, user_notify_type, user_type, user_lang, user_inactive_reason
							FROM ' . USERS_TABLE . "
							WHERE user_email = '" . $db->sql_escape($user->data['user_email']) . "'
							AND username_clean = '" . $db->sql_escape(utf8_clean_string($user->data['username'])) . "'";
						$result = $db->sql_query($sql);
						$user_row = $db->sql_fetchrow($result);
						$db->sql_freeresult($result);
					
						if (!$user_row)
						{
							trigger_error('NO_EMAIL_USER');
						}
					
						if ($user_row['user_type'] == USER_IGNORE)
						{
							trigger_error('NO_USER');
						}
					
						if ($user_row['user_type'] == USER_INACTIVE)
						{
							if ($user_row['user_inactive_reason'] == INACTIVE_MANUAL)
							{
								trigger_error('ACCOUNT_DEACTIVATED');
							}
							else
							{
								trigger_error('ACCOUNT_NOT_ACTIVATED');
							}
						}
						$auth2 = new auth();
						$auth2->acl($user_row);
							
						if (!$auth2->acl_get('u_chgpasswd'))
						{
							trigger_error('NO_AUTH_PASSWORD_REMINDER');
						}
							
						$server_url = generate_board_url();
							
						$key_len = 54 - strlen($server_url);
						$key_len = max(6, $key_len); // we want at least 6
						$key_len = ($config['max_pass_chars']) ? min($key_len, $config['max_pass_chars']) : $key_len; // we want at most $config['max_pass_chars']
						$user_actkey = substr(gen_rand_string(10), 0, $key_len);
						$user_password = gen_rand_string(8);
						
						$sql = 'UPDATE ' . USERS_TABLE . "
							SET user_newpasswd = '" . $db->sql_escape(phpbb_hash($user_password)) . "', user_actkey = '" . $db->sql_escape($user_actkey) . "'
							WHERE user_id = " . $user_row['user_id'];
						$db->sql_query($sql);
							
						include_once($phpbb_root_path . 'includes/functions_messenger.' . $phpEx);
								
						$messenger = new messenger(false);
								
						$messenger->template('user_activate_passwd', $user_row['user_lang']);
							
						$messenger->to($user_row['user_email'], $user_row['username']);
						$messenger->im($user_row['user_jabber'], $user_row['username']);
								
						$messenger->assign_vars(array(
							'USERNAME'		=> htmlspecialchars_decode($user_row['username']),
							'PASSWORD'		=> htmlspecialchars_decode($user_password),
							'U_ACTIVATE'	=> "$server_url/ucp.$phpEx?mode=activate&u={$user_row['user_id']}&k=$user_actkey")
						);
								
						$messenger->send($user_row['user_notify_type']);
						
						meta_refresh(3, append_sid("{$phpbb_root_path}index.$phpEx"));
								
						$message = $user->lang['PASSWORD_UPDATED'] . '<br /><br />' . sprintf($user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$phpbb_root_path}index.$phpEx") . '">', '</a>');
										
						trigger_error($message);

					}
					else
					{
						confirm_box(false, sprintf($user->lang['UCP_AL_UNLINK'], $user->lang['OPENID']), build_hidden_fields(array(
										'i'						=> $id,
										'mode'					=> $mode,
										'submit'				=> true)));
					}

				
				break;
				
			}
		}
		$ddoc = new DOMDocument();
					
		$ddoc->preserveWhiteSpace = false;
					
		$ddoc->load($phpbb_root_path . $config['al_path'] . 'windowslive_app/windowslive-sdk/Application-Key.xml');
					
		$xPath = new DOMXPath($ddoc);
					
		$query = '//windowslivelogin/appid';
					
		$nodes = $xPath->query($query);
					
		$wl_app_id = $nodes->item(0)->nodeValue;
				
		$query = '//windowslivelogin/secret';
					
		$nodes = $xPath->query($query);
					
		$wl_app_secret = $nodes->item(0)->nodeValue;
		
		$template->assign_vars(array(
			'AL_WL_APP_ID'					=> $wl_app_id,
			'S_MODE_WINDOWSLIVE'			=> ($mode == 'windowslive') ? true : false,
			'S_WINDOWSLIVE_LOGIN_ENABLED' 	=> $al_user_settings[AL_WINDOWSLIVE_LOGIN],
			'S_UCP_WINDOWSLIVE_DESCRIPTION'	=> $al_user_settings[AL_WINDOWSLIVE_LOGIN] ? sprintf($user->lang['UCP_DISABLE_AL_DESCRIPTION'], $user->lang['WINDOWSLIVE'], $user->lang['WINDOWSLIVE']) : sprintf($user->lang['UCP_ENABLE_AL_DESCRIPTION'], $user->lang['WINDOWSLIVE']),
			
			'S_MODE_FACEBOOK'				=> ($mode == 'facebook') ? true : false,
			'S_FACEBOOK_LOGIN_ENABLED' 		=> $al_user_settings[AL_FACEBOOK_LOGIN],
			'S_UCP_FACEBOOK_DESCRIPTION'	=> $al_user_settings[AL_FACEBOOK_LOGIN] ? sprintf($user->lang['UCP_DISABLE_AL_DESCRIPTION'], $user->lang['FACEBOOK'], $user->lang['FACEBOOK']) : sprintf($user->lang['UCP_ENABLE_AL_DESCRIPTION'], $user->lang['FACEBOOK']),
			
			'S_MODE_MYSPACE'				=> ($mode == 'myspace') ? true : false,
			'S_MYSPACE_LOGIN_ENABLED' 		=> $al_user_settings[AL_MYSPACE_LOGIN],
			'S_UCP_MYSPACE_DESCRIPTION'		=> $al_user_settings[AL_MYSPACE_LOGIN] ? sprintf($user->lang['UCP_DISABLE_AL_DESCRIPTION'], $user->lang['MYSPACE'], $user->lang['MYSPACE']) : sprintf($user->lang['UCP_ENABLE_AL_DESCRIPTION'], $user->lang['MYSPACE']),
			
			'S_MODE_OPENID'					=> ($mode == 'openid') ? true : false,
			'S_OPENID_LOGIN_ENABLED' 		=> $al_user_settings[AL_OPENID_LOGIN],
			'S_UCP_OPENID_DESCRIPTION'		=> $al_user_settings[AL_OPENID_LOGIN] ? sprintf($user->lang['UCP_DISABLE_AL_DESCRIPTION'], $user->lang['OPENID'], $user->lang['OPENID']) : sprintf($user->lang['UCP_ENABLE_AL_DESCRIPTION'], $user->lang['OPENID']),
			'AL_PATH'						=> $phpbb_root_path . $config['al_path'],
			
			'S_HIDDEN_FIELDS'				=> (isset($s_hidden_fields)) ? $s_hidden_fields : '',
			'S_UCP_ACTION'					=> $this->u_action,
		));

		// Set desired template
		$this->tpl_name = 'ucp_alternatelogin';
		$this->page_title = 'UCP_ALTERNATELOGIN';
	}
}

?>