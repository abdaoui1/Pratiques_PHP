<?php

include_once "Info_Discussion.php";

$myObject = new Info_Discussion('abdessamad','abdaoui','abdssamadabdaoui@gmail.com','settat','maroc','hello','','','non');
$hisObject = new Info_Discussion('omar','abdaoui','omarabdaoui@gmail.com','settat','france','hello','','','non');

$abdessamad = serialize( $myObject);


$omar = serialize( $hisObject);

if (file_put_contents( 'serialize_objects.txt', $abdessamad. "\n" , FILE_APPEND) ) ;
// file_put_contents('serialize_objects.txt','\n');
if (file_put_contents( 'serialize_objects.txt', $omar. "\n" , FILE_APPEND) ) ;


 echo   "<h1>first echo file_get_contents('file.txt' ); </h1>";
    $fp = fopen('serialize_objects.txt', 'r');

    $obj1 = unserialize(   trim( fgets($fp )  ));
     // trim is a function trim Strip whitespace (or other characters) from the beginning and end of a string
    echo gettype( $obj1);
    echo $obj1->getNom();
    
    
echo    "<h1>second echo file_get_contents('file.txt' ); </h1>";
echo unserialize(  trim(  fgets($fp ) ) );

fclose($fp);












?>