<?php
// logout from this site. destroy all session.
session_start();
session_destroy();
$_SESSION = array();
session_regenerate_id(true);
header('Location:../index.php');
?>