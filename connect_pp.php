<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "hospital";
$table ="paitent_pp";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect($servername , $username, $password);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt create database query execution
$sql = "CREATE DATABASE IF NOT EXISTS ".$dbName;
if(mysqli_query($link, $sql)){
    echo "Database created successfully.",'<br />';

//select the database
$db_selected = mysqli_select_db( $link, $dbName);
if (!$db_selected) {
    die ('Can\'t use hospital : ' . mysql_error());
}

// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS ".$table ." (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    age INT NOT NULL,
    room_no VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.",'<br />';
} else{
    echo "ERROR in Table: Could not able to execute $sql. " . mysqli_error($link);
}

//to generate random string  for email 
function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$email1 =  generateRandomString(15)."@mail.com";
$email2 =  generateRandomString(15)."@mail.com";
$email3 =  generateRandomString(15)."@mail.com";
$email4 =  generateRandomString(15)."@mail.com";
// Attempt insert query execution
$sql = "INSERT INTO ".$table ."  (first_name,last_name,age,room_no,email) VALUES 
            ('John', 'Rambo', 20, 'A-101','$email1'),
            ('Clark', 'Kent', 30, 'B-101','$email2'),
            ('John', 'Carter',15, 'C-101','$email3'),
            ('Harry', 'Potter',21,'D-101','$email4')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.",'<br />';
} else{
    echo "ERROR in inserting Values into tables.: Could not able to execute $sql. " . mysqli_error($link);
}

// Attempt select query execution
$sql = "SELECT * FROM " .$table ;
$sql = "SELECT * FROM " .$table ." ORDER BY first_name asc";
$sql = "SELECT * FROM " .$table ." ORDER BY first_name desc";
$sql = "SELECT * FROM " .$table ." ORDER BY first_name";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>age</th>";
                echo "<th>room_no</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['room_no'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR in selecting data from table.: Could not able to execute $sql. " . mysqli_error($link);
}


// Attempt update query execution
$sql = "UPDATE " .$table ." SET first_name = 'Dolly' WHERE age = 20";
if(mysqli_query($link, $sql)){
    echo "Records were updated successfully." , '<br/>';
} else {
    echo "ERROR in updating data in table. : Could not able to execute $sql. " . mysqli_error($link);
}

// Attempt delete query execution
$sql = "DELETE FROM " .$table ."  WHERE first_name='John'";
if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully." , '<br/>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

} 
else{
    echo "ERROR in Database.: Could not able to execute $sql. " . mysqli_error($link);
}

//  Print host information database connectivity
echo "Connect Successfully to the server. Host info: " . mysqli_get_host_info($link);
 
// Close connection
mysqli_close($link);
?>