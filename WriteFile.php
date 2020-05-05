<?php
   $filename = "Echo.php";
   $file = fopen( $filename, "w" );

   echo $file;
   
   if( $file == false ) {
      echo ( "Error in opening new file" );
      exit();
   }
   fwrite( $file, "This is  a simple test\n" );
   fclose( $file );
?>
<html>
   
   <head>
      <title>Writing a file using PHP</title>
   </head>
   
   <body>
      
      <?php
         $filename = "Echo.php";
         $file = fopen( $filename, "r" );
         
         if( $file == false ) {
            echo ( "Error in opening file" );
            exit();
         }
         
         $filesize = filesize( $filename );
         $filetext = fread( $file, $filesize );
         
         fclose( $file );
         
         echo ( "File size : $filesize bytes" );
         echo ( "$filetext" );
         echo("file name: $filename");
      ?>
      
   </body>
</html>