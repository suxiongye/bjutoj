<?php
$fp=fopen("D:\\Apache24\\htdocs\\bjutoj\\corefiles\\problems\\5.txt",'w');
if(!$fp) echo "can't save in file";
fwrite($fp,"test");
fclose($fp);
echo "save success";
?>