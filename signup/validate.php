<!DOCTYPE html>
<?php include ('../setting/connect.php'); ?>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Signup Alumni Sci-KMUTT</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="../stylesheets/foundation.min.css">
  <link rel="stylesheet" href="../stylesheets/app.css">
  <link rel="stylesheet" href="../stylesheets/design.css">
  <script src="../javascripts/modernizr.foundation.js"></script>
    
  </script>
</head>
<body>
  <div class="row">
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
                  $password = $_POST["password"];

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
            $result_email = mysql_query($query_email,$con);
            if (!$result_email) { // if the Query Failed
              echo 'Database Error Occured';
            }

            if (mysql_num_rows($result_email) == 0) { // if no previous user is using this email

             // Create a unique activition code :
              $activation = md5(uniqid(rand(),true));

              $query_insert_user = "INSERT INTO `account` (`username`, `password`, `email`, `accountStatus`, `createDate`, `activation`) VALUES ('$username','$password','$email', '0', NOW(),'$activation')";

              $result_insert_user = mysql_query($query_insert_user,$con);

              if (!$result_insert_user){
                echo "Query insert user fail";
              }
              if (mysql_affected_rows($con) == 1 ){ // if the insert Query was successfull

              // Sent e-mail
                $message = "To activate your account, please click on this link \n\n";

                $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($email) . "key=$activation";
                mail($email,'Registration Confirmation', $message, 'From: '.EMAIL);

                // Finish
                echo   '<div class="row">
                          <div class="alert-box success ten columns centered" >
                            Thank you for registering! A confirmation email has been sent to ' . $email . ' Please click on the Activation Link to Activate your account
                          </div>
                        </div>';
              } else { // if connot insert Query 
                echo '<div class="row">
                        <div class="ten columns centered alert-box alert">
                          You could not be registered due to a system error. We apologize for any inconvenience.
                        </div>
                      </div>';
              }

            } else { // The email address is not available
                echo '<div class="row">
                        <div class="ten columns centered alert-box alert">
                          That E-mail address has already been registered.
                        </div>
                      </div>';
            }

          } else { // if the "error" array contains error msg , display them
              echo '<div class="row">
                      <div class="ten columns centered alert-box alert">
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

</body>
</html>