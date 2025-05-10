<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
</head>
    <style>
        body {
            background-color: lightgrey;
            font-family: 'Times New Roman', Times, serif;
            margin: 0; /* Remove default margin */
            padding: 0;
            box-sizing: border-box;
}
        
        h1 {
            display: inline-block;
            text-align: center;
            background-color: aquamarine;
            padding: 20px 100px;
            border-radius: 5px;
            margin-top: 50px  ;
            margin-left: 15%;
            /* width: 80%; */

        }
        h1:hover {
            background-color: rgb(102, 227, 185);
        }

        p {
            font-size: 20px;
            margin-left: 50px;
            margin-top: 50px;
            font-weight: bold;
        }

        a {
            margin: 5px ;
        }
       
        
.logout-form {
  position: fixed;
  top: 20px;
  right: 30px;
  z-index: 1000;
}

.deconnect {
  padding: 10px 16px;
  font-size: 16px;
  background-color: #e74c3c;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  box-shadow: 0 4px 10px rgba(0,0,0,0.15);
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.deconnect:hover {
  background-color: #c0392b;
  transform: scale(1.05);
}


        </style>

<body>
        
        <?php
        
            require_once "verifierLogin.php";
        ?>

    <form class="logout-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" > 
          <a class="deconnect" href="deconnect.php">Deconnexionn</a>
    </form>
   
    <h1>Bienvenu , Chez SMI E-Commerce  </h1>

    <p>Votre panier est vide 
        <a href="ajout_article.php"> Cliquer ici </a>
        pour Voir nos produits !
    </p>
    
    <?php
        if ( isset($_GET['logout']) && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $_SESSION = [];
            session_unset();
            session_destroy();
            header('location: auth.php');
        }
    ?>
</body>
</html>