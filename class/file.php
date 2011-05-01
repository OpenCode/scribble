<?php

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
