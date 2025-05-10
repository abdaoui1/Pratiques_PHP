

<?php 
    require_once 'verifierLogin.php';

    if ( !isset( $_SESSION['panier'] ) ) {
     $_SESSION["panier"] = array(
         "XIAOMI_Redmi_Note_12__3500DH" => 0,
         "ONEPLUS_Nord_CE_3__4800DH" => 0,
         "Google_Pixel_7a__5200DH" => 0,
         "OPPO_Reno_8__4400DH" => 0,
         "Realme_C55__3000DH" => 0,
         "SAMSUNG_GALAXY_S9__7000DH" => 0,
         "HUAWEI_P30__9000DH" => 0,
         "Apple_iPhone_9__10000DH" => 0,
);

}
    

    // If "panier" is not set, redirect to initialisation
    if (!isset($_SESSION["panier"])) {
        echo "What ?";
    }


    if ( isset( $_GET['ajout']  ) ) {
         $itemToAdd = $_GET['ajout'];
         $_SESSION['panier'][$itemToAdd] ++;
    }
    
    if ( isset( $_GET['remove']  ) ) {
        $itemToRemove = $_GET['remove'];
        if (  $_SESSION['panier'][$itemToRemove] >= 0  ) {
            $_SESSION['panier'][$itemToRemove] --;
        } 
    }

    // Reset Panier
    if ( isset( $_GET['reset'] ) ) {
         $_SESSION["panier"] = array(
    "XIAOMI_Redmi_Note_12__3500DH" => 0,
         "ONEPLUS_Nord_CE_3__4800DH" => 0,
         "Google_Pixel_7a__5200DH" => 0,
         "OPPO_Reno_8__4400DH" => 0,
         "Realme_C55__3000DH" => 0,
         "SAMSUNG_GALAXY_S9__7000DH" => 0,
         "HUAWEI_P30__9000DH" => 0,
         "Apple_iPhone_9__10000DH" => 0,
);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Card</title>
  <style>
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(to right, #e3ffe7, #d9e7ff);
  padding: 40px;
  margin: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
}

h1 {
  color: #2c3e50;
  font-size: 28px;
  margin-bottom: 20px;
  text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
}

a {
  margin: 10px 0;
  display: inline-block;
  color: #2980b9;
  text-decoration: none;
  font-weight: bold;
}

a:hover {
  color: #2980ff ;
}

table {
  border-collapse: collapse;
  width: 700px;
  background-color: #ffffff;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  border-radius: 15px;
  overflow: hidden;
}

th, td {
  padding: 20px;
  text-align: center;
  font-size: 18px;
}

th {
  background-color: #3498db;
  color: white;
}

tr:nth-child(even) {
  background-color: #f8f9fa;
}

tr:hover {
  background-color: #eaf6ff;
}

span.quantity {
  font-size: 20px;
  font-weight: bold;
  margin: 0 15px;
  display: inline-block;
  min-width: 30px;
  color: #2c3e50;
}

.btn {
  display: inline-block;
  padding: 10px 16px;
  background-color: #2ecc71;
  color: white;
  text-decoration: none;
  border-radius: 50px;
  font-weight: bold;
  font-size: 18px;
  transition: background-color 0.3s ease, transform 0.2s ease;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.btn:hover {
  background-color: #27ae60;
  transform: scale(1.1);
  text-decoration: none;
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
</head>
<body>

        <!-- logout -->
    <form class="logout-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" > 
         <a class="deconnect" href="deconnect.php">Deconnexionn</a>
    </form>
    <a href="acceuil.php">Retour a la page d'acceuil</a>
    <a href="ajout_article.php?reset=1">Vider le Panier</a>
    <h1>Total : <?php 
        $total = 0;
            $total = $_SESSION['panier']['SAMSUNG_GALAXY_S9__7000DH'] * 7000 ;
            $total += $_SESSION['panier']['HUAWEI_P30__9000DH'] * 9000;
            $total += $_SESSION['panier']['Apple_iPhone_9__10000DH'] * 10000;
        echo $total." DH";
        ?></h1>
    <table>
        <tr>
            <th>Produit</th>
            <th>Actions</th>
        </tr>
               <?php 
                 foreach( $_SESSION["panier"] as $key => $value ) 
                    {
                        echo "<tr>";
                        echo "<td>";
                            echo "<label >$key</label>";
                        echo "</td>";

                        echo "<td>";
                            echo '<a class="btn" href="ajout_article.php?remove='.$key.'">-</a>';
                                    echo "<span class='quantity'>$value</span>";
                            echo '<a class="btn" href="ajout_article.php?ajout='.$key.'">+</a>';
                        echo "</td>";
                        echo "</tr>";
                      
                    }
            ?>
    </table>


</body>
</html>
