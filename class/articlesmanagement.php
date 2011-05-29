<?php

	// return the id of the last published article

	define('ARTICLE_HOME', 'article.php');
	define('ARTICLE', 'articles/');
	define('TITLES_FILE','parameters/id_articles');
	define('TAGS_FILE', 'parameters/id_tags');
	define('DATE_FILE', 'parameters/id_date');

	function LastArticle($directory)
	{
		// Set the directory
		$fh = fopen($directory, 'r');
		$contents = fread($fh, filesize($directory));
		fclose($fh);
		return $contents;
	}

	// simil to LastArticle but this return only a valid article and not deleted file
	function LastValidArticle($path, $id)
	{
		$new_id = (int)$id;
		if ($new_id == 0){
			return $new_id;
		}else if (file_exists($path . $new_id) == FALSE){
			return LastValidArticle($path, $new_id - 1);
		}else{
			return $new_id;
		}
	}

	// return the direct link to last published article
	function LastArticleUrl($path, $path_home)
	{
		$last = LastArticle($path);
		$id = LastValidArticle($last);
		if ($id == 0){ 
			return ""; 
		}else{ 
			$url = $path_home . '?id=' . $id;
			return $url;
		}
	}

	// return the number of the valid article
	function ArticleNumber($directory)
	{
		$count = count(glob($directory . '*'));
		return $count;
	}

	// create a list of all article archivied
	function CheckBoxFile($caption, $class)
	{
		include_once('file.php');
		$structure = '<br /><form method="post" action="../' . $class . '.php">';
		$directory = "../articles";
		// Open the dir and read the file inside
			// Open the directory
			if ($directory_handle = opendir($directory)) {
				  // Control all the contents
				  while (($file = readdir($directory_handle)) !== false) {
				      // If the element is not egual to directory od . or .. fill the variable
				      if((!is_dir($file))&($file!=".")&($file!="..")){
								$title = readLine('../parameters/id_articles', $file);
								$structure = $structure . '<input type="checkbox" name="myCheck[' .  $file . ']" value="' . $file . '" /> ' . $title . '<br />';
							}
				  }
				    	closedir($directory_handle);
				}
		$structure = $structure . '<br /><input type="submit" value="' . $caption . '" /></form>';
		return $structure;
	}

	// Get the page complete address
	function GetPageAddress()
	{
		$url ="http://{$_SERVER['HTTP_HOST']}{$_SERVER['SCRIPT_NAME']}";
		$url.="?";
		$url.="{$_SERVER['QUERY_STRING']}";
		return $url;
	}

	// return a specificated article title
	function GetTitle($path, $article_id)
	{
		if ($article_id == 0){
			return '';
		}else{
			include_once('file.php');
			$title = readLine($path, $article_id);
			return $title;
		}
	}

	// print simply selected article title
	function PrintTitle($article_id, $title_tag)
	{
		if (file_exists('articles/' . $article_id) == false){
			echo '<' . $title_tag . '>"NO ARTICLE"</' . $title_tag . '>';
		}else{
			$path = TITLES_FILE;
			$title = GetTitle($path, $article_id);
			$rich_title = '<' . $title_tag . '>"' . $title . '"</' . $title_tag . '>';
			echo "$rich_title";
		}
	}

	// print simply selected article text
	function PrintArticle($article_id)
	{
		$path = ARTICLE;
		if (file_exists($path . $article_id) == false){
			echo '<p>Sorry! No file found with this identification number</p>';
		}else{
			include($path . '/' . $article_id);
		}

	}

	// print article tags
	function PrintTags($article_id)
	{
		$path = TAGS_FILE;
		if (file_exists(ARTICLE . $article_id) == true){
			include_once('file.php');
			$tags = readLine($path, $article_id);
			echo $tags;
		}
	}

	// print date of article creation
	function PrintDate($article_id)
	{
		$path = DATE_FILE;
		if (file_exists(ARTICLE . $article_id) == true){
			include_once('file.php');
			$date = readLine($path, $article_id);
			echo $date;
		}
	}

	// change the title text
	function ReplaceTitle($id, $title)
	{
		include_once('file.php');
		$file_titles = '../parameters/id_articles';
		writeLine($file_titles, $id, stripslashes($title));
		chmod($file_titles, 0777);
	}

	// change the article contents
	function ReplacePost($id, $post)
	{
		$file_path = '../articles/' . $id;
		$fh = fopen($file_path, 'w');
		fwrite($fh, stripslashes($post));
		fclose($fh);
		chmod($file_path, 0777);

	}

	// change tags
	function ReplaceTags($id, $tags)
	{
		include_once('file.php');
		$file_tags = '../parameters/id_tags';
		writeLine($file_tags, $id, stripslashes($tags));
		chmod($file_tags, 0777);
	}

	// Delete file
	function DeleteFile($file)
	{
		unlink($file);
	}

	//show the previous valid URL
	// $id = actual id article
	// $text = the text we want show ancorated with valid URL
	function PreviousUrl($id, $text)
	{
		$path = ARTICLE;
		$new_id = $id - 1;
		// if id=0 this is the first article, so don't show text
		if ($new_id == 0){
			return "";
		// jump an article because this is deleted
		}else if (file_exists($path . $new_id) == false){
			return PreviousUrl($new_id, $text);
		}else{
			$string = '<a href="' . ARTICLE_HOME . '?id=' . $new_id . '">' . $text . '</a>';
			return $string;
		}
 	}

	// show the next valid URL
	// $id = actual id article
	// $text = the text we want show ancorated with valid URL
	function NextUrl($id, $text)
	{
		$path = ARTICLE;
		$new_id = $id + 1;
		$last = LastArticle('parameters/last_article_id');
		if ($new_id > (int)$last)
		{
			return "";	
		// jump an article because this is deleted
		}else if (file_exists($path . $new_id) == false){
			return NextUrl($new_id, $text);	
		}else{
			$string = '<a href="' . ARTICLE_HOME . '?id=' . $new_id . '">' . $text . '</a>';
			return $string;
		}
 	}

	// print the site name saved in parameters/preferences
	function PrintSiteName()
	{
		$name = GetTitle('parameters/preferences', 2);
		echo $name;
	}

	// print the site description saved in parameters/preferences
	function PrintSiteDescription()
	{
		$description = GetTitle('parameters/preferences', 3);
		echo $description;
	}

?>
