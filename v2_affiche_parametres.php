<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiche parametres</title>
</head>
<body>
    <!-- Verifier la bonne reception  -->
     <?php 
     if ( sizeof($_POST) == 0 )  
     {
        echo "aucune reception ";
        exit();
     } else // Bien recu 
     {
        
        echo 
        "<table>
            <tr>
                <th>Parametres :</th>
                <th>Valeurs :</th>
            </tr>";
        // recuperer les parametres 
        foreach ($_POST as $key => $value )
            {
                // valeur simple
                if ( !is_array($value) ) // not array
                {
                    echo 
                    '<tr>
                        <td>'.$key.'</td>
                        <td>'.$value.'</td>
                    </tr>';
                } else 
                {
                    foreach( $value as $key2 => $value2)
                    {
                        echo 
                    '<tr>
                        <td>'.$key2.'</td>
                        <td>'.$value2.'</td>
                    </tr>'  ;
                    }
                }
            }
        echo '</table>';
     }
     
     // Donnees du fichier (CV )
     if ( !isset($_FILES) )  
     {
        echo "aucune reception du CV";
        exit();
     } else // Bien recu 
     {
        echo 
        "<table>
            <tr>
                <th>Parametres :</th>
                <th>Valeurs :</th>
            </tr>";
        // recuperer les parametres 
        foreach ($_FILES as $key => $value )
            {
                // valeur simple
                if ( !is_array($value) ) // not array
                {
                    echo 
                    '<tr>
                        <td>'.$key.'</td>
                        <td>'.$value.'</td>
                    </tr>';
                } else 
                {
                    foreach( $value as $key2 => $value2)
                    {
                        echo 
                    '<tr>
                        <td>'.$key2.'</td>
                        <td>'.$value2.'</td>
                    </tr>'  ;
                    }
                }
            }
        echo '</table>';
     }
     ?>
    
</body>
</html>