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

    <link rel="stylesheet" href="../css/style.css">
    <!--[if lt IE 7]><link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-ie6.min.css"><![endif]-->
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="../css/bootstrap-image-gallery.min.css">
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
        <div class="span9 gallery content">
          <h2>Gallery</h2>
          <div class="row-fluid" id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery">
            <ul class="thumbnails">
            <?php
              for ($i = 1 ; $i <= 7 ; $i++){
                echo '<li class="span2">';
                echo '<a data-gallery="gallery" class="thumbnail" href="../images/upload/'.$i.'.jpg">';
                echo '<img src="../images/upload/'.$i.'.jpg">';
                echo '</a>';
                echo '</li>';
              }
            ?>
          </ul>
          </div>
          <!-- modal-gallery is the modal dialog used for the image gallery -->
          <div id="modal-gallery" class="modal modal-gallery hide fade" tabindex="-1">
              <div class="modal-header">
                  <a class="close" data-dismiss="modal">&times;</a>
                  <h3 class="modal-title"></h3>
              </div>
              <div class="modal-body"><div class="modal-image"></div></div>
              <div class="modal-footer">
                  <a class="btn modal-download" target="_blank">
                      <i class="icon-download"></i>
                      <span>Download</span>
                  </a>
                  <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
                      <i class="icon-play icon-white"></i>
                      <span>Slideshow</span>
                  </a>
                  <a class="btn btn-info modal-prev">
                      <i class="icon-arrow-left icon-white"></i>
                      <span>Previous</span>
                  </a>
                  <a class="btn btn-primary modal-next">
                      <span>Next</span>
                      <i class="icon-arrow-right icon-white"></i>
                  </a>
              </div>
          </div>
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
    <script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
    <script src="../js/bootstrap-image-gallery.min.js"></script>
    <script src="../js/main.js"></script>
</body></html>