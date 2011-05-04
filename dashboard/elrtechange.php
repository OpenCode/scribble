	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<!-- jQuery and jQuery UI -->
	<script src="js/jquery-1.4.4.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery-ui-1.8.7.custom.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="css/smoothness/jquery-ui-1.8.7.custom.css" type="text/css" media="screen" charset="utf-8">

	<!-- elRTE -->
	<script src="js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="css/elrte.min.css" type="text/css" media="screen" charset="utf-8">

	<!-- elRTE translation messages -->
	<script src="js/i18n/elrte.ru.js" type="text/javascript" charset="utf-8"></script>

	<script type="text/javascript" charset="utf-8">
		$().ready(function() {
			var opts = {
				cssClass : 'el-rte',
				// lang     : 'ru',
				height   : 250,
				toolbar  : 'maxi',
				cssfiles : ['css/elrte-inner.css']
			}
			$('#editor').elrte(opts);
		})
	</script>

	<style type="text/css" media="screen">
		body { padding:20px;}
	</style>
	
	<div id="editor">
	<?php 
		include($_SERVER['DOCUMENT_ROOT'] . "/articles/" . $_GET['id']); 
	?>
	</div>
