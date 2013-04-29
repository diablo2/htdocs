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

    <!-- bxSlider CSS file -->
    <link href="../assets/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="../assets/css/design.css" rel="stylesheet">    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script>

</head>
<body class="container">
  <?php include('../assets/component/nav-top.php'); ?>
  <div class="container-fluid contain">
    <div class="row-fluid header"> <!-- Header Search Alumni -->

    </div><!-- End Header Search Alumni -->
    <div class="row-fluid"> <!-- Nav + Content -->
      <div class="span3">
        <?php include '../assets/component/nav-side.php'; ?>
      </div>

      <div class="span9">
        <div class="row-fluid">
          <div class="row-fluid">
            <div class="span12">
              <center><h2>Alumni</h2></center>
            </div>
          </div>
          <div class="row-fluid">
            <center>
              <form class="form-search well span11" action="index.php">
                <input class="span3" name="name" type="text" placeholder="Name" <?php if(!empty($_GET['name'])) {echo 'value="'.$_GET['name'].'"'; } ?> >
                <input class="span2" name="year" type="text" placeholder="Year" <?php if(!empty($_GET['year'])) {echo 'value="'.$_GET['year'].'"'; } ?> >
                <select name="department" class="span3">
                  <option value="">Department</option>
                  <?php
                    $sql_department = 'SELECT * FROM department';
                    $result_department = mysql_query($sql_department);
                    while ($row_department = mysql_fetch_array($result_department)) {
                      if (!empty($_GET['department'])){ // Check, What is curent choose
                        $selectDeparemet = $_GET['department'];
                      } else {
                        $selectDeparemet = "";
                      }
                      echo '<option value="'.$row_department['id'].'" ';
                      if($_GET['department'] == $row_department['id']){echo 'selected="selected"';}
                      echo '>'.$row_department['nameEn'].' </option>';
                    }
                  ?>
                </select> 
                <button class="btn" type="submit">Search</button>
              </form>
            </center>
          </div>
        </div>
        <div class="row-fluid">
          
          <?php 
          if (empty($_GET['name']) && empty($_GET['year']) && empty($_GET['department'])){
            echo '<h2>New Alumni</h2>';
            mysql_data_seek($result_department, 0);
            while ($row_department = mysql_fetch_array($result_department)){  // While print department
              $id = $row_department['id'];
              echo '<div class="row-fluid">';
              echo '<h4>'.$row_department['nameEn'].'</h4>';
                echo '<div class="row-fluid">';
                echo '<ul class="bxslider">';
                for ($i = 1 ; $i <= 10 ; $i++){ // while >> for print alumni (image and name)
                  echo '<li class="slide">';
                  echo '<a href="index.php">';
                  echo '<img src="../assets/images/upload/testimg.png" href="inex.php">'.$i; // image + name
                  echo '</a></li>';
                }
                echo '</ul>';
                echo '</div>';
              echo '</div>';
            }
          } else { // $_GET have value   
            echo '<h2>Result Search</h2>';
          $n = 20;
            for ($j = 1 ; $j < $n/4 ; $j++){
              echo '<ul class="thumbnails">';
              for($i = 0 ; $i < 4 ; $i++){
                echo '<li class="span3"><a class="thumbnail" href="index.php">';
                echo '<img src="../assets/images/upload/testimg.png">';
                echo '</a></li>';
              }
              echo '</ul>';
            }
          }
          ?>
        </div> 
      </div>
    </div><!-- End Nav + Content -->

<!-------------------- Footer ---------------------------->
    <?php include('../assets/component/footer.php'); ?>

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
    <!-- bxSlider Javascript file -->
    <script src="../assets/js/lib/jquery.bxslider.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.bxslider').bxSlider({
    slideWidth: 300,
    minSlides: 6,
    maxSlides: 5,
    moveSlides: 1,
    slideMargin: 3,
    pager: false,

        });
      });
    </script>
</body>
</html>