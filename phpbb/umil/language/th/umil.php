<?php
/**
 *
 * @author Nathan Guse (EXreaction) http://lithiumstudios.org
 * @author David Lewis (Highway of Life) highwayoflife@gmail.com
 * @package umil
 * @version $Id: umil.php 149 2009-06-16 00:58:51Z exreaction $
 * @copyright (c) 2008 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/**
 * @ignore
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
	'ACTION'						=> 'Action',
	'ADVANCED'						=> 'ตั้งค่าขั้นสูง',
	'AUTH_CACHE_PURGE'				=> 'Purging the Auth Cache',

	'CACHE_PURGE'					=> 'Purging your forum’s cache',
	'CONFIGURE'						=> 'กำหนดค่า',
	'CONFIG_ADD'					=> 'Adding new config variable: %s',
	'CONFIG_ALREADY_EXISTS'			=> 'ERROR: Config variable %s already exists.',
	'CONFIG_NOT_EXIST'				=> 'ERROR: Config variable %s does not exist.',
	'CONFIG_REMOVE'					=> 'Removing config variable: %s',
	'CONFIG_UPDATE'					=> 'Updating config variable: %s',

	'DISPLAY_RESULTS'				=> 'แสดงผลลัพธ์ทั้งหมด',
	'DISPLAY_RESULTS_EXPLAIN'		=> 'เลือกใช่ เพื่อแสดงผลทั้งหมด.',

	'ERROR_NOTICE'					=> 'One or more errors occured during the requested action.  Please download <a href="%1$s">this file</a> with the errors listed in it and ask the mod author for assistance.<br /><br />If you have any problem downloading that file you may access it directly with an FTP browser at the following location: %2$s',
	'ERROR_NOTICE_NO_FILE'			=> 'One or more errors occured during the requested action.  Please make a full record of any errors and ask the mod author for assistance.',

	'FAIL'							=> 'ไม่สำเร็จ',
	'FILE_COULD_NOT_READ'			=> 'ผิดพลาด: ไม่สามารถเปิดไฟล์ %s เพื่ออ่านได้.',
	'FOUNDERS_ONLY'					=> 'You must be a board founder to access this page.',

	'GROUP_NOT_EXIST'				=> 'Group does not exist',

	'IGNORE'						=> 'ตั้งค่าปกติ',
	'IMAGESET_CACHE_PURGE'			=> 'Refreshing the %s imageset',
	'INSTALL'						=> 'ติดตั้ง',
	'INSTALL_MOD'					=> 'ติดตั้ง %s',
	'INSTALL_MOD_CONFIRM'			=> 'ต้องการติดตั้ง %s?',

	'MODULE_ADD'					=> 'เพิ่ม %1$s โมดูล: %2$s',
	'MODULE_ALREADY_EXIST'			=> 'ERROR: โมดูลนี้มีอยู่แล้ว.',
	'MODULE_NOT_EXIST'				=> 'ผิดพลาด!: โมดูนี้ไม่ได้ติดตั้งไว้.',
	'MODULE_REMOVE'					=> 'ลบ %1$s โมดูล: %2$s',

	'NONE'							=> 'ไม่มี',
	'NO_TABLE_DATA'					=> 'ผิดพลาด!: ไม่มีตารางที่ระบุ',

	'PARENT_NOT_EXIST'				=> 'ผิดพลาด!: The parent category specified for this module does not exist.',
	'PERMISSIONS_WARNING'			=> 'New permission settings have been added.  Be sure to check your permission settings and see that they are as you would like them.',
	'PERMISSION_ADD'				=> 'Adding new permission option: %s',
	'PERMISSION_ALREADY_EXISTS'		=> 'ERROR: Permission option %s already exists.',
	'PERMISSION_NOT_EXIST'			=> 'ERROR: Permission option %s does not exist.',
	'PERMISSION_REMOVE'				=> 'Removing permission option: %s',
	'PERMISSION_SET_GROUP'			=> 'Setting permissions for the %s group.',
	'PERMISSION_SET_ROLE'			=> 'Setting permissions for the %s role.',
	'PERMISSION_UNSET_GROUP'		=> 'Unsetting permissions for the %s group.',
	'PERMISSION_UNSET_ROLE'			=> 'Unsetting permissions for the %s role.',

	'ROLE_NOT_EXIST'				=> 'Role does not exist',

	'SUCCESS'						=> 'สำเร็จ',

	'TABLE_ADD'						=> 'Adding a new database table: %s',
	'TABLE_ALREADY_EXISTS'			=> 'ERROR: Database table %s already exists.',
	'TABLE_COLUMN_ADD'				=> 'Adding a new column named %2$s to table %1$s',
	'TABLE_COLUMN_ALREADY_EXISTS'	=> 'ERROR: The column %2$s already exists on table %1$s.',
	'TABLE_COLUMN_NOT_EXIST'		=> 'ERROR: The column %2$s does not exist on table %1$s.',
	'TABLE_COLUMN_REMOVE'			=> 'Removing the column named %2$s from table %1$s',
	'TABLE_COLUMN_UPDATE'			=> 'Updating a column named %2$s from table %1$s',
	'TABLE_KEY_ADD'					=> 'Adding a key named %2$s to table %1$s',
	'TABLE_KEY_ALREADY_EXIST'		=> 'ERROR: The index %2$s already exists on table %1$s.',
	'TABLE_KEY_NOT_EXIST'			=> 'ERROR: The index %2$s does not exist on table %1$s.',
	'TABLE_KEY_REMOVE'				=> 'Removing a key named %2$s from table %1$s',
	'TABLE_NOT_EXIST'				=> 'ERROR: Database table %s does not exist.',
	'TABLE_REMOVE'					=> 'Removing database table: %s',
	'TABLE_ROW_INSERT_DATA'			=> 'Inserting data in the %s database table.',
	'TABLE_ROW_REMOVE_DATA'			=> 'Removing a row from the %s database table',
	'TABLE_ROW_UPDATE_DATA'			=> 'Updating a row in the %s database table.',
	'TEMPLATE_CACHE_PURGE'			=> 'Refreshing the %s template',
	'THEME_CACHE_PURGE'				=> 'Refreshing the %s theme',

	'UNINSTALL'						=> 'ยกเลิกการติดตั้ง',
	'UNINSTALL_MOD'					=> 'ยกเลิกการติดตั้ง %s',
	'UNINSTALL_MOD_CONFIRM'			=> 'ต้องการยกเลิกการติดตั้ง %s?  ค่าต่างๆที่ตั้งค่าไว้ และข้อมูลต่างๆของ mod นี้จะหายไปด้วย!',
	'UNKNOWN'						=> 'ไม่รู้จัก',
	'UPDATE_MOD'					=> 'อัพเกรด Mod %s',
	'UPDATE_MOD_CONFIRM'			=> 'ต้องการอัพเกรดเป็น %s?',
	'UPDATE_UMIL'					=> 'UMIL รุ่นนี้เก่า.<br /><br />โปรดดาวน์โหลด UMIL(Unified MOD Install Library) เวอร์ชั่นล่าสุด  จาก: <a href="%1$s">%1$s</a>',

	'VERSIONS'						=> 'Mod เวอร์ชั่น: <strong>%1$s</strong><br />เวอร์ชั่นที่ติดตั้งอยู่แล้ว: <strong>%2$s</strong>',
	'VERSION_SELECT'				=> 'เลือกเวอร์ชั่น',
	'VERSION_SELECT_EXPLAIN'		=> 'ไม่ควรเปลี่ยนจาก “ปกติ” ถ้าไม่รู้ค่าอื่นที่ต้องการตั้งใหม่แบบขั้นสูง.',
));

?>