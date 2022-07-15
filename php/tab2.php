
<?php
require('connection.php');
	
//search new member list limit 5
$tab2_member = mysqli_query($conn,"SELECT * FROM member ORDER BY m_id DESC LIMIT 5");

	// error_reporting returns the old error code
    $old_error_reporting = error_reporting(0);

    //search
	$name =  $_GET['search'];
	$tab1_member = mysqli_query($conn, "SELECT * FROM member WHERE m_name LIKE '%{$name}%'");

    // reset error_reporting to its old value
    error_reporting($old_error_reporting);



mysqli_close($conn);

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



<!--tabs member-->
<div class = "mtabs" id = "tab" >
		<input checked = "checked" id = "mtab1" type = "radio" name = "mtab">
		<input id = "mtab2" type = "radio" name = "mtab">
		<input id = "mtab3" type = "radio" name = "mtab">
		<nav>
			<ul>
				<li class  = "mtab1">
					<label for = "mtab1">Current Members</label>
				</li>
				<li class  = "mtab2">
					<label for = "mtab2">New Members</label>
				</li>
			</ul>
		</nav>
		
		<section>
			<!--tab 1-->
			<div class = "mtab1">
				<h2>Current Members</h2>
				
				<!-- search box -->
				<form class="search" action="" method = "GET" >
					<input type="text" placeholder="Search.." name="search">
					<button type="submit" value = "submit" class ="search_icon" ></button>
				</form>
				
				<?php
					// display list of member -->
					while ($m_row = mysqli_fetch_array($tab1_member))
					{
						echo '<div>';
						echo '<img src = "data:image;base64,'.base64_encode($m_row['m_image']).'" class = "b_img" >';
						echo "<p>" . $m_row['m_name'] . "</p>";
						echo "</div>";
					}
			
				?>
				
				
			</div>
			
			<!--tabs 2-->
			<div class = "mtab2">
				<h2>New Members</h2>
				
				<!-- display list of member -->
				<?php
					while($m_row = mysqli_fetch_array($tab2_member))
					{
					echo '<div>';
					echo '<img src = "data:image;base64,'.base64_encode($m_row['m_image']).'" class = "b_img" >';
					echo "<p>" . $m_row['m_name'] . "</p>";
					echo "</div>";
					}
				?>
				
				
			</div>
			
		</section>
</div>

</body>

</html>
<!-- Created by Ravindu Rajasinghe IT20200374 -->