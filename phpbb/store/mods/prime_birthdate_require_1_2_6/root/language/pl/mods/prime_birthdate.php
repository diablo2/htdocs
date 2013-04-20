<?php
/**
*
* prime_birthdate [Polish]
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
	'PRIME_BIRTHDATE_NAME'				=> 'Urodziny',
	'PRIME_BIRTHDATE_ENTER'				=> 'Proszę wybrać swoją datę urodzin.',
	'PRIME_BIRTHDATE_EMPTY'				=> 'Musisz wpisać swoja datę urodzin aby przejść dalej.',
	'PRIME_BIRTHDATE_YOUNG'				=> 'Jesteś za młody aby się tutaj zarejestrować.',
	'PRIME_BIRTHDATE_OLD'				=> 'Jesteś za stary aby się tutaj zarejestrować.',
	'PRIME_BIRTHDATE_MIN'				=> 'Minimalny wiek',
	'PRIME_BIRTHDATE_MIN_EXPLAIN'		=> 'Wymagana by uzytkownik nie był młodszy od tego wieku, aby sie zarejestrować. Tylko jeśli dara urodzin jest wymagana.',
	'PRIME_BIRTHDATE_MAX'				=> 'Maksymalny wiek',
	'PRIME_BIRTHDATE_MAX_EXPLAIN'		=> 'Wyamaga by uzytkownik nie był starszy od tego wieku, aby się zarejestrować. Wpisz 0 dla braku limitu. Tylko jeśli dara urodzin jest wymagana.',
	'PRIME_BIRTHDATE_YEARS_OLD'			=> 'lat/a',
	'PRIME_BIRTHDATE_REQUIRE'			=> 'Wymagane',
	'PRIME_BIRTHDATE_LOCK'				=> 'Wymagane &amp; Zablokowane',
	'PRIME_BIRTHDATE_SHOW_AGE'			=> 'Wyświetl wiek',
	'PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'	=> 'Ustala czy twój wiek jest publicznie widoczny .',
	'PRIME_BIRTHDATE_CONGRATS'			=> 'Wyświetl urodzinowe życzenia',
	'PRIME_BIRTHDATE_CONGRATS_EXPLAIN'	=> 'Ustala czy twoja nazwa użytkownika pojawi się na liście życzeń, gdy są twoje urodziny.',
	
	// Overwrite the original as the explanation no longer holds true.
	'BIRTHDAY_EXPLAIN'					=> 'Nie będzie publicznie widoczne.', 
));

?>