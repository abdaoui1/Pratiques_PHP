<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP 4</title>
</head>
<body>

    <h1>Liste des etudiants</h1>
    <a href="add_student.php">Ajouter un etudiant</a>
    <table>
        <tr>
            <th>CNE</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>SEXE</th>
            <th>DATE DE NAISSANCE</th>
            <th>ADRESSE</th>
            <th>ACTIONS</th>
        </tr>
        <?php
            require_once 'connection.php';
            
            // Fetching data from DB to complete the table
            $stmt = $mysqli->prepare('select * from etudiant');
            $stmt->execute();

            $stmt->bind_result($cne ,$nom ,$prenom ,$date ,$sexe ,$adresse);
            while ( $stmt->fetch() )
            {
                echo "<tr>";
                    
                echo "<td>".$cne."</td>"    ;
                echo "<td>".$nom."</td>"    ;
                echo "<td>".$prenom."</td>" ;
                echo "<td>".$sexe."</td>"   ;
                echo "<td>".$date."</td>"   ;
                echo "<td>".$adresse."</td>"    ;
                echo '<td><a href="tp4.php?cne_update='.$cne.'">Modification</a>' ;
                echo '&nbsp;&nbsp;<a href="tp4.php?cne_delete='.$cne.'">Suppression </a>';
                echo '</td> </tr>'    ;
                
                
            }

            // delete : 
            if (  $_SERVER["REQUEST_METHOD"] == 'POST' && isset( $_POST['cne_delete'] )  )
            $stmt = $mysqli->prepare('delete from etudiant where cne= ? ');
            $stmt->bind_param("s" , $_POST['cne_delete']);
            if ( $stmt->execute() ) 
            $h_or_f = ($sexe == 'H')? '':'e' ; // boy or girl for french accord
            echo "<h1> Etudiant".$h_or_f."Supprimé".$h_or_f." avec succes </h1>";
        ?>
    </table>
    
</body>
</html>