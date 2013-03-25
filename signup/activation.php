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
	<?php
		if (isset($_GET['email']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_GET['email']))
		{
			$email = $_GET['email'];
		}
		if (isset($_GET['key']) && (strlen($_GET['key']) == 32))
		{
			$key = $_GET['key'];
		}

		if(isset($email) && isset($key)){
			// Update database to set the "activation" field to null
			$query_activation = "UPDATE account SET activation= NULL WHERE (email like '$email' AND activation LIKE '$key') LIMIT 1 ";
			$result_activation = mysql_query($query_activation,$con);
			if (mysql_affected_rows($con) == 1) { // Update datebase was successfull
				echo '<div> Your account is now activity. You may now ####Login#### </div>';
			} else {
				echo '<div> Your account could not be activity. Please recheck the link or contack the system administrator.</div>';
			}
			mysql_close($con);
		} else {
			echo '<div> Error Occured </div>';
		}
	?>

</body>
</html>
