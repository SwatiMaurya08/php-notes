<?php
$servername = "localhost";
$dbName = "hospital";
$table ="paitent_pdo";
$username = "root";
$password = "";

$dsn = "mysql:host=".$servername .";" ."dbname=".$dbName;

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO($dsn, $username, $password);
    
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Print host information
    echo "Connect Successfully. Host info: " , "<br/>". $pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}


// Attempt create database query execution
try{
    $sql = "CREATE DATABASE IF NOT EXISTS ". $dbName;
    $pdo->exec($sql);
    echo "Database created successfully", "<br/>";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 

 
// Attempt create table query execution
try{
    $sql = "CREATE TABLE IF NOT EXISTS ".$table ." (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        age INT NOT NULL,
        room_no VARCHAR(30) NOT NULL,
        email VARCHAR(70) NOT NULL UNIQUE
    )";    
    $pdo->exec($sql);
    echo "Table created successfully.", "<br/>";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
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
try{
    $sql = "INSERT INTO ".$table ."  (first_name, last_name,age,room_no, email) VALUES
            ('John', 'Rambo',20,'N-202', '$email1'),
            ('Clark', 'Kent', 30, 'N-203', '$email2'),
            ('John', 'Carter', 12, 'N-303','$email3'),
            ('Harry', 'Potter',36, 'N-306' ,'$email4')";   
    $pdo->exec($sql);
    echo "Records inserted successfully.", "<br/>";
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Attempt select query execution
try{
    $sql = "SELECT * FROM " .$table;  
  //  $sql = "SELECT * FROM " .$table ." WHERE first_name = 'john'";
    $result = $pdo->query($sql);
    if($result->rowCount() > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>first_name</th>";
                echo "<th>last_name</th>";
                echo "<th>age</th>";
                echo "<th>room_no</th>";
                echo "<th>email</th>";
            echo "</tr>";
        while($row = $result->fetch()){
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
        unset($result);
    } else{
        echo "No records matching your query were found.";
    }
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


// Attempt update query execution
try{
    $sql = "UPDATE " .$table ."  SET last_name = 'Kumar' WHERE age= 20 ";    
    $pdo->exec($sql);
    echo "Records were updated successfully." . '<br/>';
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}


// Attempt delete query execution
try{
    $sql = "DELETE FROM " .$table ." WHERE first_name='Harry'";  
    $pdo->exec($sql);
    echo "Records were deleted successfully.", '<br/>';
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
// Close connection
unset($pdo);
?>