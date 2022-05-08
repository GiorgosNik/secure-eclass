<?php 
   //---- Copy a file to the courses directory and read the contents
   copy('/etc/passwd', './passwd.txt');
   echo readfile("./passwd.txt");
?>
