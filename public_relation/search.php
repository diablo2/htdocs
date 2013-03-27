<!DOCTYPE html>
<?php 
// confic variable function paggin
$page_row = 15 ;
$count_topic = 0 ;

?>
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
  <script src="../javascripts/jquery.foundation.forms.js"></script>
  
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
                    <select name="department">
                      <option value="">Department</option>
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
                    <input type="text" name="year" placeholder="Year Ex. 1999" >
                  </div>
                  <div class="two columns">
                    <input class="radius secondary button" id="PR_search_bt" type="submit" value="Search">
                  </div>
                </div>
              </form><!-- End Form search public relation -->  
            </div>
          </div>
          <div class="row"> <!-- Contain Search-->
            <div class="twelve columns demo" id="pagination">
              <?php
                if (empty($_GET)){ // check $_GET
                  $sql_pr = 'SELECT * FROM public_relation';
                } else {
                  $sql_pr = 'SELECT * FROM public_relation WHERE topic LIKE "%'.$_GET['search'].'%"';
                  if ($_GET['year'] != ""){
                    $sql_pr .= ' AND YEAR(createDate) LIKE "'.$_GET['year'].'"';
                  }

                  if ($_GET['department'] != ""){
                    $sql_pr .= ' AND department LIKE "'. $_GET['department'].'"';
                  }
                }
                
                  $result_pr = mysql_query($sql_pr) or die(mysql_error());
                  $num_row_pr = ceil(mysql_num_rows($result_pr)/$page_row);

                  for ($i =1 ; $i <= $num_row_pr ; $i++){ // for number of page
                    if ($i == 1 ){ // if set frist page and page show
                      $page = " pagedemo _current"; 
                      $sty = "";
                    } else { 
                      $page = " pagedemo"; 
                      $sty = "display:none;";
                    }
                    
                    echo '<div class="row '.$page.'" id="p'.$i.'" style="'.$sty.'">';
                        for ($j = 1 ; $j <= $page_row ; $j++ ){
                          if ($row_pr = mysql_fetch_array($result_pr)) { // check Query have data
                            $count_topic = $count_topic +1;
                            echo  '<div class="row">
                              <div class="one columns ">
                                '. $count_topic .'
                              </div>
                              <div class="seven columns"><a href="index.php?key='.base64_encode($row_pr['id']).'">
                                '.$row_pr['topic'].'
                                </a>
                              </div>
                              <div class="four columns">
                                '. date('Y-m-d', strtotime(str_replace('-', '/', $row_pr['createDate']))).'
                              </div>
                              </div>';
                          } else {
                            break;
                          }
                        }
                    echo '</div>';
                  }
             
              ?>
            </div>
          </div><!-- End contain Search -->
          <div id="paging">   </div>
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

    <script type="text/javascript" src="../javascripts/jquery-1.3.2.js"></script>
    <script src="../javascripts/jquery.paginate.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
      $("#paging").paginate({
        count     : <?php echo $num_row_pr; ?>,
        start     : 1,
        display     : 7,
        border          : true,
        border_color      : '#fff',
        text_color        : '#fff',
        background_color      : 'black',  
        border_hover_color    : '#ccc',
        text_hover_color      : '#000',
        background_hover_color  : '#fff', 
        images          : false,
        mouse         : 'press',
        onChange          : function(page){
                      $('._current','#pagination').removeClass('_current').hide();
                      $('#p'+page).addClass('_current').show();
                      }
      });
    });
    </script>
</body>
</html>