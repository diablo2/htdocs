<?php
/**
*
* prime_birthdate [French]
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
	'PRIME_BIRTHDATE_NAME'				=> 'Date de naissance',
	'PRIME_BIRTHDATE_ENTER'				=> 'Veuillez indiquer votre date de naissance',
	'PRIME_BIRTHDATE_EMPTY'				=> 'Vous devez entrer votre date de naissance pour continuer.',
	'PRIME_BIRTHDATE_YOUNG'				=> 'Vous êtes trop jeune pour vous enregistrer.',
	'PRIME_BIRTHDATE_OLD'				=> 'Vous êtes trop vieux pour être enregistré ici.',
	'PRIME_BIRTHDATE_MIN'				=> 'Age minimum',
	'PRIME_BIRTHDATE_MIN_EXPLAIN'		=> 'Les utilisateurs doivent avoir cet âge au minimum pour pouvoir s\'enregistrer. Ne fonctionne que si les anniversaires sont nécessaires.',
	'PRIME_BIRTHDATE_MAX'				=> 'Âge maximum',
	'PRIME_BIRTHDATE_MAX_EXPLAIN'		=> 'Exiger que l\'utilisateur aura pas plus de cet âge afin de registre. Entrez 0 pour illimitée. Ne fonctionne que si les anniversaires sont nécessaires.',
	'PRIME_BIRTHDATE_YEARS_OLD'			=> 'years old',
	'PRIME_BIRTHDATE_REQUIRE'			=> 'Obligatoire',
	'PRIME_BIRTHDATE_LOCK'				=> 'Obligatoire et verrouillé',
	'PRIME_BIRTHDATE_SHOW_AGE'			=> 'Afficher l\'âge',
	'PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'	=> 'Détermine si votre âge sera montré publiquement.',
	'PRIME_BIRTHDATE_CONGRATS'			=> 'Afficher les félicitations d\'anniversaire',
	'PRIME_BIRTHDATE_CONGRATS_EXPLAIN'	=> 'Détermine si votre nom d\'utilisateur apparaîtra sur la liste des félicitations le jour de votre anniversaire.',

	// Overwrite the original as the explanation no longer holds true.
	'BIRTHDAY_EXPLAIN'					=> 'Ce ne sera pas visible publiquement.', 
));

?>