<?php

// $str = "SAMDH";  // return 3 
    $str = "SAMSUNG_GALAXY_S9__7000DH";

    $montant = null;

    // sub
    function extractMontant($str) {
    
        $dhPos = strpos($str,"DH");
        $i = $dhPos;

        do  {
            $i--;
        }   while ( substr($str, $i,1) != "_");

        $str = substr($str,$i+1 ,  $dhPos-$i-1);
        return $str;    
    }

    // extractMontant("HUAWEI_P30__9000DH"); //test
?>

<?php 


  
     $tab["panier"] = array(
         "XIAOMI_Redmi_Note_12__3500DH" => 1,
         "ONEPLUS_Nord_CE_3__4800DH" => 0,
         "Google_Pixel_7a__5200DH" => 0,
         "OPPO_Reno_8__4400DH" => 0,
         "Realme_C55__3000DH" => 0,
         "SAMSUNG_GALAXY_S9__7000DH" => 1,
         "HUAWEI_P30__9000DH" => 0,
         "Apple_iPhone_9__10000DH" => 0,
);

$total = 0 ;

    foreach( $tab['panier'] as $key => $value ) {
        // echo $key . '<br>';
        // echo $value .'<br>';
            $total += $value * extractMontant( $key ) ;
        }
        echo $total." DH"; 
?>