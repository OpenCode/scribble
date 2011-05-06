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

		// WRITE THE TITLE

				$file_path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles";
				$fh = fopen($file_path, 'a');
				fwrite($fh, $title . "\n");
				fclose($fh);
		
		// WRITE THE POST

				include($_SERVER['DOCUMENT_ROOT'] . "/class/articlesmanagement.php");

				$last_article = LastArticle();
				$new_article = $last_article + 1;
				$file_path = $_SERVER['DOCUMENT_ROOT'] . "/articles/";
				$fh = fopen($file_path . $new_article, 'w');
				fwrite($fh, "<p>" . $post . "</p>");
				fclose($fh);
				chmod($file_path . $new_article, 0766);

		// REFRESH THE LAST ARTICLE ID

				$last_path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/last_article_id";
				$fh = fopen($last_path, 'w');
				fwrite($fh, $new_article);
				fclose($fh);

		// INCRESE NUMBER OF ARTICLE

				$old_id = ArticleNumber();
				$new_id = $old_id + 1;
				AddArticle($new_id);

		// REDIRECT

				header("Location: ../dashboard/redirect.php?id=" . $new_article);

?>
