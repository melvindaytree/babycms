<?php

include'includes/config.php';
include 'includes/header.php';


?>




<?php    


    //if no page clicked on load home page default to it of 1
    if(!isset($_GET['p'])){
        $q = mysqli_query($conn, "SELECT * FROM pages WHERE pageID='1'");
    } else { //load requested page based on the id
        $id = $_GET['p']; //get the requested id
        $id = mysqli_real_escape_string($id); //make it safe for database use
        $q = mysqli_query($conn, "SELECT * FROM pages WHERE pageID='$id'");
    }
    
    //get page data from database and create an object
    $r = mysqli_fetch_object($q);
    
    //print the pages content
    echo '<h1 class="indh1">' . $r->pageTitle . '</h1>';
    echo $r->pageCont;


    ?>

<footer> <div class="copy">&copy; <?php echo $SITETITLE.' '. date('Y');?> </div></footer>

</body>
</html>