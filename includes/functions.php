 <?php


 //log user in ---------------------------------------------------
function login($user, $pass){

   //strip all tags from variable   
   $user = strip_tags(mysql_real_escape_string($user));
   $pass = strip_tags(mysql_real_escape_string($pass));

//md5 calculates the hash of a string and returns the hash
//this is not a good method for security because modern pcs can easliy brute force the program
   $pass = md5($pass);

   // check if the user id and password combination exist in database
   $sql = "SELECT * FROM members WHERE username = '$user' AND password = '$pass'";
   $result = mysqli_query($conn, $sql) or die('Query failed. ' . mysqli_error());
      
   if (mysqli_num_rows($result) == 1) {
      // the username and password match,
      // set the session
      $_SESSION['authorized'] = true;
                      
      // direct to admin
      header('Location: '. $DIRADMIN);
      exit();
   } else {
    // define an error message
    $_SESSION['error'] = 'Sorry, wrong username or password';
   }
}

function logged_in() {
    if($_SESSION['authorized'] == true) {
        return true;
    } else {
        return false;
    }    
}

function login_required() {
    if(logged_in()) {    
        return true;
    } else {
        header('Location: '.$DIRADMIN.'login.php');
        exit();
    }    
}

function logout(){
    unset($_SESSION['authorized']);
    header('Location: '.$DIRADMIN.'login.php');
    exit();
}


//shows any messages stored during the session
function messages() {
    $message = '';
    if($_SESSION['success'] != '') {
        $message = '<div class="msg-ok">'.$_SESSION['success'].'</div>';
        $_SESSION['success'] = '';
    }

  
    if($_SESSION['error'] != '') {
        $message = '<div class="msg-error">'.$_SESSION['error'].'</div>';
        $_SESSION['error'] = '';
    }
    echo "$message";
}

//error loops through all the errors and shows them to the user
function errors($error){
    if (!empty($error))
    {
            $i = 0;
            while ($i < count($error)){
            $showError .= "<div>".$error[$i]."</div>";
            $i ++;
            }
            echo $showError;
    }// close if empty errors
} // close function

 ?>