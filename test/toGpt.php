

<?php 
    require_once 'verifierLogin.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Card</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .product-card {
      background-color: #fff;
      width: 300px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .product-card:hover {
      transform: scale(1.03);
    }

    .product-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .product-details {
      padding: 15px;
    }

    .product-title {
      font-size: 20px;
      font-weight: bold;
      margin: 0 0 10px;
    }

    .product-description {
      font-size: 14px;
      color: #555;
      margin-bottom: 15px;
    }

    .product-price {
      font-size: 18px;
      color: #27ae60;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .buy-button {
      display: block;
      width: 100%;
      padding: 10px;
      text-align: center;
      background-color: #27ae60;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .buy-button:hover {
      background-color: #219150;
    }
  </style>
</head>
<body>



<div style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">

<?php
    require_once 'verifierLogin.php';
    echo $_SESSION['product'];

?>
</div>




</body>
</html>
