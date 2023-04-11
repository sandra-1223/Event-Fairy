<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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

<title>Register</title>
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
body	{    background-image: url("images/j.jpg"); background-repeat: no-repeat;   background-color: black;               }
* {  box-sizing: border-box;  float:center; }

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
        <center><h2>Registration</h2></center>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</div>

<br><br><br><br>

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