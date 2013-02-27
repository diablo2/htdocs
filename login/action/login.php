<?php
	session_start();
	include('../setting/connect.php');

	//prepare variable
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	//query the data form database
	$sql = "SELECT ac.ID, ac.username FROM account ac WHERE ac.username='$username' AND ac.password = '$password' ";
	$result = mysql_query($sql) or die (mysql_error());


?>