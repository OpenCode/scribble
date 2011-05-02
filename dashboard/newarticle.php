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
    <link href="css/screen.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <title>Scribble Admin Board</title>
  </head>

  <body>
    <div id="layout">
        <div class="rbroundbox">
	         <div class="rbtop"><div></div></div>
		          <div class="rbcontent">	
          			<div class="content">
              		<h2>Scribble Admin Board | New article</h2>
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
					include($_SERVER['DOCUMENT_ROOT'] . "/class/password_protect.php");	
					?>					

					<div id="menu">
					</div>

					<div id="sample">
						<script src="../class/nicedit/nicEdit.js" type="text/javascript"></script>
						<script type="text/javascript">
						bkLib.onDomLoaded(function() {
						new nicEditor({iconsPath : '../class/nicedit/nicEditorIcons.gif'}).panelInstance('area1');
						new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html','image']}).panelInstance('area1');
						});
						</script>

						<textarea id="area1" style="width: 100%;">
						</textarea>

					</div>

					<?php
					echo '<center><a href="' . 'newarticle.php?logout=1">Logout</a></center>'
					?>
					<br/ ><br/ >
        </div>
        </div>
        </div><div style="clear: both;"></div></div>
  </body>
</html>
