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
						echo '<br/><br/><center>Article available!!!<center>';
						echo 'Visit it here: <a href="' . '../article.php?id=' . $_GET['id'] . '">LINK</a>' ;
					?>	
					<br/ ><br/ >
        </div>
        </div>
        </div><div style="clear: both;"></div></div>
  </body>
</html>
