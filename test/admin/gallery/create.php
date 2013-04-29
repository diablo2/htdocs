<?php
    include('../../setting/connect.php');
    include('action/photo.class.php');

    $headerName = ' Gallery'; 
    $icon = 'icon-picture'; // Icon Header
?>



<!DOCTYPE html>
<!--[if lt IE 7]>       <html class="no-js lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>          <html class="no-js lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>          <html class="no-js lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js">                        <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Dashboard</title>
        <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
        <meta name="viewport" content="width=device-width">
        <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap-responsive.min.css">
        <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="../../assets/css/style.css">
        <link type="text/css" rel="stylesheet" href="../../assets/css/prettify.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/validationEngine.jquery.css"/>

        <link type="text/css" rel="stylesheet" href="../../assets/css/DT_bootstrap.css"/>
        <link rel="stylesheet" href="../../assets/css/responsive-tables.css">
        <link rel="stylesheet" href="../../assets/css/theme.css">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome-ie7.min.css"/>
        <![endif]-->

        <script src="../../assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!-- BEGIN WRAP -->
        <div id="wrap">
            <!-- BEGIN TOP BAR -->
            <?php include('../assets/component/top-bar.php'); ?>

            <!-- BEGIN HEADER.head -->
            <?php include('../assets/component/header.php'); ?>

            <!-- BEGIN LEFT  -->
            <?php include('../assets/component/side-bar.php'); ?>



                        <!-- BEGIN MAIN CONTENT -->
            <div id="content">
                <!-- .outer -->
                <div class="container-fluid outer">
                    <div class="row-fluid">
                        <!-- .inner -->
                        <div class="span12 inner">
                            <!--Begin Form Create Album-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="icon-plus-sign"></i></div>
                                            <h5>Create Album</h5>
                                        </header>
                                        <div id="collapse2" class="body collapse in " style="padding-top:40px">
                                            <form class="form-horizontal"  action="action/create.php">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <span class="<?php if($_GET['ref'] == "error"){ echo "";} else { echo "hidden";}; ?>" style="color:#B94A48">Name Album already taken, please choose another</span>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Name Album *</label>
                                                    <div class="controls">
                                                        <input type="text" class="validate[required] text-input span6" name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Status</label>
                                                    <div class="controls">
                                                        <select class="span6" name="status">
                                                            <option value="0">Private</option>
                                                            <option value="1">Public</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Description</label>
                                                    <div class="controls">
                                                        <textarea name="description" class="span6" rows="6"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-actions no-margin-bottom">
                                                    <input type="submit" value="Create Album" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Form Create Album-->
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.row-fluid -->
                </div>
                <!-- /.outer -->
            </div>
            <!-- END CONTENT -->

            <!-- #push do not remove -->
            <div id="push"></div>
            <!-- /#push -->
        </div>
        <!-- END WRAP -->
        <div class="clearfix"></div>

         <!-- #editModal -->
        <div id="removeModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="editModalLabel"><i class="icon-edit"></i> Remove User</h3>
            </div>
          <div class="modal-body">
            Do you want to remove <strong id="col2"></strong> <strong id="col3"></strong> <strong id="col4"></strong>
          </div>
          <div class="hidden" id="userid"></div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <a data-dismiss="modal" class="btn btn-danger" onclick="jquery_stuff; return false;" id="btn-remove">Remove</a>
          </div>
        </div>
        <!-- /#editModal -->

        <!-- BEGIN FOOTER -->
        <?php include('../assets/component/footer.php'); ?>
        <!--
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        -->
        

        <!--
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
        <script>window.jQuery.ui || document.write('<script src="../../assets/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')</script>
        -->
        <script src="../../assets/js/vendor/jquery-1.9.1.min.js"></script>
        <script src="../../assets/js/vendor/jquery-migrate-1.1.1.min.js"></script>
        <script src="../../assets/js/vendor/jquery-ui-1.10.0.custom.min.js"></script>
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>

        <script type="text/javascript" src="../../assets/js/lib/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/DT_bootstrap.js"></script>
        <script src="../../assets/js/lib/responsive-tables.js"></script>

        <!-- JS Va -->

        <script type="text/javascript" src="../../assets/js/bootstrap-progressbar.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.nicescroll.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/prettify.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.cookie.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/languages/jquery.validationEngine-en.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.validate.min.js"></script>

        <script type="text/javascript" src="../../assets/js/main.js"></script>
        <script type="text/javascript">
            $(function() {
                metisTable();
                formValidation();
            });
        </script>

        
        <script type="text/javascript" src="../../assets/js/style-switcher.js"></script>



    </body>
</html>