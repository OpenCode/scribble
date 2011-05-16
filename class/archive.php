<?php

	require_once('zip.php');

	// zip file name
  $zipfilename = 'backup' . date("Y F d") . '.zip'; 

	// path with files
	if ($_GET['type'] == '1')
	{
		$ad_dir = '../articles'; 
	}else{
		$ad_dir = '../parameters'; 
	}
  

  $zipfile = new zipfile();

  if ($handle = opendir($ad_dir)) { 
     while (false !== ($file = readdir($handle))) {
        if (!is_dir($file) && $file != "." && $file != ".." ) {
          $f_tmp = @fopen( $ad_dir . '/' . $file, 'r'); 

          if($f_tmp){
            $dump_buffer=fread( $f_tmp, filesize($ad_dir . '/' . $file)); // keep the content
            $zipfile -> addFile($dump_buffer,$file); // add file to zip
            fclose( $f_tmp );
          }
        }
     } 
   } else { 
       echo "Impossible to open $ad_dir.";
	   exit;
	  }

  $dump_buffer = $zipfile -> file(); // dump del file
  // write the file to disk:
  /*
  $file_pointer = fopen('newzip.zip', 'w');
  if($file_pointer){
    fwrite( $file_pointer, $dump_buffer, strlen($dump_buffer) );
    fclose( $file_pointer );
  }
  */

  // response zip archive to browser:
  header('Pragma: public');
  header('Content-type: application/zip');
  header('Content-length: ' . strlen($dump_buffer));
  header('Content-Disposition: attachment; filename="'.$zipfilename.'"');
  
  echo $dump_buffer; // stampo il contenuto del file

?>
