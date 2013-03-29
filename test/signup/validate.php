<!DOCTYPE html>
<?php 
  include('../setting/connect.php');

?>
<html lang="th"><head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
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
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script></head>

  <body class="container">
  <div class="row-fluid">
    <div class="twelve columns">
      <?php
        if (isset($_POST["formsubmit"])) {
          $error = array(); // array to store error mssage
          if (empty($_POST["frist_name"]) || empty($_POST["last_name"])) {
            $error[] = "Please Enter your name";
          } else {
            $frist_name = $_POST["frist_name"];
            $last_name = $_POST["last_name"];
          }

          if (empty($_POST['username'])) {
            $error[] = 'Please Enter Username';
          } else {
              if (preg_match("/^[a-z\d_]{5,20}$/i", $_POST['username'])) {
                $username = $_POST["username"];
              } else {
                $error[] = 'Your Username is invalid '.$_POST['username'] ."  ". $check ;
              }
          }

          if (empty($_POST["password"])){
            $error[] = "Please Enter password";
          } else {
              if ($_POST["password"] == $_POST["cpassword"]) {
                  $password = md5($_POST["password"]);

              } else {
                $error[] = "Password and Check-Password is not match";
              }
          }

          if (empty($_POST["email"])){
            $error[] = "Please Enter Your E-mail";
          } else {
            
            if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])) {
                $email = $_POST["email"];
              } else {
                $error[] = 'Your E-mail is invalid';
              }
          }

          if (empty($error)) { // Data is OK <database not error>
            // check email have not in database 
            $query_email = "SELECT * FROM account WHERE email LIKE '$email'";
            $result_email = mysql_query($query_email) or die(mysql_error());
            if (!$result_email) { // if the Query Failed
              echo 'Database Error Occured';
            }

            if (mysql_num_rows($result_email) == 0) { // if no previous user is using this email

             // Create a unique activition code :
              $activation = md5(uniqid(rand(),true));

              $query_insert_user = "INSERT INTO `account` (`username`, `password`, `email`, `accountStatus`, `createDate`, `activation`) VALUES ('$username','$password','$email', '0', NOW(),'$activation')";

              $result_insert_user = mysql_query($query_insert_user);

              if (!$result_insert_user){
                echo "Query insert user fail";
              }
              if (mysql_affected_rows($con) == 1 ){ // if the insert Query was successfull

              // Sent e-mail
                $message = "To activate your account, please click on this link \n\n";

                $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($email) . "key=$activation";
                mail($email,'Registration Confirmation', $message, 'From: '.EMAIL);

                // Finish
                echo   '<div class="row-fluid">
                          <div class="alert alert-success ten columns centered" > 
                            Thank you for registering! A confirmation email has been sent to ' . $email . ' Please click on the Activation Link to Activate your account
                          </div>
                        </div>';
              } else { // if connot insert Query 
                echo '<div class="row-fluid">
                        <div class="ten columns centered alert alert-error">
                          You could not be registered due to a system error. We apologize for any inconvenience.
                        </div>
                      </div>';
              }

            } else { // The email address is not available
                echo '<div class="row-fluid">
                        <div class="ten columns centered alert alert-error">
                          That E-mail address has already been registered.
                        </div>
                      </div>';
            }

          } else { // if the "error" array contains error msg , display them
              echo '<div class="row-fluid">
                      <div class="ten columns centered alert alert-error">
                        <ol>';
                  foreach ($error as $key => $value) { // for list error
                      echo '<li>'. $value .'</li>';
                  }
              echo '</ol>
                    </div>
                    </div>';
                        

          }
          mysql_close($con); // close the database connect
        } 
      ?>

    </div>

  </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="js/jquery.js"></script> -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../js/bootstrap-transition.js"></script>
    <script src="../js/bootstrap-alert.js"></script>
    <script src="../js/bootstrap-modal.js"></script>
    <script src="../js/bootstrap-dropdown.js"></script>
    <script src="../js/bootstrap-scrollspy.js"></script>
    <script src="../js/bootstrap-tab.js"></script>
    <script src="../js/bootstrap-tooltip.js"></script>
    <script src="../js/bootstrap-popover.js"></script>
    <script src="../js/bootstrap-button.js"></script>
    <script src="../js/bootstrap-collapse.js"></script>
    <script src="../js/bootstrap-carousel.js"></script>
    <script src="../js/bootstrap-typeahead.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.js"></script>

</body></html>