<?php
   session_start();
   
   if( isset( $_SESSION['counter'] ) && isset( $_SESSION['name'] )) {
      $_SESSION['counter'] += 1;
      $_SESSION['name']  .= "Dolly ";
   }else {
      $_SESSION['counter'] = 1;
      $_SESSION['name'] = "Miss ";
   }
	
   $msg = "You have visited this page ".  $_SESSION['counter'];
   $msg .= "in this session." . $_SESSION['name'] ;
   echo SID;
?>

<html>
   
   <head>
      <title>Setting up a PHP session</title>
   </head>
   
   <body>
      <?php  echo ( $msg ); ?>
   </body>

   
<p>
   To continue  click following link <br />
   
   <a  href = "String.php"> here</a>
</p>

   <?php

   if(strlen($_SESSION['name'])>=20){
      unset($_SESSION['name']);
   }
   if(strlen($_SESSION['counter'])==10){
      unset($_SESSION['counter']);
   }

   if($_SESSION['counter']==10){
      echo "Destroyed all session variables...";
      session_destroy();
      echo $_SESSION['counter'];
      echo "Session name length: ".strlen($_SESSION['name']);
   }
?>
   
</html>