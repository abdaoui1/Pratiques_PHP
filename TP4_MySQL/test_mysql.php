<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



     <?php 
        // Open a connection with the DB


        $url = 'localhost';
        $user = 'root';
        $pwd = '';
        $db =   'test';
        // __________________ Methode 1 : mysqli_connect -----------------------------

        // $dbd = mysqli_connect( null , $user , $pwd , $db );
        
        // if ( !$dbd ) 
        // { echo '<h1> Echc de la connexion </h1>'.mysqli_connect_error();     }
        // else {echo '<h1> connection reussiee </h1>';}
        
        // __________________ Methode 2 : mysqli class -----------------------------


        
        // $mysqli = new mysqli($url , $user , $pwd , $db);
        
        // if ( $mysqli->connect_error )
        // {
        //     echo '<h1>Error de connction </h1>'.$mysqli->connect_error ;

        // }
        // else echo "connxtion reussie . ";
    
    

        //  // ----------- Normal query -----------------//
        //  $resulet = $mysqli->query('select * from tab;');
        //  $i = 0;
        //  while ( $row = $resulet->fetch_assoc() )
           
        //     echo '<h1>row '.$i++.' = '.$row['nom'].'</h1>' ;

        
$name = "Abdessamad";
echo "<h1>Hello $name</h1>";


          

    ?> 
    
</body>
</html>