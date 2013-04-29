<?php
include ('../../../setting/connect.php');
include('public_relation.class.php');

$id = $_GET['ref'];
$row = pr::getEdit($id);
$encode = json_encode($row);
echo json_encode($row);
?>