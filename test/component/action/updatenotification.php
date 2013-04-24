<?php
	include ('../../setting/connect.php');
	$userID = $_GET['userID'];
	$sql = "UPDATE notificationread 
			SET `notificationread`.`lasttime_read` = now()
			WHERE userID = '$userID'";
	mysql_query($sql);
?>