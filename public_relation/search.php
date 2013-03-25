<!DOCTYPE html>
<?php include ('../setting/connect.php'); ?>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

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
  <script src="../javascripts\jquery.foundation.forms.js"></script>
  
</head>
<body class="PR_search">
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
         <div class="six columns">
          <div class="three columns"><ul><li><i class="foundicon-search"></i></li></ul></div>
          <div class="three columns"><ul><li><i class="foundicon-left-arrow"></i></li></ul></div>
          <div class="three columns"><ul><li><i class="foundicon-search"></i></li></ul></div>
          <div class="three columns"><ul><li><i class="foundicon-right-arrow"></i></li></ul></div>            
        </div> <!-- End icon function -->
      </div> <!-- End Header PR -->
      <div class="row"> <!-- Main Content PR-->
        <div class="twelve columns"> 
          <div class="row">
            <div clas="twelve columns">
              <form class="custom" action="search.php" method="get"><!-- Form search public relation -->
                <div class="row">
                  <div class="four columns">
                    <input type="text" name="search" placeholder="Search News">
                  </div>
                  <div class="four columns">
                    <select>
                      <option>Department</option>
                      <?php
                        $sql_department = 'SELECT * FROM department';
                        $resule_depaerment = mysql_query($sql_department) or die(mysql_error());
                        
                        while ($row_department = mysql_fetch_array($resule_depaerment)) {
                          echo '<option value="'.$row_department['id'].'">'.$row_department['nameEn'].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="two columns">
                    <input type="text" name="year" placeholder="Year Ex. 1999">
                  </div>
                  <div class="two columns">
                    <input class="radius secondary button" id="PR_search_bt" type="submit" value="Search">
                  </div>
                </div>
              </form><!-- End Form search public relation -->  
            </div>
          </div>
          <div class="row"> <!-- Contain Search-->
            <div class="twelve columns">
              <?php
                if (isset($_GET['search'])){
                  $search = $_GET['search'];
                  $sql_pr = 'SELECT * FROM public_relation WHERE topic LIKE "%'.$search.'%"';
                  
                } else { // have not key search content PR
                  $sql_pr = 'SELECT * FROM public_relation';
                }
                  $result_pr = mysql_query($sql_pr) or die(mysql_error());
                  $i = 0;
                  while ($row_pr = mysql_fetch_array($result_pr)) {
                    $i = $i + 1;
                    echo '<div class="row">
                            <div class="one columns">
                              '. $i .'
                            </div>
                            <div class="seven columns"><a href="index.php?key='.base64_encode($row_pr['id']).'">
                              '.$row_pr['topic'].'
                              </a>
                            </div>
                            <div class="four columns">
                              '. date('Y-m-d', strtotime(str_replace('-', '/', $row_pr['createDate']))).'
                            </div>
                          </div>';
                
              }
                
              ?>
            </div>
          </div><!-- End contain Search -->
        </div>
      </div>
      <div class="row"> <!-- Footer content PR -->
        <div class="three columns">
          <form class="custom">

        </div>
                <div class="three columns">
          Test !
        </div>
                <div class="three columns">
          Test !
        </div>
                <div class="three columns">
          Test !
        </div>
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
  <!-- Included JS Files (Compressed) -->
  <script src="../javascripts/jquery.js"></script>
  <script src="../javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="../javascripts/app.js"></script>
</body>
</html>