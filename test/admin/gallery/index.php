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
        <link type="text/css" rel="stylesheet" href="../../assets/css/DT_bootstrap.css"/>
        <link rel="stylesheet" href="../assets/css/responsive-tables.css">
        
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
                            <!--Begin Datatables-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="icon-folder-open"></i></div>
                                            <h5>Gallery Table</h5>
                                        </header>
                                        <div id="collapse4" class="body">
                                            <table id="albumTable" class="table table-bordered table-condensed table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="width:10%">Image</th>
                                                        <th style="width:43%">Title</th>
                                                        <th style="width:10%">Creator</th>
                                                        <th style="width:10%">Created</th>
                                                        <th style="width:10%">Updated</th>
                                                        <th style="width:5%">Photos</th>
                                                        <th style="width:12%"><a href="create.php" class="btn btn-primary">Create album</a></th>
                                                        <th class="hidden">id</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                        
                                                        $result = photo::getAlbum();
                                                        if (!empty($result)){
                                                        while ($row = mysql_fetch_array($result)) {
                                                    ?>        
                                                            <tr id="tr<?=$row['id'] ?>">
                                                                <td>
                                                                     <img class="thumbnail small" style="max-width:94%" src="http://<?=$dbHost ?>/test/file/gallery/<?=$row['name'] ?>/<?=$row['image'] ?>">
                                                                </td>
                                                                <td style="padding: 10px 20px 10px 20px">
                                                                    <div class="row-fluid">
                                                                        <label class="title-img-label span2">Title : </label>
                                                                        <label id="imgTitle" class="span10"><?=$row['name'] ?></label>
                                                                    </div>
                                                                    <div class="row-fluid">
                                                                        <label class="span12"><?=$row['description'] ?></label>
                                                                    </div>
                                                                </td>
                                                                <td><?=$row['createBy'] ?></td>
                                                                <td><?=date('Y-m-d',strtotime($row['createDate'])) ?></td>
                                                                <td><?=date('Y-m-d',strtotime($row['modifyDate'])) ?></td>
                                                                <td><?=$row['photo'] ?></td>
                                                                <td>
                                                                    <button class="btn btn-mini view"><i class="icon-eye-open"></i></button>
                                                                    <a href="photo.php?ref=<?=$row['id'] ?>" class="btn btn-mini view"><i class="icon-upload"></i></a>
                                                                    <button class="btn btn-mini edit" ><i class="icon-edit" alt="upload"></i></button>
                                                                    <button class="btn btn-mini btn-danger remove"><i class="icon-remove"></i></button>
                                                                </td>
                                                                <td class="hidden"><?=$row['id'] ?></td>
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
                <h3 id="editModalLabel"><i class="icon-edit"></i> Remove Album</h3>
            </div>
          <div class="modal-body">
            Do you want to remove album <strong id="title"></strong>
          </div>
          <div class="hidden" id="id"></div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <a data-dismiss="modal" class="btn btn-danger" onclick="jquery_stuff; return false;" id="btn-remove-album">Remove</a>
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
                        <input type="text" class="" name="title" id="titleEdit" readonly>
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
          <div class="hidden" id="albumID"></div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <a data-dismiss="modal" class="btn btn-primary" onclick="jquery_stuff; return false;" id="btn-edit-album">Save</a>
          </div>
        </div>
        <!-- /#editModal -->

        <!-- BEGIN FOOTER -->
        <?php include('../assets/component/footer.php'); ?>

        <script src="../../assets/js/vendor/jquery-1.9.1.min.js"></script>
        <script src="../../assets/js/vendor/jquery-migrate-1.1.1.min.js"></script>
        <script src="../../assets/js/vendor/jquery-ui-1.10.0.custom.min.js"></script>
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>

        <script type="text/javascript" src="../../assets/js/lib/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/DT_bootstrap.js"></script>
        <script src="../../assets/js/lib/responsive-tables.js"></script>


        <script type="text/javascript" src="../../assets/js/main.js"></script>

        <script type="text/javascript">
            $(function() {

                metisTable();
            });
        </script>
    </body>
</html>