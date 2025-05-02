<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Etudiant</title>
</head>
<body style="background-color:gray;">
    <h1>Nouvel Etudiant </h1>
    
    <form action="add_student.php" method="post">
        <table>
            <tr>
                <td><label for="cne" >CNE : </label></td>
                <td><input required type="text" id="cne" name="cne"></td>
            </tr>
            <tr>
                <td><label >Nom : </label></td>
                <td><input required type="text" name="nom"></td>
            </tr>
            <tr>
                <td><label >Prenom : </label></td>
                <td><input required type="text" name="prenom"></td>
            </tr>
            <tr>
                <td><label >Sexe : </label></td>
                <td><input required type="radio" name="sexe" value="H"> <label for="sexe">Masculin</label>
                <input required type="radio" name="sexe" value="F"> <label for="sexe">Feminin</label></td>
            </tr>
            <tr>
                <td><label >Date de Naissance : </label></td>
                <td><input required type="date" name="date"></td>
            </tr>
            <tr>
                <td><label >Adresse : </label></td>
                <td><textarea required cols="30" rows="2" name="adresse"></textarea></td>
            </tr>
        </table>
        <input type="submit" >
    </form>

    <?php
        // Add a new student . 
        if (  $_SERVER["REQUEST_METHOD"] == 'POST' && isset( $_POST['cne'] )  )
        // isset( $_POST ) because , the post it's always set 
        //  This condition will always be true, because $_POST is always set (even if it's empty).

        {
            
                extract( $_POST );

            require_once 'connection.php';

            // Query : 
            // $stmt = $mysqli->prepare("insert into etudiant(cne,nom,prenom,dateNaissance,sexe,adresse)
            // values ( '$cne' ,'$nom' ,'$prenom' ,'$date' ,'$sexe ','$adresse') ;");

            $stmt = $mysqli->prepare("insert into etudiant(cne,nom,prenom,dateNaissance,sexe,adresse)
            values ( ? ,? ,? ,? ,? ,?) ;");
            $stmt->bind_param("ssssss",$cne ,$nom ,$prenom ,$date ,$sexe ,$adresse);


            if ( !$stmt->execute() ) {
                echo "<h1> Error (54) $stmt-> </h1>";
            } else {
                $h_or_f = ($sexe == 'H')? '':'e' ; // boy or girl for french accord
                echo "<h1> Etudiant".$h_or_f."( '$cne' ,'$nom' ,'$prenom' ,'$date' ,'$sexe ','$adresse') ajouté".$h_or_f." avec succes </h1>";
            }

        }

    ?>




















    
</body>
</html>