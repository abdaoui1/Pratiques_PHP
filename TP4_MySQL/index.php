<?php 

session_start();
if ( !isset( $_SESSION['cpt'])) {
    $_SESSION['cpt'] = 1;
    $_SESSION['login'] = "MonLogin";
}
else 
    $_SESSION['cpt']++;

    echo 'bonjour '.$_SESSION['login']." : <br> \n";
    echo 'Vous avez vu cette page  '.$_SESSION['cpt']." fois  <br> \n";
    echo 'Le SID courant est  '.session_id();
    echo '<br> <a href=\"session2.php\">vers session2.php</a>';




?>