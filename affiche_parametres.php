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

  <link rel="stylesheet" href="Style/styles.css">
  <link rel="stylesheet" href="Style/animate.css">
  <link rel="stylesheet" href="Style/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
     echo "<h1>fichier non recu </h1>"; 
     else {
        $extension = pathinfo($_FILES["cv"]["name"],PATHINFO_EXTENSION);
        if ( $extension != 'pdf') {
            echo "<h1>cela n'est pas un pdf </h1>";
        }
        elseif ($_FILES["cv"]["size"] > 4*1024*1024 ) {
            echo "<h1>cela depasse 4Mo </h1>";
        }
        else {
            $destinationFolder = 'C:\wamp64\www\Tp1\tp1_CVs\\';
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