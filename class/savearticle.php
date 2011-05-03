<?php	

	$title = $_GET['title'];
	$post = $_GET['editor'];

	// append the new title in titles file
	$file_path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles";
	$fh = fopen($file_path, 'a');
	fwrite($fh, $title . "\n");
	fclose($fh);

	// save the file with post content
	include($_SERVER['DOCUMENT_ROOT'] . "/class/articlesmanagement.php");
	$last_article = LastArticle();
	$new_article = $last_article + 1;
	$file_path = $_SERVER['DOCUMENT_ROOT'] . "/articles/";
	$fh = fopen($file_path . $new_article, 'w');
	fwrite($fh, "<p>" . $post . "</p>");
	fclose($fh);

?>
