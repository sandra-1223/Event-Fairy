<?php
$servername = "localhost";
$username="root";
$password = "";
$database_name = "cake";
$conn = mysqli_connect($servername, $username, $password, $database_name); 
if( !$conn)
{
   die("Connection Failed:". mysqli_connect_error());
}
if(isset($_POST['save']))
{
        $events = $_POST['events'];
        $weight = $_POST['weight'];
        $type = $_POST['type'];
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $delivery_date = $_POST['delivery_date'];
        $delivery_slot = $_POST['delivery_slot'];
        $message = $_POST['message'];

        $sql_query = "INSERT INTO cake (events, weight, type, name, phone_number, email, delivery_date, delivery_slot,  message) 
        VALUES ('$events', '$weight', '$type', '$name', '$phone_number', '$email',   '$delivery_date', '$delivery_slot', '$message')";
        if (mysqli_query($conn, $sql_query))
        {
                echo '<script>alert("Your cake is ordered")</script>';  
        } 
        else
        {
           echo "Error: ". $sql . "". mysqli_error($conn);
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

* {  box-sizing: border-box;}

.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 5px;
  color: white;   
  text-shadow: 2px 2px 4px #000000;
  height: 30px;   
  background-image: linear-gradient(to right, red , yellow); 
  width: 240px;
}

.marq img{
 border: 5px solid white;  border-radius: 15px; 
}
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

<br><br>
<center>
<img src="images/ty.png" alt="Trulli" width="180" height="120">
<br><br><h1>Hi <?php echo $_POST["name"]; ?>,
<br>Thankyou for Ordering!</h1>
<h3>Please get in touch if you have any questions about Sales, Billing, or Technical Support</h3>
</center>

<!-- gallery -->
<center>
	<hr><br><H2> ------------- OUR SERVICES -------------</H2>
	<br>
<marquee class="marq" behavior="scroll" direction="left">	
  		<img src="images/ms1.png" width="250" height="300">
		<img src="images/ms2.png" width="250" height="300">
                <img src="images/ms3.png" width="250" height="300">
	        <img src="images/ms4.png" width="250" height="300">
		<img src="images/ms5.png" width="250" height="300">
		<img src="images/ms6.png" width="250" height="300">
		<img src="images/ms7.png" width="250" height="300">
		<img src="images/ms8.png" width="250" height="300">
		<img src="images/ms9.png" width="250" height="300">
		<img src="images/ms10.png" width="250" height="300">
		<img src="images/ms11.png" width="250" height="300">
		<img src="images/ms12.png" width="250" height="300">

</center>
</marquee>

<!-- footer -->
<div class="footer">
	<div class="col-md-20 text-right"><br><a href="#"  class="link"> About Us </a>
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
</body>
</html>