<!DOCTYPE html>
<html>
<body>

<?php
// Variable to check
$url = "https://www.google.com/search?q=what+is+query+string+in+php&oq=wh&aqs=chrome.0.69i59j0j69i59j69i57j0j69i60l2j69i61.1447j1j7&sourceid=chrome&ie=UTF-8";
$url = "https://www.w3schools.com";
// Validate url
if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
  echo("$url is a valid URL with a query string");
} else {
  echo("$url is not a valid URL with a query string");
}
?>

</body>
</html>