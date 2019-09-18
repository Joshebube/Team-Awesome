<?php
require_once("config.php");
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
            header('Location: dashboard.php');
        }
        // Close connection
    }
     mysqli_close($link);
}
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Log-in | Team-Awesome</title>
</head>
<body>

    <div class="awesome-sign-in">
        <img src="avatar.png" alt="" srcset="">
        <h1>Log in</h1>
        <form action="login.php" method="post">
            <input type="username" class="input-box" name="username" value="<?php echo htmlspecialchars($username)?> " placeholder="Username" required>
            <input type="password" class="input-box" name="password" value="" placeholder="Password" required>

            <label for="remember">
            <p ><span id=""><input type="checkbox" name="remember" id="remember"></span> Remember me</p>
            </label>

            <button class="login-button" type= "submit" name="submit" value="submit">Log in</button>
            <hr>

            <p class="or">OR</p>

            <button class="facebook-button">Login with Faceboook</button>
            <p>Don't have an account? <a href="sign-up.html">sign up</a></p>
        </form>
    </div>
    
</body>
</html>