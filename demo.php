<?php
$servername="localhost";
$username="root";
$password="";
$database_name="feedback";
$conn=mysqli_connect($servername,$username,$password,$database_name);
if(!$conn)
{
  die("connection failed:". mysqli_connect_error());
}
if(isset($_POST['save']))
{
	$name=$_POST['name'];
	$subject=$_POST['subject'];
	$sql_query="INSERT INTO persons(name,subject) VALUES('$name','$subject')";
	if(mysqli_query($conn,$sql_query))
	{
	 echo '<script>alert("Inserted successfully")</script>';  
	}
	else 
	{
	 echo "error" . $sql . "". mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel = "icon" href =  "images/icon.png"  type = "image/x-icon" sizes="16x16"> 

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
body {   margin: 0; }

.topnav {   overflow: hidden;   background-color: black;   top: 0; }
.topnav a {     color: white;   text-align: center;   padding: 14px 16px;   text-decoration: none;   font-size: 17px; }
.topnav a:hover {     color: grey;     text-decoration: underline; }
.topnav-right {   float: right; }

.footer {    height: 140px;   width: 100%; left: 0; bottom: 0; text-align: center; background-color: black;  color: white;  }
.footer a {  color: white; text-decoration: none; }
.footer a:hover { 	color:grey;  	text-decoration: underline; }

.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}

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

<!-- scrolling gallery -->
<div class="w3-content w3-display-container" style="max-width:100%">
  <img class="mySlides" src="images/r1.png" style="width:100%" height="400">
  <img class="mySlides" src="images/r2.jpg" style="width:100%" height="400">
  <img class="mySlides" src="images/r3.jpg" style="width:100%" height="400">
  <img class="mySlides" src="images/r4.jpg" style="width:100%" height="400">
  <img class="mySlides" src="images/r5.jpg" style="width:100%" height="400">
  <img class="mySlides" src="images/r6.jpg" style="width:100%" height="400">
  <img class="mySlides" src="images/r7.jpg" style="width:100%" height="400">
  <img class="mySlides" src="images/r8.jpg" style="width:100%" height="400">
 
<div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(4)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(5)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(6)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(7)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(8)"></span>
   
    </div>
</div>

<!-- event frame -->
<div id="grad1">
<div class="gallery"><a href="Bridetobe.html"><img src="images/f1.png" width="100" height="100"></a><div class="desc">Bride to be</div></div>
<div class="gallery"><a href="Engagement.html"><img src="images/f2.png" width="100" height="100"></a><div class="desc">Engagement</div></div>
<div class="gallery"><a href="Wedding.html"><img src="images/f3.png" width="100" height="100"></a><div class="desc">Wedding</div></div>
<div class="gallery"><a href="Babyshower.html"><img src="images/f4.png" width="100" height="100"></a><div class="desc">Baby Shower</div></div>
<div class="gallery"><a href="Namingceremony.html"><img src="images/f5.png" width="100" height="100"></a><div class="desc">Naming Ceremony</div></div>
<div class="gallery"><a href="Birthday.html"><img src="images/f6.png" width="100" height="100"></a><div class="desc">Birthday</div></div>
</div>

<!-- video -->
<center><video width="720" height="540" controls>
  <source src="eventfairy.mp4" type="video/mp4">
  <source src="eventfairy.ogg" type="video/ogg">
  Your browser does not support the video tag.
</video></center>

<!-- footer -->
<div class="footer">
	<div class="col-md-20 text-right"><br><a href="aboutus.html"  class="link"> About Us </a>
                                              <span style="padding-left:50px">|</span>
	                                      <span style="padding-left:50px"><a href="faqs.html" target="_blank" class="link">FAQs</a></span>
                                              <span style="padding-left:50px">|</span>
                                              <span style="padding-left:50px"><a href="customer review.html" target="_blank" class="link">Customer Review</a>
                                              <span style="padding-left:50px">|</span>
	                                      <span style="padding-left:50px"><a href="feedback.html" target="_blank" class="link">Give Feedback</a>
                                              <span style="padding-left:50px">|</span>
	                                      <span style="padding-left:50px"><a href="#" target="_blank" class="link">Terms</a>
                                              <span style="padding-left:50px">|</span>
	                                      <span style="padding-left:50px"><a href="#" target="_blank" class="link">Privacy</a>
                                              <span style="padding-left:50px">|</span>
	                                      <span style="padding-left:50px"><a href="#" target="_blank" class="link">Refunds</a><br>
					      
                                              <p><small class="block">&copy; 2021 . All Rights Reserved.
                                              <br>Designed by <br>
                                              <font color="grey">sandra.sony@science.christuniversity.in
                                                                 <span style="padding-left:50px">teena.tomy@science.christuniversity.in</span>
                                                                 <span style="padding-left:50px">sheryl.stephen@science.christuniversity.in</span></font>
                                              </small></p>
             </div>
</div>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}

var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000); // Change image every 5 seconds
}
</script>

</body>
</html>