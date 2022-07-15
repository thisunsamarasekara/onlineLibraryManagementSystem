
<?php
include 'connection.php';

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        
	if(isset($_POST['addbook'])){

		$bookname = $_POST['bname'];
		$author = $_POST['author'];
		$publisher = $_POST['publisher'];
		$category = $_POST['category'];
		$description = $_POST['description'];
	 
		 // Insert record
		 $query = "INSERT INTO book (b_name, b_author, b_publisher, b_category, b_description, b_image ) values('".$bookname."' , '".$author."' , '".$publisher."' , '".$category."'  , '".$description."' , '".$imgData."')";
		 $result = mysqli_query($conn,$query);
	  

	  }
 
	}
}

    // if successfully insert data into database, displays message "Successful and redirect to a URL ". 
    if($result)  

    {		 
			echo "<script> alert('Successful'); window.location.href='../html/addbook.html'; </script>";
    }
	else
	{
			echo "<script> alert('Failed'); window.location.href='../html/addbook.html'; </script>";
	}
?>

