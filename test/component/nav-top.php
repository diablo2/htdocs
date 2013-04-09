<?php 
session_start();
include ('../setting/connect.php');

// function nav active action
$current_url = basename($_SERVER['REQUEST_URI'], ".php");
$home = '';
$contact = '';
$about = '';
if ($current_url == "home"){
    $home = 'class="active"';
  } elseif ($current_url == "contact"){
    $contact = 'class="active"';
  }
// get redirect url
$url = $_SERVER['REQUEST_URI'];
$redirect = base64_encode("http://".$dbHost.$url);

  	echo '<div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container-fluid">
              <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="brand" href="#">Alumni Science @KMUTT</a>
              <div class="menu nav-collapse collapse">
                <ul class="nav">
                  <li '.$home.'> <a href="../home">Home</a></li>
                  <li ><a href="#about">About</a></li>
                  <li '.$contact.'><a href="../contact">Contact</a></li>
                </ul>
                <ul class="nav pull-right">
                  <li><a href="#">Link</a></li>



                <li class="divider-vertical"></li>
                <li class="dropdown">';

        if (!isset($_SESSION['user_id'])){
            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign In <b class="caret"></b></a>	
            		<ul class="dropdown-menu" style="padding: 15px">
                      <form method="post" action="../login/action/login.php" style="margin-bottom : 0px">
                        <input name="username" type="text" placeholder="Username">
                        <input name="password" type="text" placeholder="Password">
                        <input name="redirect" type="hidden" value="'.$redirect.'">
                        <button class="btn btn-primary" style="clear: left; width: 100%">Sing In</button>
                      </form>
                    </ul>';                  
            } else {      
            echo    '<a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <b class="caret"></b></a>
            		<ul class="dropdown-menu">
                      <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="../login/action/logout.php"><i class="icon-off"></i> Logout</a></li>
                    </ul>';
                }

            echo  '</li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </div>
        </div>';

?>
