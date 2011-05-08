<?php

	/*This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.*/

	function SaveLogInfo($user)
	{
		//set log path
		$log_path = $_SERVER['DOCUMENT_ROOT'] . "/parameters/login.log";
		// set moment date and hour
		$data = date ("d-m-Y H:i:s");
		// write the file
		$fh = fopen($log_path, 'w');
		fwrite($fh, '[' . $user . '] ' . $data);
		fclose($fh);
		return TRUE;
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
