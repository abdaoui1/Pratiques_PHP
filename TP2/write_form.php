<!DOCTYPE html>
<html lang="en">
<head>
<link 
rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
crossorigin="anonymous"/>

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

  <!-- <link rel="stylesheet" href="styles.css"> -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistre le formulaire</title>
</head>
<body>
    <?php
        
        // <!-- Verifie that the form is well received  -->
        if ( sizeof($_POST) == 0 )  // isset($_POST) it's a bad verification here
        {
            echo "<h1> Le formulaire n'est pas recu </h1>";
            exit();
        }


        // Well received 
        // i choose to use a class Form_data  as  data structure .
        include_once "Form_data.php";

        // Remplir
        
            // Well recieved
            $result = new Form_data(        // Note that i have to add other values for the Cv (but the test first)
                htmlspecialchars($_POST["nom"]),
                htmlspecialchars($_POST["prenom"]),
                htmlspecialchars($_POST["pwd"]),
                $_POST['profession'],
                $_POST["pays"] ,
                isset( $_POST['sexe'] )? $_POST['sexe'] :'NON choisi',
                isset( $_POST["langue"] ) ? $_POST["langue"] :['NON choisi'], // because i use implode in the Form_data
                isset( $_POST['loisirs'] ) ? $_POST['loisirs'] :['NON choisi'], // and form attend array not a string
                "Erreur _ fichier",
                "Erreur _ fichier",
                "Erreur _ fichier"
            );
            
            
            // Test for the file reception
            if ( !isset($_FILES['cv']) OR $_FILES["cv"]["error"] !=0)
            echo "<h1>fichier non recu </h1>";
        
        else {
            $extension = pathinfo($_FILES["cv"]["name"],PATHINFO_EXTENSION);
            if ( $extension != 'pdf') {
                echo "<h1>le fichier n'est pas un pdf </h1>";
            }
            elseif ($_FILES["cv"]["size"] > 4*1024*1024 ) {
                echo "<h1>le fichier depasse 4Mo </h1>";
            }
            else {
                $destination = "C:\wamp64\www\Tp1\\tp1_CVs\\";  // two '\' to avoid interpretation like a tabulation
                $file_name   = 'uploadedCV_'.date("Y_M_D__H-i-s").".pdf" ;
                if (  !move_uploaded_file($_FILES['cv']['tmp_name'], $destination.$file_name) )
                { echo "error while uploding file " ; }
                else
                {
                    echo    "le CV est bien recu  :";
                    $result->setCvNom  (    $file_name   ); // car $_FILES['cv']['name'] est le nom d'origine (envoye)
                    $result->setCvTaille(   floor( $_FILES["cv"]['size'] / (1024) ) ."Ko"   );
                    $result->setCvLocation( $destination.$file_name );
                }
            }
        }
        
        echo "<h3>".$result->__toString()."</h3>";


        // -------------------------------------------- Write data in a file --------------------------------------------
        // Opening the file 
        $fp = fopen('C:\wamp64\www\Tp1\TP2\form_data.txt' , 'a' );  // 'a' : write in the end of the file
        if ( !$fp) echo "<h1> Error while Opening file </h1>";

        fwrite( $fp  , $result->__toString()."\n\n\n");

        // Closing the file 
        fclose($fp);

        // test  : Get Object  from the file : 
        // first find a function to extract str between two char .

        //  second search how to import a class ( Done the name of the class is Form_data.php)
       
        ?>








      <!-- echo " lien de retour a la page precedente  -->
       <br>
        <a class="retour_lien" href="../formulaire.html">Retourner a la page d'accueil</a>
    ?>    
    
</body>
</html>"