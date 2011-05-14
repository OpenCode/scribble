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

	header('Content-type: text/html; charset=utf-8');

	$title = $_POST['title'];
	$post = $_POST['editor'];
	$tags = $_POST['tags'];

	// write the title
	$file_path = '../parameters/id_articles';
	$fh = fopen($file_path, 'a');
	fwrite($fh, stripslashes($title) . "\n");
	fclose($fh);

	// write the tags
	$file_path = '../parameters/id_tags';
	$fh = fopen($file_path, 'a');
	fwrite($fh, stripslashes($tags) . "\n");
	fclose($fh);

	// write the date
	$file_path = '../parameters/id_date';
	$date = date("d F Y");
	$fh = fopen($file_path, 'a');
	fwrite($fh, $date . "\n");
	fclose($fh);
		
	// write the post
	include_once("articlesmanagement.php");

	$last_article = LastArticle('../parameters/last_article_id');
	$new_article = $last_article + 1;
	$file_path = '../articles/';
	$fh = fopen($file_path . $new_article, 'w');
	fwrite($fh, '<p>' . stripslashes($post) . '</p>');
	fclose($fh);
	chmod($file_path . $new_article, 0766);

	// refresh last article id
	$last_path = '../parameters/last_article_id';
	$fh = fopen($last_path, 'w');
	fwrite($fh, $new_article);
	fclose($fh);

	// redirect
	header("Location: ../dashboard/redirect.php?id=" . $new_article);

?>
