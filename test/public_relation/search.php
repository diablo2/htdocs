<!DOCTYPE html>
<?php 
  include('../setting/connect.php'); 
// confic variable function paggin
$page_row = 15 ;
$count_topic = 0 ;


?>
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
    <link href="../assets/css/design.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script></head>
<body class=" container">
  <!-- Header and Nav -->
  <div class="container-fluid contain">
    <div class="row-fluid header">
    </div>
  
  <!-- End Header and Nav -->
  
  
  <div class="row-fluid">    
        <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="span3">
      <?php include '../assets/component/nav-side.php'; ?>
    </div>
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="span9"> <!-- Contain PR -->
      <div class="well PR_search">
      <div class="row-fluid"> <!---- Header content and function search, << , home , >> ---->
         <div class="span6">
           <h4> Public Relations </h4>
         </div>
         <div class="span6">
          <div class="span3"><ul><li><i class="foundicon-search"></i></li></ul></div>
          <div class="span3"><ul><li><i class="foundicon-left-arrow"></i></li></ul></div>
          <div class="span3"><ul><li><i class="foundicon-search"></i></li></ul></div>
          <div class="span3"><ul><li><i class="foundicon-right-arrow"></i></li></ul></div>            
        </div> <!-- End icon function -->
      </div> <!-- End Header PR -->
      <div class="row-fluid"> <!-- Main Content PR-->
        <div class="span12"> 
          <div class="row-fluid">
            <div clas="span12">
              <form class="form-search" action="search.php" method="get"><!-- Form search public relation -->
                <center>
                    <input class="span3 " type="text" name="search" placeholder="Search News">

                    <select class="span3" name="department">
                      <option value="">Department</option>
                      <?php
                        $sql_department = 'SELECT * FROM department';
                        $resule_depaerment = mysql_query($sql_department) or die(mysql_error());
                        
                        while ($row_department = mysql_fetch_array($resule_depaerment)) {
                          echo '<option value="'.$row_department['id'].'">'.$row_department['nameEn'].'</option>';
                        }
                      ?>
                    </select>


                    <input class="span2" type="text" name="year" placeholder="Year Ex. 1999" >
                    <button class="btn" type="submit">Search</button>
                </center>

              </form><!-- End Form search public relation -->  
            </div>
          </div>
          <div class="row-fluid"> <!-- Contain Search-->
            <div class="span12" >
              <table class="table table-hover demo" id="pagination">
                <thead>
                  <tr>
                    <th class="span1 sortable-numeric fd-column-0">Rank</th>
                    <th class="span9 sortable-text fd-column-1">Topic</th>
                    <th class="span2 sortable-date-ymd fd-column-2">Date</th>
                  </tr>
                </thead>


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
                    
                    echo '<tbody class="row-fluid '.$page.'" id="p'.$i.'" style="'.$sty.'">';
                        for ($j = 1 ; $j <= $page_row ; $j++ ){
                          if ($row_pr = mysql_fetch_array($result_pr)) { // check Query have data
                            $count_topic = $count_topic +1;
                            echo  '<tr>
                              <td>
                                '. $count_topic .'
                              </td>
                              <td clas="sized1"><a href="index.php?key='.base64_encode($row_pr['id']).'">
                                '.$row_pr['topic'].'
                                </a>
                              </td>
                              <td class="sized2">
                                '. date('Y-m-d', strtotime(str_replace('-', '/', $row_pr['createDate']))).'
                              </td>
                              </tr>';
                          } else {
                            break;
                          }
                        }
                    echo '</tbody>';
                  }
              ?>
            </tbody>
          </table>
            </div>
          </div><!-- End contain Search -->
          <div id="paging">   

          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  
  <!-- Footer -->
  
  <footer class="row-fluid">
    <div class="span12">
      <hr />
      <div class="row-fluid">
        <div class="span6">
          <p>&copy; Copyright no one at all. Go to town.</p>
        </div>
        <div class="span6">
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
    <!-- Script Facebook -->
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Loader" type="text/javascript"></script>  
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>  
    <!-- Pagination -->
    <script src="../assets/js/lib/paginate.js"></script>
    <script src="../assets/js/lib/tablesort.js"></script> 
    <script src="../assets/js/lib/paginate.min.js"></script> 
    <script src="../assets/js/lib/jquery.paginate.js"></script> 

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
        
</body></html>