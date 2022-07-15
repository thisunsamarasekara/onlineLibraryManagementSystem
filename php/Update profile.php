

<!doctype html>
<html>
<head>
<link rel="stylesheet"href="../css/styles_footer.css">
<link rel="stylesheet"href="../css/styles_header.css">
<link href="../css/updateprofile.css" rel="stylesheet" type="text/css">
<script type ="text/javascript" src="../js/upprofile.js"></script>
<meta charset="utf-8">
<style>
.footer {
position:fixed;
left: 0;
bottom: 0;
width: 100%;
height: 50px;	
  /* background-color: red;*/
color: white;
text-align: center;
}
</style>
	
	
	
<title>Update Profile</title>
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
			  <li><a href="#">Login</a></li>
			  <li><a href="#">Explore</a></li>
			  <li><a href="#">Bookcart</a></li>
			  <li><a href="#">Account</a></li>
			</ul>
		</div>
		
		<!-- navigation bar 2 -->
		<div class = "nav_bar">
			<ul id = "menu" class = "nav2">
			  <li><a href="home.php">Home</a></li>
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
<form action="Update profile.php" method="post" name="myForm" onsubmit="return(validation());">
<div class="box">	
<?php
require_once "connection.php";

$is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');

if($is_page_refreshed ) {
  //echo 'This Page Is refreshed.';

 if(isset($_POST['btnupdate'])) { 
	
	$id=trim($_POST['m_id']);
	$name = trim($_POST['m_name']);
	$dob = trim($_POST['m_dob']);
	$address=trim($_POST['m_address']);
	$mgender=trim($_POST['m_gender']);
	$mpnumber=trim($_POST['m_number']);
	$memail=trim($_POST['m_mail']);
	$mpass=trim($_POST['m_password']);

//$usql ="UPDATE member SET m_name='$name', m_dob='$dob', m_address ='$address', m_gender='$mgender', m_number='$mpnumber', m_mail ='$memail',m_password='$mpass' WHERE $id";
//echo $usql;

if($result = mysqli_query($conn,$usql)){
	echo 'Updated Sucessfuly';
echo $result;
echo "<script>location.href='member.php'; </script>";
        exit;
  /*if(mysqli_num_rows($result)==1){
		echo 'Updated Sucessfuly';
	}
	else
	{
		echo 'Not Updated Sucessfuly';

	}*/

	 
} 
mysqli_close($conn);
 }
} else {
//echo 'This page is freshly visited. Not refreshed.';
 
//session_start();

$useremail=$_SESSION["mail"];

$usname="";
$sql = "SELECT * FROM member where m_mail='$useremail'";


if($result = mysqli_query($conn,$sql)){
    if(mysqli_num_rows($result)>0){
        echo"<table border=1 class='mdesign' width=100% height=100%>";
        
        echo"<thead>";
        echo"<tr>";
       
        echo"<th>topic</th>";
        echo"<th>member Details</th>";
        echo"</tr>";
        echo"</thead>";
        echo"<tbody>";
    while($row= mysqli_fetch_array($result)){
        echo"<tr>";
            echo"<td>".'Member ID'."</td>";
			echo "<td> <input type='text' name='m_id' value= ".$row['m_id']." > </td>";
			//echo"<td>".$row['m_address']."</td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member NAME'."</td>";
            echo "<td> <input type='text' name='m_name' value= ".$row['m_name']." > </td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member DOB'."</td>";
            echo "<td> <input type='text' name='m_dob' value= ".$row['m_dob']." > </td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member address'."</td>";
            echo "<td> <input type='text' name='m_address' value= ".$row['m_address']." > </td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member gender'."</td>";
            echo "<td> <input type='text' name='m_gender' value= ".$row['m_gender']." > </td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member phone number'."</td>";
            echo "<td> <input type='text' name='m_number' value= ".$row['m_number']." > </td>";
            echo"</tr>";
            echo"<tr>";
            echo"<td>".'Member Email'."</td>";
            echo "<td> <input type='text' name='m_mail' value= ".$row['m_mail']." > </td>";
			echo"</tr>";
			echo"<tr>";
            echo"<td>".'Member password'."</td>";
            echo "<td> <input type='text' name='m_password' value= ".$row['m_password']." > </td>";
            echo"</tr>";
            
            
	}
	
    echo"</tbody>";
	echo"</table>";
	
	
    //$_SESSION['id']=$row['m_id'];
    mysqli_free_result($result);
    }else{
        echo"no results";
    }

}else{
    echo"ERROR:could not able to execute $sql." .mysqli_error($conn);

}
mysqli_close($conn);

}

?>
		
	<button class="btn">CANCEL</button>
	<button name ="btnupdate" class="btn">DONE</button>
		
	
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
