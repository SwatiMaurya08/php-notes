<!DOCTYPE html>
<html>
<body>

<?php
$my_array = array("Dog","Cat","Horse");
foreach($my_array as  $id => $Animal){
    Echo "The name of animals are in array: $Animal ";
    }
$List = list($a, $b, $c) = $my_array;
foreach($List as  $id => $Animal){
Echo "The name of animals are : $Animal ";
}

Echo "I have several animals, a $a, a $b and a $c.";
?>

</body>
</html>