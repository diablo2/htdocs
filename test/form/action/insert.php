<?php
	// Insert Questionair in database
	include ('../../setting/connect.php');
 		//-----------------------------------------------
      	//    Get url value & get value in array
      	//-----------------------------------------------
	    $query  = explode('&', $_SERVER['QUERY_STRING']);
	    $params = array();

	    foreach( $query as $param )
	      {
	        list($name, $value) = explode('=', $param);
	        $params[urldecode($name)][] = urldecode($value);
	        // echo urldecode($name). " : " .urldecode($value) .'<br>';
	      }
	      $header = json_decode($params['settings'][0],true);
	      $hName = $header['en']['name'];

	// Insert To Database
		$question = $_SERVER['QUERY_STRING'];
		   	$sql = "INSERT INTO `questionnaire` (`name`, `question`, `creator`, `createDate`) VALUES ('$hName','$question',1,now())";
		    $result_insert_question = mysql_query($sql);

			if (!$result_insert_question){
			    echo "Query insert question fail";
			}

?>