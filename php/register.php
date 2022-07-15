<?php  
// Created by P.M.J.I.Karunarathna IT20235192
 require('connection.php');


  if(isset($_POST['reg']))
{
	$password = $_POST['psw'];
	$confirmpassword = $_POST['rpsw'];
	if($password != $confirmpassword)
	{
		 echo "<script> alert('Password Mismatched'); window.location.href='../html/registration.html'; </script>";
	}
	else
	{
	
		$pass = md5($_POST['psw']);

		$sql = "INSERT INTO member (m_name, m_dob, m_address, m_gender, m_number, m_mail, m_password) VALUES ('".$_POST["name"]."','".$_POST["dob"]."','".$_POST["address"]."','".$_POST["gender"]."','".$_POST["mobile_no"]."','".$_POST["email"]."','$pass')";

		$result = mysqli_query($conn,$sql);
	}
}

    mysqli_close();

    // if successfully insert data into database, displays message "Successful and redirect to a URL ". 
    if($result)  

    {		 echo "<script> alert('Registeration Successful'); window.location.href='login.php'; </script>";

    }
	

?>