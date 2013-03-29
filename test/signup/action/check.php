<?php
// This is a sample code in case you wish to check the username from a mysql db table

if(isSet($_POST['username']))
  {
  $username = $_POST['username'];

    $dbHost = 'localhost'; // usually localhost
    $dbUsername = 'root';
    $dbPassword = '';
    $dbDatabase = 'aims';

    $db = mysql_connect($dbHost, $dbUsername, $dbPassword) or die ("Unable to connect to Database Server.");
    mysql_select_db ($dbDatabase, $db) or die ("Could not select database.");

  $sql_check = mysql_query("select id from account where username='".$username."'") or die(mysql_error());

  if(mysql_num_rows($sql_check))
    {
      echo '<font color="red">The nickname <STRONG>'.$username.'</STRONG> is already in use.</font>';
    } 
      else if (!preg_match('/^[a-z0-9.-_]+$/', $username)) 
    {
      echo '<font color="red">Your username can only contain alphanumerics and period, dash and underscore (.-_)</font>';
      
    }
      else 
    {
  echo 'OK';
  }

}





/*
function check_username($username) {
  $username = trim($username); // strip any white space
  $response = array(); // our response
  
  // if the username is blank
  if (!$username) {
    $response = array(
      'ok' => false, 
      'msg' => "Please specify a username");
      
  // if the username does not match a-z or '.', '-', '_' then it's not valid
  } else if (!preg_match('/^[a-z0-9.-_]+$/', $username)) {
    $response = array(
      'ok' => false, 
      'msg' => "Your username can only contain alphanumerics and period, dash and underscore (.-_)");
      
  // this would live in an external library just to check if the username is taken
  } else if (username_taken($username)) {
    $response = array(
      'ok' => false, 
      'msg' => "The selected username is not available");
      
  // it's all good
  } else {
    $response = array(
      'ok' => true, 
      'msg' => "This username is free");
  }

  return $response;        
}
*/
?>