<?php
	//write comment
	
	$comment_path = '../comments/';
	$path = $comment_path . $_POST['id'];
	$last_comment_id = $_POST['last_id'] + 1;
	$comment_text = $_POST['comment'];
	$author = $_POST['author'];
	$url = $_POST['url'];
	
	//echo "$path-$last_comment_id" ;
	
	$comment = $author . '¬' . $url . '¬' . $comment_text;
	
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
	chmod("../parameters/last_comments_id", 0766);
	$rows = file("../parameters/last_comments_id");
	$rows[$_POST['id'] - 1] = $last_comment_id . "\n";
	file_put_contents("../parameters/last_comments_id", $rows);
	
	// redirect
	header("Location: ../article.php?id=" . $_POST['id']);



?>
