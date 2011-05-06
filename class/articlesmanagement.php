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

	// return the id of the last published article
	function LastArticle()
	{
		// Set the directory
		$directory = $_SERVER['DOCUMENT_ROOT'] . "/parameters/last_article_id";
		$fh = fopen($directory, 'r');
		$contents = fread($fh, filesize($directory));
		fclose($fh);
		return $contents;
	}

	// Increment by 1 unit articles number value
	//function IncArticleNumber()

	// return the direct link to last published article
	function LastArticleUrl()
	{
		$last = LastArticle();
		$url = "../mb/article?id=" . $last;
		return $url;
	}

	// return the number of the valid article
	function ArticleNumber()
	{
		// Set the directory
		$directory = $_SERVER['DOCUMENT_ROOT'] . "/parameters/article_number";
		$fh = fopen($directory, 'r');
		$contents = fread($fh, filesize($directory));
		fclose($fh);
		return $contents;
	}

	// chenge the number of valid articles if they're added or deleted
	function AddArticle($value)
	{
		$directory = $_SERVER['DOCUMENT_ROOT'] . "/parameters/article_number";
		$fh = fopen($directory, 'w');
		fwrite($fh, $value);
		fclose($fh);
	}

	// create a list of all article archivied
	function CheckBoxFile($caption, $class)
	{
		include($_SERVER['DOCUMENT_ROOT'] . "/class/file.php");
		$structure = '<br /><form method="post" action="../' . $class . '.php">';
		$directory = $_SERVER['DOCUMENT_ROOT'] . "/articles";
		// Open the dir and read the file inside
			// Open the directory
			if ($directory_handle = opendir($directory)) {
				  // Control all the contents
				  while (($file = readdir($directory_handle)) !== false) {
				      // If the element is not egual to directory od . or .. fill the variable
				      if((!is_dir($file))&($file!=".")&($file!="..")){
								$title = readLine($_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles", $file);
								$structure = $structure . '<input type="checkbox" name="myCheck[' .  $file . ']" value="' . $file . '" /> ' . $title . '<br />';
							}
				  }
				    	closedir($directory_handle);
				}
		$structure = $structure . '<br /><input type="submit" value="' . $caption . '" /></form>';
		return $structure;
	}

	// print simply selected article title
	function PrintTitle($article_id, $title_tag)
	{
		include($_SERVER['DOCUMENT_ROOT'] . "/class/file.php");
		$path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles";
		$title = readLine($path, $article_id);
		$rich_title = '<' . $title_tag . '>"' . $title . '"</' . $title_tag . '>';
		echo "$rich_title";
	}

	// print simply selected article text
	function PrintArticle($article_id)
	{
		include($_SERVER['DOCUMENT_ROOT'] . "/articles/" . $article_id);
	}

	// change the title text
	function ReplaceTitle($id, $title)
	{
		$file_titles = $_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles";
		$rows = file($file_titles);
		$rows[$id - 1] = $title . "\n";
		file_put_contents($file_titles, $rows);
	}

	// change the article contents
	function ReplacePost($id, $post)
	{
		$file_path = $_SERVER['DOCUMENT_ROOT'] . "/articles/" . $id;
		$fh = fopen($file_path, 'w');
		fwrite($fh, $post);
		fclose($fh);
	}

	// Delete file
	function DeleteFile($file)
	{
		unlink($file);
	}

?>
