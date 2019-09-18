<?php
$username="";
$password="";
$message="";
$result="";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//check to see if there is a username or password entered
    if(!empty(trim($_POST["username"]))){
     $username = trim($_POST["username"]);
    }    
    if(!empty(trim($_POST["password"]))){
        $password = trim($_POST["password"]);
    }     
    // Validate credentials
    if(!empty($username) && !empty($password)){

        $sql = mysqli_query($link,"SELECT * FROM users WHERE userName='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
        $result  = mysqli_num_rows($sql);

        if($result==0) {
            $message = "Invalid Username or Password!";
            echo $message;
        } else {
            session_start();
            $_SESSION["authenticated"] = 'true';
            header('Location: index.php');
        }
        // Close connection
    }
     mysqli_close($link);
}
?>    