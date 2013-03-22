<!DOCTYPE html>

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
  <script type="text/javascript" src="../javascripts/jquery-1.2.6.min.js"></script>
  <script src="../javascripts/modernizr.foundation.js"></script>
  <script type="text/javascript" src="../javascripts/checkusername.js"></script>

  <script>
    function form1(){
      document.getElementById("form1").hidden = false;      
      document.getElementById("form2").hidden = true;

    }

    function form2(){
      document.getElementById("form1").hidden = true;      
      document.getElementById("form2").hidden = false;

    }
  </script>
</head>
<body>

  <div id="content">
    <div class="row">
      <div class="six columns">
      </div>
      <div class="six columns bg-gray">
        <form  method="post" action="validate.php" id="signup">
          <div class="row" id="form1">
            <div class="six columns">
               <input type="text" placeholder="frist name" name="frist_name"> 
            </div>
            <div class="six columns">
              <input type="text" placeholder="last name" name="last_name">
            </div>
            <div class="ten columns">
              <input type="text" name="username" placeholder="username"  id="username" />
            </div>
            <div class="twelve columns" id="status">
            </div>
            <div class="twelve columns">
              <input type="text" placeholder="password" name="password" id="password">
              <input type="text" placeholder="confirm password" name="cpassword" id="cpassword">
            </div>
            <div class="twelve columns" id="status_pass">
                </div>
            <div class="twelve columns" id="status_cpass">
            </div>
            <div class="four columns">
              <input type="text" placeholder="day" name="day">
            </div>
            <div class="four columns">
              <select class="mounth" name="mounth">
                <?php 
                  // php for dropdown mounth 
                  for ($i = 1; $i <= 12; $i++) {
                    $month = date('F', mktime(0, 0, 0, $i)); // date("F") Full name mounth
                    echo " <option value='$i'>$month</option>";
                  }
                ?>
              </select>
           
            </div>
            <div class="four columns">
              <input type="text" placeholder="year Ex: 1990" name="year" >
            </div>
            <div class="twelve columns">
              <input type="text" placeholder="phone number Ex:081-123-4567" name="phone">
            </div>
            <div class="row">
              <div class="twelve columns">
                <button type="button" class="secondary button" onclick="form2()" >Test</button>
              </div>  
            </div>
          </div>

          <div class="row" id="form2" hidden="true">
            <div class="nine columns">
              <input type="text" placeholder="Department" name="department">
            </div>
            <div class="three columns">
              <input type="text" placeholder="inyear" name="inyear">
            </div>
            <div class="twelve columns">
              <textarea placeholder="Address" name="address"></textarea>
              <input type="text" placeholder="work" name="work">
              <input type="text" placeholder="E-mail" name="email">
              <input type="text" placeholder="Facebook" name="facebook"> 
              <input type="text" placeholder="twitter" name="twitter">
            </div>
            <div>
              <input type="hidden" value="TRUE" name="formsubmit">
              <input type="button" value="Back" class="button" onclick="form1()">
              <input type="submit" value="submit" class="success button">
            </div>
          </div>
        </form>

      </div>
    </div>

  </div>


  </body>
</html>