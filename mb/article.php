<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">

<head>
	<title>e-ware.org</title>
	<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen, tv, projection" />
</head>

<body>

	<div id="container">
		<div id="logo">
 		<h1><span class="pink">e-ware.org</span> / blog</h1>
 	</div>
		 
	<div class="br"></div>

 	<div id="navlist">
		<ul>
			<li><a href="#" class="active">Blog</a></li>
			<li><a href="#">Site</a></li>
			<li><a href="#">Shop</a></li>
		</ul>
	</div>

 	<div id="content">
 		<h3>
			<?php
				include($_SERVER['DOCUMENT_ROOT'] . "/class/file.php");
				$article_id=$_GET['id'];
				$title = readLine($_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles", $article_id);
				echo "$title";
			?>
		</h3>
 			<?php
				include($_SERVER['DOCUMENT_ROOT'] . "/articles/" . $article_id);
			?>
		
 			<p><center><<< Precedente | Successiva >>></center></p>
		
	</div>

	<div class="br"></div>
	
	<div id="footer">
		<p >Copyright &copy; 2011 | <a href="http://www.willr.co.nz">design by willr</a></p> 
		<br />
	</div>

</body>

</html>
