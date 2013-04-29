<?php
include ('../setting/connect.php');
class noti
{
	
	public static function add($personnelID,$type,$recID,$message,$link)
	{
		$sql = "INSERT INTO notification(personnelID,type,recID,message,link,createDate) VALUES('$personnelID','$type','$recID','$message','$link',NOW())";
		mysql_query($sql);
	}
	
	public static function show($recID)
	{
		$sql = "SELECT type, recID, message, link, createDate 
		FROM notification WHERE recID = '$recID' ORDER BY createDate DESC";
		$result = mysql_query($sql) or die(mysql_error());
		return $result;
	}
	
	public static function del($personnelID,$type,$recID)
	{
		$sql = "DELETE FROM notification WHERE personnelID = '$personnelID' AND type = '$type' AND recID = '$recID'";
		mysql_query($sql);
	}

	public static function count($userID) {
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

		return $row['COUNT(*)'];
	}

	public static function updateLasttimeRead($userID){
		$sql = "UPDATE notificationread 
				SET `notificationread`.`lasttime_read` = now()
				WHERE userID = '$userID'";
		mysql_query($sql);
	}
	
}

class icon
{
	public static function show($type){
		switch ($type) {
			case '1':
				return "icon-calendar";
				break;
			
			default:
				return "icon-info-sign";
				break;
		}
	}
}


?>