<?php

	include 'file.php';
	$file_path = '../parameters/preferences';

	writeLine($file_path, 1, $_POST['url']);
	writeLine($file_path, 2, $_POST['name']);
	writeLine($file_path, 3, $_POST['decription']);

	header("Location: ../dashboard/preferences.php?id=1");

?>
