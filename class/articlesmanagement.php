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

	function LastArticle()
	{
		// Set the directory
		//$directory = $_SERVER['DOCUMENT_ROOT'] . "/articles";
		$directory = $_SERVER['DOCUMENT_ROOT'] . "/parameters/article_number";
		$fh = fopen($directory, 'r');
		$contents = fread($fh, filesize($directory));
		fclose($fh);
		return $contents;
	}

	function AddArticle($value)
	{
		$directory = $_SERVER['DOCUMENT_ROOT'] . "/parameters/article_number";
		$fh = fopen($directory, 'w');
		fwrite($fh, $value);
		fclose($fh);
	}

	function CheckBoxFile($caption, $class)
	{
		//set variable and include
		include($_SERVER['DOCUMENT_ROOT'] . "/class/file.php");
		$structure = '<br /><form method="post" action="../dashboard/' . $class . '.php">';
		// Set the directory
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
				    	// Close directory reading
				    	closedir($directory_handle);
				}
		$structure = $structure . '<br /><input type="submit" value="' . $caption . '" /></form>';
		return $structure;
	}

	// function to print simply selected article title
	function PrintTitle($article_id, $title_tag)
	{
		include($_SERVER['DOCUMENT_ROOT'] . "/class/file.php");
		$path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles";
		$title = readLine($path, $article_id);
		$rich_title = '<' . $title_tag . '>"' . $title . '"</' . $title_tag . '>';
		echo "$rich_title";
	}

	// function to print simply selected article text
	function PrintArticle($article_id)
	{
		include($_SERVER['DOCUMENT_ROOT'] . "/articles/" . $article_id);
	}

?>
