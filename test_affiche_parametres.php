<?php 
$fp = fopen('C:\wamp64\www\Tp1\tp1_CVs\test_file.txt','w' );
$res = fwrite($fp, 'a 10:03 line in my file');
fclose($fp);
echo 'done';

?>