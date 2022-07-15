<?php 
// error_reporting returns the old error code
$old_error_reporting = error_reporting(0);
include 'connection.php';


if(!isset($_SESSION['mail'])){
   echo "<script> alert('Not logged in'); window.location.href='login.php'; </script>";

}

?>

<!doctype html>
<html>
<head>

<link rel="stylesheet"href="../css/styles_header.css">
<link rel="stylesheet"href="../css/styles_footer.css">
<link href="../css/member.css" rel="stylesheet" type="text/css">
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
	
	
	
	
<title>member</title>
	
<link rel = "icon" href = "../images/logo_icon.png" type = "image/x-icon"> 
	
</head>

<body>

	<div class = "header">

	<!-- logo -->
	<div class = "logo">
		<img src = "../images/logo.png" alt = "Logo" >
	</div>

	<!-- navigation bar -->
	<div class = "nav_all">
		<div class = "nav_bar">
			<ul id = "menuItems" class = "nav">
			  <li><a href="home.php">Home</a></li>
			  <li><a href="login.php">Login</a></li>
			  <li><a href="search_books.php">Explore</a></li>
			  <li><a href="../html/BookCart.html">Bookcart</a></li>
			  <li><a class = "current" href="#">Account</a></li>
			</ul>
		</div>
		
		<!-- navigation bar 2 -->
		<div class = "nav_bar">
			<ul id = "menu" class = "nav2">
			  <li><a href="home.php">Home</a></li>
			  <li><a href="login.php">Login</a></li>
			  <li><a href="search_books.php">Explore</a></li>
			</ul>
		</div>
		
		
		
		
		<!-- navigation bookcart buttons -->
		<div class = "nav_bar_btn">
			<button class = "bkcart" onclick="location.href = '../html/BookCart.html';" ></button>
			
			<span style = "margin-left:20px" ></span>
			
			<!-- navigation account buttons -->
			<button class = "acc" onclick="location.href = '#';" ></button>
		</div>
		
		<!-- navigation menu -->
		<img src  = "../images/menu.png" class = "menu" onclick = "menutoggle()" >
		
	</div>
</div>
	
	<br><br>
	
	<form action="member.html"  name="myForm" >
	
	<div class="memberfroum">
	
		
		<table width="200" align="right">
  <tbody>
    <tr>
      <td><a href="../html/BookCart.html" class="linkbutton">Book Cart</a>
		 </td>
      <td> <a href="Update profile.php" class="linkbutton">Update Profile</a></td>
      
    </tr>
  </tbody>
</table>
<div class="maindiv">
<?php
$useremail=$_SESSION["mail"];
include "connection.php";
$usname="";
$sql = "SELECT * FROM member where m_mail='$useremail'";
if($result = mysqli_query($conn,$sql)){
    if(mysqli_num_rows($result)>0){
        echo"<table border=1 class='mdesign'width=100% height=100%>";
        
        echo"<thead>";
        echo"<tr>";
       
        echo"<th class='t1'>topic</th>";
        echo"<th class='t1'>member Details</th>";
        echo"</tr>";
        echo"</thead>";
        echo"<tbody>";
    while($row= mysqli_fetch_array($result)){
        echo"<tr>";
            echo"<td>".'Member ID'."</td>";
            echo"<td>".$row['m_id']."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member NAME'."</td>";
            echo"<td>".$row['m_name']."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member DOB'."</td>";
            echo"<td>".$row['m_dob']."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member address'."</td>";
            echo"<td>".$row['m_address']."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member gender'."</td>";
            echo"<td>".$row['m_gender']."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member phone number'."</td>";
            echo"<td>".$row['m_number']."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member Email'."</td>";
            echo"<td>".$row['m_mail']."</td>";
            echo"</tr>";
            
    }
    echo"</tbody>";
    echo"</table>";
    $_SESSION['id']=$row['m_id'];
    mysqli_free_result($result);
    }else{
        echo"no results";
    }

}else{
    echo"ERROR:could not able to execute $sql." .mysqli_error($conn);

}
//mysqli_close($conn);


?>

		

		
</div>

</div>

<div class="memberdetails">
	<table width="100%" height="100%">
  <tbody>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table width="200"  border=1 class="mtable">
  <tbody>
    <tr>
      <td>
		<img src="../images/man-pointing-head-icon_gg86542747.jpg" width="40" height="40" alt=""/>
		
		</td>
    </tr>
    <tr>
     
      <td>
      
      <?php

//require_once "connection.php";

$sql = "SELECT * FROM member where m_mail='$useremail'";
if($result = mysqli_query($conn,$sql)){
    if(mysqli_num_rows($result)>0){
        echo"<table  class='mdesign'>";
        
      
    while($row= mysqli_fetch_array($result)){
        echo"<tr>";
            echo"<td class='mem'>".$row['m_name']."</td>";
            echo"</tr>";
           
    }
    echo"</tbody>";
    echo"</table>";
   
    mysqli_free_result($result);
    }else{
        echo"no results";
    }

}else{
    echo"ERROR:could not able to execute $sql." .mysqli_error($conn);

}
mysqli_close($conn);


?>

      
       </td>
 
    </tr>
    <tr>
      <td>
		<a href='login.php' class="logoutbtn">Log out</a>
		</td>
    </tr>
  </tbody>
</table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

	</div>


	</form>
		

	<!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->
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
