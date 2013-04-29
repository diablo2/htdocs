<?php
	include ('../../../setting/connect.php');
	include ('activity.class.php');

	$id = $_GET['ref'];
	activity::delete($id);


?>