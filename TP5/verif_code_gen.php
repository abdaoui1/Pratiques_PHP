<?php

session_start();

$image = imagecreatetruecolor(120 , 40 );

// Couleurs 
$bg_color = imagecolorallocate($image , 240 , 240 ,240 );
$text_color = imagecolorallocate($image, 0 ,0 ,0 );
$line_color = imagecolorallocate($image, 64 ,64 ,64 );


imagefill( $image , 0 ,  0 ,$bg_color);

for ( $i = 0 ; $i < 5 ; $i++ ) {
    imageline( $image , 0 ,rand() %40 , 120 , rand() %40 , $line_color);
}

// Generer le code CAPTCHA 
$code = substr( str_shuffle("ABCDEFGHJKLMNOPQRSTUVWXYZ123456789") , 0 ,6);
$_SESSION['aleat_nbr'] = $code;

// Ecrire le texte
imagestring( $image , 5 ,20 ,10 ,$code ,$text_color);

// Afficher l'image 
header( "Content-type: image/png");
imagepng( $image );
imagedestroy($image);


?>