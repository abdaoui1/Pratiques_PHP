<?php


    $server = 'localhost';
    $user   = 'root';
    $password = '';
    $db       = 'tp4';
    // connection 
    $mysqli = new mysqli($server ,$user ,$password ,$db) OR
     die("Problem of connection ".$mysqli->connect_error );

     //echo '<a href="tp4.php?yes=123">clieck</a>';

?>