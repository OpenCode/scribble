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

	$myCheck = $_POST['myCheck'];
	echo "check\n";

	include("articlesmanagement.php");
	echo "include\n";
	foreach ($myCheck as $key => $value) 
	{
			ReplaceTitle($key, '~~~~~~~~~~');
			echo "replatetitle\n";
			$new_number = LastArticle();
			echo "new_numer " . $new_number . "\n";
			DeleteFile($_SERVER['DOCUMENT_ROOT'] . "/articles/" . $key);
			echo "delete\n";
			$numb_to_ins = --$new_number;
			echo "decrese " . $numb_to_ins . "\n";
			AddArticle($numb_to_ins);
			echo "addarticle\n";
	}

	header("Location: ../dashboard/redirect.php?id=" . '0');

?> 
