<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">

<head>
	<title>
	<?php  
		include_once('class/articlesmanagement.php');
		PrintSiteName(); 
	?>
	</title>
	<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen, tv, projection" />
</head>

<body>

	<div id="container">
		<div id="logo">
 		<h1>
			<span class="pink">
				<?php PrintSiteName(); ?>
			</span>
			<?php PrintSiteDescription(); ?>
		</h1>
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
			<?php
				PrintTitle($_GET['id'], 'h3');
				PrintArticle($_GET['id']);
				echo '<div align="right"><i>'; 
				PrintDate($_GET['id']);
				echo "</i> - ";
				echo '<b>Tags:     </b>';
				PrintTags($_GET['id']); 
				echo '</div>';
			?>
		
 			<p><center><?php echo PreviousUrl($_GET['id'], 'Previous') . '     ' . NextUrl($_GET['id'], 'Next') ?></center></p>
		
	</div>

	<div class="br"></div>
	
	<div id="footer">
		<p >Copyright &copy; 2011 | <a href="http://www.willr.co.nz">design by willr</a></p> 
		<br />
	</div>

</body>

</html>
