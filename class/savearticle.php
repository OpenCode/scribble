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

		$title = $_GET['title'];
		$post = $_GET['editor'];

		// append the new title in titles file
		$file_path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles";
		$fh = fopen($file_path, 'a');
		fwrite($fh, $title . "\n");
		fclose($fh);

		// save the file with post content
		include($_SERVER['DOCUMENT_ROOT'] . "/class/articlesmanagement.php");
		$last_article = ArticleNumber();
		$new_article = $last_article + 1;
		$file_path = $_SERVER['DOCUMENT_ROOT'] . "/articles/";
		$fh = fopen($file_path . $new_article, 'w');
		fwrite($fh, "<p>" . $post . "</p>");
		fclose($fh);
		chmod($file_path . $new_article, 0766);
		// refresh articles number
		AddArticle($new_article);
		
		// increse article number
		$last_id = LastArticle();
		echo $last_id;
		$new_id = $last_id + 1;
		echo "-" . $new_id;
		$last_path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/last_article_id";
		$fh = fopen($last_path, 'w');
		fwrite($fh, $new_id);
		fclose($fh);

		header("Location: ../dashboard/redirect.php?id=" . $new_article);

?>
