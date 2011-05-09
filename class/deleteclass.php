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

	include("articlesmanagement.php");
	foreach ($myCheck as $key => $value) 
	{
			ReplaceTitle($key, '~~~~~~~~~~');
			$new_number = ArticleNumber("../parameters/article_number");
			DeleteFile("../articles/" . $key);
			$numb_to_ins = --$new_number;
			AddArticle($numb_to_ins);
	}

	header("Location: ../dashboard/index.php");

?> 
