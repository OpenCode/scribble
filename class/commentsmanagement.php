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

	define('COMMENT', 'comments/');

	// print simply selected comments text
	function PrintComments($article_id)
	{
		$path = COMMENT;
		if (file_exists($path . $article_id) == false){
			echo '<p>No comment! Insert your here!</p>';
		}else{
			include($path . '/' . $article_id);
		}

	}
	
	//show the comment form
	function CommentForm()
	{
		echo '
		<center><table border="1" cellpadding="10" style="width: 75%">
			<tr>
				<td>
				<form name="comment" action= "comment.php" method="POST">
					<label><input type="text">  Your name</label><br />
					<label><input type="text">  Your site</label><br /><br />
					Comment<br />
						<textarea name="testo" style="width: 100%"></textarea>
					<br /><br />
					<input type="submit" value="Comment!">
				</form>
				</td>
			</tr>
		</table></center>';
	} 
	
	//show a button that calls the comment form
	function CommentButton($article_id)
	{
		$redirect = "article.php?id=$article_id";
		echo '<div align="right">
		<form name="comment_button" action= "../' . $redirect . '" method="POST">
			<input type="hidden" name="show_comment" value="1" />
			<input type="submit" value="Comment!">
		</form></div>';
	}
	
	// manages the comment
	function Comments($article_id, $comment_show)
	{
		PrintComments($article_id);
		#echo ' DEBUG ' . $comment_show;
		if ($comment_show == 1)
		{
			CommentForm();
		} else {
			CommentButton($article_id);
		}
	}

?>
