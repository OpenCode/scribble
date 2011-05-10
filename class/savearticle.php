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

		$title = $_POST['title'];
		$post = $_POST['editor'];

		// WRITE THE TITLE

				$file_path = "../parameters/id_articles";
				$fh = fopen($file_path, 'a');
				fwrite($fh, $title . "\n");
				fclose($fh);
		
		// WRITE THE POST

				include("articlesmanagement.php");

				$last_article = LastArticle("../parameters/last_article_id");
				$new_article = $last_article + 1;
				$file_path = "../articles/";
				$fh = fopen($file_path . $new_article, 'w');
				fwrite($fh, "<p>" . stripslashes($post) . "</p>");
				fclose($fh);
				chmod($file_path . $new_article, 0766);

		// REFRESH THE LAST ARTICLE ID

				$last_path = "../parameters/last_article_id";
				$fh = fopen($last_path, 'w');
				fwrite($fh, $new_article);
				fclose($fh);

		// REDIRECT

				header("Location: ../dashboard/redirect.php?id=" . $new_article);

?>
