<?php

	$myCheck = $_POST['myCheck'];

	include($_SERVER['DOCUMENT_ROOT'] . "/class/file.php");
	foreach ($myCheck as $key => $value) {
			$title = readLine($_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles", $value);
		  echo $key . ') - Deleted "' . $title . '"<br />';
	}

?> 
