<?php

if(isSet($_POST['password']))
  {
  $password = $_POST['password'];

 if (!preg_match('/^[a-z0-9.-_]+$/', $password)) 
    {
      echo '<font color="red">Your password can only contain alphanumerics and period, dash and underscore (.-_)</font>';
    }
      else 
    {
    echo 'OK';
  }

}

?>