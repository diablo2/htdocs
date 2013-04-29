<?php
  session_start();
  include ('../setting/connect.php');
  // get redirect page if the last page need to redirect to it after login.
  
  
  if(isset($_GET['redirect']))
  {
    $redirect = $_GET['redirect'];
  }
  else
  {
    $url = parse_url($_SERVER['HTTP_REFERER']);
    if($url['host'] == '') // directly link to this page
    {
      $redirect = base64_encode('');  
    }
    else
    {

    /* Code by P'Home
      if($dbHost['scheme'] == "")
      {
        $dbHost['scheme'] = 'http://';  
      } */
      $redirect = base64_encode("http://".$url['host'].$url['path']); // outbound link
     
    }
    unset($url);
  }

?>



<!DOCTYPE html>
<html lang="th"><head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script></head>

  <body>
  <div class="container">

    <!-- Detail Login -->
    <div class="row-fluid">
      <div class="span6">
        <div class="span8 pagination-centered">
          <div class="detail_login">
           เว็บไซต์นี้มีไว้เพื่อให้ศิษย์เก่าคณะวิทยาศาสตร์เข้ามาแชร์ประสบการณ์ต่างๆ ให้แก่กัน ถ้าพร้อมแล้วก็ไปเข้าร่วมสังสรรค์กันได้เลย 
          </div>
        </div>
      </div>

      <!-- Form Login -->
      <div class="span6">
        <div class="form_login">
            <form class="form-inline" method="post" action="action/login.php"> 
              <div class="row-fluid">
                <div class="span4 ">
                  <h3>Login</h3>
                </div>
              </div>
              <div class="row-fluid">
                  <label class="span2"> Username : </label>
                  <input class="span4" name="username" type="text" placeholder="Username" />

              </div>
                  
              <div class="row-fluid">
                  <label class="span2">Password : </label>
                  <input class="span4" name="password" type="password" placeholder="Password">
              </div>
              <div class="row-fluid">
                <div class="span4 centered">
                  <button class="btn" type="submit">Login</button>
                  <button class="btn" type="reset">Cancel</button>
                  <input type="hidden" name="redirect" value="<?php echo $redirect;?>">
                </div>
              </div>
            </form>
            <div class="row-fluid">
              <div class="span6 offset-by-two">
                Can't access your account
                <br>
                <a href="../signup"> Create your account </a>
              </div>
            </div>
              <div class="row-fluid">
                <div class="span12 centered" id="result_login">
                  <?php 
                  if (isset($_GET['result'])){ // Login not success and return result logins
                    if (base64_decode($_GET['result']) == 'activate'){ // This account is not activate
                      echo '<div class="alert-box alert">You have not activate account !</div>';
                    }
                    if (base64_decode($_GET['result']) == 'notQuery'){ // This username or password wrong
                      echo '<div class="alert-box alert" >Username or Password is incorrect !!</div>';
                    }
                  }
                  ?>
                </div>
              </div>

            
        </div>

      </div>


    </div>

  </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="js/jquery.js"></script> -->
    <script src="../assets/js/vendor/jquery-1.9.1.min.js"></script>
    <script src="../assets/js/lib/bootstrap-transition.js"></script>
    <script src="../assets/js/lib/bootstrap-alert.js"></script>
    <script src="../assets/js/lib/bootstrap-modal.js"></script>
    <script src="../assets/js/lib/bootstrap-dropdown.js"></script>
    <script src="../assets/js/lib/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/lib/bootstrap-tab.js"></script>
    <script src="../assets/js/lib/bootstrap-tooltip.js"></script>
    <script src="../assets/js/lib/bootstrap-popover.js"></script>
    <script src="../assets/js/lib/bootstrap-button.js"></script>
    <script src="../assets/js/lib/bootstrap-collapse.js"></script>
    <script src="../assets/js/lib/bootstrap-carousel.js"></script>
    <script src="../assets/js/lib/bootstrap-typeahead.js"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.js"></script>
 

</body></html>