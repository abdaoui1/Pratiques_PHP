<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CDN de bootstrap et animates.css -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
 crossorigin="anonymous"/>

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  -->

   <style>
    .first-color { background: #081f37; }
    .second-color { background: #5fc9f3; }
    .third-color { background: #2e79ba; }
    .fourth-color { background: #1e549f; }

    body { font-family: Arial, sans-serif; padding: 30px; }

    form { display: flex; justify-content: center; }

    table {
      background-color: #ffffff3b;
      border-collapse: collapse;
      width: 900px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 10px;
    }

    th {
      background-color: black;
      text-align: center;
      font-weight: bolder;
      padding: 10px 3px;
      color: white;
    }

    td {
      padding: 12px;
      border: 1px solid #ddd;
      vertical-align: top;
    }

    tr:nth-child(odd) { background-color: #2e79ba; }
    tr:nth-child(odd):hover { background-color: #2e79ff; }
    tr:nth-child(even):hover { background-color: rgb(43, 168, 231); }

    input[type="text"], input[type="file"], select {
      width: 95%;
      padding: 8px;
      margin-top: 4px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="radio"], input[type="checkbox"] {
      margin-right: 6px;
    }

    div.comment {
      border-radius: 4px;
      position: relative;
      padding: 15px;
      margin: 10px;
    }

    span.ville {
      position: absolute;
      top: 15px;
      right: 10px;
      margin: 5px;
    }

    label { margin-right: 15px; }

    button {
      padding: 10px 20px;
      margin-top: 10px;
      margin-right: 10px;
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #2980b9;
    }

     @media (max-width: 768px) {
            table {
                width: 100%;
            }
            td {
                display: block;
                width: 100%;
            }
            .ville {
                position: static;
                display: block;
                margin-top: 10px;
            }
        }
  </style>
</head>
<body class="first-color">

</head>
<body class="first-color">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        
        <table id="table" class="table  second-color ">
            <thead  class=" text-center" >
                <th class="fourth-color" colspan="2">Forum Discussion</th>
            </thead>
            <tr>
                <td> Nom :</td>
                <td><input type="text" size="60" name="nom" required/></td>
            </tr>
            <tr>
                <td> Prenom :</td>
                <td><input type="text" size="60" name="prenom" required/></td>
            </tr>
            <tr>
            <td>Email:</td>
                <td><input type="email" size="60" name="email" /></td>
            </tr>
            <tr>
                <td>Pays</td>
                <td>
                    <select name="pays" id="pays" onchange="handleChangeCountry(this)">
                        <!-- Added by a scripts ( JS) -->
                         <option value="" disabled selected>-- Choisissez un pays --</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Ville</td> 
                <td>
                    <select name="ville" id="ville">
                        <!-- Added by a scripts ( JS) -->
                         <option value="" disabled selected>-- Choisissez une ville --</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Message</td>
                <td><textarea name="message" cols="60" rows="2"></textarea></td>
            </tr>
            <tr>
                <td>Joindre un fichier (optionnel) <br>( en .pdf , 4Mo en max):</td>
                <td>
                    <label for="file">Choisir un fichier</label>
                    <input type="file" name="file" accept=".pdf">
                </td>
            </tr>
            <tr>
                <td>
                    <button class="animated  bounce btn btn-primary"  type="submit">
                        <i class=" fas fas-paper-plane">Submit</i>
                     </button>
                </td>
                <td>
                    <button class="animated btn btn-primary bounce "  type="reset">
                        <i class="fas fa-paper-plane">Annuler</i>
                     </button>
                </td> 
            </tr>
        </table>
    </form>
    <?php 
    // i choose to use a class Form_data  as  data structure 
    include_once "Info_Discussion.php";
    // 1) Recuperation des donnees saisies
     // <!-- Verifie that the form is well received  -->
        if ( sizeof($_POST) == 0 )  // Or isset($_POST)
        {
            // echo "<h1> Le formulaire n'est pas recu </h1>";
            //exit(); // ahhh , after 30m of debugging finaly i understand that i must not use exit();
            // because the server exit the script then the code below the script php wont be send to the browser.
        }   
        
    else 

    {

        // Remplir
        
            // Well recieved
            $result = new Info_Discussion(        // Note that i have to add other values for the file (but the test first)
                htmlspecialchars($_POST["nom"]), // nom is required ,that why i dont verifie with isset
                htmlspecialchars($_POST["prenom"]),
                isset ( $_POST['email'] ) ?  htmlspecialchars($_POST["email"]) : '' ,
                $_POST["ville"],
                $_POST["pays"],
                isset( $_POST['message'] ) ? htmlspecialchars( $_POST["message"] ) : '' ,
                Date('d/m/Y , H:i:s') ,
                "Error file",   // later
                "Error file",
                "Error file"
            );
            

            
            // Test for the file reception
        if ( !isset($_FILES['file']) OR $_FILES["file"]["error"] !=0)
           // echo "<h1>fichier non recu </h1>";
        ;
        
        else {

            // for extension (verification) 
            // $extension = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
            // if ( $extension != 'pdf') {
            //     echo "<h1>le fichier n'est pas un pdf </h1>";
            // }
            if ($_FILES["file"]["size"] > 4*1024*1024 ) {
                echo "<h1>le fichier depasse 4Mo </h1>";
                // Later 
            }
            else {
                $destination = "C:\wamp64\www\TPS\\TP3\\tp3_files\\";  // two '\' to avoid interpretation like a tabulation
                $extension = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
                //  echo "<h1>".$extension."</h1>";  // it contain pdf , png ... , but i must add the point
                $file_name   = 'uploadedfile_'.date("Y_M_D__H-i-s") ."." .$extension ;
                $path       = $destination.$file_name ;
                $size       =  $_FILES['file']['size'] / 1024 ." Ko"; // i can use floor() function
                if (  !move_uploaded_file($_FILES['file']['tmp_name'], $path) )
                { echo "error while uploding file " ; }
                else
                {
                    echo    "le file est bien recu  :"; // to verifie
                    $result->setPath($path);
                    $result->setFileName($file_name);
                    $result->setFileSize($size);
                }
        }
                }
        // echo "<h3>".$result->__toString()."</h3>";   // to verifie


        // -------------------------------------------- Write data in a file --------------------------------------------
        // Opening the file 
        $fp = fopen('C:\wamp64\www\TPS\TP3\discussion_data.txt' , 'a' );  // 'a' : write in the end of the file
        if ( !$fp) echo "<h1> Error while Opening file </h1>";

        fwrite( $fp  , $result->__toString()."\n\n\n");

        // Closing the file 
        fclose($fp);



        // -------------------------------------------- Serialize the Objects Forum_Discussion -------------------------------
        
        $serialize_obj = serialize( $result );

        file_put_contents( 'serialize_objects.txt' , $serialize_obj ."\n" , FILE_APPEND); 
    }

        // ----------------------------------------- show the messages recieveds ----------------------------------
        
        // : Unserializing the objects (info of the forum )
        // first : Opening the file 
        $fp = fopen( 'serialize_objects.txt','r');

        while ( $info = trim ( fgets( $fp ) ) ) 
        // trim is a function that's strip whitespace (or other characters) from the beginning and end of a string
        {
            //echo $info;
            $obj = unserialize( $info );
            // echo $obj->__toString();

            echo "<div class='comment second-color'>";
            echo '<div class="row">';
            echo '<span class="nom  col-md-6">'.$obj->getNom()."&nbsp;".$obj->getPrenom()."&nbsp;&nbsp;";
            echo '<a href="mailto:'.$obj->getEmail().'">';
            echo   $obj->getEmail();
            echo '</a></span>';
            echo '<span class="ville">';
            echo '<label >ville :</label>';
            echo '<span class="city">'.$obj->getVille().' / '.$obj->getPaye().'</span>';
            echo '</span> </div>';
            echo '<span class="message">';
            echo '<label>Message : <span>Date : '.$obj->getDate().'</span></label>';
            echo '<p>'.$obj->getMessage().'</p>';
            echo '</span>   </div>';
        }

        ?>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="mainTp3.js" defer></script>
    
</body>
</html>