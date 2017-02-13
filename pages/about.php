<?php 

include '../includes/config.php';
include '../includes/header.php';


$id = mysqli_real_escape_string($conn, 2);
$q = mysqli_query($conn, "SELECT * FROM pages WHERE pageID='$id'");
$row = mysqli_fetch_object($q);




echo '<h1>'.$row->pageTitle.'</h1>';
echo $row->pageCont;

?>