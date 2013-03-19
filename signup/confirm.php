<!DOCTYPE html>
<!----------------------------

  Page recheck data your regis page

  ---------------------------->
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
  <div id="content">
    <div class="row">
      <div class="six columns">

      </div>
      <div class="six columns" style="background-color:#FFFFFF">
        <form >
          <div class="row">
            <div class="three columns">
              <label class="right">Name :</label>
            </div>
            <div class="nine columns">
              <label><?php echo $_POST["frist_name"]." ".$_POST["last_name"]; ?></label>
            </div>
          </div>
          <div class="row">
            <div class="three columns">
              <label class="right"> Username :</label>
            </div>
            <div class="nine columns">
              <label><?php echo $_POST["username"]; ?></label>
            </div>
          </div>
          <div class="row">
            <div class="three columns">
              <label class="right">Birth Dat :</label>
            </div>
            <div class="nine columns">
              <label><?php echo $_POST["day"]."-".$_POST["mounth"]."-".$_POST["year"];?></label>
            </div>
          </div>
          <div class="row">
            <div class="three columns">
              <label class="right">Phone number :</label>
            </div>
            <div class="nine columns">
              <label><?php echo $_POST["phone"]; ?></label>
            </div>
          </div>
          <div class="row">
            <div class="three columns">
              <label class="right">Department :</label>
            </div>
            <div class="four columns">
              <label><?php echo $_POST["department"] ?></label>
            </div>
            <div class="two columns">
              <label class="right">Year :</label>
            </div>
            <div class="three columns">
              <label><?php echo $_POST["inyear"] ?></label>
            </div>
          </div>
          <div class="row">
            <div class="three columns">
              <label class="right">Address :</label>
            </div>
            <div class="nine columns">
              <label><?php echo $_POST["address"] ?></label>
            </div>
          </div>
          <div class="row">
            <div class="three columns">
              <label class="right">Work :</label>
            </div>
            <div class="nine columns">
              <label><?php echo $_POST["work"] ?></label>
            </div>
          </div>
          <div class="row">
            <div class="three columns">
              <label class="right">E-mail :</label>
            </div>
            <div class="nine columns">
              <label><?php echo $_POST["email"] ?></label>
            </div>
          </div>
          <div class="row">
            <div class="three columns">
              <label class="right">Facebook :</label>
            </div>
            <div class="nine columns">
              <label><?php echo $_POST["facebook"] ?></label>
            </div>
          </div>
          <div class="row">
            <div class="three columns">
              <label class="right">Twitter :</label>
            </div>
            <div class="nine columns">
              <label><?php echo $_POST["twitter"] ?></label>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


</body>
</html>