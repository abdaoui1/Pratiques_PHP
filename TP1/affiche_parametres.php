<!DOCTYPE html>
<html lang="en">
<head>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
 crossorigin="anonymous"/>
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="styles.css"> -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiche Parametres</title>

    <style>
 
    
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    color: #fff;
    margin: 0;
    padding: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

form {
    width: 100%;
    max-width: 960px;
}

table {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 12px;
    overflow: hidden;
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.25);
}

td {
    padding: 16px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    vertical-align: top;
}

input[type="text"],
input[type="file"],
input[type="password"],
select {
    width: 100%;
    padding: 10px;
    margin-top: 6px;
    border: none;
    border-radius: 6px;
    background-color: #ffffffcc;
    color: #333;
    font-size: 14px;
}

input[type="radio"],
input[type="checkbox"] {
    margin-right: 8px;
}

label {
    margin-right: 15px;
    font-size: 14px;
}

button {
    padding: 12px 24px;
    margin-top: 10px;
    margin-right: 12px;
    background-color: #1abc9c;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #16a085;
}

select[multiple] {
    height: 100px;
}

::placeholder {
    color: #aaa;
}


    </style>
</head>
<body>
    
    
    <table>
        <tr>
            <td>Nom saisi :</td>
            <td><?php
                    echo htmlspecialchars($_POST["nom"]);?></td>
        </tr>
        <tr>
            <td>Prenom saisi :</td>
            <td><?php echo htmlspecialchars($_POST["prenom"]);?></td>
        </tr>
        <tr>
            <td>Password saisi :</td>
            <td><?php echo htmlspecialchars($_POST["pwd"]);?></td>
        </tr>
        <tr>
            <td>Profession selectionnee :</td>
            <td><?php echo $_POST["profession"];?></td>
        </tr>
        <tr>
            <td>Paye selectionne :</td>
            <td><?php echo $_POST["pays"];?></td>
        </tr>
        <tr>
            <td>Ville selectionne :</td>
            <td><?php echo $_POST["ville"];?></td>
        </tr>
        <tr>
            <td>Le Sexe :</td>
            <td>
            <?php echo isset($_POST["sexe"])? $_POST['sexe']
            :null;
            ?></td>
        </tr>
        <tr>
            <td>La Langue :</td>
            <td><?php  if ( isset($_POST["langue"]) )
            {   if (is_array($_POST["langue"]))
                echo implode(" , ",$_POST['langue']);
                
            } else echo "non choisi";
            
            ?></td>
        </tr>
        <tr>
            <td>Les Loisirs :</td>
            <td><?php 
                echo isset($_POST['loisirs'])? 
                implode(" , ",$_POST['loisirs'])
                : 'non choisi';?>
            </td>
         </tr>
        <tr>
            <td>
            <?php
    //  
    
     if ( !isset($_FILES['cv']) OR $_FILES["cv"]["error"] !=0) 
     echo "fichier non recu"; 
     else {
        $extension = pathinfo($_FILES["cv"]["name"],PATHINFO_EXTENSION);
        if ( $extension != 'pdf') {
            echo "cela n'est pas un pdf ";
        }
        elseif ($_FILES["cv"]["size"] > 4*1024*1024 ) {
            echo "cela depasse 4Mo ";
        }
        else {
            $destinationFolder = 'C:\wamp64\www\TPs\TP1\tp1_CVs\\';
            $date = date("Y-m-d_H-i-s");
            $newFileName = "uploadedCV_" . $date . ".pdf";
            $destinationPath = $destinationFolder . $newFileName;
            move_uploaded_file($_FILES['cv']['tmp_name'] , $destinationPath ) ;
            echo "  le CV est bien recu  :";

        } 
     } 
    ?>
            </td>
            <td>
                <?php echo "Nom du fichier :" .$_FILES["cv"]["name"]. "<br>
                        La taile du fichier : " .floor( $_FILES["cv"]['size'] / (1024) ) ."Ko";
                    ?>
            </td>
        </tr>
    </table>

    <!-- lien de retour a la page precedente  -->
    <a class="retour_lien" href="formulaire.html">Retourner a la page d'accueil</a>
    
    
</body>
</html>