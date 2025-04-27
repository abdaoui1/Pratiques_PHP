<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tp html form</title>
</head>
<body>
<?php
echo "<h2>Résultat du formulaire :</h2>";
echo "<table border='1' cellpadding='10'>
        <tr>
            <th>Paramètre</th>
            <th>Valeur</th>
        </tr>";

// Parcourir les données POST
foreach ($_POST as $key => $value) 
{
    echo "<tr><td>$key</td><td>";
    if (is_array($value)) 
    {
        echo implode(", ", $value);
    } 
    else 
    {
        echo htmlspecialchars($value);
    }
    echo "</td></tr>";
}

// Vérification du fichier uploadé
if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) 
{
    $fileTmpPath = $_FILES['cv']['tmp_name'];
    $fileName = $_FILES['cv']['name'];
    $fileSize = $_FILES['cv']['size'];
    $fileType = $_FILES['cv']['type'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $maxSize = 4 * 1024 * 1024; // 4 Mo
    $allowedExtension = "pdf";

    if ($fileExtension === $allowedExtension && $fileSize <= $maxSize) 
    {
        $destinationFolder = 'C:/wamp64/www/pdfcv/';
        $date = date("Y-m-d_H-i-s");
        $newFileName = "uploadedCV_" . $date . ".pdf";
        $destinationPath = $destinationFolder . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destinationPath)) 
        {
            echo "<tr><td>Fichier CV</td><td>Nom: $fileName<br>Type: $fileType<br>Taille: " . ($fileSize / 1024) . " Ko<br>Enregistré sous : $newFileName</td></tr>";
        } 
        else 
        {
            echo "<tr><td>Fichier CV</td><td style='color:red;'>Erreur lors du déplacement du fichier.</td></tr>";
        }
    } 
    else 
    {
        echo "<script>alert('Erreur : le fichier doit être un PDF de taille maximale 4 Mo');</script>";
    }
} 
else 
{
    echo "<tr><td>Fichier CV</td><td style='color:red;'>Aucun fichier envoyé ou erreur à l’envoi.</td></tr>";
}

echo "</table>";

// Lien retour vers le formulaire
echo "<br><a href='index.html'>← Retour au formulaire</a>";
?>
</body>
</html>