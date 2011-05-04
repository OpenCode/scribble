<?php

	function SaveLogInfo()
	{
		//set log path
		$log_path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/login.log";
		// set moment date and hour
		$data = date ("d-m-Y H:i:s");
		// write the file
		$fh = fopen($log_path, 'w');
		fwrite($fh, $data);
		fclose($fh);
	}

	function ReadLogInfo()
	{
		//set log path
		$log_path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/login.log";
		$handle = fopen($log_path, "r");
		$contents = fread($handle, filesize($log_path));
		fclose($handle);
		return $contents;
	}

?>
