<!-- Created by Chiranjaya Chandrasena -->
<!-- IT20183554 -->

<?php 
include"connection.php";

	// error_reporting returns the old error code
    $old_error_reporting = error_reporting(0);
	
	//search
	$name =  $_GET['search'];
	$book_query = mysqli_query($conn, "SELECT * FROM book WHERE b_name LIKE '%{$name}%'");

	 // reset error_reporting to its old value
    error_reporting($old_error_reporting);
	
	//select fantasy books
	$fantasy = mysqli_query($conn, "SELECT * FROM book WHERE b_category = 'Fantasy'");
	
	//select comedy books
	$comedy = mysqli_query($conn, "SELECT * FROM book WHERE b_category = 'Comedy'");
	
	//select adventure books
	$adventure = mysqli_query($conn, "SELECT * FROM book WHERE b_category = 'Adventure'");
	
	//select science books
	$science = mysqli_query($conn, "SELECT * FROM book WHERE b_category = 'Science'");
	
	//select history books
	$history = mysqli_query($conn, "SELECT * FROM book WHERE b_category = 'History'");
	
	//select IT books
	$it = mysqli_query($conn, "SELECT * FROM book WHERE b_category = 'IT'");
	
	//select Jeff Kinney books
	$jeff = mysqli_query($conn, "SELECT * FROM book WHERE b_author = 'Jeff Kinney'");
	
	//select J. K. Rowling books
	$rowling = mysqli_query($conn, "SELECT * FROM book WHERE b_author = 'J. K. Rowling'");
	
	//select Rick Riordan books
	$rick = mysqli_query($conn, "SELECT * FROM book WHERE b_author = 'Rick Riordan'");
	
	//select Bloomsbury (UK) books
	$bloomsbury = mysqli_query($conn, "SELECT * FROM book WHERE b_publisher = 'Bloomsbury (UK)'");
	
	//select Harry N. Abrams, Inc. books
	$harry = mysqli_query($conn, "SELECT * FROM book WHERE b_publisher = 'Harry N. Abrams, Inc.'");
	
	//select Miramax Books books
	$miramax = mysqli_query($conn, "SELECT * FROM book WHERE b_publisher = 'Miramax Books'");
	
	
mysqli_close($conn);

if(!isset($_SESSION['mail'])){
   echo "<script> alert('Not logged in'); window.location.href='login.php'; </script>";

}

?>


<!DOCTYPE html>
<html>

<head>

	<title>Search Books</title>
	
	<!-- icon  -->
	<link rel = "icon" href = "../images/logo_icon.png" type = "image/x-icon"> 
	
	<!-- styles header  -->
	<link rel="stylesheet" href="../css/styles_header.css">
	<!-- styles footer  -->
	<link rel="stylesheet" href="../css/styles_footer.css">
	
	<!-- styles body  -->
	<link rel="stylesheet" href="../css/styles_search.css">
	
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
			  <li><a href="#" class = "current">Explore</a></li>
			  <li><a href="../html/BookCart.html">Bookcart</a></li>
			  <li><a href="member.php">Account</a></li>
			</ul>
		</div>
		
		<!-- navigation bar 2 -->
		<div class = "nav_bar">
			<ul id = "menu" class = "nav2">
			  <li><a href="home.php">Home</a></li>
			  <li><a href="login.php">Login</a></li>
			  <li><a class = "current2" href="#">Explore</a></li>
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

<!-- js header-->
<script src="../js/header.js"></script>
	
<br><br><br><br><br><br><br><br><br>

<!-- back button -->
<div class = "back">
	<img src = "../images/back.png" onclick = "back()" class = "back_img">
	<button onclick = "back()" class = "back_btn">Go Back</button> 
</div><br>
<!-- filter menu -->
<div class ="filter">
	<form>
		<select class = "sel" name="sel" id="sel" onchange = "Toggle()">
        	<option selected="true" value="All_books">All Books</option>
			<option value="Category">Category</option>			
			<option value="Author">Author</option>
			<option value="Publisher">Publisher</option>
			<option value="Educational">Educational</option>
    	</select>
	</form>

<!-- search bar -->
<form action="" method = "GET" >
		<input type="text" placeholder="Search.." name="search" class = 'search'>
</form>

</div>

<br>

<hr class = "hr">

<!-- js -->
<script src="../js/search_books.js"></script>
<br>

<!-- all books -->
<div id = "all" >
		
		<?php
					// display list of books -->
					while ($b_row = mysqli_fetch_array($book_query))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($b_row['b_image']);
						$Bid = $b_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $b_row['b_name'] . "</p>";
						echo "</div>";
					}
			
				?>

</div>


<!-- Category -->
<div id = "Category" style = "display:none">

	<h2 class = "h2">Comedy</h2>
		<?php
					// display list of comedy books -->
					
					while ($comedy_row = mysqli_fetch_array($comedy))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($comedy_row['b_image']);
						$Bid = $comedy_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $comedy_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	
	<h2 class = "h2">Adventure</h2>
		<?php
					// display list of adventure books -->
					
					while ($adventure_row = mysqli_fetch_array($adventure))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($adventure_row['b_image']);
						$Bid = $adventure_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $adventure_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	
	<h2 class = "h2">Fantacy</h2>
		<?php
					// display list of fantacy books -->
					
					while ($fantasy_row = mysqli_fetch_array($fantasy))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($fantasy_row['b_image']);
						$Bid = $fantasy_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $fantasy_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	

</div>


<!-- Author -->
<div id = "Author" style = "display:none">

	<h2 class = "h2">Jeff Kinney</h2>
		<?php
					// display list of Jeff Kinney books -->
					
					while ($jeff_row = mysqli_fetch_array($jeff))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($jeff_row['b_image']);
						$Bid = $jeff_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $jeff_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	
	<h2 class = "h2">J. K. Rowling</h2>
		<?php
					// display list of J. K. Rowling books -->
					
					while ($rowling_row = mysqli_fetch_array($rowling))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($rowling_row['b_image']);
						$Bid = $rowling_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $rowling_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	
	<h2 class = "h2">Rick Riordan</h2>
		<?php
					// display list of Rick Riordan books -->
					
					while ($rick_row = mysqli_fetch_array($rick))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($rick_row['b_image']);
						$Bid = $rick_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $rick_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	

</div>


<!-- Publisher -->
<div id = "Publisher" style = "display:none">

	<h2 class = "h2">Bloomsbury (UK)</h2>
		<?php
					// display list of Bloomsbury (UK) books -->
					
					while ($bloomsbury_row = mysqli_fetch_array($bloomsbury))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($bloomsbury_row['b_image']);
						$Bid = $bloomsbury_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $bloomsbury_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	
	<h2 class = "h2">Harry N. Abrams, Inc.</h2>
		<?php
					// display list of Harry N. Abrams, Inc. books -->
					
					while ($harry_row = mysqli_fetch_array($harry))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($harry_row['b_image']);
						$Bid = $harry_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $harry_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	
	<h2 class = "h2">Miramax Books</h2>
		<?php
					// display list of Miramax Books books -->
					
					while ($miramax_row = mysqli_fetch_array($miramax))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($miramax_row['b_image']);
						$Bid = $miramax_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $miramax_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	

</div>


<!-- Educational -->
<div id = "edu" style = "display:none">

	<h2 class = "h2">Science</h2>
		<?php
					// display list of science books -->
					
					while ($science_row = mysqli_fetch_array($science))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($science_row['b_image']);
						$Bid = $science_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $science_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	
	<h2 class = "h2">History</h2>
		<?php
					// display list of history books -->
					
					while ($history_row = mysqli_fetch_array($history))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($history_row['b_image']);
						$Bid = $history_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $history_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	
	<h2 class = "h2">IT</h2>
		<?php
					// display list of IT books -->
					
					while ($IT_row = mysqli_fetch_array($it))
					{
						echo '<div class = "book1">';
						
						//define variables for b_image and b_id
						$img = base64_encode($IT_row['b_image']);
						$Bid = $IT_row['b_id'];
						
						echo "<a href = 'book.php?bookid=$Bid'>" ."<img src = 'data:image;base64, $img' class = 'booksize' >" ."</a>" ;

						echo "<p class = 'bname'>" . $IT_row['b_name'] . "</p>";
						echo "</div>";
					}
			
			?>
	

</div>


<!-- footer -->
<div class="footer">
	<br>
	<p class = "cpy">Copyright©️2020</p>
	<img src  = "../images/whatsapp_icon.png" class = "whatsapp_icon">
	<img src  = "../images/facebook_icon.png" class = "facebook_icon">
</div>

</body>

</html>