<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "hospital";
$table ="paitent_oo";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$conn = new mysqli($servername, $username, $password);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Attempt create database query execution
$sql = "CREATE DATABASE IF NOT EXISTS " .$dbName;
if($conn->query($sql) === true){
    echo "Database created successfully.",'<br />';

//select the database
$conn->select_db($dbName);
if (!$conn) {
    die ('Can\'t use hospital : ' . mysql_error());
}

// Attempt create table query execution
$sql = "CREATE TABLE IF NOT EXISTS " .$table ." (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    age INT NOT NULL,
    room_no VARCHAR(30),
    email VARCHAR(70) NOT NULL UNIQUE
)";
if($conn->query($sql) === true){
    echo "Table created successfully.",'<br />';
} else{
    echo "ERROR in Table.: Could not able to execute $sql. " . $conn->error;
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
$sql = "INSERT INTO ".$table ." (first_name, last_name,age,room_no, email) VALUES
            ('Swati', 'Maurya', 10, 'T-101', '$email1'),
            ('Dolly', 'Kumari', 20, 'T-102','$email2'),
            ('Adarsh', 'Maurya', 30, 'T-103','$email3'),
            ('Ravi', 'Kumar', 40, 'T-104', '$email4')";
if($conn->query($sql) === true){
    echo "Records inserted successfully.",'<br />';
} else{
    echo "ERROR in inserting Values into tables: Could not able to execute $sql. " . $conn->error;
}
 
// Attempt select query execution
$sql = "SELECT * FROM " .$table;
//$sql = "SELECT * FROM " .$table ." LIMIT 5, 8 ";
//$sql = "SELECT * FROM " .$table ." LIMIT 3 ";
if($result = $conn->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>age</th>";
                echo "<th>room_no</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
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
        $result->free();
    } else{
        echo "No records matching your query were found." , '<br/>';
    }
} else{
    echo "ERROR in selecting data from table: Could not able to execute $sql. " . $mysqli->error;
}

// Attempt update query execution
$sql = "UPDATE ".$table ."  SET room_no ='ABC-12345' WHERE id=1";
if($conn->query($sql) === true){
    echo "Records were updated successfully." , '<br/>';
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
// Attempt delete query execution
$sql = "DELETE FROM " .$table ." WHERE first_name = 'Ravi' ";
if($conn->query($sql) === true){
    echo "Records were deleted successfully." , '<br/>';
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

} 

else{
    echo "ERROR in Database,: Could not able to execute $sql. " . $conn->error;
}

// Print host information database connectivity
echo "Connect Successfully to the server. Host info: " . $conn->host_info;

// Close connection
$conn->close();
?>