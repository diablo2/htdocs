<?php

$sql = "SELECT questionnaire.id, questionnaire.name,questionnaire.createDate,count(questionnaireanswer.idaccount) as count 
		FROM `questionnaire` 
		left OUTER JOIN questionnaireanswer 
			on questionnaire.id = questionnaireanswer.idQuestionnaire
		AND questionnaireanswer.idAccount = 1 ";
		
$sql .= $where ." group by questionnaire.id ";

?>