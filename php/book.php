<!-- Created by Chiranjaya Chandrasena -->
<!-- IT20183554 -->
<?php 
include 'connection.php';

$bookid = $_GET['bookid'];

$book = "SELECT * FROM book WHERE b_id= '$bookid'";
		
$result = mysqli_query($conn,$book);

//Getting User Details to Reserve books
$user =  $_SESSION['mail'];
$userid = "SELECT * FROM member WHERE m_mail = '$user'";
$res = mysqli_query($conn,$userid);
while($row_user = $res->fetch_assoc()) 
	{
		$memberid = $row_user['m_id'];
	}			


?>

<!DOCTYPE html>
<html>

<head>

	<title>Book</title>
	
	<!-- icon  -->
	<link rel = "icon" href = "../images/logo_icon.png" type = "image/x-icon"> 
	
	<!-- styles header  -->
	<link rel="stylesheet" href="../css/styles_header.css">
	<!-- styles footer  -->
	<link rel="stylesheet" href="../css/styles_footer.css">
	
	<!-- styles body  -->
	<link rel="stylesheet" href="../css/styles_book.css">
	
	<!-- viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
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
			  <li><a href="member.php">Account</a></li>
			</ul>
		</div>
		
		<!-- navigation bar 2 -->
		<div class = "nav_bar">
			<ul id = "menu" class = "nav2">
			  <li><a href="home.php">Home</a></li>
			  <li><a href="login.php">Login</a></li>
			  <li><a href="search_books.php"">Explore</a></li>
			</ul>
		</div>
			
		<!-- navigation bookcart buttons -->
		<div class = "nav_bar_btn">
			<button class = "bkcart" onclick="location.href = '../html/BookCart.html';" ></button>
			
			<span style = "margin-left:20px" ></span>
			
			<!-- navigation account buttons -->
			<button class = "acc" onclick="location.href = ''member.php;" ></button>
		</div>
		
		<!-- navigation menu -->
		<img src  = "../images/menu.png" class = "menu" onclick = "menutoggle()" >
		
	</div>
</div>

<br><br><br><br><br><br><br><br><br>

<!-- js -->
<script src="../js/search_books.js"></script>

<!-- js header-->
<script src="../js/header.js"></script>

<!-- back button -->
<div class = "back">
	<img src = "../images/back.png" onclick = "back()" class = "back_img">
	<button onclick = "back()" class = "back_btn">Go Back</button> 
</div>

<?php 
	while($row = $result->fetch_assoc()) 
	{
		$name = $row['b_name'];
		$author = $row['b_author'];
		$publisher = $row['b_publisher'];
		$category = $row['b_category'];
		$description = $row['b_description'];
		$image = base64_encode($row['b_image']);
	}
	
		echo "<div class = 'bookdetail'>";
		
		echo "<img src = 'data:image;base64, $image' class = 'book' >" ;
		
		echo "<div class = 'detail'>";
			echo "<p class = 'p1'>" ."Name: " .$name ."</p>";
			echo "<p class = 'p1'>" ."Author: " .$author ."</p>";
			echo "<p class = 'p1'>" ."Publisher: " .$publisher ."</p>";
			echo "<p class = 'p1'>" ."Category: " .$category ."</p>";
		echo "</div>";
		
		echo "<p class = 'des'>"  .$description ."</p>";
		
	
?>

<!-- reserve button -->

<form action="reserve.php?memberid=<?php echo $memberid ?> & bookid=<?php echo $bookid ?> " method="post">
	<input type="submit" value = "Reserve" class = "rbutton" >
</form>
									
</div>	
	
<!-- footer -->
<div class="footer">
	<br>
	<p class = "cpy">Copyright©2020</p>
	<img src  = "../images/whatsapp_icon.png" class = "whatsapp_icon">
	<img src  = "../images/facebook_icon.png" class = "facebook_icon">
</div>

</body>

</html>