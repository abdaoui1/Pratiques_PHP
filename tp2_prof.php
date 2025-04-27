<!-- <?php
 if (isset ($_POST["btnValider"])) {
    $fp = fopen( 'data_form.txt','a+');

    $heure = date('Y-d-m H:m:s');

    fwrite($fp ,"<b> <u> <font color='#CD5C5C' > Date d'envoie : ".$heure);
    foreach( $_POST as $cle => $val) {
        if( is_array($val)) {
            $i = 0 ; 
            foreach ($val as $v )
                fwrite($fp , $cle."[".++$i."] => ".$v."<br>\n");
        } else fwrite($fp , $cle." => ".$val."<br>\n");
        }
        fclose($fp);
    }


?> -->


<table border="1">
    <?php 
    $buffer = file ('TP2/form_data.txt');
    for ( $i = 0 ; $i < count($buffer) ; $i++)
    {
        echo "<tr><td><font color='#cc0000'>ligne n ".($i+1)."</font></td>";
        echo "<td>".$buffer[$i]."</td></tr>";
    }
    ?>
    
</table>