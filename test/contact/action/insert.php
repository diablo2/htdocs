<?php
include ('../../setting/connect.php');

$fname = $_POST['frist_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$msg = $_POST['message'];

$sql = "INSERT INTO `contact_us`(`fname`,`lname`,`email`,`message`,`createDate`) VALUES ('$fname','$lname','$email','$msg',NOW())";
$result = mysql_query($sql) or die(mysql_error());
echo $result;
if ($result){
	header('Location:../index.php?result='.$result);
} else {
	header('Location:../index.php?result='.$result);
}
?>