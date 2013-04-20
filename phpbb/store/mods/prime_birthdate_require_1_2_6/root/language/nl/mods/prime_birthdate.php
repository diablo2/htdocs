<?php
/**
*
* prime_birthdate [Dutch (Casual Honorifics)‎]
*
* @package language
* @version $Id: prime_birthdate.php,v 1.2.0 2008/07/25 17:30:00 primehalo Exp $
* @copyright (c) 2007-2008 Ken F. Innes IV
* @translation 2008 dutch by MandersOnline
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
	'PRIME_BIRTHDATE_NAME'				=> 'Geboortedatum',
	'PRIME_BIRTHDATE_ENTER'				=> 'Vul alsjeblieft je geboortedatum in',
	'PRIME_BIRTHDATE_EMPTY'				=> 'Je moet je geboortedatum invullen om verder te gaan.',
	'PRIME_BIRTHDATE_YOUNG'				=> 'Je bent te jong om je hier te registreren.',
	'PRIME_BIRTHDATE_OLD'				=> 'Je bent te oud om je hier te registreren.',
	'PRIME_BIRTHDATE_MIN'				=> 'Minimum leeftijd',
	'PRIME_BIRTHDATE_MIN_EXPLAIN'		=> 'Een gebruiker moet deze leeftijd hebben om zich te mogen registeren. Werkt alleen als geboortedatums verplicht zijn.',
	'PRIME_BIRTHDATE_MAX'				=> 'Maximum leeftijd',
	'PRIME_BIRTHDATE_MAX_EXPLAIN'		=> 'Een gebruiker mag niet ouder zijn dan deze leeftijd om zich te registreren. Vul 0 in voor geen limiet. Werkt alleen als geboortedatums verplicht zijn.',
	'PRIME_BIRTHDATE_YEARS_OLD'			=> 'jaar oud',
	'PRIME_BIRTHDATE_REQUIRE'			=> 'Verplicht',
	'PRIME_BIRTHDATE_LOCK'				=> 'Verplicht & vergrendel',
	'PRIME_BIRTHDATE_SHOW_AGE'			=> 'Toon leeftijd',
	'PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'	=> 'Bepaalt of jouw leeftijd publiekelijk zichtbaar is.',
	'PRIME_BIRTHDATE_CONGRATS'			=> 'Toon verjaardagsfelicitaties',
	'PRIME_BIRTHDATE_CONGRATS_EXPLAIN'	=> 'Bepaalt of jouw gebruikersnaam verschijnt op de felicitatielijst als je jarig bent.',
	
	// Overwrite the original as the explanation no longer holds true.
	'BIRTHDAY_EXPLAIN'					=> 'Dit zal niet publiekelijk zichtbaar zijn.', 
));

?>