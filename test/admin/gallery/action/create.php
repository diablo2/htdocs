<?php
include ('../../../setting/connect.php');
$name = $_GET['name'];
$description = $_GET['description'];
$status = $_GET['status'];
$userID = 1;
$sql = "SELECT * FROM albums WHERE name ='$name'";
$result = mysql_query($sql) or die(mysql_error());
$num_row = mysql_num_rows($result);
if ($num_row > 0){
	header('Location: ../create.php?ref=error');
} else {
	$sql = "INSERT INTO albums (name,description, isPublic, createBy, createDate, modifyDate)
			VALUES ('$name', '$description', '$status', '$userID', now(), now() )";
			echo $sql;
	mysql_query($sql);
	$sql = "SELECT id FROM albums WHERE name = '$name'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	header('Location: ../photo.php?ref='.$row['id']);
}

?>