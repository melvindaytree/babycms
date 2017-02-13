<html>
<?php include'../includes/config.php';
        include'../includes/header.php'; ?>

<body>

<p>Which page would you like to delete?</p>
<form method="post" action="delpage.php">
<select name="pages">
<?php 
$sql = mysqli_query($conn, "SELECT * FROM pages ORDER BY pageID");
while($row = mysqli_fetch_object($sql)) {
    $pageID = $row->pageID;
    $pageTitle = $row->pageTitle;
    echo '<option  value="'. $pageID .'">'. $pageTitle .'</option>';
}
 ?>
</select>
<button type="submit" name="submit">Submit</button>
</form>

<?php
if (isset($_POST["submit"])) {

$sel_val = $_POST['pages'];
$id = $sel_val;
$id = mysqli_real_escape_string($conn, $id);
$q = mysqli_query($conn, "DELETE FROM pages WHERE pageID='$id'");

echo "Page has been deleted";
}
?>

</body>
</html>