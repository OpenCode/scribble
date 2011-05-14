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

	header('Content-type: text/html; charset=utf-8');

	$title = $_POST['title'];
	$post = $_POST['editor'];
	$id = $_POST['article_id'];
	$tags = $_POST['tags']; 

	// replace the new title in titles file
	include("articlesmanagement.php");
	ReplaceTitle($id, $title);
	ReplacePost($id, $post);
	ReplaceTags($id, $tags);

	header("Location: ../dashboard/redirect.php?id=" . $id);

?>
