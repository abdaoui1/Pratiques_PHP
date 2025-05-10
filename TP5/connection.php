<?php

            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'tp4_php';
            $mysqli = new mysqli(  $hostname, $username, $password , $database );
            

            if ( $mysqli === false ) { echo 'Erreur de Connexion'; }

?>