<?php 
@session_start();
include ('../setting/connect.php');
include ('../class/notification.php');

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

?>
  	   <div class="navbar navbar-fixed-top">
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
                  <li <?=$home ?>> <a href="../home">Home</a></li>
                  <li ><a href="#about">About</a></li>
                  <li <?=$contact?>><a href="../contact">Contact</a></li>
                </ul>
                <ul class="nav pull-right">

                  <li><a href="#">Link</a>

                  </li>
                  <li class="noti" id="notification">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" onclick="myclick()" >Notify<span id="badge" class="badge badge-warning"><?=noti::count(1);?></span></a>
                    <ul id="dropdown-menu" class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                      <div>
                        <li style="border-top: 0px">Notification</li>
                        <?php
                        $result = noti::show('1');
                        $x = 0;
                        while ($row = mysql_fetch_array($result)) { ?>
                          <li class="row-fluid">
                            <a href="<?=$row['link']?>">
                              <div class="span1">
                                <i class="<?=icon::show($row['type']) ?> "></i>
                              </div>
                              <div class="span11">
                                <?=$row['message']?><br>
                                <label style="font-size: 12px"><?=date_format(date_create($row['createDate']),'l jS F Y')?></label>
                              </div>
                            </a>
                          </li>

                    <?php
                      $x++;
                      if ($x == 5) break;
                        }
                        ?>
                        <li>
                          <a href=""><center>See all</center></a>
                        </li>
                    </div>
                    </ul>
                  </li>
                  <li class="divider-vertical"></li>
                  <li class="dropdown">

   <?php     if (!isset($_SESSION['user_id'])){ ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign In <b class="caret"></b></a>	
            		<ul class="dropdown-menu" style="padding: 15px">
                      <form method="post" action="../login/action/login.php" style="margin-bottom : 0px">
                        <input name="username" type="text" placeholder="Username">
                        <input name="password" type="text" placeholder="Password">
                        <input name="redirect" type="hidden" value="'.$redirect.'">
                        <button class="btn btn-primary" style="clear: left; width: 100%">Sing In</button>
                      </form>
                    </ul>
          <?php  } else {      ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <b class="caret"></b></a>
            		<ul class="dropdown-menu">
                      <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="../login/action/logout.php"><i class="icon-off"></i> Logout</a></li>
                    </ul>
             <?php   } ?>

                  </li>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </div>
        </div>
    <link href="../css/perfect-scrollbar.css" rel="stylesheet">
    <script src="../js/jquery.mousewheel.js"></script>
    <script src="../js/perfect-scrollbar.js"></script>
    <script>

      jQuery(document).ready(function ($) {
        "use strict";
        $('#dropdown-menu').perfectScrollbar();
        // $('#FastWheelSpeed').perfectScrollbar({wheelSpeed:100});
        // $('#SlowWheelSpeed').perfectScrollbar({wheelSpeed:1});
      });
      $('#notification a').click(function(){
        $('#badge').removeClass().addClass('badge');
        $('#badge').text('0');
        $.ajax({
          url: '../component/action/updatenotification.php',
          data: 'userID=1',
        })
        });
      $(function(){
        if ($('#badge').text() == 0 ){
          $('#badge').removeClass().addClass('badge');
        }
      });
      // function count(){
        
      //   $.ajax({
          
      //     url: '../component/action/countnotification.php',
      //     data: 'userID=1',
      //   }).done(function(result){

          
      //     $('#badge').append();

      //   })
      // };
      // setInterval(count, 1000);

    </script>
