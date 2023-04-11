<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>

<title>Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel = "icon" href =  "images/icon.png"  type = "image/x-icon" sizes="16x16"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
body {  margin: 0; }

.wrapper{ width: 350px; padding: 20px; }
.topnav {   overflow: hidden;   background-color: black;   position: sticky;   position: -webkit-sticky;   top: 0; }
.topnav a {    color: white;   text-align: center;   padding: 14px 16px;   text-decoration: none;   font-size: 17px; }
.topnav a:hover {     color: grey;     text-decoration: underline; }
.topnav-right {   float: right; }
.container {   border-radius: 50px;   float:middle;   background-color: #f2f2f2;   max-width: 30%;   padding: 20px;   margin: auto; }
.footer {   	height: 90px;         width: 100%;	left: 0;        bottom: 0;        text-align: center; 	background-color: black;  color: white;  }
.footer a { 	color: white; 	text-decoration: none;}
.footer a:hover { 	color:grey;  	text-decoration: underline; }
body{   background-image: url("images/login.jpg"); background-repeat: no-repeat; background-color: black; height: 100%; background-position: center; background-size: cover; }
* {  box-sizing: border-box;  float:center; }
img.avatar {  width: 40%;  border-radius: 50%; }
</style>
</head>

<body>
<!-- header -->
<div class="topnav">
	<a href="home.html"><img src="images/logo.png" alt="Trulli" width="300" height="100"></a>
	<div class="topnav-right"><br><a href="home.html"><b>Home</a>
  				      <a href="aboutus.html">About Us</a>
  				      <a href="foodforall.html">Food for All</a>
  				      <a href="services.html">Services</a>
  				      <a href="gallery.html">Gallery</a>
 	  	   	 	      <a href="contact.html">Contact Us</a>
  				      <a href="register.php" onclick="alert('Welcome to Event Fairy !')">Register</a>
  				      <a href="login.php">Login</a>
        </div>
</div>
<br><br><br>
<div class="container">

    <div class="wrapper">
        <center><h2>Login</h2>
<img src="images/avatar.jpg" alt="Avatar" class="avatar"></center><br><br>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
    </div>
</div>

<br><br><br>
<!-- footer -->
<div class="footer">
	<div class="col-md-20 ">
                   <p><small class="block">&copy; 2021 . All Rights Reserved.<br>
                   <br>Designed by <br>
                   <font color="grey">sandra.sony@science.christuniversity.in
                   <span style="padding-left:50px">teena.tomy@science.christuniversity.in</span>
                   <span style="padding-left:50px">sheryl.stephen@science.christuniversity.in</span></font>
                   </small></p>
        </div>
</div>

</body>
</html>
