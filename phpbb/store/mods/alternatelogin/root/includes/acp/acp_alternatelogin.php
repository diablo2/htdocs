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


class acp_alternatelogin
{
	var $u_action;
	var $p_master;

	function acp_users(&$p_master)
	{
		$this->p_master = &$p_master;
	}

	function main($id, $mode)
	{
		global $config, $db, $user, $auth, $template, $cache;
		global $phpbb_root_path, $phpbb_admin_path, $phpEx, $table_prefix, $file_uploads;

		// Add the additional language file.
		$user->add_lang('mods/alternatelogin');
		
		// Set the template details.
		$this->tpl_name = 'acp_alternatelogin';
		$this->page_title = 'ACP_ALTERNATELOGIN';
		
		// Include the Alternate Login functions file.
		include_once($phpbb_root_path . 'includes/functions_alternatelogin.' . $phpEx);

		// Retrieve the action and submit values.
		$action		= request_var('action', '');

		$submit		= isset($_POST['submit']) ? true : false;

		// Set the form name and add the form key.
		$form_name = 'acp_alternatelogin';
		add_form_key($form_name);
		
		// Get the global Alternate Login settings and convert them to a binary on/off array.
		$al_settings = get_al_settings($config['al_settings']);

		// Process the submit action.
		if($submit)
		{
			switch($mode)
			{
				case 'manage':	// Process the main management page to determine which logins are available.
				
					// Retrieve the values that have been selected on the form.
					$facebook_login = request_var('facebook_login', '');
					$facebook_profile = request_var('facebook_profile', '');
					$myspace_login = request_var('myspace_login', '');
					$myspace_profile = request_var('myspace_profile', '');
					$openid_login = request_var('openid_login', '');
					$openid_profile = request_var('openid_profile', '');
					$windowslive_login = request_var('windowslive_login', '');
					$windowslive_profile = request_var('windowslive_profile', '');
					
					
					/********************************************************************
					*																	*
					*	The al_settings value is a binary switch.  Its decimal value	*
					*	is stored in the data base for instance 0000000100 would be		*
					*	as 4 in the database.											*
					*																	*
					********************************************************************/
					if($facebook_login == 1)
					{
						$al_settings[AL_FACEBOOK_LOGIN] = 1;
					}
					else
					{
						$al_settings[AL_FACEBOOK_LOGIN] = 0;
					}
					
					if($facebook_profile == 1)
					{
						$al_settings[AL_FACEBOOK_PROFILE] = 1;
					}
					else
					{
						$al_settings[AL_FACEBOOK_PROFILE] = 0;
					}
					
					if($myspace_login == 1)
					{
						$al_settings[AL_MYSPACE_LOGIN] = 1;
					}
					else
					{
						$al_settings[AL_MYSPACE_LOGIN] = 0;
					}
					
					if($myspace_profile == 1)
					{
						$al_settings[AL_MYSPACE_PROFILE] = 1;
					}
					else
					{
						$al_settings[AL_MYSPACE_PROFILE] = 0;
					}
					
					if($openid_login == 1)
					{
						$al_settings[AL_OPENID_LOGIN] = 1;
					}
					else
					{
						$al_settings[AL_OPENID_LOGIN] = 0;
					}
					
					if($openid_profile == 1)
					{
						$al_settings[AL_OPENID_PROFILE] = 1;
					}
					else
					{
						$al_settings[AL_OPENID_PROFILE] = 0;
					}
					
					if($windowslive_login == 1)
					{
						$al_settings[AL_WINDOWSLIVE_LOGIN] = 1;
					}
					else
					{
						$al_settings[AL_WINDOWSLIVE_LOGIN] = 0;
					}
					
					if($windowslive_profile == 1)
					{
						$al_settings[AL_WINDOWSLIVE_PROFILE] = 1;
					}
					else
					{
						$al_settings[AL_WINDOWSLIVE_PROFILE] = 0;
					}

					// Convert the array to its decimal equivalent.
					$config_value = set_al_settings($al_settings);
					
					// Store the value in the database.
					set_config('al_settings', $config_value, true);
					
					// Let the user know its been done.
					trigger_error($user->lang['ACP_ALTERNATELOGIN_SETTINGS_UPDATED'] . adm_back_link($this->u_action));
					
				break;
				
				case 'facebook':
					
					// Retrieve the submitted values and store and save them in the config database.
					$facebook_app_id = request_var('facebook_app_id', '');
					
					set_config('al_fb_appkey', $facebook_app_id, true);
					
					$facebook_secret = request_var('facebook_secret', '');
					
					set_config('al_fb_secret', $facebook_secret, true);
					
					trigger_error($user->lang['ACP_ALTERNATELOGIN_SETTINGS_UPDATED'] . adm_back_link($this->u_action));
				
				break;
				
				case 'windowslive':
				
					// Windows Live uses an xml file for the settings.
					// This section saves the submitted values to the xml file.
					$app_id = request_var('windowslive_app_id', '');
					
					$app_secret = request_var('windowslive_secret', '');
				
					$ddoc = new DOMDocument();
				
					$ddoc->preserveWhiteSpace = false;
					
					$ddoc->load($phpbb_root_path . $config['al_path'] . 'windowslive_app/windowslive-sdk/Application-Key.xml');
					
					$xPath = new DOMXPath($ddoc);
					
					$query = '//windowslivelogin/appid';
					
					$nodes = $xPath->query($query);
					
					$old_id = $nodes->item(0);
					
					$new_id = $ddoc->createElement('appid', $app_id);
					
					$old_id->parentNode->replaceChild($new_id, $old_id);
				
					$query = '//windowslivelogin/secret';
					
					$nodes = $xPath->query($query);
					
					$old_secret = $nodes->item(0);
					
					$new_secret = $ddoc->createElement('secret', $app_secret);
					
					$old_secret->parentNode->replaceChild($new_secret, $old_secret);

					if(!$ddoc->save($phpbb_root_path . $config['al_path'] . 'windowslive_app/windowslive-sdk/Application-Key.xml'))
					{
						trigger_error($user->lang['ACP_AL_SAVE_ERROR'] . adm_back_link($this->u_action), E_USER_WARNING);
					}
					else
					{
						trigger_error($user->lang['ACP_AL_SAVE_SUCCESS'] . adm_back_link($this->u_action));
					}
					
				break;
				
				case 'myspace':
					
					// Retrieve the submitted values and store and save them in the config database.
					$myspace_app_id = request_var('myspace_app_id', '');
					
					set_config('al_ms_ckey', $myspace_app_id, true);
					
					$myspace_secret = request_var('myspace_secret', '');
					
					set_config('al_ms_csecret', $myspace_secret, true);
					
					trigger_error($user->lang['ACP_ALTERNATELOGIN_SETTINGS_UPDATED'] . adm_back_link($this->u_action));
				
				break;
				
				default:
				break;
			}
		}
		else
		{
			
		}
		
		// This section deals with preparing variables and values for the
		// template.
		switch($mode)
		{
			case 'facebook':
				
				$template->assign_vars(array(
					'FACEBOOK_APP_ID'			=> $config['al_fb_appkey'],
					'FACEBOOK_SECRET'			=> $config['al_fb_secret'],
					'S_MODE_FACEBOOK'			=> true,
					'U_ACTION'					=> $this->u_action,
				));

			
			break;
			
			case 'windowslive':
			
				try
				{
					$ddoc = new DOMDocument();
					
					$ddoc->preserveWhiteSpace = false;
					
					$ddoc->load($phpbb_root_path . $config['al_path'] . 'windowslive_app/windowslive-sdk/Application-Key.xml');
					
					$xPath = new DOMXPath($ddoc);
					
					$query = '//windowslivelogin/appid';
					
					$nodes = $xPath->query($query);
					
					$app_id = $nodes->item(0)->nodeValue;
				
					$query = '//windowslivelogin/secret';
					
					$nodes = $xPath->query($query);
					
					$app_secret = $nodes->item(0)->nodeValue;
					
					$template->assign_vars(array(
						'WINDOWSLIVE_APP_ID'			=> $app_id,
						'WINDOWSLIVE_SECRET'			=> $app_secret,
						'S_MODE_WINDOWSLIVE'			=> true,
						'U_ACTION'					=> $this->u_action,
					));
				}
				catch(Exception $ex)
				{
					trigger_error($ex->getMessage());
				}

			break;
			
			case 'myspace':
			
				$template->assign_vars(array(
					'MYSPACE_APP_ID'			=> $config['al_ms_ckey'],
					'MYSPACE_SECRET'			=> $config['al_ms_csecret'],
					'S_MODE_MYSPACE'			=> true,
					'U_ACTION'					=> $this->u_action,
				));
			
			break;
			
			case 'manage':
			default:
				
				// Set the values to be used in the template.
				// A value of 0 in the database means that Alternate Login is disabled.
				if($config['al_settings'] == 0)
				{
					$facebook_login_no = 'checked="checked"';
					$facebook_login_yes = '';
					$facebook_profile_no = 'checked="checked"';
					$facebook_profile_yes = '';
						
					$myspace_login_no = 'checked="checked"';
					$myspace_login_yes = '';
					$myspace_profile_no = 'checked="checked"';
					$myspace_profile_yes = '';
						
					$openid_login_no = 'checked="checked"';
					$openid_login_yes = '';
					$openid_profile_no = 'checked="checked"';
					$openid_profile_yes = '';
							
					$windowslive_login_no = 'checked="checked"';
					$windowslive_login_yes = '';
					$windowslive_profile_no = 'checked="checked"';
					$windowslive_profile_yes = '';
				}
				else
				{
					if($al_settings[AL_FACEBOOK_LOGIN] == 1)
					{
						$facebook_login_yes = 'checked="checked"';
						$facebook_login_no = '';
					}
					else
					{
						$facebook_login_no = 'checked="checked"';
						$facebook_login_yes = '';
					}
								
					if($al_settings[AL_FACEBOOK_PROFILE] == 1)
					{
						$facebook_profile_yes = 'checked="checked"';
						$facebook_profile_no = '';
					}
					else
					{
						$facebook_profile_no = 'checked="checked"';
						$facebook_profile_yes = '';
					}
								
					if($al_settings[AL_MYSPACE_LOGIN] == 1)
					{
						$myspace_login_yes = 'checked="checked"';
						$myspace_login_no = '';
					}
					else
					{
						$myspace_login_no = 'checked="checked"';
						$myspace_login_yes = '';
					}
								
					if($al_settings[AL_MYSPACE_PROFILE] == 1)
					{
						$myspace_profile_yes = 'checked="checked"';
						$myspace_profile_no = '';
					}
					else
					{
						$myspace_profile_no = 'checked="checked"';
						$myspace_profile_yes = '';
					}
		
					if($al_settings[AL_OPENID_LOGIN] == 1)
					{
						$openid_login_yes = 'checked="checked"';
						$openid_login_no = '';
					}
					else
					{
						$openid_login_no = 'checked="checked"';
						$openid_login_yes = '';
					}
								
					if($al_settings[AL_OPENID_PROFILE] == 1)
					{
						$openid_profile_yes = 'checked="checked"';
						$openid_profile_no = '';
					}
					else
					{
						$openid_profile_no = 'checked="checked"';
						$openid_profile_yes = '';
					}
		
					if($al_settings[AL_WINDOWSLIVE_LOGIN] == 1)
					{
						$windowslive_login_yes = 'checked="checked"';
						$windowslive_login_no = '';
					}
					else
					{
						$windowslive_login_no = 'checked="checked"';
						$windowslive_login_yes = '';
					}
					
					if($al_settings[AL_WINDOWSLIVE_PROFILE] == 1)
					{
						$windowslive_profile_yes = 'checked="checked"';
						$windowslive_profile_no = '';
					}
					else
					{
						$windowslive_profile_no = 'checked="checked"';
						$windowslive_profile_yes = '';
					}
				}
				$template->assign_vars(array(
					'FACEBOOK_LOGIN_YES'		=> $facebook_login_yes,
					'FACEBOOK_LOGIN_NO'			=> $facebook_login_no,
					'FACEBOOK_PROFILE_YES'		=> $facebook_profile_yes,
					'FACEBOOK_PROFILE_NO'		=> $facebook_profile_no,
					'MYSPACE_LOGIN_YES'			=> $myspace_login_yes,
					'MYSPACE_LOGIN_NO'			=> $myspace_login_no,
					'MYSPACE_PROFILE_YES'		=> $myspace_profile_yes,
					'MYSPACE_PROFILE_NO'		=> $myspace_profile_no,
					'OPENID_LOGIN_YES'			=> $openid_login_yes,
					'OPENID_LOGIN_NO'			=> $openid_login_no,
					'OPENID_PROFILE_YES'		=> $openid_profile_yes,
					'OPENID_PROFILE_NO'			=> $openid_profile_no,
					'WINDOWSLIVE_LOGIN_YES'		=> $windowslive_login_yes,
					'WINDOWSLIVE_LOGIN_NO'		=> $windowslive_login_no,
					'WINDOWSLIVE_PROFILE_YES'	=> $windowslive_profile_yes,
					'WINDOWSLIVE_PROFILE_NO'	=> $windowslive_profile_no,
					'S_MODE_MAIN'				=> true,
					'U_ACTION'					=> $this->u_action,
				));
					
			break;
		}
	}
	
}

?>