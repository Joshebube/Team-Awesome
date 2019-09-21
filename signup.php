<?php 
require_once("config.php");

$username="";
$password="";
$email="";
$displayname="";
$com_password="";
$errors=array();
$query="";
$patern="";
$result="";
$sql_u="";
$sql_d="";
$sql_e="";
$res_u="";
$res_d="";
$res_e="";

//Checks to see if the signup button was clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Validates username
    if(!empty((trim($_POST["username"]))) || $_POST["username"]!=="" && !is_numeric($_POST["username"]) ){
        $pattern = "/^[a-zA-Z0-9\_]{2,20}/";
        if (preg_match($pattern, $_POST["username"])){
        $sql_u = "SELECT * FROM users WHERE userName= {$_POST["username"]}";
            $res_u = mysqli_query($link, $sql_u);
            if (!$res_u && mysqli_num_rows($res_u) == 0) {
                $username= trim($_POST["username"]);	
              } else{
                $errors[]= "Please enter a valid Username";
                
            }
            
        }
    } 
//Validates password
    if(!empty((trim($_POST["password"]))) && $_POST["password"]!==""){
        if(!empty((trim($_POST["com_password"]))) && $_POST["com_password"]!==""){
            if($_POST["password"] === $_POST["com_password"]){
             $password= trim($_POST["password"]);
            }
        }  else{
            $errors[password]= "Please enter a valid Password or passwords do not match";
        } 
    }
    //Validates display name
    if(!empty((trim($_POST["displayname"]))) || $_POST["displayname"]!=="" && !is_numeric($_POST["displayname"]) ){
        $pattern = "/^[a-zA-Z0-9\_]{2,20}/";
        if (preg_match($pattern, $_POST["displayname"])){ 
        $sql_d = "SELECT * FROM users WHERE displayName= {$_POST["displayname"]}";
            $res_d = mysqli_query($link, $sql_d);
            if (!$res_d && mysqli_num_rows($res_d) == 0) {
                $displayname= trim($_POST["displayname"]); 	
              }else{
                $errors[]= "Please enter a valid Display Name";
            }
            
        }
    } 
    //Validates Email
    if(preg_match("/@/", $_POST["email"])){
    $sql_e = "SELECT * FROM users WHERE email= {$_POST["email"]}";
        $res_e = mysqli_query($link, $sql_e);
        if (!$res_e || mysqli_num_rows($res_e) == 0) {
            $email= trim($_POST["email"]); 	
          } else{
            $errors[email]= "Please enter a valid Email" ; 
        }
        
    } 
    //Displays validation errors
    if (!empty($errors)){
        echo "<div class=\"error\">";
        echo "Please fix the following errors:";
        echo"<ul>";
        foreach($errors as $key => $error){
            echo "<li>{$error}</li>";
        }
    echo "</ul>";
    echo "</div>";
    }else{
        //inserts record into the database
      $query= "INSERT INTO users (userName, password, displayName, email)
               VALUES ('{$username}', '{$password}', '{$displayname}', '{$email}')";
        
    }
    //checks to see if insert was successful
    if(mysqli_query($link, $query)){
        session_start();
        $_SESSION["authenticated"] = 'true';
        header('Location: login.php');
    }else{
        die("something went wrong.");
    }
   
    // Close connection
    mysqli_close($link);
    

}

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="signup.css">
    <title>Sign-up | Team-Awesome</title>
</head>
<body>

    <div class="awesome-sign-in">
        <img src="avatar.png" alt="" srcset="">
        <h1 class="signup">Sign Up</h1>
        <form action="signup.php" method="post">
            <input type="text" class="input-box" name= "username" value="" placeholder="Username..." required>
            <input type="text" class="input-box" name= "displayname" value="" placeholder="Display Name..." required>
            <input type="email" class="input-box" name="email" value="" placeholder="Email..." required>
            <input type="password" class="input-box" name="password" value="" placeholder="Password..." required>
            <input type="password" class="input-box" name="com_password" value="" placeholder="Confirm Password..." required>
            


            <button class="login-button"type= "submit" name="submit" value="submit">SIGN UP</button>
            <hr>

            <p class="or">OR</p>

            <button class="facebook-button">Login with Faceboook</button>
            <p>Already have an account? <a href="login.html">Log in</a></p>
        </form>
    </div>
    
</body>
</html>