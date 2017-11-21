<?php
Extract($_POST);
$file=fopen("mess.txt","a");
fwrite($file,$name."*");
fwrite($file,$email."*");
fwrite($file,$message."\n");
echo "Succesfully Recorded";
fclose($file);
?>
