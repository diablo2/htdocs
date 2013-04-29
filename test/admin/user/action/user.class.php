<?php

class user {
	public static function show(){
		$sql = "SELECT ac.id, ac.username, ac.accountStatus, 
						pr.studentID ,pr.fristname,pr.surname ,de.nameEn
				FROM account as ac 
				LEFT JOIN profile as pr 
				ON ac.id = pr.userid
                LEFT JOIN department as de
                ON pr.Department = de.id";
		$result = mysql_query($sql) or die(mysql_error());
		return $result;
	}

	public static function deleteAll($userId){
		// Delete Account
		$sql = "DELETE FROM account 
				WHERE id = '$userId'";
		mysql_query($sql);
		// Delete Profile
		$sql = "DELETE FROM profile 
				WHERE userID = '$userId'";
		mysql_query($sql);
		// Delete Work
		$sql = "DELETE FROM work 
				WHERE userID = '$userId'";
		mysql_query($sql);
		$sql = "DELETE FROM education 
				WHERE userID = '$userId'";
		mysql_query($sql);
	}
}


?>