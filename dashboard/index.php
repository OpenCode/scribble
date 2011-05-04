	<!--This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.*/-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
  
	<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="author" lang="cs" content="David Kohout; http://www.davidkohout.cz" />
    <meta name="copyright" lang="cs" content="David Kohout; http://www.davidkohout.cz" />
    <meta name="description" content="..." />
    <meta name="keywords" content="..." />
    <meta name="robots" content="all,follow" />
    <link href="mycss/screen.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <title>Scribble Admin Board</title>
  </head>

  <body>
    <div id="layout">
        <div class="rbroundbox">
	         <div class="rbtop"><div></div></div>
		          <div class="rbcontent">	
          			<div class="content">
              		<h2>Scribble Admin Board</h2>
									<!-- go to site hmepage by button -->
									<br /><button onClick="parent.location='../index.php'" style="height: 50px; width: 200px" >Site</button>
              	</div>
              	<div id="panel-right"><div id="panel-right-inside">
									<p>
										<?php
											include($_SERVER['DOCUMENT_ROOT'] . "/class/articlesmanagement.php");
											include($_SERVER['DOCUMENT_ROOT'] . "/class/loginlog.php");
											include($_SERVER['DOCUMENT_ROOT'] . "/class/file.php");
											$last_article = LastArticle();
											$last_login = ReadLogInfo();
											$path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/id_articles";
											$last_title = readLine($path, $last_article);
											// data
											echo (date("l, d F Y")) . "<br /><br />";
											// articles number
											echo "There are <b>" . $last_article . "</b> articles<br/ >";
											// articles number
											echo "Last article title: <b>" . $last_title . "</b><br/ >";
											// last login
											echo "Last login: <b>" . $last_login . "</b><br/ >";
										?>
									</p>
             		</div>
							</div>	
          			
        		  </div>
	         			<div class="rbbot">
									<div></div>
								</div>
        			</div>

        <div id="main">
					<?php 
						include($_SERVER['DOCUMENT_ROOT'] . "/class/password_protect.php");	
						SaveLogInfo($login);
					?>
						<center>
						<b>SELECT:</b><br/ ><br/ >
						<button onClick="parent.location='newarticle.php'" style="height: 50px; width: 200px" >New article</button><br/ ><br/ >
						<button onClick="parent.location='deletearticle.php'" style="height: 50px; width: 200px" >Delete article</button><br/ ><br/ >
						<button onClick="parent.location='selectarticle.php'" style="height: 50px; width: 200px" >Change article</button><br/ ><br/ >
						<hr align="center" size="1" width="200" noshade>
						<br/ >
						<button onClick="parent.location='preferences.php'" style="height: 50px; width: 200px" >Preferences</button><br/ ><br/ >
						<button onClick="parent.location='index.php?logout=1'" style="height: 50px; width: 200px" >Logout</button><br/ ><br/ >
						<!-- utils link -->
						Scribble 
						<?php include($_SERVER['DOCUMENT_ROOT'] . "/other/version"); ?>
						 : 
 						<a href="https://github.com/OpenCode/scribble">Home page</a> | 
						<a href="https://github.com/OpenCode/scribble/wiki">Wiki</a> | 
						<a href="https://github.com/OpenCode/scribble/issues">Forum</a>
						</center>
						<br/ ><br/ >
        </div>
        </div>
        </div><div style="clear: both;"></div></div>
  </body>
</html>
