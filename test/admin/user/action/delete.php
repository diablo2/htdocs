<?php
	include ('../../../setting/connect.php');

	$userId = $_GET['ref'];

		$sql = "DELETE FROM account 
				WHERE id = '$userId'";
		mysql_query($sql) or die(mysql_error());
		// Delete Profile
		$sql = "DELETE FROM profile 
				WHERE userID = '$userId'";
		mysql_query($sql) or die(mysql_error());
		// Delete Work
		$sql = "DELETE FROM work 
				WHERE userID = '$userId'";
		mysql_query($sql) or die(mysql_error());
		$sql = "DELETE FROM education 
				WHERE userID = '$userId'";
		mysql_query($sql) or die(mysql_error());

		header('Location: '. $_SERVER['HTTP_REFERER']);
?>