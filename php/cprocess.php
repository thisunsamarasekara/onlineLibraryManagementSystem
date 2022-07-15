<?php



include("connection.php");

$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$message=$_REQUEST['message'];



//inserting data to table 

$query= mysqli_query($db_con,"INSERT INTO user(name,email,message ) VALUES  ('$name','$email','$message')") or die(mysqli_error($db_con)); 

mysqli_close($db_con);


header("location:contact us.php?note=sucess");
?>