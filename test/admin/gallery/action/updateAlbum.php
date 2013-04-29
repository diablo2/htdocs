<?php
	include ('../../../setting/connect.php');
	include ('photo.class.php');

	$id = $_GET['ref'];
	if (isset($_GET['title'])) {
		$title = $_GET['title'];
	} else {
		$title = "";
	}
	
	if (isset($_GET['des'])) {
		$des = $_GET['des'];
	} else {
		$des = "";
	}
	echo $title;

	photo::editAlbum($id,$title,$des);
	photo::updateModify($id);

?>