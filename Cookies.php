<?php
   setcookie("name", "Swati Maurya", time()+3600*24*365, "/","", 0);
   setcookie("age", "infinity", time()+3600*24*365, "/", "",  0);
?>
<html>
   
   <head>
      <title>Setting Cookies with PHP</title>
   </head>
   
   <body>
      <?php echo "Set Cookies"?>
   </body>
   
</html>