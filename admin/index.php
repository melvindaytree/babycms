<html>
<header></header>

<?php require('../includes/config.php'); 

/*
//make sure user is logged in, function will redirect use if not logged in
login_required();

//if logout has been clicked run the logout function which will destroy any active sessions and redirect to the login page
if(isset($_GET['logout'])){
    logout();
}
*/

//run if a page deletion has been requested
if(isset($_GET['delpage'])){
        
    $delpage = $_GET['delpage'];
    $delpage = mysqli_real_escape_string($delpage);
    $sql = mysqli_query($conn, "DELETE FROM pages WHERE pageID = '$delpage'");
    $_SESSION['success'] = "Page Deleted"; 
    header('Location: ' . $DIRADMIN);
       exit();
}

?>

<body>
    <script language="JavaScript" type="text/javascript">
    function delpage(id, title)
    {
       if (confirm("Are you sure you want to delete '" + title + "'"))
       {
          window.location.href = '<?php echo $DIRADMIN;?>?delpage=' + id;
       }
    }
    </script>

    <div id="navigation">
    <ul class="menu">
        <li><a href="http://melvindaytree.com/babycms/admin">Admin</a></li>        
        <li><a href="http://melvindaytree.com/babycms/" target="_blank">View Website</a></li>
        <li><a href="<?php echo $DIRADMIN;?>?logout">Logout</a></li>
    </ul>
</div>

<table>
<tr>
    <th><strong>Pages</strong></th>

</tr>

<?php
$sql = mysqli_query($conn, "SELECT * FROM pages ORDER BY pageID");
while($row = mysqli_fetch_object($sql)) {
    echo "<tr>";
        echo "<td>$row->pageTitle</td>";
        if($row->pageID == 1){ //home page hide the delete link
          //  echo "<td><a href="".$DIRADMIN."editpage.php?id=$row->pageID">Edit</a></td>";
        } else {
        //    echo "<td><a href="".$DIRADMIN."editpage.php?id=$row->pageID">Edit</a> | <a href="javascript:delpage('$row->pageID','$row->pageTitle');">Delete</a></td>";
        }
        
    echo "</tr>";
}
?>


<tr><p><a href="addpage.php" class="button">Add Page</a></p></tr>
<tr><p><a href="editpage.php" class="button">Edit Page</a></p></tr>
<tr><p><a href="delpage.php" class="button">Delete Page</a></p></tr>

</table>


</body>