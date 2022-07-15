<?php
include "connection.php";

if(isset($_POST['recover'])){

    $mail = mysqli_real_escape_string($con,$_POST['email']);
	$pass = mysqli_real_escape_string($con,$_POST['pass']);
	
	//select member id
	$query = mysqli_query($conn, "SELECT * FROM member WHERE m_mail = '$mail'");
	
	if(mysqli_num_rows($query) >0){
		
		$row = mysqli_fetch_row($query);
 
	
		//update password
		$password = md5($pass);
		$update = "UPDATE member SET m_password = '$password' WHERE m_mail = '$mail'";
		$result = mysqli_query($conn,$update);
		
		if($result){
			
			echo "<script> alert('Updated Password Successfully '); window.location.href='login.php'; </script>";
		
		}else{
			
			echo "<script> alert('Unsucessful'); window.location.href='../html/recover.html'; </script>";
		}
	
	
	}else{
		
		echo "<script> alert('Invalid Email'); window.location.href='../html/recover.html'; </script>";
	}
}
?>