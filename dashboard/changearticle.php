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
              		<h2>Scribble Admin Board | Change article</h2>
									<!-- go to site homepage by button -->
									<br />
									<button onClick="parent.location='index.php'" style="height: 50px; width: 200px" >Dashboard</button>
              	</div>
              	<div id="panel-right"><div id="panel-right-inside">
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
					$myCheck = $_POST['myCheck'];
					foreach ($myCheck as $key => $value) 
					{
							$id = $key;
							break;
					}
					include($_SERVER['DOCUMENT_ROOT'] . "/class/file.php");
						$title = readLine($_SERVER['DOCUMENT_ROOT'] . '/parameters/id_articles', $id);
						echo '<form name="editorhtml" method="post" action="../class/changearticle.php">';
						echo '<b>Title:   </b><input type="test" name="title" value="' . $title . '"';
						echo '<b>         Article Id:   </b><input type="test" name="article_id" value=' . $id . ' readonly><br/><br/>';
						include("elrte.html");
						include($_SERVER['DOCUMENT_ROOT'] . "/articles/" . $id);
						echo '</div>';
						echo '<br/><br/><input type="submit" value="publish">';
						echo '</form> ';			
					echo '<center><a href="' . 'changearticle.php?logout=1">Logout</a></center>'
					?>
						<br/ ><br/ >
        </div>
        </div>
        </div><div style="clear: both;"></div></div>
  </body>
</html>
