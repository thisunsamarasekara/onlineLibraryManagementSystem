<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../css/styles contact us.css">
<link rel="stylesheet" href="../css/styles_footer.css">
<link rel="stylesheet" href="../css/styles_header.css">	
<script type ="text/javascript" src="../js/contactus.js"></script>
<meta charset="utf-8">
<style>	
.footer {
position: fixed;
left: 0;
bottom: 0;
width: 100%;
height: 50px;	
  /* background-color: red;*/
color: white;
text-align: center;
}
</style>
	
	
<title>Contact us </title>
</head>

<body>
<?php

error_reporting(0);



	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $db     = 'library_management';
    $conn   = mysqli_connect($dbhost,$dbuser,$dbpass,$db);

    if(! $conn){
        die('could not connect:');

        
    }
	echo 'Connected successfully';
	
	$member_name = mysqli_escape_string($conn,$_REQUEST['Name']);
	$sender_email= mysqli_escape_string($conn,$_REQUEST['Email']);
	$sender_message=mysqli_escape_string($conn,$_REQUEST['Message']);
	$message_date= date("d/m/Y");
	
$sql ="INSERT INTO tbl_contactus ( sender_name, sender_email, sender_message, message_date) VALUES ('$member_name', '$sender_email', '$sender_message', '$message_date')";

if(mysqli_query($conn,$sql)){

	echo "Records added sucessfully";

}else{
	echo"Error: could not able to excute $sql.". mysqli_error($conn);
}
	mysqli_close($conn);

    ?>
	
	
	<div class = "header">

	<!-- logo -->
	<div class = "logo">
		<img src = "../images/logo.png" alt = "Logo" >
	</div>

	<!-- navigation bar -->
	<div class = "nav_all">
		<div class = "nav_bar">
			<ul id = "menuItems" class = "nav">
			  <li><a class = "current "href="#">Home</a></li>
			  <li><a href="#">Login</a></li>
			  <li><a href="#">Explore</a></li>
			  <li><a href="#">Bookcart</a></li>
			  <li><a href="#">Account</a></li>
			</ul>
		</div>
		
		<!-- navigation bar 2 -->
		<div class = "nav_bar">
			<ul id = "menu" class = "nav2">
			  <li><a class = "current2 "href="#">Home</a></li>
			  <li><a href="#">Login</a></li>
			  <li><a href="#">Explore</a></li>
			</ul>
		</div>
		
		
		
		
		<!-- navigation bookcart buttons -->
		<div class = "nav_bar_btn">
			<button class = "bkcart" onclick="location.href = 'test.html';" ></button>
			
			<span style = "margin-left:20px" ></span>
			
			<!-- navigation account buttons -->
			<button class = "acc" onclick="location.href = 'test.html';" ></button>
		</div>
		
		<!-- navigation menu -->
		<img src  = "../images/menu.png" class = "menu" onclick = "menutoggle()" >
		
	</div>
</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
<form action="contact us.php"  name="myForm" method="submit" onsubmit="return(validation());">
	<!-- container-->
	<div class="contact-form">
		
	<!--h1 -->
	<h1>Contact US</h1>
	<div class ="txtb">
	<label>Name</label>
	<input type= "text" name="Name" value= "" placeholder="Enter Your Name">	
		
		</div>	
		
	<div class ="txtb">
	<label>Email</label>
	<input type= "text" name="Email" value="" placeholder="Enter Your Email">	
		</div>
	
	<div class="txtb">
	<label>Message</label>
	<textarea name="Message"></textarea>
		</div>	
		
		<input class="btn" type="submit" value="Submit"/>
		
		
	
	
	</div>
</form>	
		
	
	
	
	<!-- js -->
	<script src="../js/header.js"></script>
	
	
	<!-- footer -->
<div class="footer">
	<br>
	<p class = "cpy">Copyright©2020</p>
	<img src  = "../images/whatsapp_icon.png" class = "whatsapp_icon">
	<img src  = "../images/facebook_icon.png" class = "facebook_icon">
</div>
	
</body>
</html>
