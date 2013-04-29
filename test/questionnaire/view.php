<!--
* jquery-form-builder-plugin - JQuery WYSIWYG Web Form Builder
* http://code.google.com/p/jquery-form-builder-plugin/
*
* Revision: @REVISION
* Version: @VERSION
* Copyright 2011 Lim Chee Kin (limcheekin@vobject.com)
*
* Licensed under Apache v2.0 http://www.apache.org/licenses/LICENSE-2.0.html
*
* Date:  
 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>JQuery Form Builder Plugin</title>
<script type="text/javascript" src="lib/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="lib/js/jquery-ui-1.8.7.custom.min.js"></script>
<script type="text/javascript" src="lib/js/jquery.json-2.2.min.js"></script>
<script type="text/javascript" src="lib/js/jquery.qtip.min.js"></script>
<!--DEV--><script type="text/javascript" src="js/jquery.formbuilder.core.js"></script>
<!--DEV--><script type="text/javascript" src="js/jquery.formbuilder.widget.js"></script>
<!--DEV--><script type="text/javascript" src="js/jquery.formbuilder.plaintext.js"></script>
<!--DEV--><script type="text/javascript" src="js/jquery.formbuilder.singlelinetext.js"></script>
<!--DEV--><script type="text/javascript" src="js/jquery.formbuilder.linetext.js"></script>
<!--DEV--><script type="text/javascript" src="js/jquery.formbuilder.select.js"></script>
<!--DEV--><script type="text/javascript" src="js/jquery.formbuilder.multiplechoice.js"></script>
<!--DEV--><script type="text/javascript" src="js/jquery.formbuilder.multiplecheckboxes  .js"></script>
<!--DEV--><script type="text/javascript" src="js/jquery.colorpicker.js"></script>
<!--DEV--><script type="text/javascript" src="js/jquery.fontpicker.js"></script>
<!--PROD.JS-->
<link type="text/css" href="lib/css/smoothness/jquery-ui-1.8.7.custom.css" media="screen" rel="stylesheet" /> 
<link type="text/css" href="lib/css/uni-form.css" media="screen" rel="stylesheet" />  
<link type="text/css" href="lib/css/default.uni-form.css" media="screen" rel="stylesheet" />  
<link type="text/css" href="lib/css/jquery.qtip.css" media="screen" rel="stylesheet" />
<!--DEV--> <link type="text/css" href="css/jquery.formbuilder.core.css" media="screen" rel="stylesheet" />   
<!--DEV--> <link type="text/css" href="css/jquery.formbuilder.plaintext.css" media="screen" rel="stylesheet" />
<!--DEV--><link type="text/css" href="css/jquery.colorpicker.css" media="screen" rel="stylesheet" />  
<!--DEV--><link type="text/css" href="css/jquery.fontpicker.css" media="screen" rel="stylesheet" /> 
<!--PROD.CSS-->
<!-- Bootstrap Css -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/designAdmin.css" rel="stylesheet">


</head>

  <body class="container">
    <div class="container-fluid contain">
      <?php
      //-----------------------------------------------
      //    Get url value & get value in array
      //-----------------------------------------------
      $query  = explode('&', $_SERVER['QUERY_STRING']);
      $params = array();

      foreach( $query as $param )
      {
        list($name, $value) = explode('=', $param);
        $params[urldecode($name)][] = urldecode($value);
        // echo urldecode($name) . " : " . urldecode($value) . "<br>";
      }
      echo $params['name'][0]."<br><BR>";
      echo $params['settings'][0]."<br><BR>";
      $header = json_decode($params['settings'][0],true);
      echo $header['en']['name'];

      // Create Header Form
      echo '<div class="row-fluid>';
      echo    '<div class="formHeading centerAlign">';
      echo      '<h2 class="heading">'.$header['en']['name'].'</h2>';
      echo    '</div>';
      echo '</div>';

      $obj = json_decode($params['fields[1].settings'][0],true);

      // $i = 0;
      // while (isset($params['fields['.$i.'].name'][0])){
      //   echo $params['fields['.$i.'].type'][0];
      //   switch ($params['fields['.$i.'].type'][0]) {
      //     case "PlainText":
      //         echo "i is apple";
      //         break;
      //     case "Select":
      //         echo "i is bar";
      //         break;
      //     case "MultipleChoice":
      //         echo "i is cake";
      //         break;
      //     case 'MultipleCheckboxes':
      //           # code...
      //         break;
      //   }
      //   $i++;
      // }

      // obj = jQuery.parseJSON(urldecode($_SERVER['QUERY_STRING']));
      ?>
      <div id="questionnaire">
        <div class="row-fluid">
          <div class="span12">

          </div>
        </div>
      </div>
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
    <script type="text/javascript">
      $(function(){
        $('#questionnaire').append('ttttttttt');

      });
    </script>

</body></html>