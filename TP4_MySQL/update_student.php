<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Etudiant</title>

    <style>
    body {
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
        padding: 20px;
    }

    h1 {
        color: #333;
        text-align: center;
    }

    form {
        background-color: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }

    table {
        width: 100%;
    }

    td {
        padding: 10px;
        vertical-align: top;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
    }

    input[type="submit"],
    button , a {
        padding: 10px 20px;
        margin-top: 10px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button {
        background-color: #dc3545;
        margin-left: 10px;
    }

      a {
        background-color: green;
        margin-left: 10px;
    }

    input[type="submit"]:hover,
    button:hover , a:hover {
        opacity: 0.9;
    }

    textarea {
        resize: vertical;
    }
</style>


</head>
<body style="background-color:gray;">
    
    
    <?php
        //  student .   // Firstly a test -> sumbited or didn't yet
        if (  $_SERVER["REQUEST_METHOD"] == 'GET' && isset( $_GET['cne_update'] )  )
        // isset( $_POST ) because , the post it's always set 
        //  This condition will always be true, because $_POST is always set (even if it's empty).

        {
            require_once 'connection.php';
            // First fetch the old data 
            $query_select = "SELECT * FROM etudiant WHERE cne='".$_GET['cne_update'] . "' ; " ;
            $result = $mysqli->query( $query_select );

            
            if ( $result->num_rows > 0 ) {
                // echo "<h1>Hello inside if </h1>";
                while ( $row = $result->fetch_assoc() ) {
                    
                    extract( $row );
                    echo "<form  method='post' action='update_student.php'>";
                    echo "<input type='hidden' name='original_cne' value=$CNE >";
                    echo "<table><tr>";
                    echo "<td><label for='cne' >CNE : </label></td>";
                    echo "<td><input type='text' id='cne' name='cne' value='$CNE'></td>";
                    echo "</tr><tr><td><label >Nom : </label></td>";
                    echo "<td><input type='text' name='nom' value='$nom'></td></tr>";
                    echo "<tr><td><label >Prenom : </label></td>";
                    echo "<td><input  type='text' name='prenom' value='$prenom'></td></tr>";
                    echo "<tr><td><label >Sexe : </label></td>";
                    echo "<td><input type='radio' name='sexe' value='H' ".( ($sexe === 'H')? "checked" : '') ."> ";
                    echo "<label for='sexe'>Masculin</label>";
                    echo "<input type='radio' name='sexe' value='F' "    .( ($sexe === 'F')? "checked" : '') .">";
                    echo "<label for='sexe'>Feminin</label></td> </tr>";
                    echo "<tr><td><label >Date de Naissance : </label></td>";
                    echo "<td><input type='date' name='date' value='$dateNaissance' ></td> </tr>";
                    echo "<tr><td><label >Adresse : </label></td>";
                    echo "<td><textarea cols='30' rows='2' name='adresse'> $adresse</textarea></td>";
                    echo "</tr> </table> <input type='submit' value='Modifier' >";
                    echo " <button type='submit' name='retour' >Annuler la modification </button>";
                    echo " <a href='tp4.php' >Retour a la liste</a> ";
                    echo " </form> </body> </html> ";

                }
            }

        }

        if (  $_SERVER['REQUEST_METHOD'] === 'POST' AND isset( $_POST['cne']) ) {
            extract( $_POST );
            require_once 'connection.php';
            $stmt = $mysqli->prepare("UPDATE etudiant SET cne=? , nom=? , prenom=?
                 , dateNaissance=? , sexe=? , adresse=? WHERE cne=? ; " );
            
            $stmt->bind_param("sssssss",$cne ,$nom ,$prenom ,$date ,$sexe ,$adresse , $original_cne);


            if ( !$stmt->execute() ) {
                echo "<h1> Error   </h1>";
            } else {
                $h_or_f = ($sexe == 'H')? '':'e' ; // boy or girl for french accord
                $getStudent = "L'Etudiant".$h_or_f."( '$cne' ,'$nom' ,'$prenom' ,'$date' ,'$sexe ','$adresse')" ;
              
                echo "<h1> $getStudent est modifie avec succes </h1>";
        }
    }
                //extract( $_POST );

            

            // Query : 
            // $stmt = $mysqli->prepare("insert into etudiant(cne,nom,prenom,dateNaissance,sexe,adresse)
            // values ( '$cne' ,'$nom' ,'$prenom' ,'$date' ,'$sexe ','$adresse') ;");

        
        //     }

        // }

    ?>
