<?php
    $dbHost = 'localhost'; // usually localhost
    $dbUsername = 'root';
    $dbPassword = '';
    $dbDatabase = 'aims';

	//This is the address that will appear coming from ( Sender )
	define('EMAIL', 'email@gmail.com');
	define('WEBSITE_URL','http://localhost');

    $con = mysql_connect($dbHost, $dbUsername, $dbPassword) or die ("Unable to connect to Database Server.");
    mysql_select_db ($dbDatabase, $con) or die ("Could not select database.");

?>