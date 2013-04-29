<?php
class pr {

	public static function show(){

		$sql = "SELECT pr.id, pr.topic, pr.createDate, pr.imgName , pr.createDate, de.nameEn as department
				FROM public_relation as pr 
				LEFT JOIN department as de ON pr.department = de.id
				ORDER BY pr.createDate DESC";
		$result = mysql_query($sql) or die(mysql_error());
		return $result;
	}

	public static function showDepartment(){
		$sql = "SELECT de.id , de.nameEn
				FROM department as de
				WHERE 1";
		$result = mysql_query($sql);
		return $result;
	}

	public static function getEdit($prID){
		$sql = "SELECT pr.*, acc.username as username FROM public_relation as pr 
				LEFT JOIN account as acc ON pr.createBy = acc.id 
				WHERE pr.id = '$prID'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		return 	 $row;
	}
}


?>