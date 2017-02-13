<?php 

$servername1 = "localhost";
$username1 = "baby";
$password1 = "baby1";
$dbname1 = "baby_db";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";


?>