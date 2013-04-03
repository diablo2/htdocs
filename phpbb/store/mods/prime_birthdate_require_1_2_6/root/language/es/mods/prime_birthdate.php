<?php
/**
*
* prime_birthdate [Español]
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
	'PRIME_BIRTHDATE_NAME'				=> 'Fecha de nacimiento',
	'PRIME_BIRTHDATE_ENTER'				=> 'Ingrese su fecha de nacimiento',
	'PRIME_BIRTHDATE_EMPTY'				=> 'Debe ingresar su fecha de nacimiento.',
	'PRIME_BIRTHDATE_YOUNG'				=> 'Su edad es menor a la requerida para registrarte.',
	'PRIME_BIRTHDATE_OLD'				=> 'Usted es demasiado viejo para ser registrados aquí.',
	'PRIME_BIRTHDATE_MIN'				=> 'Edad mínima',
	'PRIME_BIRTHDATE_MIN_EXPLAIN'		=> 'Requerir la siguiente edad mínima para registrarse. Sólo funciona si los cumpleaños son obligatorios.',
	'PRIME_BIRTHDATE_MAX'				=> 'Edad máxima',
	'PRIME_BIRTHDATE_MAX_EXPLAIN'		=> 'Exigir a los usuarios a no ser mayores de esta edad, a fin de registrarse. Introduzca 0 para ilimitado. Sólo funciona si los cumpleaños son obligatorios.',
	'PRIME_BIRTHDATE_YEARS_OLD'			=> 'años de edad',
	'PRIME_BIRTHDATE_REQUIRE'			=> 'Requerido',
	'PRIME_BIRTHDATE_LOCK'				=> 'Requerido y bloqueado',
	'PRIME_BIRTHDATE_SHOW_AGE'			=> 'Mostrar edad',
	'PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'	=> 'Seleccione si su edad se puede mostrar en el foro.',
	'PRIME_BIRTHDATE_CONGRATS'			=> 'Mostrar felicitaciones por cumpleaños',
	'PRIME_BIRTHDATE_CONGRATS_EXPLAIN'	=> 'Seleccione si su usuario aparecerá en la lista de felicitaciones cuando sea su cumpleaños.',

	// Overwrite the original as the explanation no longer holds true.
	'BIRTHDAY_EXPLAIN'					=> 'Esto no se puede ver públicamente.', 
));

?>