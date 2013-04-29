<?php
    include('../../setting/connect.php');
    include('action/public_relation.class.php');
    date_default_timezone_set("Asia/Bangkok");

    $headerName = ' Public Relation'; 
    $icon = 'icon-picture'; // Icon Header
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Editor</title>
        <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
        <meta name="viewport" content="width=device-width">
        <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap-responsive.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome.min.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/style.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/prettify.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/wysiwyg-color.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/bootstrap-wysihtml5-0.0.2.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/wmd.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/jquery.cleditor.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/DT_bootstrap.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/jquery.plupload.queue.css"/>
        <link type="text/css" rel="stylesheet" href="../../assets/css/validationEngine.jquery.css"/>
        <link rel="stylesheet" href="../../assets/css/jasny-bootstrap.min.css" />
        <link rel="stylesheet" href="../../assets/css/jasny-bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../../assets/css/responsive-tables.css">
        
        <link rel="stylesheet" href="../../assets/css/theme.css">
        
        <script type="text/javascript" src="../../assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="../../assets/css/font-awesome-ie7.min.css"/>
        <![endif]-->
    </head>
    <body>
        <!-- #wrap -->
        <div id="wrap">

            <!-- BEGIN TOP BAR -->
            <?php include('../assets/component/top-bar.php'); ?>

            <!-- BEGIN HEADER.head -->
            <?php include('../assets/component/header.php'); ?>

            <!-- BEGIN LEFT  -->
            <?php include('../assets/component/side-bar.php'); ?>

            <!-- #content -->
            <div id="content" class="">
                <!-- .outer -->
                <div class="container-fluid outer">
                    <div class="row-fluid">
                        <!-- .inner -->
                        <div class="span12 inner">
                            
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="icon-plus"></i></div>
                                            <h5>Add Public Relation</h5>
                                            <ul class="nav pull-right">
                                                <li>
                                                    <div class="btn-group">
                                                        <a class="accordion-toggle btn btn-mini minimize-box" data-toggle="collapse"
                                                           href="#cleditorDiv">
                                                            <i class="icon-minus"></i>
                                                        </a>
                                                        <button class="btn btn-mini btn-danger close-box"><i
                                                                class="icon-remove"></i></button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </header>
                                        <div id="wmd-button-bar" class="btn-toolbar hidden"></div>
                                            <div id="cleditorDiv" class="body collapse in">
                                                <div id="wmd-input" >
                                                <form id="inline-validate" class="form-horizontal" method="post" action="action/add.php" enctype="multipart/form-data">
                                                    <div class="control-group">
                                                        <label for="text1" name="topic" class="control-label">Topic</label>
                                                        <div class="controls with-tooltip">
                                                            <input type="text" id="text1" name="topicPR" class="span6 input-tooltip" data-placement="bottom">
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                    <label class="control-label">Department</label>

                                                    <div class="controls">
                                                        <select class="span6" name="department">
                                                            <?php
                                                                $result = pr::showDepartment();
                                                                while ($row = mysql_fetch_array($result)) {
                                                            ?>
                                                                <option value="<?=$row['id']?>"><?=$row['nameEn']?></option>
                                                            <?php      
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Image Name</label>
                                                    <div class="controls">
                                                        <input type="text" name="imageName" class="span6"> 
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Image Upload</label>
                                                    <div class="controls">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden">
                                                            <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;"></div>
                                                            <div>
                                                                <span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="uploadImage" ></span>
                                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="text1" class="control-label">Content</label>
                                                    <div class="controls with-tooltip">
                                                        <textarea id="cleditor" name="content" class="span6"></textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Creator</label>

                                                    <div class="controls">
                                                        <input class="span6" type="text" value="read only" readonly="">
                                                        <input type="hidden" value="1" name="creator">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label">Create Date</label>
                                                    <div class="controls">
                                                        <input class="span6" type="text" value="<?=date('l jS \of F Y h:i A') ?>" readonly="">
                                                    </div>
                                                </div>

                                                    <div class="form-actions no-margin-bottom" id="cleditorForm">
                                                        <input type="submit" value="Submit" class="btn btn-primary">    
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                        
                                <!--Begin Datatables-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="icon-user"></i></div>
                                            <h5>Public Relation Table</h5>
                                        </header>
                                        <div id="collapse4" class="body">
                                            <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="hidden">ID</th>
                                                        <th>Topic</th>
                                                        <th>Department</th>
                                                        <th>Image</th>
                                                        <th>Create Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        
                                                        $result = pr::show();
                                                        $i = 0;
                                                        while ($row = mysql_fetch_array($result)) {

                                                        $i++;
                                                        echo '<tr id="tr'.$row['id'].'">
                                                                <td>'.$i.'</td>
                                                                <td class="hidden">'.$row['id'].'</td>
                                                                <td>'.$row['topic'].'</td>
                                                                <td>'.$row['department'].'</td>
                                                                <td>'.$row['imgName'].'</td>
                                                                <td>'.date("Y-m-d",strtotime($row['createDate'])).'</td>
                                                                <td>
                                                                    <button class="btn btn-mini edit"><i class="icon-eye-open"></i></button>
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
            <!-- /#content -->
            <!-- #push do not remove -->
            <div id="push"></div>
            <!-- /#push -->
        </div>
        <!-- /#wrap -->

        <div class="clearfix"></div>
        <div id="footer">
            <p>2013 © Metis Admin</p>
        </div>


        <!-- #removeModal -->
        <div id="removeModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
             aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="editModalLabel"><i class="icon-edit"></i> Remove User</h3>
            </div>
          <div class="modal-body">
            Do you want to remove : <strong id="col2"></strong> 
          </div>
          <div class="hidden" id="userid"></div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <a data-dismiss="modal" class="btn btn-danger" onclick="jquery_stuff; return false;" id="btn-remove">Remove</a>
          </div>
        </div>
        <!-- /#removeModal -->
       
        <script src="../../assets/js/vendor/jquery-1.9.1.min.js"></script>
        <script src="../../assets/js/vendor/jquery-migrate-1.1.1.min.js"></script>
        <script src="../../assets/js/vendor/jquery-ui-1.10.0.custom.min.js"></script>
        <!--
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
        <script>window.jQuery.ui || document.write('<script src="../../assets/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')</script>
-->
        
        <script src="../../assets/js/vendor/bootstrap.min.js"></script>


        <script type="text/javascript" src="../../assets/js/lib/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/DT_bootstrap.js"></script>
        <script src="../../assets/js/lib/responsive-tables.js"></script>
        <!-- JS Form editor -->
        <!-- // <script type="text/javascript" src="../../assets/js/lib/bootstrap-progressbar.min.js"></script> -->
        <script type="text/javascript" src="../../assets/js/lib/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.nicescroll.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/prettify.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/wysihtml5-0.4.0pre.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/bootstrap-wysihtml5-0.0.2.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.cleditor.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/Markdown.Converter.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/Markdown.Sanitizer.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/Markdown.Editor.js"></script>
        <!-- JS Upload -->
        <script type="text/javascript" src="../../assets/js/lib/jquery.form.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/plupload.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/plupload.html5.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/plupload.html4.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.plupload.queue.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.form.wizard-min.js"></script>  
        <!--
        // 
        // <script type="text/javascript" src="../../assets/js/lib/jquery.gritter.min.js"></script>
        // <script type="text/javascript" src="../../assets/js/lib/jquery.uniform.min.js"></script>
        -->
        <!-- JS Validation -->
        <script type="text/javascript" src="../../assets/js/lib/jquery.cookie.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/languages/jquery.validationEngine-en.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jasny-bootstrap.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lib/jquery.validate.min.js"></script>

        <script type="text/javascript" src="../../assets/js/main.js"></script>

        <script>
            $(function() {
                formValidation();
                formWysiwyg();
                metisTable();
                
                
                // formWizard();
            });
        </script>
        
        <script type="text/javascript" src="../../assets/js/style-switcher.js"></script>
    </body>
</html>