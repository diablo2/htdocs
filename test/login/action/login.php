<?php
	session_start();
	include ('../../setting/connect.php');

	//prepare variable
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	//query the data form database
	$sql = "SELECT * FROM account ac WHERE ac.username='$username' AND ac.password = '$password' ";
	$result = mysql_query($sql) or die (mysql_error());
	$redirect = base64_decode($_POST['redirect']);
	if (mysql_num_rows($result) > 0){
	
		$row = mysql_fetch_array($result);

		if ($row['activation'] == '' ) {
			$_SESSION['ID'] = $row['ID'];
			$_SESSION['username'] = $row['username'];
			
			
			header('Location:'.$redirect);
		} else { // incomplete activate
			header('Location:../index.php?result='.base64_encode("activate"));

		}

		
		

	} else { // incomplete Query database 
		header('Location:../index.php?result='.base64_encode("notQuery"));
		// header('Location:../index.php');
	}


?>