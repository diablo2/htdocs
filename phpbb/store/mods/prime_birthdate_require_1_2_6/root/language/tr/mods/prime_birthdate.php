<?php
/**
*
* prime_birthdate [Turkish]
*
* @package language
* @version $Id: prime_birthdate.php,v 1.2.0 2008/07/25 17:30:00 primehalo Exp $
* @copyright (c) 2007-2008 Ken F. Innes IV
* @translation 2008 Turkish by [CitLemBiK]  [www.bizimpencere.com]
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
	'PRIME_BIRTHDATE_NAME'				=> 'Doğum gününüz',
	'PRIME_BIRTHDATE_ENTER'				=> 'Lütfen doğum gününüzü veriniz',
	'PRIME_BIRTHDATE_EMPTY'				=> 'Devam etmek için doğum günü vermek zorundasınız.',
	'PRIME_BIRTHDATE_YOUNG'				=> 'Foruma kayıt olmak icin yaşınız çok küçük.',
	'PRIME_BIRTHDATE_OLD'				=> 'Foruma kayıt olmak icin yaşınız çok yüksek.',
	'PRIME_BIRTHDATE_MIN'				=> 'Kulanıcı kaydı için en düşük yaş',
	'PRIME_BIRTHDATE_MIN_EXPLAIN'		=> 'Eger <em>Doğum günlerine izin ver</em> özelligi açıksa , foruma kayıt için en düşük yaşın değerini buraya verin. (0) değeri bu özelligi kapatır.',
	'PRIME_BIRTHDATE_MAX'				=> 'Kulanıcı kaydı icin en yüksek yaş',
	'PRIME_BIRTHDATE_MAX_EXPLAIN'		=> 'Eger <em>Doğum günlerine izin ver</em> özelligi açıksa , foruma kayıt için en yüksek yaşın değerini buraya verin. (0) değeri bu özelligi kapatır.',
	'PRIME_BIRTHDATE_YEARS_OLD'			=> 'yaşında',
	'PRIME_BIRTHDATE_REQUIRE'			=> 'Zorunlu',
	'PRIME_BIRTHDATE_LOCK'				=> 'Zorunlu &amp; Değiştirilemez',
	'PRIME_BIRTHDATE_SHOW_AGE'			=> 'Yaşımı göster',
	'PRIME_BIRTHDATE_SHOW_AGE_EXPLAIN'	=> 'Evet seçildiği takdirde herkes yaşınızı görebilir.',
	'PRIME_BIRTHDATE_CONGRATS'			=> 'Doğum tarihimin ayrıntıları göster',
	'PRIME_BIRTHDATE_CONGRATS_EXPLAIN'	=> 'Evet seçtiğiniz takdirde doğum tarihinizi herkes görebilecek ayrıca doğum günü kutlama listesinde isminiz görülecek...',

	// Overwrite the original as the explanation no longer holds true.
	'BIRTHDAY_EXPLAIN'					=> 'Aşağıdaki seçenekler "Hayır" seçildiği takdirde kimse doğum gününüzü ve yaşınızı göremez.', 
));

?>