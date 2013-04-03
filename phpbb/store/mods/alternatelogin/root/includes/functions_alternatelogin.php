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

define('AL_FACEBOOK_LOGIN', 0);
define('AL_FACEBOOK_PROFILE', 1);
define('AL_MYSPACE_LOGIN', 2);
define('AL_MYSPACE_PROFILE', 3);
define('AL_GOOGLE_LOGIN', 4);
define('AL_GOOGLE_PROFILE', 5);
define('AL_OPENID_LOGIN', 6);
define('AL_OPENID_PROFILE', 7);
define('AL_WINDOWSLIVE_LOGIN', 8);
define('AL_WINDOWSLIVE_PROFILE', 9);

define('AL_HIDE_POST_LOGON', 10);	// Does the user want to be asked if they want to see the 'hide online' and autologin screen after verification?

define('AL_USER_OPTION_COUNT', 11);

define('WL_COOKIE', 'webauthtoken');
define('PCOOKIE', time() + (10 * 365 * 24 * 60 * 60));


/**
* Extract an Alternate Login settings value
* break it down and convert it to an array.

* @param integer $settings An Integer value that is retrieved from the congif table.
*
* @return array $fb_settings An array containing 0 or 1 values to determine the settings.
*/
function get_al_settings($settings)
{
	if($settings == 0)
	{
		$al_settings = array_fill(0, AL_USER_OPTION_COUNT, 0);
	}
	else
	{
		$al_settings = decbin($settings);
	
		$al_settings = strrev($al_settings);
	
		$al_settings = str_split($al_settings);
	}
	return $al_settings;
}

/**
* Converts Alternate Login settings array to an Interger value that 
* is stored in the $config array.
*
* @param array $al_settings An array containing boolean values to determine the settings.
*/

function set_al_settings($settings)
{
	$al_settings = implode($settings);
	
	$al_settings = strrev($al_settings);
	
	$al_settings = bindec($al_settings);
	
	return $al_settings;
}

/**
* Retrieve the Alternate Login settings value stored in the
* alternatelogin_settings table.
*
* @param integer $user_id The user id from the $user array.
*
* @return An integer value for conversion if neccesary.
*/
function get_al_user_settings($user_id)
{
	global $db;
	$sql = 'SELECT al_user_settings' .
			' FROM ' . AL_USER_DATA .
			" WHERE user_id = '$user_id'";
			
	$result = $db->sql_query($sql);
	
	if(!$result)
	{
		return false;
	}
	
	$ret_value = $db->sql_fetchfield('al_user_settings');
	
	return $ret_value;
}

/**
* Set the Alternate Login settings value stored in the
* alternatelogin_settings table.
*
* @param integer $user_id The user id can be found in the $user array.
*
* @param integer $settings The integer value of the user settings.  Can be converted from the get_al_settings() function.
*
* @return A boolean value indicating whether or not the operation succeded.
*/
function set_al_user_settings($user_id)
{
	global $db;
	$sql = 'UPDATE ' . AL_USER_DATA .
			" SET al_user_settings = '$settings'
			 WHERE user_id = '$user_id'";
			
	$result = $db->sql_query($sql);
	
	if(!$result)
	{
		return false;
	}
	else
	{
		return true;
	}
}

/**
* Validate an Alternate Login ID for Admin privaleges..
*
* @return False if the login failed, True if success.
*/
function al_validate_admin()
{
	global $db, $config, $user, $auth, $phpEx, $phpbb_root_path;
	
	$user->add_lang('acp/common');
	
	$sql = "SELECT user_email, al_user_settings, al_fb_id, al_wl_id, al_oi_id, al_ms_id" .
			" FROM " . USERS_TABLE . 
			" INNER JOIN " . AL_USER_DATA . 
			" ON " . USERS_TABLE . ".user_id = " . AL_USER_DATA . ".user_id" .
			" WHERE " . USERS_TABLE . ".user_id='" . $user->data['user_id'] . "'";
	
	$result = $db->sql_query($sql);
	
	$row = $db->sql_fetchrow($result);
	
	$username = $user->data['username'];
	$password = '';
	
	if($row)
	{
		if($row['al_fb_id'] != NULL)
		{
			$password = substr($row['al_fb_id'], 0, $config['max_pass_chars']);
		}
		elseif($row['al_wl_id'] != NULL)
		{
			$password = substr($row['al_wl_id'], 0, $config['max_pass_chars']);
		}
		elseif($row['al_oi_id'] != NULL)
		{
			$password = substr($row['al_oi_id'] . $row['user_email'], 0, $config['max_pass_chars']);
		}
		elseif($row['al_ms_id'] != NULL)
		{
			$password = substr($row['al_ms_id'] . $row['user_email'], 0, $config['max_pass_chars']);
		}
		
		
		
		$al_user_settings = get_al_settings($row['al_user_settings']);
		
		$hide_online = ($al_user_settings[AL_HIDE_POST_LOGON] == 1) ? false : true;
		
		$result = $auth->login($username, $password, false, $hide_online, true);
		
		if($result['status'] == LOGIN_SUCCESS)
		{
			add_log('admin', 'LOG_ADMIN_AUTH_SUCCESS');
			
			$redirect = "{$phpbb_root_path}adm/index.$phpEx";
			$message = $user->lang['LOGIN_REDIRECT'];
			$l_redirect = $user->lang['PROCEED_TO_ACP'];

			// append/replace SID (may change during the session for AOL users)
			$redirect = reapply_sid($redirect);

			// Special case... the user is effectively banned, but we allow founders to login
			if (defined('IN_CHECK_BAN') && $result['user_row']['user_type'] != USER_FOUNDER)
			{
				return;
			}

			$redirect = meta_refresh(3, $redirect);
			trigger_error($message . '<br /><br />' . sprintf($l_redirect, '<a href="' . $redirect . '">', '</a>'));

		}
		else
		{
			if ($user->data['is_registered'])
			{
				add_log('admin', 'LOG_ADMIN_AUTH_FAIL');
			}
			// Something failed, determine what...
			if ($result['status'] == LOGIN_BREAK)
			{
				trigger_error($result['error_msg']);
			}
			
			// Special cases... determine
			switch ($result['status'])
			{
				case LOGIN_ERROR_ATTEMPTS:
	
					// Show confirm image
					$sql = 'DELETE FROM ' . CONFIRM_TABLE . "
						WHERE session_id = '" . $db->sql_escape($user->session_id) . "'
							AND confirm_type = " . CONFIRM_LOGIN;
					$db->sql_query($sql);
	
					// Generate code
					$code = gen_rand_string(mt_rand(CAPTCHA_MIN_CHARS, CAPTCHA_MAX_CHARS));
					$confirm_id = md5(unique_id($user->ip));
					$seed = hexdec(substr(unique_id(), 4, 10));
	
					// compute $seed % 0x7fffffff
					$seed -= 0x7fffffff * floor($seed / 0x7fffffff);
	
					$sql = 'INSERT INTO ' . CONFIRM_TABLE . ' ' . $db->sql_build_array('INSERT', array(
						'confirm_id'	=> (string) $confirm_id,
						'session_id'	=> (string) $user->session_id,
						'confirm_type'	=> (int) CONFIRM_LOGIN,
						'code'			=> (string) $code,
						'seed'			=> (int) $seed)
					);
					$db->sql_query($sql);
	
					$template->assign_vars(array(
						'S_CONFIRM_CODE'			=> true,
						'CONFIRM_ID'				=> $confirm_id,
						'CONFIRM_IMAGE'				=> '<img src="' . append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=confirm&amp;id=' . $confirm_id . '&amp;type=' . CONFIRM_LOGIN) . '" alt="" title="" />',
						'L_LOGIN_CONFIRM_EXPLAIN'	=> sprintf($user->lang['LOGIN_CONFIRM_EXPLAIN'], '<a href="mailto:' . htmlspecialchars($config['board_contact']) . '">', '</a>'),
					));
	
					$err = $user->lang[$result['error_msg']];
	
				break;
	
				case LOGIN_ERROR_PASSWORD_CONVERT:
					$err = sprintf(
						$user->lang[$result['error_msg']],
						($config['email_enable']) ? '<a href="' . append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=sendpassword') . '">' : '',
						($config['email_enable']) ? '</a>' : '',
						($config['board_contact']) ? '<a href="mailto:' . htmlspecialchars($config['board_contact']) . '">' : '',
						($config['board_contact']) ? '</a>' : ''
					);
				break;
	
				// Username, password, etc...
				default:
					$err = $user->lang[$result['error_msg']];
	
					// Assign admin contact to some error messages
					if ($result['error_msg'] == 'LOGIN_ERROR_USERNAME' || $result['error_msg'] == 'LOGIN_ERROR_PASSWORD')
					{
						$err = (!$config['board_contact']) ? sprintf($user->lang[$result['error_msg']], '', '') : sprintf($user->lang[$result['error_msg']], '<a href="mailto:' . htmlspecialchars($config['board_contact']) . '">', '</a>');
					}
	
				break;
			}
			trigger_error($err);
		}
	}
}

/**
* Validate a LiveJournal login.
*
* @param string $username The username to log in with.
*
* @param string $password The password to log in with.
*
* @return False if the login failed, an array of data if success.
*/
function lj_login($username, $password)
{
	$request = "<?xml version=\"1.0\"?>
	<methodCall>
	<methodName>LJ.XMLRPC.login</methodName>
	<params>
	<param>
	
	<value><struct>
	<member><name>username</name>
	<value><string>$username</string></value>
	</member>
	<member><name>password</name>
	
	<value><string>$password</string></value>
	</member>
	<member><name>ver</name>
	<value><int>1</int></value>
	
	</member>
	</struct></value>
	</param>
	</params>
	</methodCall>";
	
	$context = stream_context_create(array('http' => array(
	    'method' => "POST",
	    'header' => "Content-Type: text/xml\r\nUser-Agent: PHPRPC/1.0\r\n",
	    'content' => $request
	)));
	
	$server = 'http://livejournal.com/interface/xmlrpc';
	
	$file = file_get_contents($server, false, $context);
	
	if(!$file)
	{
		return false;
	}
	
	$xml_doc = new DOMDocument();
	
	$xml_doc->loadXML($file);
	
	$xpath = new DOMXPath($xml_doc);

	$query = '//methodResponse/params/param/value/struct/member';
	
	$members = $xpath->query($query);
	
	$method_response = array();
	
	foreach ($members as $member) 
	{
	    $method_response[$member->firstChild->nodeValue] = $member->firstChild->nextSibling->firstChild->nodeValue;
	    
	}
	
	return $method_response;
}


?>