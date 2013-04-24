<?php
@session_start();
include ('../../setting/connect.php');
$userID = $_GET['userID'];

		$sql = "SELECT COUNT(*) 
				FROM notification 
				WHERE `notification`.`type` IN (1) 
					AND (`notification`.`createDate` > ( 
						SELECT lasttime_read 
						FROM notificationread 
						WHERE userID = '$userID'))
					AND userID = '$userID'" ;
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$_SESSION['value'] = 'TEST';
		return $row['COUNT(*)'];
?>