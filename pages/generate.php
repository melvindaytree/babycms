<?php 

include '../includes/config.php';
include '../includes/header.php';


$subjectId  = $_GET['id'];


$newId = $subjectId;

$id = mysqli_real_escape_string($conn, $newId);
$q = mysqli_query($conn, "SELECT * FROM pages WHERE pageID='$id'");
$row2 = mysqli_fetch_object($q);




echo '<h1>'.$row2->pageTitle.'</h1>';
echo $row2->pageCont;

?>