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
	'UCP_ALTERNATELOGIN'					=> 'Alternate Login Manager',
	'UCP_ALTERNATELOGIN_SETTINGS'			=> 'Alternate Login Settings',
	'UCP_AL_FACEBOOK'						=> 'Facebook Manager',
	'UCP_AL_WINDOWSLIVE'					=> 'Windows Live Manager',
	'UCP_AL_OPENID'							=> 'OpenID Manager',
	'UCP_AL_MYSPACE'						=> 'MySpace Manager',
	'UCP_AL_FACEBOOK_SETTINGS'				=> 'Facebook Settings',
	'UCP_AL_FACEBOOK_DISABLED'				=> 'Facebook is disabled at this site.',
	'UCP_AL_ASK_DISABLE_FACEBOOK'			=> 'Disable Facebook Login',
	'UCP_AL_ASK_ENABLE_FACEBOOK'			=> 'Enable Facebook Login',
	'UCP_AL_ENABLE_WINDOWSLIVE_TEXT'		=> 'Enable Windows Live login.',
	'UCP_AL_ENABLE_FACEBOOK_TEXT'			=> 'Enable Facebook login.',
	'UCP_AL_ENABLE_MYSPACE_TEXT'			=> 'Enable MySpace login.',
	'UCP_AL_ENABLE_OPENID_TEXT'				=> 'Enable OpenID login.',
	'UCP_AL_DISABLE_WINDOWSLIVE_TEXT'		=> 'Disable Windows Live login.',
	'UCP_AL_DISABLE_FACEBOOK_TEXT'			=> 'Disable Facebook login.',
	'UCP_AL_DISABLE_MYSPACE_TEXT'			=> 'Disable MySpace login.',
	'UCP_AL_DISABLE_OPENID_TEXT'			=> 'Disable OpenID login.',
	'UCP_AL_UNLINK'							=> 'Are you sure you want to unlink your %s account?',
	'UCP_AL_LINK'							=> 'Are you sure you want to link your %s account?',
	'UCP_ENABLE_FACEBOOK_LOGIN'				=> 'Do you wish to enable Facebook login?',
	'UCP_AL_ACCOUNT_UNLINKED'				=> 'You have successfully unlined your %s account.<br /><br />You will recieve your new password to your registered email.',
	'UCP_AL_CONFIRM_DISABLE'				=> 'Are you sure you wish to disable Windows Live login?  You will be sent a new password by email.',
	'UCP_DISABLE_AL_TEXT'					=> 'Unlink %s Account.',
	'UCP_DISABLE_AL_DESCRIPTION'			=> 'Please click the button opposite if you wish to disable your %s logon.<br />A new password will be sent to your registered email.  If you wish to link your forum account using one of the other available Alternate Logins then simply click the button to link the alternate account and this %s account will be unlinked automatically.',
	'UCP_ENABLE_AL_DESCRIPTION'				=> 'If you would like to link and login using your %s account then please login with the button opposite and we will link your account.',
	'DISABLE_WINDOWSLIVE'					=> 'Disable Windows Live Login',
	'DISABLE_FACEBOOK'						=> 'Disable Facebook Login',
	'DISABLE_OPENID'						=> 'Disable OpenID Login',
	'DISABLE_MYSPACE'						=> 'Disable MySpace Login',
	'ENABLE_FACEBOOK'						=> 'Enable Facebook Login',
	'AL_LINK_SUCCESS'						=> 'You have successfully linked your %s account <br /><br />In the future when logging in please use the %s button.',
));

?>