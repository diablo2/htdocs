<?php
    include('../../setting/connect.php');
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
                            <!--Begin Datatables-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="icon-user"></i></div>
                                            <h5>User Table</h5>
                                        </header>
                                        <div id="collapse4" class="body">
                                            <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="hidden">ID</th>
                                                        <th>StudentID</th>
                                                        <th>Fristname</th>
                                                        <th>Surname</th>
                                                        <th>Department</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        include('action/user.class.php');
                                                        $result = user::show();
                                                        $i = 0;
                                                        while ($row = mysql_fetch_array($result)) {

                                                        $i++;
                                                        echo '<tr id="tr'.$row['id'].'">
                                                                <td>'.$i.'</td>
                                                                <td class="hidden">'.$row['id'].'</td>
                                                                <td>'.$row['studentID'].'</td>
                                                                <td>'.$row['fristname'].'</td>
                                                                <td>'.$row['surname'].'</td>
                                                                <td>'.$row['nameEn'].'</td>
                                                                <td>
                                                                    <button class="btn btn-mini edit"><i class="icon-edit"></i></button>
                                                                    <button class="btn btn-mini btn-danger remove"><i class="icon-remove"></i></button>
                                                                </td>
                                                              </tr>';
                                                        }
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
        
        <script src="../../assets/js/vendor/jquery-migrate-1.1.1.min.js"></script>
        <!--
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
        <script>window.jQuery.ui || document.write('<script src="../../assets/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')</script>
        -->
        <script src="../../assets/js/vendor/jquery-1.9.1.min.js"></script>
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