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

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script></head>

  <body class="container">
  <?php include('../component/nav-top.php'); ?> 
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
        <?php include '../component/nav-side.php'; ?>
        </div><!--/span-->
        <div class="span9">
          <h2>Contact Us</h2>
          <form method="post" action="action/insert.php">
            <div class="well span8">
              <div class="row-fulid">
                <div class="span5">
                  <label>First Name</label>
                  <input class="input-block-level" name="frist_name" type="text" placeholder="Your First Name">
                  <label>Last Name</label>
                  <input class="input-block-level" name="Last_name" type="text" placeholder="Your Last Name">
                  <label>E-mail Address</label>
                  <input class="input-block-level" name="email" type="text" placeholder="Your E-mail Address">
                </div> <!-- end class input -->
                <div class="span7">
                  <label>Massage</label>
                  <textarea class="input-block-level" name="message" style="height: 160px"></textarea>
                </div> <!-- end class massage -->
                <div class="row-fulid">
                  <?php  
                  if (isset($_GET['result'])) {
                    if($_GET['result'] == 1){
                      echo '<div class="span10 alert alert-success">
                              Send message Complete
                            </div>';
                    } else {
                      echo '<div class="span10 alert alert-error">
                              Can not sent message !
                            </div>';
                    }
                  }

                  ?>

                  <button type="submit" class="btn btn-primary pull-right">Send</button>
                </div>
                
              </div>
            </div>
          </form>
        </div><!--/row-->

      <hr>

      <footer>
        <p>© Company 2013</p>
      </footer>

    </div><!--/.fluid-container-->
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


</body></html>