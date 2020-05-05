<html>
   
   <head>
      <title>Writing PHP Function which returns value</title>
   </head>
   
   <body>
      
      <?php
         function printMe($param=NULL, $param2=100) {
            print $param ."-----".$param2;
            echo "<br>";
         }
         printMe("","This is test");
         printMe("This is test");
         printMe("This is test 2", 200);

      ?>
      
   </body>
</html>