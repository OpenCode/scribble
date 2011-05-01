<?php

	function LastArticle()
	{
		// Set the directory
		$directory = "articles";
		// Open the dir and read the file inside
			// Open the directory
			if ($directory_handle = opendir($directory)) {
				  // Control all the contents
				  while (($file = readdir($directory_handle)) !== false) {
				      // If the element is not egual to directory od . or .. fill the variable
				      if((!is_dir($file))&($file!=".")&($file!=".."))
				          //$last_article = $file
									$last_article = $file;
				    	}
				    	// Close directory reading
				    	closedir($directory_handle);
				}
		return $last_article;
	}

?>
