

<?php

// db properties
$host = "localhost";
$username = "mdaytree_baby";
$password = "baby1";
$dbname = "mdaytree_baby_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else {
    echo "You're connected to Baby DB!";
}

// define site path
$DIR = "melvindaytree.com/babycms";

// define admin site path
$DIRADMIN = "melvindaytree.com/babycms/admin" ;

// define site title for top of the browser
$SITETITLE = "Baby CMS";

//define include checker
$included = 1;

include'functions.php';


?>