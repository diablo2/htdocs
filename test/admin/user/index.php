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
        <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap-responsive.min.css">
        <link type="text/css" rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="../assets/css/style.css">

        <link type="text/css" rel="stylesheet" href="../assets/css/DT_bootstrap.css"/>
        <link rel="stylesheet" href="../assets/css/responsive-tables.css">
        <link rel="stylesheet" href="../assets/css/theme.css">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="../assets/css/font-awesome-ie7.min.css"/>
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
                                            <div class="icons"><i class="icon-user"></i></div>
                                            <h5>User Table</h5>
                                        </header>
                                        <div id="collapse4" class="body">
                                            <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Rendering engine</th>
                                                        <th>Browser</th>
                                                        <th>Platform(s)</th>
                                                        <th>Engine version</th>
                                                        <th>CSS grade</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Trident</td>
                                                        <td>
                                                            Internet
                                                            Explorer
                                                            4.0
                                                        </td>
                                                        <td>Win 95+</td>
                                                        <td>4</td>
                                                        <td>X</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Trident</td>
                                                        <td>Internet
                                                            Explorer 5.0
                                                        </td>
                                                        <td>Win 95+</td>
                                                        <td>5</td>
                                                        <td>C</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Trident</td>
                                                        <td>Internet
                                                            Explorer 5.5
                                                        </td>
                                                        <td>Win 95+</td>
                                                        <td>5.5</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Trident</td>
                                                        <td>Internet
                                                            Explorer 6
                                                        </td>
                                                        <td>Win 98+</td>
                                                        <td>6</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Trident</td>
                                                        <td>Internet Explorer 7</td>
                                                        <td>Win XP SP2+</td>
                                                        <td>7</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Trident</td>
                                                        <td>AOL browser (AOL desktop)</td>
                                                        <td>Win XP</td>
                                                        <td>6</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Firefox 1.0</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.7</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Firefox 1.5</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Firefox 2.0</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Firefox 3.0</td>
                                                        <td>Win 2k+ / OSX.3+</td>
                                                        <td>1.9</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Camino 1.0</td>
                                                        <td>OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Camino 1.5</td>
                                                        <td>OSX.3+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Netscape 7.2</td>
                                                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                                                        <td>1.7</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Netscape Browser 8</td>
                                                        <td>Win 98SE+</td>
                                                        <td>1.7</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Netscape Navigator 9</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Mozilla 1.0</td>
                                                        <td>Win 95+ / OSX.1+</td>
                                                        <td>1</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Mozilla 1.1</td>
                                                        <td>Win 95+ / OSX.1+</td>
                                                        <td>1.1</td>
                                                        <td>A</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Mozilla 1.2</td>
                                                        <td>Win 95+ / OSX.1+</td>
                                                        <td>1.2</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Mozilla 1.3</td>
                                                        <td>Win 95+ / OSX.1+</td>
                                                        <td>1.3</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Mozilla 1.4</td>
                                                        <td>Win 95+ / OSX.1+</td>
                                                        <td>1.4</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Mozilla 1.5</td>
                                                        <td>Win 95+ / OSX.1+</td>
                                                        <td>1.5</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Mozilla 1.6</td>
                                                        <td>Win 95+ / OSX.1+</td>
                                                        <td>1.6</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Mozilla 1.7</td>
                                                        <td>Win 98+ / OSX.1+</td>
                                                        <td>1.7</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Mozilla 1.8</td>
                                                        <td>Win 98+ / OSX.1+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Seamonkey 1.1</td>
                                                        <td>Win 98+ / OSX.2+</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gecko</td>
                                                        <td>Epiphany 2.20</td>
                                                        <td>Gnome</td>
                                                        <td>1.8</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Webkit</td>
                                                        <td>Safari 1.2</td>
                                                        <td>OSX.3</td>
                                                        <td>125.5</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Webkit</td>
                                                        <td>Safari 1.3</td>
                                                        <td>OSX.3</td>
                                                        <td>312.8</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Webkit</td>
                                                        <td>Safari 2.0</td>
                                                        <td>OSX.4+</td>
                                                        <td>419.3</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Webkit</td>
                                                        <td>Safari 3.0</td>
                                                        <td>OSX.4+</td>
                                                        <td>522.1</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Webkit</td>
                                                        <td>OmniWeb 5.5</td>
                                                        <td>OSX.4+</td>
                                                        <td>420</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Webkit</td>
                                                        <td>iPod Touch / iPhone</td>
                                                        <td>iPod</td>
                                                        <td>420.1</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Webkit</td>
                                                        <td>S60</td>
                                                        <td>S60</td>
                                                        <td>413</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Presto</td>
                                                        <td>Opera 7.0</td>
                                                        <td>Win 95+ / OSX.1+</td>
                                                        <td>-</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Presto</td>
                                                        <td>Opera 7.5</td>
                                                        <td>Win 95+ / OSX.2+</td>
                                                        <td>-</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Presto</td>
                                                        <td>Opera 8.0</td>
                                                        <td>Win 95+ / OSX.2+</td>
                                                        <td>-</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Presto</td>
                                                        <td>Opera 8.5</td>
                                                        <td>Win 95+ / OSX.2+</td>
                                                        <td>-</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Presto</td>
                                                        <td>Opera 9.0</td>
                                                        <td>Win 95+ / OSX.3+</td>
                                                        <td>-</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Presto</td>
                                                        <td>Opera 9.2</td>
                                                        <td>Win 88+ / OSX.3+</td>
                                                        <td>-</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Presto</td>
                                                        <td>Opera 9.5</td>
                                                        <td>Win 88+ / OSX.3+</td>
                                                        <td>-</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Presto</td>
                                                        <td>Opera for Wii</td>
                                                        <td>Wii</td>
                                                        <td>-</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Presto</td>
                                                        <td>Nokia N800</td>
                                                        <td>N800</td>
                                                        <td>-</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Presto</td>
                                                        <td>Nintendo DS browser</td>
                                                        <td>Nintendo DS</td>
                                                        <td>8.5</td>
                                                        <td>C/A<sup>1</sup></td>
                                                    </tr>
                                                    <tr>
                                                        <td>KHTML</td>
                                                        <td>Konqureror 3.1</td>
                                                        <td>KDE 3.1</td>
                                                        <td>3.1</td>
                                                        <td>C</td>
                                                    </tr>
                                                    <tr>
                                                        <td>KHTML</td>
                                                        <td>Konqureror 3.3</td>
                                                        <td>KDE 3.3</td>
                                                        <td>3.3</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>KHTML</td>
                                                        <td>Konqureror 3.5</td>
                                                        <td>KDE 3.5</td>
                                                        <td>3.5</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tasman</td>
                                                        <td>Internet Explorer 4.5</td>
                                                        <td>Mac OS 8-9</td>
                                                        <td>-</td>
                                                        <td>X</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tasman</td>
                                                        <td>Internet Explorer 5.1</td>
                                                        <td>Mac OS 7.6-9</td>
                                                        <td>1</td>
                                                        <td>C</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tasman</td>
                                                        <td>Internet Explorer 5.2</td>
                                                        <td>Mac OS 8-X</td>
                                                        <td>1</td>
                                                        <td>C</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Misc</td>
                                                        <td>NetFront 3.1</td>
                                                        <td>Embedded devices</td>
                                                        <td>-</td>
                                                        <td>C</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Misc</td>
                                                        <td>NetFront 3.4</td>
                                                        <td>Embedded devices</td>
                                                        <td>-</td>
                                                        <td>A</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Misc</td>
                                                        <td>Dillo 0.8</td>
                                                        <td>Embedded devices</td>
                                                        <td>-</td>
                                                        <td>X</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Misc</td>
                                                        <td>Links</td>
                                                        <td>Text only</td>
                                                        <td>-</td>
                                                        <td>X</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Misc</td>
                                                        <td>Lynx</td>
                                                        <td>Text only</td>
                                                        <td>-</td>
                                                        <td>X</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Misc</td>
                                                        <td>IE Mobile</td>
                                                        <td>Windows Mobile 6</td>
                                                        <td>-</td>
                                                        <td>C</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Misc</td>
                                                        <td>PSP browser</td>
                                                        <td>PSP</td>
                                                        <td>-</td>
                                                        <td>C</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other browsers</td>
                                                        <td>All others</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>U</td>
                                                    </tr>
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

        <!-- BEGIN FOOTER -->
        <?php include('../assets/component/footer.php'); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="../assets/js/vendor/jquery-migrate-1.1.1.min.js"></script>
        <!--
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js"></script>
        <script>window.jQuery.ui || document.write('<script src="../assets/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')</script>
        -->

        <script src="../assets/js/vendor/bootstrap.min.js"></script>

        <script type="text/javascript" src="../assets/js/lib/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="../assets/js/lib/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="../assets/js/lib/DT_bootstrap.js"></script>
        <script src="../assets/js/lib/responsive-tables.js"></script>
        <script type="text/javascript">
            $(function() {
                metisTable();
            });
        </script>
        <script type="text/javascript" src="../assets/js/main.js"></script>
        
        



    </body>
</html>