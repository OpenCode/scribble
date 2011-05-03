<?php	
	$title = $_GET['title'];
	$post = $_GET['editor'];
	echo $title . '<br/>';
	echo $post . '<br/>';

	// append the new title in titles file
	$file_path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles";
	$fh = fopen($file_path, 'a');
	fwrite($fh, $title . "\n");
	fclose($fh);

	// save the file with post content

?>
