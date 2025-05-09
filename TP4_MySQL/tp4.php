<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP 4</title>

<style>

    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    padding: 20px;
}

h1.liste {
    text-align: center;
    color: #dc3545;
    margin-bottom: 20px;
}

a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

th, td {
    border: 1px solid #dee2e6;
    padding: 10px;
    text-align: center;
}

th {
    background-color: #0d6efd;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

td a {
    margin: 0 5px;
    padding: 5px 10px;
    border-radius: 4px;
}

td a:first-child {
    background-color: #ffc107;
    color: black;
}

td a:last-child {
    background-color: #dc3545;
    color: white;
}

</style>

</head>
<body>

    <h1 class="liste">Liste des etudiants</h1>
    <a href="add_student.php">Ajouter un etudiant</a><br><br>
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

             // delete : 
             if (  $_SERVER["REQUEST_METHOD"] == 'GET' && isset( $_GET['cne_delete'] )  )
                deleteStudent( $mysqli , $_GET['cne_delete'] );
            /* this function take the $mysqli that define in connection.php and , 
            * cne of the student that will be deleted 
            */

            

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
                echo '<td><a href="update_student.php?cne_update='.$cne.'">Modification</a>' ;
                echo "&nbsp;&nbsp;<a href='tp4.php?cne_delete=$cne' onclick='return confirm (\"Voulez-vous vraiment supprimer cet etudiant \"); '";
                echo " >Suppression </a>";
                echo '</td> </tr>'    ;
                
                
            }
            
            
            
            function deleteStudent($mysqli, $cneOfStdToDelete) {
                        // Prepare the SQL DELETE statement
            $stmt = $mysqli->prepare("DELETE FROM etudiant WHERE cne = ?");
            if (!$stmt) {
                echo "Erreur de préparation : " . $mysqli->error;
                return;
            }

            // Bind the parameter (assuming CNE is a string)
            $stmt->bind_param("s", $cneOfStdToDelete );

            // Execute the query
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    echo "<h1>Étudiant avec le CNE $cneOfStdToDelete supprimé avec succès.</h1>";
                } else {
                    echo "<h1>Aucun étudiant trouvé avec le CNE $cneOfStdToDelete </h1>";
                }
            } else {
                echo "Erreur d'exécution : " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }
            
        ?>
    </table>
    
</body>
</html>