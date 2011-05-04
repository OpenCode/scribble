<?php

	function LastArticle()
	{
		// Set the directory
		$directory = $_SERVER['DOCUMENT_ROOT'] . "/articles";
		// Open the dir and read the file inside
			// Open the directory
			if ($directory_handle = opendir($directory)) {
				  // Control all the contents
				  while (($file = readdir($directory_handle)) !== false) {
				      // If the element is not egual to directory od . or .. fill the variable
				      if((!is_dir($file))&($file!=".")&($file!=".."))
									$last_article = $file;
				    	}
				    	// Close directory reading
				    	closedir($directory_handle);
				}
		return $last_article;
	}

	function CheckBoxFile($caption, $class)
	{
		//set variable and include
		include($_SERVER['DOCUMENT_ROOT'] . "/class/file.php");
		$structure = '<br /><form method="post" action="../class/' . $class . '.php">';
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
