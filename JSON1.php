<!DOCTYPE html>
<html lang="en">
<head>
    <title>Access a Value of JSON Object in PHP</title>
</head>
<body>

<?php
// Assign JSON encoded string to a PHP variable
$json = '{"Peter":65,"Harry":80,"John":78,"Clark":90}';
 
// Decode JSON data to PHP associative array
$arr = json_decode($json, true);

// Access values from the associative array
echo $arr["Peter"] . "<br>";  // Output: 65
echo $arr["Harry"] . "<br>";  // Output: 80
echo $arr["John"]  . "<br>";  // Output: 78
echo $arr["Clark"] . "<br>";  // Output: 90

echo "<hr>";

// Decode JSON data to PHP object
$obj = json_decode($json);

// Access values from the returned object
echo $obj->Peter . "<br>";   // Output: 65
echo $obj->Harry . "<br>";   // Output: 80
echo $obj->John  . "<br>";   // Output: 78
echo $obj->Clark . "<br>";   // Output: 90
?>

</body>
</html>                                		