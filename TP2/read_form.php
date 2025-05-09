<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>read_form</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
 crossorigin="anonymous"/>


<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  /> -->

    <style>

table {
    /* background-color: rgb(143, 143, 134); */
    border-collapse: collapse;
    border: 1px solid black;
    margin: 20%;
  

}
    .table {
        width: 370px;
    }
    .mybtn {
        width: 350px;
    }
    table tr:nth-child(odd) {
        background-color: lightgray;
    }
    th {
        background-color: greenyellow;
    }

td {
    padding: 10px;
    /* border: 1px solid black; */
}
    </style>
</head>
<body>
    <h1> Hello this is the page when i read from the file ( data of the form ) </h1>
    
    <?php 
        
        
        function with_fread ( ) {

            // read from the file : 
            echo "<h1>with fread  : </h1>";
            // Opening the file 
            $fp = fopen ( 'form_data.txt', 'r');

            $file_size = filesize('form_data.txt'); // by bytes ( en octet)

                $content = fread( $fp , $file_size );

                echo "<pre>" .$content."</pre>";
            fclose( $fp );
        }
        
        function with_fgets() {

            // read from the file : 
            echo "<h1>with fgets  : </h1>";
            // Opening the file 
            $fp = fopen ( 'form_data.txt', 'r');

            $file_size = filesize('form_data.txt'); // by bytes ( en octet)

                $content = fgets( $fp , 50 ); // @param 2 : rendering 50 - 1 bytes until EOF or end of line
                echo "<pre>" .$content."</pre>";
            fclose( $fp );

        }

        function with_fgetc() {
             // read from the file : 
             echo "<h1>with fgetc  : </h1>";
             // Opening the file 
             $fp = fopen ( 'form_data.txt', 'r');
 
 
                 $content = fgetc( $fp ); // 
                 echo "<pre>" .$content."</pre>";
             fclose( $fp );

        }

        function with_fgetc_loop () {

             // read from the file : 
             echo "<h1>with fgetc in a loop  : </h1>";
             // Opening the file 
             $fp = fopen ( 'form_data.txt', 'r');
 
             $file_size = filesize('form_data.txt'); // by bytes ( en octet)
            
             $content = '';

                while (  !feof( $fp )  )
                    {
                        $content .= fgetc( $fp ) ;
                    }
                 echo "<pre>" .$content."</pre>";
             fclose( $fp );
        }

        function with_file_get_contents() {
            
            // read from the file : 
            echo "<h1>with file_get_contents : </h1>";
            $content = file_get_contents( 'form_data.txt' );

            echo "<pre>".$content."</pre>";
        }

        function with_file () {
            // read from the file : 
            echo "<h1>with file()  : </h1>";

            $content = file('form_data.txt'  );

            echo "<pre>".print_r( $content  ). "</pre>";

            // echo "-----------------------------";
            // $content2 = file('form_data.txt' , FILE_SKIP_EMPTY_LINES );

            // echo "<pre>".print_r( $content2  ). "</pre>";

            // echo ( $content == $content2 )? 'Aucun  effet les param..' : "Emmm";
        }



       function all () {

        with_fread();

       with_fgets();

        with_fgetc();

        with_fgetc_loop();

       with_file_get_contents();

       with_file () ;
       }

       // Events 
       if (isset($_POST['read'])) {
        with_fread();
    }
       if (isset($_POST['getc'])) {
        with_fgetc();
    }
       if (isset($_POST['getc_loop'])) {
        with_fgetc_loop();
    }
       if (isset($_POST['gets'])) {
        with_fgets();
    }
       if (isset($_POST['file'])) {
        with_file();
    }
       if (isset($_POST['file_get_contents'])) {
        with_file_get_contents();
    }
       if (isset($_POST['all'])) {
        all();
    }

     
    ?>
<form method="post">
    
<!-- // bootstrap class -->
        <div class="d-flex justify-content-cenetr"> 
                <table class="table">
                    <th>Choisir une  fonction : </th>
                    <tr><td><button type="submit" name="read" class="mybtn btn btn-primary">fonction fread() </button></td></tr>
                    <tr><td><button type="submit" name="gets" class="mybtn btn btn-primary" >fonction fgets() </button></td></tr>
                    <tr><td><button type="submit" name="getc" class="mybtn btn btn-primary" >fonction fgetc() </button></td></tr>
                    <tr><td><button type="submit" name="getc_loop" class="mybtn btn btn-primary" >fonction fgetc_loop() </button></tr>
                    <tr><td><button type="submit" name="file" class="mybtn btn btn-primary" >fonction file() </button></td></tr>
                    <tr><td><button type="submit" name="file_get_contents" class="mybtn btn btn-primary" >fonction file_get_contents() </button></td></tr>
                    <tr><td><button type="submit" name="all" class="mybtn btn btn-primary" >Executer toutes les fonctions </td></button></tr>
                </table>
        </div>
</form>

</body>
</html>