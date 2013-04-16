<!DOCTYPE html>
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
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script>

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

  <div class="container">
    <div class="row-fluid">
      <div class="span6">
      </div>
      <div class="span6">
        <form  method="post" action="validate.php" id="signup">
            <div id="form1">
              <div class="row-fluid">
                <div class="span6">
                   <input class="span12" type="text" placeholder="frist name" name="frist_name"> 
                </div>
                <div class="span6">
                  <input class="span12" type="text" placeholder="last name" name="last_name">
                </div>
              </div> 
              <div class="row-fluid"> 
                <div class="span12">
                  <input class="span12" type="text" name="username"  placeholder="username"  id="username" />
                </div>
              </div>
              <div class="row-fluid"> 
                <div class="span12" id="status">
                </div>
              </div>
            <div class="row-fluid"> 
              <div class="span12">
                <input class="span12" type="text" placeholder="password" name="password" id="password">
              </div>
            </div>
            <div class="row-fulid">
              <div class="span12">
                <input class="span12" type="text" placeholder="confirm password" name="cpassword" id="cpassword">
              </div>
            </div>

                          <div class="span12" id="status_pass">
                  </div>
              <div class="span12" id="status_cpass">
              </div>
              <div class="row-fluid">
                <div class="span3">
                  <input class="span12" type="text" placeholder="day" name="day">
                </div>
                <div class="span6">
                  <select class="mounth span12" name="mounth">
                    <?php 
                      // php for dropdown mounth 
                      for ($i = 1; $i <= 12; $i++) {
                        $month = date('F', mktime(0, 0, 0, $i)); // date("F") Full name mounth
                        echo " <option value='$i'>$month</option>";
                      }
                    ?>
                  </select>
               
                </div>
                <div class="span3">
                  <input class="span12" type="text" placeholder="year Ex: 1990" name="year" >
                </div>
              </div>  
              <div class="row-fluid">
                <div class="span12">
                  <input class="span12" type="text" placeholder="phone number Ex:081-123-4567" name="phone">
                </div>
              </div>
              <div class="row-fluid">
                <div class="span12">
                  <button class="btn" type="button"  onclick="form2()" >Test</button>
                </div>  
              </div>
            </div>

            <div id="form2" hidden="true">
              <div class="row-fluid">
                <div class="span9">
                  <input class="span12" type="text" placeholder="Department" name="department">
                </div> 
                <div class="span3"> 
                  <input class="span12" type="text" placeholder="inyear" name="inyear">
                </div>
              </div>
              <div class="row-fluid">
                <textarea class="span12" placeholder="Address" name="address"></textarea>
              </div>
              <div class="row-fluid">
                
              </div>
              <div class="row-fluid">
                <input class="span12" type="text" placeholder="work" name="work">
                <input class="span12" type="text" placeholder="E-mail" name="email">
                <input class="span12" type="text" placeholder="Facebook" name="facebook"> 
                <input class="span12" type="text" placeholder="twitter" name="twitter">
              </div>

              <div>
                <input type="hidden" value="TRUE" name="formsubmit">
                <input class="btn" type="button" value="Back"  onclick="form1()">
                <input class="btn btn-success" type="submit" value="submit" >
              </div>
            </div>
        </form>

      </div>
    </div>

  </div>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="js/jquery.js"></script> -->
    <script src="../js/jquery-1.9.1.js"></script>
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

</body>
</html>