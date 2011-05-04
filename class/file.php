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

	function readLine($file, $line_num, $delimiter="\n")
	{
		  /*** set the counter to one ***/
		  $i = 1;
	 
		  /*** open the file for reading ***/
		  $fp = fopen( $file, 'r' );
	 
		  /*** loop over the file pointer ***/
		  while ( !feof ( $fp) )
		  {
		      /*** read the line into a buffer ***/
		      $buffer = stream_get_line( $fp, 1024, $delimiter );
		      /*** if we are at the right line number ***/
		      if( $i == $line_num )
		      {
		          /*** return the line that is currently in the buffer ***/
		          return $buffer;
		      }
		      /*** increment the line counter ***/
		      $i++;
		      /*** clear the buffer ***/
		      $buffer = '';
		  }
		  return false;
	}

?>
