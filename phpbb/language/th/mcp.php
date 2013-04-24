<?php
/** 
* ภาษาไทย เวอร์ชั่น 1.2.5 
* 27/08/2555 
* ไฟล์ภาษาไทยสำหรับ PHPBB3 โดย www.mindphp.com และ www.phpbbthailand.com
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


$lang = array_merge($lang, array(
	'ACTION'				=> 'การกระทำ',
	'ACTION_NOTE'			=> 'การกระทำ/บันทึก',
	'ADD_FEEDBACK'			=> 'เพิ่มความคิดเห็น',
	'ADD_FEEDBACK_EXPLAIN'	=> 'ถ้าคุณต้องการเพิ่มข้อความในช่องว่างนี้ ต้องเป็นกรอกตัวอักษรอย่างเดียวเท่านั้น  HTML, BBCode, etc.ไม่สามารถใช้ได้',
	'ADD_WARNING'			=> 'เพิ่มการเตือน',
	'ADD_WARNING_EXPLAIN'	=> 'การส่งข้อความเตือนให้ผู้ใช้งานทราบ ต้องเป็นกรอกตัวอักษรอย่างเดียวเท่านั้น  HTML, BBCode, etc.ไม่สามารถใช้ได้',
	'ALL_ENTRIES'			=> 'เลือกทั้งหมด',
	'ALL_NOTES_DELETED'		=> 'ข้อมูลทั้งหมด ถูกย้ายเรียบร้อยแล้ว',
	'ALL_REPORTS'			=> 'รายงานทั้งหมด',
	'ALREADY_REPORTED'		=> 'ข้อความนี้ถูกรายงานเรียบร้อยแล้ว',

	'ALREADY_REPORTED_PM'	=> 'ข้อความส่วนตัวนี้ ได้ถูกรายงานแล้ว.',
	
	'ALREADY_WARNED'		=> 'การเตือนนี้ถูกใช้ในข้อความนี้.',
	'APPROVE'				=> 'อนุมัิติ',
	'APPROVE_POST'			=> 'อนุมัติข้อความ',
	'APPROVE_POST_CONFIRM'	=> 'คุณแน่ใจแล้วใช่ไหม ที่ต้องการให้ข้อความนี้ถูกอนุมัติ?',
	'APPROVE_POSTS'			=> 'อนุมัติข้อความ',
	'APPROVE_POSTS_CONFIRM'	=> 'คุณแน่ใจแล้วใช่ไหม ที่ต้องการให้ข้อความนี้ถูกอนุมัติก่อน?',

	'CANNOT_MOVE_SAME_FORUM'=> 'คุณไม่สามารถย้ายกระทู้นี้ไปหมวดอื่นได้',
	'CANNOT_WARN_ANONYMOUS'	=> 'คุณไม่สามารถแจ้งเตือนผู้ใช้งานที่ยังไม่ได้เป็นสมาชิกได้',
	'CANNOT_WARN_SELF'		=> 'คุณไม่สามารถแจ้งเตือนตนเองได้',
	'CAN_LEAVE_BLANK'		=> 'สามารถปล่อยเป็นค่าว่าง (ไม่ต้องกรอกก็ได้)',
	'CHANGE_POSTER'			=> 'เปลี่ยนผู้โพสต์',

	'CLOSE_PM_REPORT'		=> 'ปิดรายงานข้อความส่วนตัว',
	'CLOSE_PM_REPORT_CONFIRM'	=> 'ต้องการ ปิดรายงานข้อความส่วนตัว?',
	'CLOSE_PM_REPORTS'		=> 'ปิดรายงานข้อความส่วนตัว',
	'CLOSE_PM_REPORTS_CONFIRM'	=> 'ต้องการ ปิดรายงานข้อความส่วนตัวทั้่งหมด ?',
	
	'CLOSE_REPORT'			=> 'ปิดรายงาน',
	'CLOSE_REPORT_CONFIRM'	=> 'คุณแน่ใจแล้วใช่ไหม ที่ต้องการปิดรายงานฉบับนี้?',
	'CLOSE_REPORTS'			=> 'ปิดรายงาน',
	'CLOSE_REPORTS_CONFIRM'	=> 'ต้องการปิดรายงานฉบับนี้?',

	'DELETE_PM_REPORT'			=> 'ลบรายงานข้อความส่วนตัว',
	'DELETE_PM_REPORT_CONFIRM'	=> 'ต้องการ ลบรายงานข้อความส่วนตัว?',
	'DELETE_PM_REPORTS'			=> 'ลบรายงานข้อความส่วนตัว',
	'DELETE_PM_REPORTS_CONFIRM'	=> 'ต้องการ ลบรายงานข้อความส่วนตัวทั้งหมด ?',

	'DELETE_POSTS'				=> 'ลบข้อความ',
	'DELETE_POSTS_CONFIRM'		=> 'ต้องการลบข้อความเหล่านี้?',
	'DELETE_POST_CONFIRM'		=> 'ต้องการลบข้อความนี้ ?',
	'DELETE_REPORT'				=> 'ลบรายงาน',
	'DELETE_REPORT_CONFIRM'		=> 'ต้องการลบรายงานนี้?',
	'DELETE_REPORTS'			=> 'ลบรายงาน',
	'DELETE_REPORTS_CONFIRM'	=> 'ต้องการลบรายงานนี้?',
	'DELETE_SHADOW_TOPIC'		=> 'ลบกระทู้เงา',
	'DELETE_TOPICS'				=> 'ลบกระทู้ที่เลือก',
	'DELETE_TOPICS_CONFIRM'		=> 'ต้องการลบกระทู้นี้?',
	'DELETE_TOPIC_CONFIRM'		=> 'ต้องการลบกระทู้นี้?',
	'DISAPPROVE'				=> 'ไม่อนุมัิติ',
	'DISAPPROVE_REASON'			=> 'เหตุผลที่ไม่อนุมัิติ',
	'DISAPPROVE_POST'			=> 'ไม่อนุมัิติข้อความนี้',
	'DISAPPROVE_POST_CONFIRM'	=> 'ไม่ต้องการอนุมัิติข้อความนี้?',
	'DISAPPROVE_POSTS'			=> 'ไม่อนุมัิติข้อความเหล่านี้',
	'DISAPPROVE_POSTS_CONFIRM'	=> 'ไม่ต้องการอนุมัิติข้อความเหล่านี้?',
	'DISPLAY_LOG'				=> 'แสดงบอร์ดก่อนหน้านี้',
	'DISPLAY_OPTIONS'			=> 'แสดง options',

	'EMPTY_REPORT'					=> 'คุณต้องเขียนอธิบาย เมื่อคุณต้องการจะระบุเหตุผล',
	'EMPTY_TOPICS_REMOVED_WARNING'	=> 'เลือก หนึ่งหรือหลาย กระทู้ที่ต้องการย้ายจากฐานข้อมูล.',

	'FEEDBACK'				=> 'ความคิดเห็น',
	'FORK'					=> 'คัดลอก',
	'FORK_TOPIC'			=> 'คัดลอกกระทู้',
	'FORK_TOPIC_CONFIRM'	=> '่ต้องการคัดลอกกระทู้นี้ ?',
	'FORK_TOPICS'			=> 'เลือกคัดลอกกระทู้นี้',
	'FORK_TOPICS_CONFIRM'	=> '่ต้องการคัดลอกกระทู้เหล่านี้ ? ',
	'FORUM_DESC'			=> 'คำอธิบายเว็บบอร์ด',
	'FORUM_NAME'			=> 'ชื่อเว็บบอร์ด',
	'FORUM_NOT_EXIST'		=> 'ไม่มีบอร์ดที่เลือก ',
	'FORUM_NOT_POSTABLE'	=> 'บอร์ดที่เลือก ไม่มีข้อความใดๆ ',
	'FORUM_STATUS'			=> 'สถานะเว็บบอร์ด',
	'FORUM_STYLE'			=> 'หน้าตาเว็บบอร์ด',

	'GLOBAL_ANNOUNCEMENT'	=> 'ประกาศทั่วไป',

	'IP_INFO'				=> 'ข้อมูลเกี่ยวกับ IP address',
	'IPS_POSTED_FROM'		=> 'ผู้ใช้โพสต์ข้อความจากไอพี ',

	'LATEST_LOGS'				=> ' 5 log ล่าสุด',
	'LATEST_REPORTED'			=> ' 5 รายงานล่าสุด',

	'LATEST_REPORTED_PMS'		=> '5 รานงานข้อความส่วนตัวล่าสุด',
	
	'LATEST_UNAPPROVED'			=> ' 5 ข้อความที่รอการอนุมัติ',
	'LATEST_WARNING_TIME'		=> 'เตือนล่าสุด',
	'LATEST_WARNINGS'			=> '5 การเตือนล่าสุด',
	'LEAVE_SHADOW'				=> 'เก็บชื่อกระทู้ไว้ที่บอร์ดเดิม ลิงค์ข้อมูลไปที่บอร์ดใหม่',
	'LIST_REPORT'				=> '1 รายงาน',
	'LIST_REPORTS'				=> '%d รายงาน',
	'LOCK'						=> 'ล๊อก',
	'LOCK_POST_POST'			=> 'ล๊อกข้อความ',
	'LOCK_POST_POST_CONFIRM'	=> '่ต้องการป้องกันการแก้ไขข้อความนี้?',
	'LOCK_POST_POSTS'			=> 'ล๊อกข้อความที่เลือก',
	'LOCK_POST_POSTS_CONFIRM'	=> 'ต้องการป้องกันการแก้ไขข้อความที่เลือก ไว้ ?',
	'LOCK_TOPIC_CONFIRM'		=> 'ที่ต้องการล๊อกกระทู้นี้ ?',
	'LOCK_TOPICS'				=> 'ล๊อกกระทู้ที่เลือก',
	'LOCK_TOPICS_CONFIRM'		=> 'ต้องการล๊อกกระทู้ที่เลือก ?',
	'LOGS_CURRENT_TOPIC'		=> 'ดู Log ณ ปัจจุบัน:',
	'LOGIN_EXPLAIN_MCP'			=> 'การจัดการบอร์ดต้องเข้าระบบก่อน',
	'LOGVIEW_VIEWTOPIC'			=> 'ดูกระทู้',
	'LOGVIEW_VIEWLOGS'			=> 'ดู Log กระทู้',
	'LOGVIEW_VIEWFORUM'			=> 'ดู บอร์ด',
	'LOOKUP_ALL'				=> 'ดู IP ทั้งหมด ',
	'LOOKUP_IP'					=> 'ดู IP',

	'MARKED_NOTES_DELETED'		=> ' สมาชิกที่เลือกถูกย้ายเรีบร้อยแล้ว',

	'MCP_ADD'						=> 'เพิ่มการแจ้งเตือน',

	'MCP_BAN'					=> 'การแบน',
	'MCP_BAN_EMAILS'			=> 'แบนอีเมลล์',
	'MCP_BAN_IPS'				=> 'แบนไอพี',
	'MCP_BAN_USERNAMES'			=> 'แบนชื่อผู้ใช้',

	'MCP_LOGS'						=> 'ประวัติการจัดการบอร์ด',
	'MCP_LOGS_FRONT'				=> 'หน้าหลัก',
	'MCP_LOGS_FORUM_VIEW'			=> 'ประวัติ',
	'MCP_LOGS_TOPIC_VIEW'			=> 'ประวัติของกระทู้',

	'MCP_MAIN'						=> 'หน้าแรก',
	'MCP_MAIN_FORUM_VIEW'			=> 'ดูหน้าบอร์ดที่จัดการ',
	'MCP_MAIN_FRONT'				=> 'หน้าหลัก',
	'MCP_MAIN_POST_DETAILS'			=> 'รายละเอียดโพสต์',
	'MCP_MAIN_TOPIC_VIEW'			=> 'ดูกระทู้',
	'MCP_MAKE_ANNOUNCEMENT'			=> 'แก้ไข “ประกาศ”',
	'MCP_MAKE_ANNOUNCEMENT_CONFIRM'	=> '่ต้องการเปลี่ยน  “ประกาศ”?',
	'MCP_MAKE_ANNOUNCEMENTS'		=> 'การแก้ไขประกาศ”',
	'MCP_MAKE_ANNOUNCEMENTS_CONFIRM'=> '่ต้องการแก้ไข “ประกาศ” ที่เลือก ไว้?',
	'MCP_MAKE_GLOBAL'				=> 'การแก้ไข “ประกาศทั่วไป”',
	'MCP_MAKE_GLOBAL_CONFIRM'		=> '่ต้องการแก้ไข “ประกาศทั่วไป”?',
	'MCP_MAKE_GLOBALS'				=> 'การแก้ไข “ประกาศทั่วไป”',
	'MCP_MAKE_GLOBALS_CONFIRM'		=> '่ต้องการแก้ไข “ประกาศทั่วไป”?',
	'MCP_MAKE_STICKY'				=> 'ตั้งให้เป็น “ปักหมุด”',
	'MCP_MAKE_STICKY_CONFIRM'		=> 'ต้องการปักหมุดกระทู้นี้ ?',
	'MCP_MAKE_STICKIES'				=> 'การแก้ไข “ปักหมุด”',
	'MCP_MAKE_STICKIES_CONFIRM'		=> '่ต้องการแก้ไข “ปักหมุด” ที่เลือก ?',
	'MCP_MAKE_NORMAL'				=> 'การแก้ไข “กระทู้ธรรมดา',
	'MCP_MAKE_NORMAL_CONFIRM'		=> '่ต้องการแก้ไข “กระทู้ธรรมดา” ที่เลือก ?',
	'MCP_MAKE_NORMALS'				=> 'การแก้ไข “กระทู้ธรรมดา"',
	'MCP_MAKE_NORMALS_CONFIRM'		=>'่ต้องการแก้ไข “กระทู้ธรรมดา” ที่เลือก ?',

	'MCP_NOTES'						=> 'บันทึกผู้ใช้งาน',
	'MCP_NOTES_FRONT'				=> 'หน้าหลัก',
	'MCP_NOTES_USER'				=> 'รายละเอียดผู้ใช้',

	'MCP_POST_REPORTS'				=> 'ประเด็นรายงานของข้อความนี้',

	'MCP_PM_REPORTS'				=> 'รางานข้อความส่วนตัว',
	'MCP_PM_REPORT_DETAILS'			=> 'รายละเีอียดรายงานข้อความส่วนตัว',
	'MCP_PM_REPORTS_CLOSED'			=> 'ปิดรายงานข้อควาส่วนตัว',
	'MCP_PM_REPORTS_CLOSED_EXPLAIN'	=> 'นี่คือรายงานข้อความส่วนตัวทั้งหมด ซึ่งได้รับการจัดารแล้ว.',
	'MCP_PM_REPORTS_OPEN'			=> 'เปิดรายงานข้อความส่วนตัว',
	'MCP_PM_REPORTS_OPEN_EXPLAIN'	=> 'นี่คือรายงานข้อความส่วนตัวทั้งหมด ซุึ่งยังไม่ได้จัดการ.',

	'MCP_REPORTS'					=> 'ข้อความ รายงาน',

	'MCP_REPORT_DETAILS'			=> 'รายละเอียดรายงาน',
	'MCP_REPORTS_CLOSED'			=> 'รายงานที่ปิดแล้ว',
	'MCP_REPORTS_CLOSED_EXPLAIN'	=> 'นี่คือรายงานทั้งหมดที่ไม่มีการใช้งานแล้ว',
	'MCP_REPORTS_OPEN'				=> 'รายงานที่เปิดอยู่',
	'MCP_REPORTS_OPEN_EXPLAIN'		=> 'นี่คือรายงานทั้งหมดที่มีการจัดการอยู่',

	'MCP_QUEUE'								=> 'การอนุมัติ',
	'MCP_QUEUE_APPROVE_DETAILS'				=> 'รายละเอียดการอนุมัติ',
	'MCP_QUEUE_UNAPPROVED_POSTS'			=> 'ข้อความที่รอการอนุมัติ',
	'MCP_QUEUE_UNAPPROVED_POSTS_EXPLAIN'	=> 'นี่คือรายการข้อความทั้งหมดที่รอการอนุมัติ ก่อนที่ผู้ใช้งานจะเข้าใช้งาน',
	'MCP_QUEUE_UNAPPROVED_TOPICS'			=> 'กระทู้ที่รอการอนุมัติ',
	'MCP_QUEUE_UNAPPROVED_TOPICS_EXPLAIN'	=> 'นี่คือรายการกระทู้ทั้งหมดที่รอการอนุมัติ ก่อนที่ผู้ใช้งานจะเข้าใช้งาน',

	'MCP_VIEW_USER'			=> 'เรียกดูการแจ้งเตือนสำหรับรายผู้ใช้',

	'MCP_WARN'				=> 'การเตือน',
	'MCP_WARN_FRONT'		=> 'หน้าหลัก',
	'MCP_WARN_LIST'			=> 'รายการ เตือน',
	'MCP_WARN_POST'			=> 'เตือนเฉพาะข้อความ',
	'MCP_WARN_USER'			=> '',

	'MERGE_POSTS_CONFIRM'	=> 'คุณแน่ใจใช่ไหม ที่ต้องการรวมข้อความเข้าด้วยกัน',
	'MERGE_TOPIC_EXPLAIN'	=> 'คุณสามารถรวมข้อความระหว่างกับกระทู้อื่นได้ ข้อความเหล่านี้จะไม่ถูกนำกลับมาและจะปรากฏเมื่อผู้ใช้ทำการโพสต์มันลงในข้อความใหม่<br />กรุณาเลือกเลขที่กระทู้ปลยทาง หรือ เลือกกระทู้จากการค้นหา ',
	'MERGE_TOPIC_ID'		=> 'Destination topic identification number',
	'MERGE_TOPICS'			=> 'รวมกระทู้เหล่านี้',
	'MERGE_TOPICS_CONFIRM'	=> 'คุณแน่ใจใช่ไหม ที่ต้องการรวมกระทู้ที่เลือก เข้าด้วยกัน?',
	'MODERATE_FORUM'		=> 'บอร์ดที่จัดการ',
	'MODERATE_TOPIC'		=> 'กระทู้ที่จัดการ',
	'MODERATE_POST'			=> 'ข้อความที่จัดการ',
	'MOD_OPTIONS'			=> 'Moderator options',
	'MORE_INFO'				=> 'เหตุผลเพิ่มเติม',
	'MOST_WARNINGS'			=> 'การแจ้งเตือนของผู้ใช้งาน',
	'MOVE_TOPIC_CONFIRM'	=> 'คุณแน่ใจไหมที่ต้องการย้ายกระทู้นี้ ไปที่บอร์ดใหม่?',
	'MOVE_TOPICS'			=> 'ย้ายกระทู้ที่เลือก',
	'MOVE_TOPICS_CONFIRM'	=> 'คุณแน่ใจใช่ไหม ที่ต้องการย้ายกระทู้นี้เข้าบอร์ดใหม่?',

	'NOTIFY_POSTER_APPROVAL'		=> 'ต้องการอนุมัติหรือไม่',
	'NOTIFY_POSTER_DISAPPROVAL'		=> 'ไม่ได้รับการอนุมัติ?',
	'NOTIFY_USER_WARN'				=> 'แจ้งผู้ใช้งานเกี่ยวกับการแจ้งเตือน?',
	'NOT_MODERATOR'					=> 'คุณไม่สามารถจัดการกับบอร์ดนี้ได้',
	'NO_DESTINATION_FORUM'			=> 'กรุณาเลือกบอร์ดปลายทาง',
	'NO_DESTINATION_FORUM_FOUND'	=> 'ไม่พบบอร์ดปลายทาง.',
	'NO_ENTRIES'					=> 'ไม่มีบันทึก',
	'NO_FEEDBACK'					=> 'ไม่มีการตอบกลับจากผู้ใช้งาน',
	'NO_FINAL_TOPIC_SELECTED'		=> 'คุณต้องเลือกข้อความปลายทางที่ต้องการรวม',
	'NO_MATCHES_FOUND'				=> 'ไม่สามารถจับคู่กันได้',
	'NO_POST'						=> 'คุณต้องเลือกข้อความปลายทางจากที่ผู้ใช้งานกำหนดให้',
	'NO_POST_REPORT'				=> 'ข้อความเหล่านี้ไม่มีรายงาน',
	'NO_POST_SELECTED'				=> 'คุณต้องเลือกการกระทำอย่างน้อยหนึ่งรายการ.',
	'NO_REASON_DISAPPROVAL'			=> 'กรุณาอธิบายเหตุผลของการไม่อนุมัติ',
	'NO_REPORT'						=> 'ไม่พบรายงาน',
	'NO_REPORTS'					=> 'ไม่พบรายงาน',	
	'NO_REPORT_SELECTED'			=>' คุณต้องเลือกการกระทำอย่างน้อยหนึ่งรายการ',
	'NO_TOPIC_ICON'					=> 'ไม่มี',
	'NO_TOPIC_SELECTED'				=> 'คุณต้องเลือกการกระทำอย่างน้อยหนึ่งรายการ',
	'NO_TOPICS_QUEUE'				=> 'ไม่มีกระทู้ที่รออนุมัติ',

	'ONLY_TOPIC'			=> 'เพียง "%s" กระทู้',
	'OTHER_USERS'			=> 'มีผู้ใช้งานท่านอื่นใช้ไอพีนี้',

	'PM_REPORT_CLOSED_SUCCESS'	=> 'รางานข้อควาส่วนตัวที่คุณเลือก ปิดเรียบร้อยแล้ว .',
	'PM_REPORT_DELETED_SUCCESS'	=> 'รางานข้อควาส่วนตัวที่คุณเลือก ลบเรียบร้อยแล้ว.',
	'PM_REPORTED_SUCCESS'		=> 'ข้อความส่วนตัวรายงานเรียบร้อยแล้ว.',
	'PM_REPORT_TOTAL'			=> 'รวม<strong>1</strong> รายงานข้อความส่วนตัว.',
	'PM_REPORTS_CLOSED_SUCCESS'	=> 'รายงาน PM ที่เลือกถูกปิดเรียบร้อยแล้ว.',	
	'PM_REPORTS_DELETED_SUCCESS'=> 'รายงาน PM ที่เลือกลบเรียบร้อยแล้ว.',	
	'PM_REPORTS_TOTAL'			=> 'รวมมี <strong>%d</strong> รายงานข้อความส่วนตัว.',
	'PM_REPORTS_ZERO_TOTAL'		=> 'ไม่มีรายงานข้อความส่วนตัว.',
	'PM_REPORT_DETAILS'			=> 'รายละเีอียดรายงาข้อความส่วนตัว',

	'POSTER'					=> 'ผู้โพสต์',
	'POSTS_APPROVED_SUCCESS'	=> 'ข้อความที่เลือก ถูกอนุมัติแล้ว.',
	'POSTS_DELETED_SUCCESS'		=> 'ข้อความที่เลือกลบออกจากฐานข้อมูลแล้ว',
	'POSTS_DISAPPROVED_SUCCESS'	=> 'ข้อความที่เลือก ไม่ได้รับการอนุมัติ',
	'POSTS_LOCKED_SUCCESS'		=> 'ข้อความที่เลือก ล๊อกเรียบร้อยแล้ว',
	'POSTS_MERGED_SUCCESS'		=> 'ข้อความที่เลือก รวมกันเรียบร้อยแล้ว',
	'POSTS_UNLOCKED_SUCCESS'	=> 'ข้อความที่เลือก ปลดล๊อกเรียบร้อยแล้ว',
	'POSTS_PER_PAGE'			=> 'จำนวนข้อความทั้งหมด ต่อ หนึ่งหน้า',
	'POSTS_PER_PAGE_EXPLAIN'	=> '(กำหนดเป็น 0 สำหรับดูทุกโพสต์)',
	'POST_APPROVED_SUCCESS'		=> 'ข้อความที่เลือกถูกอนุมัติ',
	'POST_DELETED_SUCCESS'		=> 'ข้อความที่เลือกถูกลบออกจากฐานข้อมูลเรียบร้อยแล้ว',
	'POST_DISAPPROVED_SUCCESS'	=> 'ข้อความที่เลือกถูกไม่ได้รับการอนุมัติ',
	'POST_LOCKED_SUCCESS'		=> 'ข้อความถูกล๊อกเรียบร้อยแล้ว',
	'POST_NOT_EXIST'			=> 'ไม่พบข้อความที่คุณต้องการ',
	'POST_REPORTED_SUCCESS'		=> 'ข้อความที่คุณต้องการถูกรายงานเแล้ว.',
	'POST_UNLOCKED_SUCCESS'		=> 'ปลดล๊อกข้อความสำเร็จ',

	'READ_USERNOTES'			=> 'สมาชิกบันทึก',
	'READ_WARNINGS'				=> 'สมาชิกควรระวัง',
	'REPORTER'					=> 'ผู้รายงาน',
	'REPORTED'					=> 'ถูกรายงาน',
	'REPORTED_BY'				=> 'ถูกรายงานโดย',
	'REPORTED_ON_DATE'			=> 'on',
	'REPORTS_CLOSED_SUCCESS'	=> 'รายงานที่ถูกเลือกได้ปิดเรียบร้อยแล้ว',
	'REPORTS_DELETED_SUCCESS'	=> 'รายงานที่ถูกเลือกได้ลบเรียบร้อยแล้ว',
	'REPORTS_TOTAL'				=> 'จากทั้งหมด <strong>%d</strong> รายงาน ที่ถูกตรวจสอบ',
	'REPORTS_ZERO_TOTAL'		=> 'ไม่มีรายงานใดถูกอ่าน.',
	'REPORT_CLOSED'				=> 'รายงานฉบับนี้ถูกปิดแล้ว',
	'REPORT_CLOSED_SUCCESS'		=> 'รายงานที่ถูกเลือกได้ปิดเรียบร้อยแล้ว',
	'REPORT_DELETED_SUCCESS'	=> 'รายงานที่ถูกเลือกได้ลบเรียบร้อยแล้ว',
	'REPORT_DETAILS'			=> 'รายละเอียดรายงาน',
	'REPORT_MESSAGE'			=> 'รายงานในข้อความ',

	'REPORT_MESSAGE_EXPLAIN'	=> 'ใช้ฟอร์มรายงานข้อความส่วนตัวที่เรื่อง. รายงานควรรายงานเมื่อไม่เป็นไปตามกฏของบอร์ด. <strong>รายงานข้อความส่วนตัว ผู้ดูแลทั้งหมดจะได้ทราบ.</strong>',

	'REPORT_NOTIFY'				=> 'แจ้งฉัน',
	'REPORT_NOTIFY_EXPLAIN'		=> 'แจ้งคุณ เมื่อรายงานของได้ตอบรับ.',
	'REPORT_POST_EXPLAIN'		=> 'ใช้ฟอร์มนี้เพื่อรายงานโพสที่เลือกไปยัง moderators และ admin. การรายงานควรจะใช้เมื่อโพสทำผิดกฎเท่านั้น.',
	'REPORT_REASON'				=> 'รายงานเหตุผล',
	'REPORT_TIME'				=> 'เวลารายงาน',
	'REPORT_TOTAL'				=> 'จากทั้งหมด <strong> 1 </strong> รายงาน ที่ถูกตรวจสอบ',
	'RESYNC'					=> 'Resync',
	'RETURN_MESSAGE'			=> '%sย้อนกลับไปยังข้อความเดิม%s',
	'RETURN_NEW_FORUM'			=> '%sย้อนกลับไปยัง Forum ใหม่%s',
	'RETURN_NEW_TOPIC'			=> '%sย้อนกลับไปยังกระทู้ใหม่%s',

	'RETURN_PM'					=> '%s กลับไปยังข้อความส่วนตัว %s',
	
	'RETURN_POST'				=> '%sย้อนกลับไปยังข้อความ%s',
	'RETURN_QUEUE'				=> '%sย้อนกลับไปยังลำดับ%s',
	'RETURN_REPORTS'			=> '%sย้อนกลับไปยังรายงาน%s',
	'RETURN_TOPIC_SIMPLE'		=> '%sย้อนกลับไปยังกระทู้%s',

	'SEARCH_POSTS_BY_USER'				=> 'ค้นหาโดย',
	'SELECT_ACTION'						=> 'เลือกรายการที่ต้องการ',
	'SELECT_FORUM_GLOBAL_ANNOUNCEMENT'	=> 'เลือกบอร์ด สำหรับให้บุคคลทั่วไปดู.',
	'SELECT_FORUM_GLOBAL_ANNOUNCEMENTS'	=> 'หนึ่งหรือมากกว่ากระทู้ที่เลือกเป็น global announcements. โปรดเลือกฟอรั่มที่คุณต้องการจะให้มันแสดง.',
	'SELECT_MERGE'						=> 'เลือกเพื่อรวม',
	'SELECT_TOPICS_FROM'				=> 'เลือกกระทู้จาก',
	'SELECT_TOPIC'						=> 'เลือกกระทู้',
	'SELECT_USER'						=> 'เลือกสมาชิก',
	'SORT_ACTION'						=> 'ประวัติการกระทำ',
	'SORT_DATE'							=> 'วันที่',
	'SORT_IP'							=> 'IP',
	'SORT_WARNINGS'						=> 'การเตือน',
	'SPLIT_AFTER'						=> 'แยกจากการโพสต์ที่เลือก',
	'SPLIT_FORUM'						=> 'บอร์ดสำหรับกระทู้ใหม่',
	'SPLIT_POSTS'						=> 'แยกจากการโพสต์ที่เลือก',
	'SPLIT_SUBJECT'						=> 'หัวข้อกระทู้ใหม่',
	'SPLIT_TOPIC_ALL'					=> 'แยกหัวข้อจากโพสต์นี้ ',
	'SPLIT_TOPIC_ALL_CONFIRM'			=> 'คุณแน่ใจหรือ ที่จะแยกกระทู้ออกจากกัน?',
	'SPLIT_TOPIC_BEYOND'				=> 'แยกหัวข้อที่เลือก',
	'SPLIT_TOPIC_BEYOND_CONFIRM'		=> 'แน่ใจหรือว่าต้องการแยกหัวข้อ?',
	'SPLIT_TOPIC_EXPLAIN'				=> 'ใช้แบบฟอร์มด้านล่างนี้ช่วยแบ่งหัวข้อโดยการเลือกโพสต์ที่ต้องการแบ่ง	',
	'THIS_PM_IP'				=> 'ไอพี่สำหรับข้อความส่วนตัว',
	'THIS_POST_IP'				=> 'ไอพีสำหรับกระทู้นี้',
	'TOPICS_APPROVED_SUCCESS'	=> 'กระทู้ที่เลือก ถูกอนุมัติแล้ว',
	'TOPICS_DELETED_SUCCESS'	=> 'กระทู้ที่เลือก ลบออกจากฐานข้อมูลเรียบร้อยแล้ว.',
	'TOPICS_DISAPPROVED_SUCCESS'=> 'กระทู้ที่เลือก ไม่ได้รับการอนุมัติ',
	'TOPICS_FORKED_SUCCESS'		=> 'กระทู้ที่เลือก คัดลอกเรียบร้อยแล้ว',
	'TOPICS_LOCKED_SUCCESS'		=> 'กระทู้ที่เลือก ล๊อกเรียบร้อยแล้ว',
	'TOPICS_MOVED_SUCCESS'		=> 'กระทู้ที่เลือก ย้ายเรียบร้อยแล้ว.',
	'TOPICS_RESYNC_SUCCESS'		=> 'หัวข้อที่นับจำนวนใหม่แล้ว',
	'TOPICS_TYPE_CHANGED'		=> 'ชนิดของกระทู้ถูกเปลี่ยนเรียบร้อยแล้ว',
	'TOPICS_UNLOCKED_SUCCESS'	=> 'กระทู้ที่เลือก ถุกปลดล๊อกเรียบร้อยแล้ว',
	'TOPIC_APPROVED_SUCCESS'	=> 'กระทู้ที่เลือก ถูกอนุมัติแล้ว',
	'TOPIC_DELETED_SUCCESS'		=> 'กระทู้ที่เลือก ถูกย้ายออกจากฐานข้อมูลเรียบร้อยแล้ว.',
	'TOPIC_DISAPPROVED_SUCCESS'	=> 'กระทู้ที่เลือก ไม่ได้รับการอนุมัติ',
	'TOPIC_FORKED_SUCCESS'		=> 'กระทู้ที่เลือก คัดลอกเรียบร้อยแล้ว',
	'TOPIC_LOCKED_SUCCESS'		=> 'กระทู้ที่เลือก ล๊อกเรียบร้อยแล้ว',
	'TOPIC_MOVED_SUCCESS'		=> 'กระทู้ที่เลือก ย้ายเรียบร้อยแล้ว.',
	'TOPIC_NOT_EXIST'			=> 'ไม่พบกระทู้ที่เลือก ',
	'TOPIC_RESYNC_SUCCESS'		=> 'กระทู้ที่เลือกปรับให้ตรงกันแล้ว.',
	'TOPIC_SPLIT_SUCCESS'		=> 'แยกกระทู้เรียบร้อยแล้ว.',
	'TOPIC_TIME'				=> 'เวลากระทู้',
	'TOPIC_TYPE_CHANGED'		=> 'ชนิดของกระทู้ถูกเปลี่ยนเรียบร้อยแล้ว',
	'TOPIC_UNLOCKED_SUCCESS'	=> 'กระทู้ที่เลือก ถุกปลดล๊อกเรียบร้อยแล้ว.',
	'TOTAL_WARNINGS'			=> 'คำเตือนทั้งหมด',

	'UNAPPROVED_POSTS_TOTAL'		=> 'ทั้งหมด <strong>%d</strong> ข้อความที่รอการอนุมัติ',
	'UNAPPROVED_POSTS_ZERO_TOTAL'	=> 'ไม่มีข้อความที่รอการอนุมัติ',
	'UNAPPROVED_POST_TOTAL'			=> 'ทั้งหมด <strong> 1 </strong> ข้อความที่รอการอนุมัติ',
	'UNLOCK'						=> 'ปลดล๊อก',
	'UNLOCK_POST'					=> 'ข้อความถูกปลดล๊อก',
	'UNLOCK_POST_EXPLAIN'			=> 'อนุญาตให้แก้ไข',
	'UNLOCK_POST_POST'				=> 'ข้อความถูกปลดล๊อก',
	'UNLOCK_POST_POST_CONFIRM'		=> 'ต้องการแก้ไข ?',
	'UNLOCK_POST_POSTS'				=> 'ยกเลิกการล็อคกระทู้ที่เลือก',
	'UNLOCK_POST_POSTS_CONFIRM'		=> 'คุณแน่ใจหรือที่จะอนุญาตการแก้ไขโพสที่เลือก?',
	'UNLOCK_TOPIC'					=> 'ปลดล๊อกกระทู้',
	'UNLOCK_TOPIC_CONFIRM'			=> 'คุณแน่ใจหรือที่จะปลดล๊อกกระทู้นี้?',
	'UNLOCK_TOPICS'					=> 'ปลดล๊อกกระทู้ที่ถูกเลือก',
	'UNLOCK_TOPICS_CONFIRM'			=> 'คุณแน่ใจหรือที่จะปลดล๊อกกระทู้ทั้งหมดที่เลือก ?',
	'USER_CANNOT_POST'				=> 'คุณไม่สามารถโพสต์ข้อความได้',
	'USER_CANNOT_REPORT'			=> 'คุณไม่สามารถรายงานข้อความในกระทู้นี้ได้',
	'USER_FEEDBACK_ADDED'			=> 'ความคิดเห็นของผู้ใช้ถูกเพิ่มเรียบร้อยแล้ว.',
	'USER_WARNING_ADDED'			=> 'ผู้ใช้ถูกเตือนเรียบร้อยแล้ว',

	'VIEW_DETAILS'			=> 'แสดงรายละเอียด',

	'VIEW_PM'				=> 'แสดงข้อความส่วนตัว',

	'WARNED_USERS'			=> 'ผู้ใช้ที่ถูกเตือน',
	'WARNED_USERS_EXPLAIN'	=> 'นี้คือรายการของผู้ใช้ที่มีคำเตือนที่ยังไม่หมดอายุอยู่กับเขา.',
	'WARNING_PM_BODY'		=> 'นี้คือคำเตือนที่ถูกออกให้คุณโดย administrator หรือ moderator ของเว็บนี้.[quote]%s[/quote]',
	'WARNING_PM_SUBJECT'	=> 'ข้อความเตือนจะเว็บบอร์ด',
	'WARNING_POST_DEFAULT'	=> 'ข้อความที่แสดงด้านล่างนี้ถูกส่งมาจาก : %s ของเว็บบอร์ด กรุณาให้ความใส่ใจข้อความด้านล่างนี้ด้วย.. .',
	'WARNINGS_ZERO_TOTAL'	=> 'ไม่มีการเตือน',

	'YOU_SELECTED_TOPIC'	=> 'จำนวนกระทู้ที่เลือก  %d: %s.',
	'VIEW_POST'=>'ดูโพสต์',
	'report_reasons'		=> array(
		'TITLE'	=> array(
			'WAREZ'		=> 'ผิดกฏหมาย',
			'SPAM'		=> 'สแปม',
			'OFF_TOPIC'	=> 'ปิดกระทู้',
			'OTHER'		=> 'อื่นๆ',
		),
		'DESCRIPTION' => array(
			'WAREZ'		=> 'ข้อความมี ลิงค์ ไปยังซอฟต์แวร์ที่ผิดกฎหมายหรือละเมิดลิขสิทธิ์.',
			'SPAM'		=> 'ข้อความมี วัตถุประสงค์เพียงเพื่อโฆษณาเว็บไซต์ หรือ ผลิตภัณฑ์ อื่นๆ.',
			'OFF_TOPIC'	=> 'ข้อความ จะขอปิดกระทู้.',
			'OTHER'		=> 'ข้อความ ไม่ตรงหมวดหมู่เพื่อให้ย้ายให้ถูกหมวด.',
		)
	),	
));

?>