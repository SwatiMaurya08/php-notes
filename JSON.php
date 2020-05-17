<?php
$cars_ford = array("Name"=>"Ford" , "Model" => array("Fiesta", "Focus", "Mustang"));
$cars_bmw = array("Name"=>"BMW" , "Model" => array( "320", "X3", "X5"));
$introduction = array("Name"=>"Swati", "Age"=>20, "Height"=>6.6 , "cars" =>array($cars_ford , $cars_bmw));

 echo json_encode($introduction);

$jsonobj=json_encode($introduction);
$JSON_INTRO = json_decode($jsonobj);

echo $JSON_INTRO->Height;

$ARRAY_INTRO = json_decode($jsonobj,true);
echo $ARRAY_INTRO["Name"];
?>