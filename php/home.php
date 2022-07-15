<!-- Created by Ravindu Rajasinghe IT20200374 -->

<?php
	include_once('connection.php');
	
	//latest 
	$query = mysqli_query($conn, "SELECT * FROM book ORDER BY b_id DESC LIMIT 1");
	$printlast = mysqli_fetch_row($query);
	$printimg = '<img src = "data:image;base64,'.base64_encode($printlast[6]).'" alt = "Latest" class = "latest_image" >';
	
	//recommenended
	$query_rec = mysqli_query($conn, "SELECT * FROM book ORDER BY RAND() LIMIT 1");
	$printrec = mysqli_fetch_row($query_rec);
	$printimg_rec = '<img src = "data:image;base64,'.base64_encode($printrec[6]).'" alt = "Latest" class = "latest_image" >';
	
	// logout
	if(isset($_POST['logout'])){
    session_destroy();
    header('Location: home.php');
	}
?>

<!DOCTYPE html>
<html>
<head>

	<title>eLibrary</title>
	
	<!-- icon  -->
	<link rel = "icon" href = "../images/logo_icon.png" type = "image/x-icon"> 
	
	<!-- styles header  -->
	<link rel="stylesheet" href="../css/styles_header.css">
	<!-- styles footer  -->
	<link rel="stylesheet" href="../css/styles_footer.css">
	<!-- styles carousal  -->
	<link rel="stylesheet" href="../css/styles_carousal.css">
	<!-- styles home  -->
	<link rel="stylesheet" href="../css/styles_home.css">
	
	
	<!-- viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 
</head>

<body>


<div class = "header">

	<!-- logo -->
	<div class = "logo">
		<img src = "../images/logo.png" alt = "Logo" >
	
		
	
		 <form method='post' action="" class = "status">
            
			<?php
			if(isset($_SESSION['mail'])){
				echo '<input type="submit" value="" name="logout" class = "online">';
			}else
			{
				echo '<input value="" class = "offline">';
			}
			?>
		</form>
	
	</div>
	

	<!-- navigation bar -->
	<div class = "nav_all">
		<div class = "nav_bar">
			<ul id = "menuItems" class = "nav">
			  <li><a class = "current "href="#">Home</a></li>
			  <li><a href="login.php">Login</a></li>
			  <li><a href="search_books.php">Explore</a></li>
			  <li><a href="../html/BookCart.html">Bookcart</a></li>
			  <li><a href="member.php">Account</a></li>
			</ul>
		</div>
		
		<!-- navigation bar 2 -->
		<div class = "nav_bar">
			<ul id = "menu" class = "nav2">
			  <li><a class = "current2 "href="#">Home</a></li>
			  <li><a href="login.php">Login</a></li>
			  <li><a href="search_books.php">Explore</a></li>
			</ul>
		</div>
		
		
		
		
		<!-- navigation bookcart buttons -->
		<div class = "nav_bar_btn">
			<button class = "bkcart" onclick="location.href = '../html/BookCart.html';" ></button>
			
			<span style = "margin-left:20px" ></span>
			
			<!-- navigation account buttons -->
			<button class = "acc" onclick="location.href = 'member.php';" ></button>
		</div>
		
		<!-- navigation menu -->
		<img src  = "../images/menu.png" class = "menu" onclick = "menutoggle()" >
		
	</div>
</div>

	<!-- js -->
	<script src="../js/header.js"></script>
	
	<br><br><br>	<br><br><br>	<br><br><br>

	<!-- image carousel -->
	<div class="gallery">
		<div class="gallery-container">
		  <img class="gallery-item" src="../images/books/1.jpg">
		  <img class="gallery-item" src="../images/books/3.jpg">
		  <img class="gallery-item" src="../images/books/8.jpg">
		  <img class="gallery-item" src="../images/books/9.jpg">
		  <img class="gallery-item" src="../images/books/5.jpg">
		</div>
		<div class="gallery-controls"></div>
  </div>
  
	<!-- carousal js -->
	<script src="../js/carousal.js"></script>
	
	<br>
	
	<!-- latest -->
	<div class = "latest">
		<p class = "latest_title">Latest</p><br>
		<?php echo $printimg; 
			  echo '<h3 style = "text-align:center; font-size:18px" >' .$printlast[1]; echo '</h3>';
		?>
		
		<p style= " text-align:center; padding:10px; margin:auto; height:120px; width:250px; font-size:18px; overflow:auto;" >
			<?php echo $printlast[5]; ?>
		</p>
		
	</div>
	
	<!-- Recommenended Books  -->
	<div class = "recommenended">
		<p class = "recommenended_title">Recommenended Books</p><br>
		<?php echo $printimg_rec; 
			  echo '<h3 style = "text-align:center; font-size:18px" >' .$printrec[1]; echo '</h3>';
		?>
		
		<p style= " text-align:center; padding:10px; margin:auto; height:120px; width:250px; font-size:18px; overflow:auto;" >
			<?php echo $printrec[5]; ?>
		</p>
	</div>
	
	<!-- Author Books  -->
	<div class = "author">
		<p class = "author_title">Author of the week</p><br>
		<img class ="author_image" src="../images/author/jk_rowling.jpg">
		<h3 style = "text-align:center; font-size:18px">J. K. Rowling</h3>
		<p style = "padding:10px; margin:auto; font-size:20px; text-align:center;" >J. K. Rowling, is a British writer and philanthropist. She is best known for writing the Harry Potter fantasy series, which has won multiple awards and sold more than 500 million copies</p>
	</div>
	<br><br>

	<!-- footer -->
	<div class="footer">
	<a href="../html/contact us.html" class = "contactus" >Contact us</a></p>
		<br>
		<p class = "cpy">Copyright©2020</p>
		<img src  = "../images/whatsapp_icon.png" class = "whatsapp_icon">
		<img src  = "../images/facebook_icon.png" class = "facebook_icon" onclick="location.href = 'https://www.facebook.com/';">
	</div>

</body>

</html>
<!-- Created by Ravindu Rajasinghe IT20200374 -->