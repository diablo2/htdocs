<?php
include ('../../../setting/connect.php');
include ('activity.class.php');

$id = $_GET['id'];
$title = $_GET['topic'];
$place = $_GET['place'];

if (!empty($_GET['startTime'])){
	$startDate = $_GET['startDate'].' '.$_GET['startTime'];
} else {
	$startDate = $_GET['startDate'].' 00:00:00';
}
if (!empty($_GET['endTime'])){
	$endDate = $_GET['endDate'].' '.$_GET['endTime'];
} else {
	$endDate = $_GET['endDate'].' 00:00:00';
}
$description = $_GET['required'];
$department = $_GET['department'];

activity::editActivity($id,$title,$place,$startDate,$endDate,$description,$department);
header('Location: ../index.php');

?>