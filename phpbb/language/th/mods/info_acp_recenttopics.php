<?php

/**
*
* @package - NV recent topics
* @version $Id: info_acp_recenttopics.php 201 2009-08-03 08:37:12Z nickvergessen $
* @copyright (c) nickvergessen ( http://www.flying-bits.org/ )
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* ภาษาไทยโดย phpBBthailand.com
*/
if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'RECENT_TOPICS'						=> 'กระทู้ล่าสุด',
	'RECENT_TOPICS_MOD'					=> ' โมดูล Recent topics ',
	'RT_CONFIG'							=> 'ตั้งค่าของโมดูล',
	'RT_ANTI_TOPICS'					=> 'ไม่รวมกระทู้ หมายเลข',
	'RT_ANTI_TOPICS_EXP'				=> 'ถ้าไม่เอาหลายๆกระทู้ คั่นหมายเลขกระทู้ด้วยเครื่องหมาย ", " (เช่น: "7, 9")<br />ถ้าเอาทุกกระทู้, ให้ใส่ค่า 0.',
	'RT_NUMBER'							=> 'กระทู้ล่าสุด',
	'RT_NUMBER_EXP'						=> 'จำนวนกระทู้ที่้ต้องการให้แสดงในหน้าหลัก.',
	'RT_PAGE_NUMBER'					=> 'จำนวนหน้าทั้งหมดของกระทู้ล่าสุด',
	'RT_PAGE_NUMBER_EXP'				=> 'คุณสามารถแสดงกระทู้ล่าสุดทั้งหมดด้วยการแบ่งหน้าแสดงผล. ใส่ค่า 1 เพื่อให้ความสามารถนี้ทำงาน. ถ้าใส่ 0 จะแสดงกระทู้ทั้งหมดในหน้าเดียว.',
	'RECENT_TOPICS_LIST'				=> 'View on "recent topics"',
	'RECENT_TOPICS_LIST_EXPLAIN'		=> 'Shall topics of this forum be displayed on the index in "recent topics"?',
	'RT_SAVED'							=> 'ตั้งค่าโมดูล เรียบร้อยแล้ว.',

	'RT_VIEW_ON'		=> 'แสดงกระทู้ล่าสุดที่หน้า',
	'RT_MEMBERLIST'		=> 'Memberlist',
	'RT_INDEX'			=> 'หน้าหลัก',
	'RT_SEARCH'			=> 'หน้าค้นหา',
	'RT_FAQ'			=> 'หน้า FAQ',
	'RT_MCP'			=> 'MCP (Moderator Control Panel)',
	'RT_UCP'			=> 'UCP (User Control Panel)',
	'RT_VIEWFORUM'		=> 'Viewforum',
	'RT_VIEWTOPIC'		=> 'Viewtopic',
	'RT_VIEWONLINE'		=> 'Viewonline',
	'RT_POSTING'		=> 'Posting',
	'RT_REPORT'			=> 'Reporting',
	'RT_OTHERS'			=> 'other Site',

	// Installer
	'INSTALL_RECENT_TOPICS_MOD'				=> 'Install "Recent topics" MOD',
	'INSTALL_RECENT_TOPICS_MOD_CONFIRM'		=> 'Are you sure you want to install the "Recent topics" MOD?',
	'UPDATE_RECENT_TOPICS_MOD'				=> 'Update "Recent topics" MOD',
	'UPDATE_RECENT_TOPICS_MOD_CONFIRM'		=> 'Are you sure you want to update the "Recent topics" MOD?',
	'UNINSTALL_RECENT_TOPICS_MOD'			=> 'Uninstall "Recent topics" MOD',
	'UNINSTALL_RECENT_TOPICS_MOD_CONFIRM'	=> 'Are you sure you want to uninstall the "Recent topics" MOD?',
));

?>