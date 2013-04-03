<?php
/**
*
* prime_birthdate [hebrew]
*
* @package language
* @version $Id: prime_birthdate.php,v 1.2.0 2008/07/25 17:30:00 primehalo Exp $
* @copyright (c) 2007-2008 Ken F. Innes IV
* @translation 2008 hebrew by ttuu
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
	'PRIME_BIRTHDATE_NAME'				=> 'תאריך לידה',
	'PRIME_BIRTHDATE_ENTER'				=> 'אנא הכנס את תאריך הלידה שלך',
	'PRIME_BIRTHDATE_EMPTY'				=> 'אתה חייב להכניס את תאריך הלידה שלך כדי להמשיך.',
	'PRIME_BIRTHDATE_YOUNG'				=> 'אתה צעיר מידיי מכדי להירשם לאתר זה.',
	'PRIME_BIRTHDATE_OLD'				=> 'You are too old to be registered here.',
	'PRIME_BIRTHDATE_MIN'				=> 'גיל מינימלי',
	'PRIME_BIRTHDATE_MIN_EXPLAIN'		=> 'דרוש מהמשתמש להיות לפחות בגיל הזה על מנת להירשם לאתרך. מתפקד רק אם הפונקציה <em>ימי הולדת</em> פעילה.',
	'PRIME_BIRTHDATE_MAX'				=> 'Maximum age',
	'PRIME_BIRTHDATE_MAX_EXPLAIN'		=> 'Require user to be no older than this age in order to register. Enter 0 for unlimited. Only functions if birthdays are required.',
	'PRIME_BIRTHDATE_YEARS_OLD'			=> 'שנים',
	'PRIME_BIRTHDATE_REQUIRE'			=> 'דרוש',
	'PRIME_BIRTHDATE_LOCK'				=> 'דרוש &amp; נעול',
	'PRIME_BIRTHDATE_SHOW_AGE'			=> 'הצג גיל',
	'PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'	=> 'הגיל שלך יוצג למשתמשים.',
	'PRIME_BIRTHDATE_CONGRATS'			=> 'הצג ברכת יום הולדת',
	'PRIME_BIRTHDATE_CONGRATS_EXPLAIN'	=> 'יציג את השם שלך בחלק ימי ההולדת ביום ההולדת שלך.',

	// Overwrite the original as the explanation no longer holds true.
	'BIRTHDAY_EXPLAIN'					=> 'This will not be publicly viewable.', 
));

?>