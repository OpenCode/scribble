<?php

	//initial page
	//This script show the hme page with the last article in the list
	include("class/articlesmanagement.php");

	$last_article = LastArticle();
	//show the last article found
	header("Location: mb/article.php?id=" . $last_article);

?>
