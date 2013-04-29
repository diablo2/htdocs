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
<!--DEV--><script type="text/javascript" src="js/jquery.formbuilder.multiplecheckboxes	.js"></script>
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
<script type="text/javascript">
$(function() {
 $('#container').formbuilder();
 $('div.buttons').children().button();
 });
</script>
<style type="text/css">

		
</style>
</head>

<body class="container">
<div id="container" class="contain-fluid">
  <div id="header"><h1>JQuery Form Builder Plugin</h1></div>
  <div class="row-fluid">
	  	<div class="span12">
	  	<form id="builderForm" method="get" action="action/answer.php" class="uniForm">

				 	<?php
				 		include ('../setting/connect.php');
				 		
				 		//-----------------------------------------------
				      	//    Get url value & get value in array
				      	//-----------------------------------------------
					    // $query  = explode('&', $_SERVER['QUERY_STRING']);
					    $id = base64_decode($_GET['key']); // Get url value

				 		//-----------------------------------------------
				      	//    Query questionair form database
				      	//-----------------------------------------------
					    $sql = "SELECT * FROM `questionnaire` WHERE id LIKE $id";
					    $result = mysql_query($sql);
					    $row = mysql_fetch_array($result);
					    $query = explode('&', $row['question']);

				 		//-----------------------------------------------
				      	//    Create questionair
				      	//-----------------------------------------------
					    $params = array();
					    $sequence = array();
					    $numSeq = 0 ;
					    foreach( $query as $param )
					      {
					        list($name, $value) = explode('=', $param);
					        $params[urldecode($name)][] = urldecode($value);
					        // echo urldecode($name). " : " .urldecode($value) .'<br>';
					        if (substr_count(urldecode($name), 'sequence')) {
					        	$sequence[$numSeq] = substr(urldecode($name), 7 ,1);
					        	$numSeq++;
					        }
					      }
					    echo 	'<input type="hidden" id="name" name="formId" value="'.$id.'" />'
							.	'<input type="hidden" id="settings" name="settings" value="'.$numSeq.'"/>';
						// Set value
					    $header = json_decode($params['settings'][0],true);
					    $hName = $header['en']['name'];
					    $hClasses = $header['en']['classes'][0];
					    $hHeading = $header['en']['heading'];
					    $hFontFamily = 'font-family: '.$header['en']['styles']['fontFamily'] .';';
					    $hFontSize = 'font-size: '.$header['en']['styles']['fontSize'] .'px;';
					    $hFontStyle = "";
			             

					    if ($header['en']['styles']['fontStyles'][0] == 1) {
					    	$hFontStyle .= "font-weight: bold;" ;
					    	} else {
					    	$hFontStyle .= "font-weight: normal;" ;	
					    	}
				    	if ($header['en']['styles']['fontStyles'][1] == 1) {
				    		$hFontStyle .='font-style: italic;';
				    	  	} else {
				    	  	$hFontStyle .='font-style: normal;';	
				    	  	}
				    	if ($header['en']['styles']['fontStyles'][2] == 1) {
				    		$hFontStyle .= 'text-decoration: underline;';
				    	  	} else {
				    	  		$hFontStyle .= 'text-decoration: none;';
				    	  	}
				    	$hStyle = 'color: #'.$header['styles']['color'] .'; background-color: #'.$header['styles']['backgroundColor'] .';';

			  			echo '<div id="builderPanel" style="'.$hStyle .$hFontFamily. $hFontSize.'" >';	
						echo    '<div class="formHeading"></div>';
				 		echo 		'<fieldset>';		    	

						// Create Header Form
					  	echo '<div class="row-fluid">';
					    echo    '<div class="formHeading '.$hClasses.' span12">'
					    			. '<'.$hHeading.' class="heading" style="'.$hFontStyle.'">'
					    			. $hName.'</'.$hHeading.'>'
					    		 .'</div>';
					    echo '</div>';

						$j = 0;
						while (isset($params['fields['.$j.'].type'][0])){
								$i = $sequence[$j];
								$id = $params['fields['.$i.'].id'][0];
								$Name = $params['fields['.$i.'].name'][0];
								$Type = $params['fields['.$i.'].type'][0];
								$settings = json_decode($params['fields['.$i.'].settings'][0],true);
								$Label = $settings['en']['label'];
								$Value = $settings['en']['value'];
								$Description = $settings['en']['description'];
								
								$Required = '';
								if (isset($settings['required']) && $settings['required']){
									$Required = '*';
								}
								
								$FontFamily = 'font-family: '.$settings['en']['styles']['fontFamily'] .';';
							    $FontSize = 'font-size: '.$settings['en']['styles']['fontSize'] .'px;';
							    $FontStyle = "";
							    if ($settings['en']['styles']['fontStyles'][0] == 1) {
							    		$FontStyle .= "font-weight: bold;" ;
							    	} else {
							    		$FontStyle .= "font-weight: normal;" ;	
							    	}
						    	if ($settings['en']['styles']['fontStyles'][1] == 1) {
						    			$FontStyle .='font-style: italic;';
						    	  	} else {
						    	  		$FontStyle .='font-style: normal;';	
						    	  	}
						    	if ($settings['en']['styles']['fontStyles'][2] == 1) {
						    			$FontStyle .= 'text-decoration: underline;';
						    	  	} else {
						    	  		$FontStyle .= 'text-decoration: none;';
						    	  	}
						    	if (isset($settings['styles']['color'])){
						    		$style = 'color: #'.$settings['styles']['color'] .'; background-color: #'.$settings['styles']['backgroundColor'] .';';
						    	}						    	
						    	if (isset($settings['styles']['label']['color'])){
						    		$styleLabel = 'color: #'.$settings['styles']['label']['color'] .'; background-color: #'.$settings['styles']['label']['backgroundColor'] .';';
						    	}
						   		if (isset($settings['styles']['value']['color'])) {
						   			# code...
						   			$styleValue = 'color: #'.$settings['styles']['value']['color'] .'; background-color: #'.$settings['styles']['value']['backgroundColor'] .';';
						   		}
						   		if (isset($settings['styles']['description']['color'])) {
						   			# code...
						   			$styleDescription = 'color: #'.$settings['styles']['description']['color'] .'; background-color: #'.$settings['styles']['description']['backgroundColor'] .';';
						   		}
						   		
							switch ($params['fields['.$i.'].type'][0]) {
								case 'SingleLineText':
									# code...
									echo '<div class="ctrlHolder row-fluid '.$Type.'" style="'.$styleLabel.'" rel="0">'
										.	'<div class="span12">'
										.	'<label>'
										.		'<em>'.$Required.'</em>'
										.		'<span>'.$Name.'</span>'
										.	'</label>'
										.	'<input type="text" name="fields'.$j.'" class="textInput" style="'.$styleValue.'">'
										.	'<p class="formHint" style="'.$styleDescription.'">'.$Description.'</p>'
										.	'</div>'
										.	'</div>';

									break;
								case 'Select':
									# code...
									$option = explode("\n", $Description);

									echo '<div class="ctrlHolder row-fluid" style="'.$styleLabel.'" rel="0">'
										.	'<div>'
										.	'<label>'
										.		'<span>'.$Name.'</span>'
										.	'</label>'
										.	'</div>' 
										.	'<select class="'.$Value.'" id="selectOption" name="fields'.$j.'">';
										foreach ($option as $key => $value) {
											# code...
											echo '<option value="'.$value.'" >'.$value.'</option>';
										}
												// <option value="First Choice">First Choice</option> 				<option value="Second Choice">Second Choice</option> 				<option value="Third Choice">Third Choice</option> 				
										echo	'</select>'
										.'</div>';
									break;
								case 'MultipleChoice':
									# code...
									$option = explode("\n", $Description);

									echo	'<div class="ctrlHolder row-fluid" style="'.$styleLabel.'" rel="0">'
										.	'<label>'
										.		'<span>'.$Name.'</span>'
										.	'</label>'
										.	'<div id="radioOption" class="row-fluid" style="'.$styleDescription.'">';
										foreach ($option as $key => $value) {
											# code...
											echo 	'<label id="radio" class="'.$Value.'">'
											 	.		'<input type="radio" name="fields'.$j.'" class="option" value="'. $value .'"> '. $value 
											 	.	'</label>';
										}
										echo '</div></div>';
									break;
								case 'MultipleCheckboxes':
									# code...
									$option = explode("\n", $Description);
									echo	'<div class="ctrlHolder row-fluid" style="'.$styleLabel.'" rel="0">'
										.		'<div class="span12">'
										.			'<label>'
										.				'<span>'.$Name.'</span>'
										.			'</label>'
										.			'<div id="checkboxOption" class="row-fluid" style="'.$styleDescription.'">';
										foreach ($option as $key => $value) {
											echo 	'<label id="checkbox" class="span12">'
										.				'<input type="checkbox" name="fields'.$j.'" value="'.$value.'"> '.$value
										.			'</label>';
										}
			
										echo	'</div></div></div>';
									break;
								case 'PlainText':
									# code...

									echo	'<div class="ctrlHolder '.$Value[1].'" style="'. $style.'" rel="0">'
										.		'<div class="PlainText '.$Value[0].'" style="'.$FontFamily . $FontSize . $FontStyle.'">'.$Name.''
										.		'</div>'
										.	'</div>';
									break;
								default:
									# code...
									break;
							}
					        	$j++;
					      }

					?>
			  	</fieldset>
			  	<center><button class="btn btn-large" type="submit">Submit</button></center>
	  			</div>
		</form>
		</div>	  
	</div>
</div>
</body>
</html>