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
    <link href="../css/design.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script></head>
      <script src="../js/jquery-1.9.1.js"></script>
  <body class="container">
    <!-- Header and Nav -->
    <?php include('../component/nav-top.php'); ?>       
    <div class="container-fluid contain">
      <div class="row-fluid header">

      </div>

  
  <!-- End Header and Nav -->
  
  
  <div class="row-fluid">    
        <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="span3">
        <?php include '../component/nav-side.php'; ?>
    </div>
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="span9"> <!-- Contain PR -->
      <div class="well body_PR">
        <div class="row-fluid"> <!---- Header content and function search, << , home , >> ---->
         <div class="span6">
           <h4> Public Relations </h4>
         </div>

         <?php
          $sql_direct = "SELECT * FROM public_relation";
          $result_direct = mysql_query($sql_direct);
          $num_direct = mysql_num_rows($result_direct);

          if (isset($_GET['key'])){ // Check have Get num page
            $nPage = base64_decode($_GET['key']);
          } else {
            $nPage = $num_direct;
          } 

          $nPrev = ($nPage-1)%$num_direct;
          if ($nPrev < 1) {$nPrev = $num_direct;} // if nPrev = 0 Error >>> nPrev = Max num Page
          $nNext = $nPage%$num_direct + 1;
         ?>
         <div class="span6" id="PR_function">
          <div class="span3"><ul><li><a href="search.php" ><i class="icon-search"></i></a></li></ul></div>
          <div class="span3"><ul><li><a <?php echo 'href="index.php?key='.base64_encode($nPrev).'"' ?>><i class="icon-circle-arrow-left"></i></a></li></ul></div>
          <div class="span3"><ul><li><i class="icon-home"></i></li></ul></div>
          <div class="span3"><ul><li><a <?php echo 'href="index.php?key='.base64_encode($nNext).'"' ?>><i class="icon-circle-arrow-right"></i></a></li></ul></div>            
        </div> <!-- End icon function -->
      </div> <!-- End Header PR -->
      <hr>
      <div class="row-fluid"> <!-- Main Content PR-->
        <div class="span12">
          <?php  
          if (isset($_GET['key'])){
            $key = base64_decode($_GET['key']);
            $sql_pr = "SELECT * FROM public_relation WHERE id LIKE $key ORDER BY id DESC";
        
            } else { // if check have key content
              $sql_pr = 'SELECT * FROM public_relation ORDER BY id DESC';
            }
              $result_pr = mysql_query($sql_pr) or die(mysql_error());
              if (mysql_num_rows($result_pr) > 0){ // check result query PR content
                $row_pr = mysql_fetch_array($result_pr);
                echo '<div class="row-fluid">
                        <div class="span10">'.
                          $row_pr['topic']
                        .'</div>
                        <div class="span2">
                          <a name="fb_share" type="button_count" href="http://www.facebook.com/Sharer.php?t=TEST">Share</a> 
                        </div>
                      </div>';

                echo '<div class="row-fluid" >
                        <div class="span12">
                          '. $row_pr['content'] .'
                        </div> 
                      </div>';
            }// end if check result query PR content
          
          ?>
        </div>
      </div>
    </div>
      <div class="row-fluid" id="PR_footer"> <!-- Footer content PR -->
        <?php
          $sql_pr = 'SELECT * FROM public_relation ORDER BY id DESC';
          $result_pr = mysql_query($sql_pr) or die(mysql_error());
          

          for ($i=1 ; $i<= 4 ; $i++){
            $row_pr = mysql_fetch_array($result_pr);
            echo '<div class="span3">
                    <center>
                      <div class="row-fluid ">
                      <a href="index.php?key='.base64_encode($row_pr['id']).'">
                        <img src="'.$row_pr['imgDirect'].'"></a>
                      </div>
                      <div class="row-fluid">
                        '.$row_pr['topic'].'
                      </div>
                    </center>
                  </div>';

          }
        ?>
      </div>
    </div>
    
  </div>
    
  
<!-------------------- Footer ---------------------------->
    <?php include('../component/footer.php'); ?>
 </div> <!-- End container --> 
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<!--    <script src="js/jquery.js"></script> -->
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
    <!-- Script Facebook -->
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>  
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>  

</body></html>