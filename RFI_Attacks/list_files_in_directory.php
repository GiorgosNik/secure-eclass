<?php 

   //------ List Files in directory
   $path    = '../../../../';
   $files = scandir($path);
   $files = array_diff(scandir($path), array('.', '..'));
   foreach($files as $file){
   echo "<a href='$file'>$file</a>\n";
   }

?>
