<?php
// The directory path
$dir = "testdir";
 
// Check the existence of directory
if(!file_exists($dir)){
    // Attempt to create directory
    if(mkdir($dir)){
        echo "Directory created successfully.";
    } else{
        echo "ERROR: Directory could not be created.";
    }
} else{
    echo "ERROR: Directory already exists.";
}
?>