<?php

	/*This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.*/

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
