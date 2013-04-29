<?php
	include ('../../../setting/connect.php');
	include ('photo.class.php');

	$id = $_GET['ref'];
	$part = photo::getPartPhoto($id);
	unlink("../../../file/gallery/$part");
	
	photo::deletePhoto($id);

?>