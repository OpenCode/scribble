<?php

	//initial page
	//This script show the hme page with the last article in the list

	// Set the directory
	$directory = "articles";
	// Open the dir and read the file inside
	if (is_dir($directory)) {
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
	}

	//show the last article found
	header("Location: article.php?id=" . $last_article);

?>
