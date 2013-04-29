<?php
    include('../../setting/connect.php');
    include('action/photo.class.php');

    $albumID = $_GET['ref'];
    $albumName = photo::getNameAlbum($albumID);
    $headerName = ' Album : '.$albumName; 
    $icon = 'icon-home'; // Icon Header

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
        <link type="text/css" rel="stylesheet" href="../../assets/css/DT_bootstrap.css"/>


        <link type="text/css" rel="stylesheet" href="../../assets/css/prettify.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/validationEngine.jquery.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/jquery.plupload.queue.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/jquery.gritter.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/uniform.default.css"/>
        <link rel="stylesheet" href="../../assets/css/jasny-bootstrap.min.css" />
        <link rel="stylesheet" href="../../assets/css/jasny-bootstrap-responsive.min.css" />

        <link rel="stylesheet" href="../../assets/css/responsive-tables.css">
        <link rel="stylesheet" href="../../assets/css/theme.css">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome-ie7.min.css"/>
        <![endif]-->

        <script src="../../../assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
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
  
                            <!-- BEGIN MULTIPLE FILE UPLOAD -->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="icon-upload"></i></div>
                                            <h5>Upload Photo</h5>
                                            <ul class="nav pull-right">
                                                <li><a href="#">Link</a></li>
                                                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th-large"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="">q</a></li>
                                                        <li><a href="">a</a></li>
                                                        <li><a href="">b</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a class="accordion-toggle minimize-box collapsed" data-toggle="collapse" href="#collapse2">
                                                        <i class="icon-chevron-down"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </header>
                                        <div id="collapse2" class="block accordion-body collapse in body">
                                            <form>
                                                <div id="uploaderPhoto"></div>
                                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END MULTIPLE FILE UPLOAD -->
                            <!--Begin Datatables-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="icon-picture"></i></div>
                                            <h5>Photo Table</h5>
                                            <input type="hidden" id="albumID" value="<?=$albumID ?>">
                                            <input type="hidden" id="albumName" value="<?=$albumName ?>">
                                        </header>
                                        <div id="collapse4" class="body">
                                            <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width:10%">Image</th>
                                                        <th style="width:55%">Title</th>
                                                        <th style="width:10%">CreateBy</th>
                                                        <th style="width:15%">CreateDate</th>
                                                        <th style="width:10%">Action</th>
                                                        <th class="hidden">Photo ID</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                        $result = photo::getPhoto($albumID);
                                                        if (!empty($result)){
                                                        while ($row = mysql_fetch_array($result)) { ?>

                                                        <tr id="tr<?=$row['id'] ?>">
                                                                <td >
                                                                    <img class="thumbnail small" style="max-width:94%" src="http://<?=$dbHost ?>/test/file/gallery/<?=$row['name'] ?>/<?=$row['image'] ?>">
                                                                </td>
                                                                <td style="padding: 10px 20px 10px 20px">
                                                                    <div class="row-fluid">
                                                                        <label class="title-img-label span2">Title : </label>
                                                                        <label id="imgTitle" class="span10"><?=$row['imgTitle'] ?></label>
                                                                    </div>
                                                                    <div class="row-fluid">
                                                                        <label class="title-img-label span2">Description : </label>
                                                                        <label class="span10"><?=$row['description'] ?></label>
                                                                    </div>                                                                    
                                                                </td>
                                                                <td><?=$row['username'] ?></td>
                                                                <td><?=date('Y-m-d',strtotime($row['createDate'])) ?></td>            
                                                                <td>
                                                                    <button class="btn btn-mini view"><i class="icon-eye-open"></i></button>
                                                                    <button class="btn btn-mini edit"><i class="icon-edit"></i></button>
                                                                    <button class="btn btn-mini btn-danger remove"><i class="icon-remove"></i></button>
                                                                </td>
                                                                <td id="imgID" class="hidden"><?=$row['id'] ?></td>
                                                              </tr>
                                                    <?php
                                                        }}
                                                        // <!-- Button to trigger modal -->
                                                    ?>                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Datatables-->
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

         <!-- #removeModal -->
        <div id="removeModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="editModalLabel"><i class="icon-edit"></i> Remove Photo</h3>
            </div>
          <div class="modal-body">
            Do you want to remove <strong id="title"></strong>
          </div>
          <div class="hidden" id="photoID"></div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <a data-dismiss="modal" class="btn btn-danger" onclick="jquery_stuff; return false;" id="btn-remove-photo">Remove</a>
          </div>
        </div>
        <!-- /#removeModal -->

         <!-- #editModal -->
        <div id="editModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="editModalLabel"><i class="icon-edit"></i> Edit Photo</h3>
            </div>
          <div class="modal-body">
            <form class="form-horizontal"  action="action/create.php">  
                <div class="control-group">
                    <label class="control-label">Photo Title : </label>
                    <div class="controls">
                        <input type="text" class="" name="title" id="titleEdit">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Description : </label>
                    <div class="controls">
                        <textarea name="description" id="description"></textarea>
                    </div>
                </div>
            </form>
          </div>
          <div class="hidden" id="photoID"></div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <a data-dismiss="modal" class="btn btn-primary" onclick="jquery_stuff; return false;" id="btn-edit-photo">Save</a>
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
        <!-- JS Upload-->
        <script type="text/javascript" src="../../assets/js/lib/bootstrap-progressbar.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.nicescroll.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/prettify.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.form.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.validate.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.form.wizard-min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/plupload.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/plupload.html5.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/plupload.html4.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.plupload.queue.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.gritter.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jasny-bootstrap.min.js"></script>

        <script type="text/javascript" src="../../assets/js/main.js"></script>

        <script type="text/javascript">
            $(function() {
                formWizard();
                metisTable();
            });
        </script>
    </body>
</html>