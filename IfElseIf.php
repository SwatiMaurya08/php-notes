<!DOCTYPE html>
<html>
<body>

<?php
$t = date("H");
echo "<p>The hour (of the server) is " . $t; 
echo ", and will give the following message:</p>";

if ($t < "10") {
    echo "<h1>Have a good morning!</h1>";
} elseif ($t > "20") {
    echo "<h1>Have a good day!</h1>";
} else {
    echo "<h1>Have a good night!</h1>";
}
?>
 
</body>
</html>