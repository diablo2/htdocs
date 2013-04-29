<?php
class activity {

	public static function showDepartment(){
		$sql = "SELECT de.id , de.nameEn
				FROM department as de
				WHERE 1";
		$result = mysql_query($sql);
		return $result;
	}

	public static function addActivity($title,$place,$startDate,$endDate,$description,$department,$createBy){
		$sql = "INSERT INTO activity (title, place, startDate, endDate, description, department, createBy, createDate, modifyDate)
				VALUES ('$title', '$place', '$startDate', '$endDate', '$description', '$department', '$createBy',now(), now() )";
		mysql_query($sql);
	}

	public static function editActivity($id,$title,$place,$startDate,$endDate,$description,$department){
		$sql = "UPDATE activity SET title = '$title', place = '$place', startDate = '$startDate', endDate = '$endDate', description = '$description', department = '$department', modifyDate = 'NOW()'
				WHERE id = '$id'";
		mysql_query($sql);
	}

	public static function getActivity(){
		$sql = "SELECT a.*, acc.username, de.nameEn as department
				FROM activity AS a
				LEFT JOIN account AS acc ON acc.id = a.createBy
				LEFT JOIN department AS de ON de.id = a.department
				WHERE 1";
		$result = mysql_query($sql);
		return $result;
	}

	public static function getActivityOne($id){
		$sql = "SELECT a.*, acc.username, de.nameEn as department
				FROM activity AS a
				LEFT JOIN account AS acc ON acc.id = a.createBy
				LEFT JOIN department AS de ON de.id = a.department
				WHERE a.id = '$id'";
		$result = mysql_query($sql);
		return $result;
	}

	public static function delete($activityID){
		$sql = "DELETE FROM activity
				WHERE id = '$activityID'";
		mysql_query($sql);
	}
}

?>