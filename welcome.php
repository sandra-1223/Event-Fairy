<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Welcome</title>
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
.footer {   	height: 90px;         width: 100%;	left: 0;        bottom: 0;        text-align: center; 	background-color: black;  color: white;  }
.footer a { 	color: white; 	text-decoration: none;}
.footer a:hover { 	color:grey;  	text-decoration: underline; }
* {  box-sizing: border-box;  float:center; }
div.gallery {   margin: 20px;  float: left;   width: 180px;  float:left; text-align:center; }
div.gallery:hover {   border: 1px solid #777; border-radius: 10px; }
div.gallery img {   width: 100 height: 100  float:left; text-align:center;}
div.desc {   padding: 5px;   text-align: center; }
#grad1 {   height: 160px;  background-color:#ff9900;}
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

<center><h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
                     <p><a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a></p>
</center>

<br><br><br>

<!-- event frame -->
<div id="grad1">
<div class="gallery"><a href="Bridetobe2.html"><img src="images/f1.png" width="100" height="100"></a><div class="desc">Bride to be</div></div>
<div class="gallery"><a href="Engagement2.html"><img src="images/f2.png" width="100" height="100"></a><div class="desc">Engagement</div></div>
<div class="gallery"><a href="Wedding2.html"><img src="images/f3.png" width="100" height="100"></a><div class="desc">Wedding</div></div>
<div class="gallery"><a href="Babyshower2.html"><img src="images/f4.png" width="100" height="100"></a><div class="desc">Baby Shower</div></div>
<div class="gallery"><a href="Namingceremony2.html"><img src="images/f5.png" width="100" height="100"></a><div class="desc">Naming Ceremony</div></div>
<div class="gallery"><a href="Birthday2.html"><img src="images/f6.png" width="100" height="100"></a><div class="desc">Birthday</div></div>
</div>

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
