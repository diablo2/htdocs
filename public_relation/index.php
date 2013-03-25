<!DOCTYPE html>
<?php include ('../setting/connect.php'); ?>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

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
  <link rel="stylesheet" href="../stylesheets/general_foundicons.css">
  <link rel="stylesheet" href="../stylesheets/general_foundicons_ie7.css">
  <script src="../javascripts/modernizr.foundation.js"></script>
</head>
<body class="body_PR">
  <!-- Header and Nav -->
  
  <div class="row">
    <div class="three columns">
      <h1><img src="http://placehold.it/400x100&text=Logo" /></h1>
    </div>
    <div class="nine columns">
      <ul class="link-list right">
        <li><a href="#">Section 1</a></li>
        <li><a href="#">Section 2</a></li>
        <li><a href="#">Section 3</a></li>
        <li ><a href="#">Section 4</a></li>
      </ul>
    </div>
  </div>
  
  <!-- End Header and Nav -->
  
  
  <div class="row">    
        <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="three columns">
        
      <ul class="side-nav">
        <li><a href="#">Section 1</a></li>
        <li><a href="#">Section 2</a></li>
        <li><a href="#">Section 3</a></li>
        <li><a href="#">Section 4</a></li>
        <li><a href="#">Section 5</a></li>
        <li><a href="#">Section 6</a></li>
      </ul>
      
      <p><img src="http://placehold.it/320x240&text=Ad" /></p>
        
    </div>
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="nine columns "> <!-- Contain PR -->
      <div class="row"> <!---- Header content and function search, << , home , >> ---->
         <div class="six columns">
           <h4> Public Relations </h4>
         </div>
         <div class="six columns" id="PR_function">
          <div class="three columns"><ul><li><a href="search.php" ><i class="foundicon-search"></i></a></li></ul></div>
          <div class="three columns"><ul><li><i class="foundicon-left-arrow"></i></li></ul></div>
          <div class="three columns"><ul><li><i class="foundicon-search"></i></li></ul></div>
          <div class="three columns"><ul><li><i class="foundicon-right-arrow"></i></li></ul></div>            
        </div> <!-- End icon function -->
      </div> <!-- End Header PR -->
      <div class="row"> <!-- Main Content PR-->
        <div class="twelve columns">
          ########
          <?php  
          if (isset($_GET['key'])){
            $key = base64_decode($_GET['key']);
            $sql_pr = "SELECT * FROM public_relation WHERE id LIKE $key";
            $result_pr = mysql_query($sql_pr) or die(mysql_error());
            $row_pr = mysql_fetch_array($result_pr);
                echo '<div class="row">
                        <div class="twelve columns">'.
                          $row_pr['topic']
                        .'</div>
                      </div>';

                echo '<div class="row" >
                        <div class="twelve columns">
                          '. $row_pr['content'] .'
                        </div> 
                      </div>';            
            } else { // if check have key content
              $sql_pr = 'SELECT * FROM public_relation';
              $result_pr = mysql_query($sql_pr) or die(mysql_error());
              if (mysql_num_rows($result_pr) > 0){ // check result query PR content
                $row_pr = mysql_fetch_array($result_pr);
                echo '<div class="row">
                        <div class="twelve columns">'.
                          $row_pr['topic']
                        .'</div>
                      </div>';

                echo '<div class="row" >
                        <div class="twelve columns">
                          '. $row_pr['content'] .'
                        </div> 
                      </div>';
            }// end if check result query PR content
          }
          ?>
        </div>
      </div>
      <div class="row" id="PR_footer"> <!-- Footer content PR -->
        <?php
          $sql_pr = 'SELECT * FROM public_relation';
          $result_pr = mysql_query($sql_pr) or die(mysql_error());
          

          for ($i=1 ; $i<= 4 ; $i++){
            $row_pr = mysql_fetch_array($result_pr);
            echo '<div class="three columns">
                    <center>
                      <div class="row">
                      <a href="index.php?key='.base64_encode($row_pr['id']).'">
                        <img src="'.$row_pr['imgDirect'].'"></a>
                      </div>
                      <div class="row">
                        '.$row_pr['topic'].'
                      </div>
                    </center>
                  </div>';

          }
        ?>
      </div>
    </div>
    
  </div>
    
  
  <!-- Footer -->
  
  <footer class="row">
    <div class="twelve columns">
      <hr />
      <div class="row">
        <div class="six columns">
          <p>&copy; Copyright no one at all. Go to town.</p>
        </div>
        <div class="six columns">
          <ul class="link-list right">
            <li><a href="#">Section 1</a></li>
            <li><a href="#">Section 2</a></li>
            <li><a href="#">Section 3</a></li>
            <li><a href="#">Section 4</a></li>
          </ul>
        </div>
      </div>
    </div> 
  </footer>
</body>
</html>