<?php
    include('connection.php');  
    $username = $_POST['username'];  
    $password = $_POST['psw'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "SELECT * FROM member WHERE m_mail = '$username' and m_password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
		
			if($count == 1){ 

				if($username == 'admin')
				{
					header('Location: ../php/admin.php');
				}else
				{
					header('Location: ../html/login_admin.html');
				}
			}
			else{  
			   $error = "Email or Password Invalid"; 
			   header('Location: ../html/login_admin.html');
			}  
?>