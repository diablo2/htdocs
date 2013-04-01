<?php
  include('../setting/connect.php');
?>

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
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/design.css" rel="stylesheet">
    <!-- bxSlider CSS file -->
    <link href="../css/jquery.bxslider.css" rel="stylesheet" />

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

  <div class="container testBG">
    <div class"row-fluid"> <!-- Header Search Alumni -->

    </div><!-- End Header Search Alumni -->
    <div class="row-fluid"> <!-- Nav + Content -->
      <div class="span3 cblue">

      </div>

      <div class="span9 cpink">
        <div class="row-fluid">
          <div class="row-fluid">
            <div class="span12">
              <center><h2>Alumni</h2></center>
            </div>
          </div>
          <div class="row-fluid">
            <center>
              <form class="form-search">
                <input class="span3" type="text" placeholder="name">
                <input class="span2" type="text" >
                <select class="span2">
                  <option></option>
                  <option></option>
                  <option></option>
                </select> 
                <button class="btn" type="submit">Search</button>
              </form>
            </center>
          </div>
        </div>
        <div class="row-fluid">
          <h2>New Alumni</h2>
          <?php 
            $sql_department = 'SELECT id,nameEn FROM department';
            $result_department = mysql_query($sql_department) or die(mysql_error());
            while ($row_department = mysql_fetch_array($result_department)){  // While print department
              $id = $row_department['id'];
              echo '<div class="row-fluid">';
              echo '<h4>'.$row_department['nameEn'].'</h4>';
                echo '<div class="row-fluid">';
                echo '<ul class="bxslider">';
                for ($i = 1 ; $i <= 10 ; $i++){ // while >> for print alumni (image and name)
                  echo '<li class="slide">';
                  echo '<a href="index.php">';
                  echo '<img src="../images/upload/testimg.png" href="inex.php">'.$i; // image + name
                  echo '</a></li>';
                }
                echo '</ul>';
                echo '</div>';
              echo '</div>';
            }
          ?>
        </div> 
      </div>
    </div><!-- End Nav + Content -->



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
    <!-- bxSlider Javascript file -->
    <script src="../js/jquery.bxslider.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.bxslider').bxSlider({
    slideWidth: 300,
    minSlides: 8,
    maxSlides: 5,
    moveSlides: 1,
    slideMargin: 3

        });
      });
    </script>
</body>
</html>