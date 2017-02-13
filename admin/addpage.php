<html>
<?php include'../includes/config.php';
        include'../includes/header.php'; ?>

<body>

<form action="" method="post">
<p>Title:<br /> <input name="pageTitle" type="text" value="" size="103" /></p>
<p>content<br /><textarea name="pageCont" cols="100" rows="20"></textarea></p>
<p><input type="submit" name="submit" value="Submit" class="button" /></p>
</form>

<?php 


if(isset($_POST['submit'])){

    $title = $_POST['pageTitle'];
    $content = $_POST['pageCont'];
     $newFileName = "../pages/$title.php";
      $newFileContent = $content;
    

    $title = mysqli_real_escape_string($conn, $title);
    $content = mysqli_real_escape_string($conn, $content);
    
  $retval = mysqli_query($conn, "INSERT INTO pages (pageTitle,pageCont) VALUES ('$title','$content')");

    if(! $retval )
    {
    die('Could not enter data: ' . mysqli_error($dbname));
    } 
    else {
        echo "Entered data successfully\n";
/*
        //create new php file in directory
        echo "create page";
        
        $ret = mysqli_query($conn, "SELECT LAST_INSERT_ID()");
        if (! $ret ) {
            die('Could not get new id');
        }
        else {
            //$newId = $ret;
            printf(mysql_insert_id());
        

        $newFileContent = <<<EOT
            <?php 

            include '../includes/config.php';
            include '../includes/header.php';


            $id = mysqli_real_escape_string($conn, $newId);
            $q = mysqli_query($conn, "SELECT * FROM pages WHERE pageID='$id'");
            $row = mysqli_fetch_object($q);




            echo '<h1>'.$row->pageTitle.'</h1>';
            echo $row->pageCont;

            ?>;
EOT;


        $fp = fopen($newFileName,"w+");
        fwrite($fp,$newFileContent);
        fclose($fp);
        echo "page created";
        */
    }

    
   





/*
    error_reporting(E_ALL);

    $pagename = $title;

    

    if (file_put_contents($newFileName, $newFileContent) !== false) {
        echo "File created (" . basename($newFileName) . ")";
    } else {
        echo "Cannot create file (" . basename($newFileName) . ")";
    }
    */
 exit();
}

?>

</body>
</html>