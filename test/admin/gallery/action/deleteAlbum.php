<?php
	include ('../../../setting/connect.php');
	include ('photo.class.php');

	$albumID = $_GET['ref'];
	$result = photo::getPhoto($albumID);
	while ($row = mysql_fetch_array($result)) {
		$id = $row['id'];
		$part = photo::getPartPhoto($id);
		unlink("../../../file/gallery/$part");
		photo::deletePhoto($id);
		echo "../../../file/gallery/$part";
	}
	$dirPath = photo::getNameAlbum($albumID);
	photo::deleteAlbum($albumID);
	
	echo "../../../file/gallery/$dirPath";
	rmdir("../../../file/gallery/$dirPath");
?>