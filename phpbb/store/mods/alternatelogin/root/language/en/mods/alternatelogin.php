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

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ALTERNATE_LOGIN'						=> 'This site allows you to login using a social networking account.',
	'ACP_AL_MAIN_MANAGE'					=> 'Alternate Login Settings',
	'ACP_AL_FACEBOOK_MANAGE'				=> 'Facebook Settings',
	'ACP_AL_MYSPACE_MANAGE'					=> 'MySpace Settings',
	'ACP_AL_WINDOWSLIVE_MANAGE'				=> 'Windows Live Settings',
	'AL_LOGIN'								=> 'Select and alternate login',
	'AL_LOGIN_EXPLAIN'						=> 'You can select an alternate login method.  We will still need a user name and password.',
	'AL_REGISTER_QUERY'						=> 'Do you wish to register with your %s account?',
	'AL_REGISTRATION'						=> 'If you have an alternate social networking account you would like to use with this site please click one of the icons below <b>FIRST</b>.',
	'AL_LOGIN_UNAVAILABLE'					=> '%s is unavailable at this site.',
	'AL_PHPBB_DB_FAILURE'					=> 'An error occured whilst trying to connect to the phpBB database.',
	'ACP_ALTERNATELOGIN'					=> 'Alternate Login',
	'ACP_ALTERNATELOGIN_TITLE'				=> 'Alternate Login Manager',
	'ACP_ALTERNATELOGIN_SETTINGS_UPDATED'	=> 'The Alternate Login settings have been updated.',
	'ACP_AL_SAVE_ERROR'						=> 'An error occured trying to save your settings.',
	'ACP_AL_SAVE_SUCCESS'					=> 'Your settings have been successfully saved',
	'TITLE_ENABLE_LOGIN_PROFILE'			=> 'Enable alternate logins and profile syncs.',
	'FACEBOOK'								=> 'Facebook',
	'LIVEJOURNAL'							=> 'LiveJournal',
	'MYSPACE'								=> 'MySpace',
	'OPENID'								=> 'OpenID',
	'WINDOWSLIVE'							=> 'Windows Live',
	'ENABLE_LOGIN'							=> 'Enable Login',
	'ENABLE_PROFILE_SYNC'					=> 'Enable Profile Sync',
	'FACEBOOK_APP_ID'						=> 'Facebook Application Id',
	'FACEBOOK_SECRET'						=> 'Facebook Secret Key',
	'WINDOWSLIVE_APP_ID'					=> 'Windows Live Application Id',
	'WINDOWSLIVE_SECRET'					=> 'Windows Live Secret Key',
	'MYSPACE_APP_ID'						=> 'MySpace Application Id',
	'MYSPACE_SECRET'						=> 'MySpace Secret Key',
	'OPENID_APP_ID'							=> 'OpenID Application Id',
	'OPENID_SECRET'							=> 'OpenID Secret Key',
	'NOT_REGISTERED'						=> 'You are not registered at this site.<br /><br />%sClick here to register%s',
	'OPENID_ID_HEADER'						=> 'OpenID Authentication Page',
	'OPENID_INFO_TEXT'						=> 'OpenID\'s are supported by: 
															<ul><li><b>Live Journal:</b> <i>username</i>.livejournal.com</li></ul>',
	'OPENID_ID_LABEL'						=> 'OpenID',
	
	'OPENID_INVALID_ID'						=> 'This is not a valid OpenID.',
	
	'LOGIN_FAILURE'							=> 'Login has failed.',
	'LOGIN_SUCCESS'							=> 'You have been successfully logged in!',
	
	'MYSPACE_ERROR'							=> 'An error occurred whilst attemtping to connect to MySpace.',
	'OPENID_ERROR'							=> 'An error occurred whilst attemtping to connect to OpenID.',
	'WINDOWSLIVE_ERROR'							=> 'An error occurred whilst attemtping to connect to Windows Live.',
	'OPENID_VERIFICATION_CANCELLED'			=> 'The OpenID verification was cancelled.',
	'OPENID_AUTH_FAIL'						=> 'OpenID authentication has failed.',
	'SIGN_IN'								=> 'Sign In',
	'LOGGED_IN'								=> 'Logged In',
	
	'ACP_AL_MAIN_MANAGE'					=> 'Main Manage Page',
	'ACP_AL_FACEBOOK_MANAGE'				=> 'Facebook Manage Page',
	'ACP_AL_WINDOWSLIVE_MANAGE'				=> 'Windows Live Manage Page',
	'ACP_AL_MYSPACE_MANAGE'					=> 'MySpace Manage Page',
));

?>