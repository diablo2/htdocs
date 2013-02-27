<?php
  session_start()
  
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
      if($host['scheme'] == '')
      {
        $host['scheme'] = 'http://';  
      }
      $redirect = base64_encode($host['scheme'].$url['host'].$url['path']); // outbound link
    }
    unset($url);
  }

?>



<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Welcome to Foundation</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="../stylesheets/foundation.min.css">
  <link rel="stylesheet" href="../stylesheets/app.css">
  <link rel="stylesheet" href="../stylesheets/design.css">
  <script src="../javascripts/modernizr.foundation.js"></script>
</head>
<body>
  <div class="content">

    <!-- Detail Login -->
    <div class="row">
      <div class="six columns">
        <div class="eight columns centered">
          <div class="detail_login">
           เว็บไซต์นี้มีไว้เพื่อให้ศิษย์เก่าคณะวิทยาศาสตร์เข้ามาแชร์ประสบการณ์ต่างๆ ให้แก่กัน ถ้าพร้อมแล้วก็ไปเข้าร่วมสังสรรค์กันได้เลย 
          </div>
        </div>
      </div>

      <!-- Form Login -->
      <div class="six columns">
        <div class="form_login">
            <form method="post" action="action/login.php"> 
              <div class="row">
                <div class="four columns offset-by-one">
                  <h3>Login</h3>
                </div>
              </div>
              <div class="row">
                <div class="three columns">
                  <label class="right inline"> Username : </label>
                </div>
                <div class="nine columns">
                  <input name="username" type="text" placeholder="Username" class="ten"/>
                </div>
              </div>
                  
              <div class="row">
                <div class="three columns">
                  <label class="right inline">Password : </label>
                </div>
                <div class="nine columns">
                  <input name="password" type="password" placeholder="Password" class="ten">
                </div>
              </div>
              <div class="row">
                <div class="four columns centered">
                  <input type="submit" class="small secondary button" value="Login">
                  <input type="reset" class="small secondary button" value="Cancel">
                </div>
              </div>
            </form>
            <div class="row">
              <div class="six columns offset-by-two">
                Can't access your account
                <br>
                Create an account
              </div>

            </div>
        </div>

      </div>

    </div>

  </div>

</body>
</html>