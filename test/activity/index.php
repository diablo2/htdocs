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


  <!-- Core CSS File. The CSS code needed to make eventCalendar works -->
  <link rel="stylesheet" href="../css/eventCalendar.css">

  <!-- Theme CSS file: it makes eventCalendar nicer -->
  <link rel="stylesheet" href="../css/eventCalendar_theme_responsive.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  <script type="text/javascript" src="chrome-extension://bfbmjmiodbnnpllbbbfblcplfjjepjdn/js/injected.js"></script>
</head>

  <body class="container">
    <?php include('../component/nav-top.php'); ?>   
    <div class="container-fluid contain">
      <div class="row-fluid header">

      </div>
      <div class="row-fluid">
        <div class="span3">
        <?php include '../component/nav-side.php'; ?>
        </div><!--/span-->
        <div class="span9">



        <div class="span11" id="eventCalendarHumanDate"></div>
        










        </div><!--/span-->
      </div><!--/row-->
<!-------------------- Footer ---------------------------->
    <?php include('../component/footer.php'); ?>
    </div><!--/.fluid-container-->


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

    <!-- Calendar -->
    <script src="../js/jquery.eventCalendar.js" type="text/javascript"></script>
    <script>
          $(document).ready(function() {
            $("#eventCalendarHumanDate").eventCalendar({
              eventsjson: '../json/event.humanDate.json.php',
              jsonDateFormat: 'human'  // 'YYYY-MM-DD HH:MM:SS'
            });
          });
        </script>
</body></html>