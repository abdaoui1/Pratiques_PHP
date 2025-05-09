<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Etudiant</title>

    <style>

        body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    padding: 30px;
}

h1 {
    text-align: center;
    color: #2c3e50;
}

form {
    max-width: 600px;
    margin: auto;
    background-color: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

table {
    width: 100%;
}

td {
    padding: 10px;
    vertical-align: top;
}

input[type="text"],
input[type="date"],
textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="radio"] {
    margin-right: 5px;
}

label {
    font-weight: bold;
}

input[type="submit"] ,a {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #0d6efd;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
}

input[type="submit"]:hover , a:hover{
    background-color: #0b5ed7;
}
a {
    text-align: center;
    font-weight: bold;
}


    </style>
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
            <tr>
                <td><a href="tp4.php" >Retour a la liste</a></td>
                <td><input type="submit" ></td>
            </tr>
        </table>
         
    </form>

    <?php
        // Add a new student .   // Firstly a test -> sumbited or didn't yet
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
                echo "<h1> Error   </h1>";
            } else {
                $h_or_f = ($sexe == 'H')? '':'e' ; // boy or girl for french accord
                $getStudent = "L'Etudiant".$h_or_f."( '$cne' ,'$nom' ,'$prenom' ,'$date' ,'$sexe ','$adresse')" ;
              
                echo "<h1> $getStudent ajouté".$h_or_f." avec succes </h1>";
            }

        }

    ?>




















    
</body>
</html>