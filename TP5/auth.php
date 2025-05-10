<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>

     <style>

        body {
        font-family: Arial, sans-serif;
        background-color: lightskyblue;
        padding: 30px;
        }

        form {
        display: flex;
        justify-content: center;
        }

        table {
        background-color: #ffffff3b;
        border-collapse: collapse;
        width: 900px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        td {
        padding: 12px;
        border: 1px solid #ddd;
        vertical-align: top;
        }

        input[type="text"] {
        width: 95%;
        padding: 8px;
        margin-top: 4px;
        border: 1px solid #ccc;
        border-radius: 4px;
        }

        

        label {
        margin-right: 15px;
        }

  </style>

</head>
<body>

        <?php 
            session_start();
        ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <table>
                <tr>
                    <td><label for="login">Login</label></td>
                    <td><input type="text" name="login" id="login" required ></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="password" id="password" required> </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Se Connecter"></td>
                    <td><a href="inscription.php">S'inscrire</a></td>
                </tr>
            </table>
            <legend>Identifiez-vous</legend>
        </fieldset>
    </form>

    <?php
        if ( isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == 'POST') { 

            require_once 'connection.php';

            $stmt = $mysqli->prepare('SELECT * FROM users WHERE login=? AND password=? ;');
            $stmt->bind_param('ss', $_POST['login'] , $_POST['password'] );
            $stmt->execute();
            $result = $stmt->get_result();

            if ( $result && $result->num_rows > 0 ) {
                header('Location: acceuil.php');
                $_SESSION['login'] = $_POST['login'];
        }   else {
            echo "<script> alert('credentials errones ');</script>";
        }
    }
    ?>
    
</body>
</html>

