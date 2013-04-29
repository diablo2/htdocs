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
    <link href="../assets/css/design.css" rel="stylesheet">


  <!-- Core CSS File. The CSS code needed to make eventCalendar works -->
  <link rel="stylesheet" href="../assets/css/eventCalendar.css">

  <!-- Theme CSS file: it makes eventCalendar nicer -->
  <link rel="stylesheet" href="../assets/css/eventCalendar_theme_responsive.css">

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
      <div class="row-fluid header">

      </div>
      <div class="row-fluid">
        <div class="span3">
        <?php include '../assets/component/nav-side.php'; ?>
        </div><!--/span-->
        <div class="span9">



        <div class="span11" id="eventCalendarHumanDate"></div>
        










        </div><!--/span-->
      </div><!--/row-->
<!-------------------- Footer ---------------------------->
    <?php include('../assets/component/footer.php'); ?>
    </div><!--/.fluid-container-->


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

    <!-- Calendar -->
    <script src="../assets/js/lib/jquery.eventCalendar.js" type="text/javascript"></script>
    <script>
          $(document).ready(function() {
            $("#eventCalendarHumanDate").eventCalendar({
              eventsjson: '../assets/json/event.humanDate.json.php',
              jsonDateFormat: 'human'  // 'YYYY-MM-DD HH:MM:SS'
            });
          });
        </script>
</body></html>