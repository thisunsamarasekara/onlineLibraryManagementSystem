
<?php
// error_reporting returns the old error code
$old_error_reporting = error_reporting(0);

include('connection.php');
include ('overdue.php');

//select lists
$tab1_books = mysqli_query($conn,"SELECT * FROM book");
$tab2_member = mysqli_query($conn,"SELECT * FROM member ORDER BY m_id DESC LIMIT 5");



    //search
	$name =  $_GET['search'];
	$tab1_member = mysqli_query($conn, "SELECT * FROM member WHERE m_name LIKE '%{$name}%'");

    // reset error_reporting to its old value
    error_reporting($old_error_reporting);



?>
<html>

<!-- Created by Ravindu Rajasinghe IT20200374 -->
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
	<!-- styles admin  -->
	<link rel="stylesheet" href="../css/styles_admin.css">
	
	
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
			<button class = "acc" ></button>
		</div>
		
		<!-- navigation menu -->
		<img src  = "../images/menu.png" class = "menu" onclick = "menutoggle()" >
		
	</div>
</div>

	<!-- js -->
	<script src="../js/header.js"></script>
	<script src="../js/admin.js"></script>
	
	<br><br><br>	<br><br><br>	<br><br><br>


<!-- left main menu -->
<div class = "lmenu">

	<img src = "../images/admin.png" alt = "Profile">
	<p>Admin</p>

	<form class = "lmenu_form">
			<select name="sel" id="sel" onchange = "Toggle()">
				<option value="book">Book</option>
				<option value="member">Member</option>
			</select>
		<br><br><br>
		<!--btn -->
		<a href='../html/addbook.html' class = "addbtn" id = "Bookbtn" >Add Book</a>
		<a href='../html/registration.html' class = "addbtn" id = "Memberbtn" style = "display:none" >Add Member</a>
		
		<br>
		
		<a href="home.php" class = "logoutbtn" >Logout</a>

	</form>
</div>

<!--tabs book-->
<div class = "tabs" id = "tab_1"  >
		<input checked = "checked" id = "tab1" type = "radio" name = "tab">
		<input id = "tab2" type = "radio" name = "tab">
		<input id = "tab3" type = "radio" name = "tab">
		<nav>
			<ul>
				<li class  = "tab1">
					<label for = "tab1">Issued Books</label>
				</li>
				<li class  = "tab2">
					<label for = "tab2">Reserved Books</label>
				</li>
				<li class  = "tab3">
					<label for = "tab3">Overdue Books</label>
				</li>
			</ul>
		</nav>
		
		<section>
			<!--tab 1-->
			<div class = "tab1">
				<h2>Issued Books</h2>
				
				<!-- display list of books -->
				<?php
				
					$sql = "SELECT * FROM book ";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) 
					{
	
						while($row1 = $result->fetch_assoc()) 
						{
						$Bid = $row1["b_id"];
						$Bissue = "SELECT * FROM status WHERE b_id= '$Bid'";
		
						$res = mysqli_query($conn,$Bissue);
						
		
							while($row2 = $res->fetch_assoc()) 
							{
							$status = $row2["status"];
							
								//check for issue books
								if ($status == 'issue')
								{
									echo '<div>';
									echo '<img src = "data:image;base64,'.base64_encode($row1['b_image']).'" class = "b_img" >';
									echo "<p>" ."Book: ". $row1['b_name'] . "</p>";
									
									//get member name from member table
									$Mid = $row2["m_id"];
									$Missue = "SELECT * FROM member WHERE m_id= '$Mid'";
									$ress = mysqli_query($conn,$Missue);
						
									while($row3 = $ress->fetch_assoc()) 
									{
										echo "Member: " .$row3['m_name'];
										
									}
									
									//delete the current book
									echo "<a href = 'delete.php?book_id=$Bid & member_id=$Mid'>" ."<img src = '../images/rejected.jpg' class = 'icon' >" ."</a>";
									
									
									echo "</div>";
								}
							}
  
						}
  
					} 
				
				?>
			</div>
			
			<!--tabs 2-->
			<div class = "tab2">
				<h2>Reserved Books</h2>
				
				<!-- display list of books -->
				<?php
				
					$sql = "SELECT * FROM book";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) 
					{
	
  
						while($row1 = $result->fetch_assoc()) 
						{
						$Bid = $row1["b_id"];
						$Breserve = "SELECT * FROM status WHERE b_id= '$Bid'";
		
						$res = mysqli_query($conn,$Breserve);
		
							while($row2 = $res->fetch_assoc()) 
							{
							$status = $row2["status"];
							
								//check for reserve books
								if ($status == 'reserve')
								{
									echo '<div>';
									echo '<img src = "data:image;base64,'.base64_encode($row1['b_image']).'" class = "b_img" >';
									echo "<p>" ."Book: " . $row1['b_name'] . "</p>";
									
									//get member name from member table
									$Mid = $row2["m_id"];
									$Missue = "SELECT * FROM member WHERE m_id= '$Mid'";
									$ress = mysqli_query($conn,$Missue);
						
									while($row3 = $ress->fetch_assoc()) 
									{
										echo "Member: ". $row3['m_name'];
									
										//update reserve to issue
										echo "<a href = 'issue.php?book_id=$Bid & member_id=$Mid'>" ."<img src = '../images/issue.png' class = 'icon' >" ."</a>";
									
									
									}
									
									
									echo "</div>";
								}
							}
  
						}
  
					} 
				?>
			</div>
			
			<!--tabs 3-->
			<div class = "tab3">
				<h2>Overdue Books</h2>
				
				<?php
				
					$sql = "SELECT * FROM book";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) 
					{
	
  
						while($row1 = $result->fetch_assoc()) 
						{
						$Bid = $row1["b_id"];
						$Boverdue = "SELECT * FROM status WHERE b_id= '$Bid'";
						
			
						$res = mysqli_query($conn,$Boverdue);
		
							while($row2 = $res->fetch_assoc()) 
							{
							$status = $row2["status"];
							
								//check for overdue books
								if ($status == 'overdue')
								{
									echo '<div>';
									echo '<img src = "data:image;base64,'.base64_encode($row1['b_image']).'" class = "b_img" >';
									echo "<p>" ."Book: " . $row1['b_name'] . "</p>";
									
									//get member name from member table
									$Mid = $row2["m_id"];
									$Missue = "SELECT * FROM member WHERE m_id= '$Mid'";
									$ress = mysqli_query($conn,$Missue);
						
									while($row3 = $ress->fetch_assoc()) 
									{
										echo "Member: " .$row3['m_name'];
										
									}
									
									//delete the current book
									echo "<a href = 'delete.php?book_id=$Bid & member_id=$Mid'>" ."<img src = '../images/rejected.jpg' class = 'icon' >" ."</a>";
									
									
									echo "</div>";
								}
							}
  
						}
  
					} 
					?>
			</div>
			
		</section>
</div>

<div class="iframe_member" id = "tab_member"  style = " display:none;">
<iframe src="tab2.php" name="tab2" ></iframe>
</div>




<br>

	<!-- footer -->
	<div class="footer">
		<br>
		<p class = "cpy">Copyright©2020</p>
		<img src  = "../images/whatsapp_icon.png" class = "whatsapp_icon">
		<img src  = "../images/facebook_icon.png" class = "facebook_icon" onclick="location.href = 'https://www.facebook.com/';">
	</div>





</body>

</html>
<?php 
mysqli_close($conn);
?>

<!-- Created by Ravindu Rajasinghe IT20200374 -->