<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2fff5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 350px;
        animation: fade-in 0.5s ease-in-out;
    }

    table {
        width: 100%;
    }

    th {
        text-align: center;
        font-size: 22px;
        color: #2e7d32;
        padding-bottom: 15px;
    }

    td {
        padding: 10px 0;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus {
        border-color: #4caf50;
        outline: none;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button[type="submit"]:hover {
        background-color: #388e3c;
        transform: scale(1.03);
    }

    img {
        display: block;
        margin: 10px auto;
        border-radius: 5px;
        max-width: 100%;
    }

    @keyframes fade-in {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

</head>
<body >



<?php 

    // include_once 'verif_code_gen.php';

    session_start();

    


    if (  $_SERVER['REQUEST_METHOD'] === 'POST'  && isset( $_POST['login'] ) ) {

        // Recuperation des donnees : 
        // 1) le Login 
        extract( $_POST );

       
        if ( $pwd !== $repwd ) 
            echo "les mots de passes ne sont pas identiques ";
        if  ( $email !== $reemail ) 
            echo "<> les deux emails ne sont pas identiques";
        
        if ( $_SESSION['aleat_nbr'] !== $_POST['code_captcha'] )
        {    echo "<> captcha errone  ";
       
        }
        
        if ( !($pwd !== $repwd || $email !== $reemail || $_SESSION['aleat_nbr'] !== $code_captcha) )
        {
            
            require_once 'connection.php';

                $stmt = $mysqli->prepare("INSERT INTO users ( email , login , password ) VALUES 
                ( ? ,? ,? ) ; ")  ;
                $stmt->bind_param("sss", $email , $login , $pwd ) ;

                if ( $stmt->execute()  ) {
                    echo "<h3> Bien Enregistre </h3>";
                    // header('Location: acceuil.html'); 
                    $_SESSION["login"] = $login;
                     header("Refresh: 5; URL=acceuil.php");  // wait 5 seconds
                }

            }
        }


?>
    <form action="inscription.php" method="POST">
        <table>
            <tr>
                <th colspan="2">Connectez-vous</th>
            </tr>
            <tr>
                <td><label for="login">Login</label></td>
                <td><input type="text" name="login" id="login" required></td>
            </tr>
            <tr>
                <td><label for="pwd">Mot de Passe</label></td>
                <td><input type="text" name="pwd" id="pwd" required></td>
            </tr>
            <tr>
                <td><label for="repwd">Retapez le Mot de passe </label></td>
                <td><input type="text" name="repwd" id="repwd" required></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
                <td><label for="reemail">Retapez l'email</label></td>
                <td><input type="email" name="reemail" id="reemail" required></td>
            </tr>
            <tr>
                <!-- CAPTCHA -->
                <td colspan="2">
                    <img src="verif_code_gen.php" alt="Verification">
                </td>
                
            </tr>
            <tr>
                <td><label for="code_captcha">Merci de Retapez le code d'image</label> </td>
                <td><input type="text" name="code_captcha" id="code_captcha" required></td>
            </tr>
            <tr>
                <td><button type="submit">S'inscrire</button></td>
                <td></td>
            </tr>
        </table>
    </form>


    

</body>
</html>