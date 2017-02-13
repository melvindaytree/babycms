<head>
<link rel="stylesheet" type="text/css" href="http://melvindaytree.com/babycms/css/main.css">
<title><?php echo $SITETITLE ?></title>
</head>

<html>
<nav>
<ul class="menu">
    <li><a href="<?php echo '/babycms'; ?>">Home</a></li>
    <li><a href="<?php echo '/babycms/admin'; ?>">Admin</a></li>     
    <?php
        //get the rest of the pages
        $result = mysqli_query($conn, "SELECT * FROM pages WHERE isRoot='1' ORDER BY pageID");
        while ($row = mysqli_fetch_object($result))
        {
            //Look through the mysql table and see how many pages there are and put them in the nav
            $title = $row->pageTitle;
            $id = $row->pageID;
            echo '<li><a href="http://melvindaytree.com/babycms/pages/generate.php?id= '. $id .'"">' . $title . '</a></li>'; 
        } 
    ?> 
    </ul>
</nav>