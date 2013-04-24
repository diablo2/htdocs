<?php
	include ('../../setting/connect.php');

	$query  = explode('&', $_SERVER['QUERY_STRING']);
	$params = array();
	$sequence = array();
	$numSeq = 0 ;
	foreach( $query as $param )
		{
			list($name, $value) = explode('=', $param);
			$params[urldecode($name)][] = urldecode($value);
			echo urldecode($name). " : " .urldecode($value) .'<br>';
			if (substr_count(urldecode($name), 'fields')) {
				$sequence[$numSeq] = substr(urldecode($name), 7 ,1);
				$numSeq++;
			}	
		}
		echo '<br><br>';
		$formId = $params['formId'][0];
		echo 'FormID :' .$formId;
		$fields = 0;
		$ans ="";
		for ($i = 0 ;$i < $numSeq; $i++){

			if (count($params['fields'.$fields]) == 1){
				$ans = $params['fields'.$fields][0];
			} else {
				for($j = 0 ; $j < count($params['fields'.$fields]) ; $j++){
					$ans .= $params['fields'.$fields][$j].',';
					$i++;
				}
				$i--;
			}
			
			echo $ans.' : ' . $i . ' j:'.$j .' k:'. $fields.'<br> ';

			$sql = "INSERT INTO `questionnaireanswer` (`idQuestionnaire`,`fieldsQuestion`,`answer`,`idAccount`,`dateTime`) VALUES ('$formId','$fields','$ans',1,now())";
			$result_insert_ans = mysql_query($sql) or die(mysql_error());

			$fields++;
			$j = 0;
			$ans= "";		
		}


?>