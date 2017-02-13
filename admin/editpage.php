<html>
<body>

<?php include'../includes/config.php';
        include'../includes/header.php'; ?>

<p>Which page would you like to edit?</p>
<form method="post" action="editpage.php">
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
$q = mysqli_query($conn, "SELECT * FROM pages WHERE pageID='$id'");
$row = mysqli_fetch_object($q);
}
?>

<form action="" method="post">
<input type="hidden" name="pageID" value="<?php echo $row->pageID;?>" />
<p>Title:<br /> <input name="pageTitle" type="text" value="<?php echo $row->pageTitle;?>" size="103" />
</p>
<p>Content:<br /><textarea name="pageCont" cols="100" rows="20"><?php echo $row->pageCont;?></textarea>
</p>
<p><input type="submit" name="editedcontent" value="submit" class="button" /></p>
</form>

<?php

if(isset($_POST['editedcontent'])){

    $title = $_POST['pageTitle'];
    $content = $_POST['pageCont'];
    $pageID = $_POST['pageID'];
    
    $title = mysqli_real_escape_string($conn, $title);
    $content = mysqli_real_escape_string($conn, $content);
    
     $retval = mysqli_query($conn,"UPDATE pages SET pageTitle='$title', pageCont='$content' WHERE pageID='$pageID'");

     if(! $retval )
    {
    die('Could not enter data: ' . mysqli_error($dbname));
    } 
    else {
        echo "Entered data successfully\n";
    }

    $_SESSION['success'] = 'Page Updated';
    exit();

}


?>

</body>
</html>