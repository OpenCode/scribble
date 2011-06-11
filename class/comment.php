<?php
	//write comment
	
	$comment_path = '../comments/';
	$path = $comment_path . $_POST['id'];
	$last_comment_id = $_POST['last_id'] + 1;
	
	//echo "$path-$last_comment_id" ;
	$comment =  $_POST['author'] . '¬' . $_POST['url'] . '¬' . $_POST['comment'];
	
	// create a directory with article id if it doesn't exist
	if(is_dir($path)==false)
	{
		mkdir($path, 0766);
	}
	
	// save the comment in a file
	
	$fh = fopen($path . '/' . $last_comment_id, 'w');
	fwrite($fh, $comment);
	fclose($fh);
	chmod($path . '/' . $last_comment_id, 0766);
	
		// save new last comment id
	include_once('file.php');
	writeLine("../parameters/last_comments_id", $_POST['id'], $last_comment_id);
	chmod("../parameters/last_comments_id", 0766);

	// redirect
	header("Location: ../article.php?id=" . $_POST['id']);

?>
