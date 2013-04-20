<?php
/**
*
* prime_birthdate [German]
*
* @package language
* @version $Id: prime_birthdate.php,v 1.2.0 2008/07/25 17:30:00 primehalo Exp $
* @copyright (c) 2007-2008 Ken F. Innes IV
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

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
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'PRIME_BIRTHDATE_NAME'				=> 'Geburtstag',
	'PRIME_BIRTHDATE_ENTER'				=> 'Bitte gib deinen Geburtstag ein',
	'PRIME_BIRTHDATE_EMPTY'				=> 'Du musst ein Geburtstag eingeben um fortzufahren.',
	'PRIME_BIRTHDATE_YOUNG'				=> 'Du bist zu jung um dich hier zu registrieren!',
	'PRIME_BIRTHDATE_OLD'				=> 'Du bist zu alt um dich hier zu registrieren!',
	'PRIME_BIRTHDATE_MIN'				=> 'Minimales Alter',
	'PRIME_BIRTHDATE_MIN_EXPLAIN'		=> 'Verlangt das Benutzer des Forum so jung sein müssen um sich zu registrieren. Funktioniert nur, wenn Geburtstage erforderlich sind.',
	'PRIME_BIRTHDATE_MAX'				=> 'Maximales Alter',
	'PRIME_BIRTHDATE_MAX_EXPLAIN'		=> 'Verlangt das Benutzer des Forum so alt sein müssen um sich zu registrieren. Funktioniert nur, wenn Geburtstage erforderlich sind.',
	'PRIME_BIRTHDATE_YEARS_OLD'			=> 'Jahre alt',
	'PRIME_BIRTHDATE_REQUIRE'			=> 'Benötigt',
	'PRIME_BIRTHDATE_LOCK'				=> 'Benötigt &amp; Gesperrt',
	'PRIME_BIRTHDATE_SHOW_AGE'			=> 'Zeige Alter',
	'PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'	=> 'Bestimme, ob dein Alter öffentlich einsehbar ist.',
	'PRIME_BIRTHDATE_CONGRATS'			=> 'Zeige Geburtstag Glückwünsche',
	'PRIME_BIRTHDATE_CONGRATS_EXPLAIN'	=> 'Bestimme ob dein Name in der Geburtstagsliste angezeigt werden soll.',
	
	// Overwrite the original as the explanation no longer holds true.
	'BIRTHDAY_EXPLAIN'					=> 'Es wird nicht öffentlich angezeigt.',
));

?>