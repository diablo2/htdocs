<?php
	include ('../../../setting/connect.php');

	$id = $_GET['ref'];

		$sql = "DELETE FROM public_relation
				WHERE id = '$id'";
		mysql_query($sql) or die(mysql_error());


?>