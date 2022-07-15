<?php
include "connection.php";
$error = "";

if(isset($_POST['login'])){

    $mail = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,md5($_POST['psw']));

    if ($mail != "" && $password != ""){

        $sql_query = "SELECT count(*) as User FROM member WHERE m_mail='".$mail."' and m_password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['User'];

        if($count > 0){
            $_SESSION['mail'] = $mail;
            header('Location: home.php');
        }else{
			
			$error = "Invalid username and password";
        }

    }

}
?>


<!-- Created by P.M.J.I.Karunarathna IT20235192 -->

<!DOCTYPE html>
<html>

<head>
<!--link login styles sheet!-->
<link rel="stylesheet" href="../css/loginStyles.css" />

<!--link footer styles sheet!-->
<link rel="stylesheet" href="../css/styles_footer.css" />

<!--link image logo!-->
<link rel="icon" href="../images/logo_icon.png" type="image/x-icon">

<title>Login</title>

<h1 class="headers">Login</h1>
<a href = "../html/login_admin.html"><img src = '../images/admin.png' class = "icon" ></a>
									
<meta name="viewpoint" content="width=device-width, intial-scale=1.0">
</head>

<body>
<!--go back!-->
<img src="../images/back.png" class="backImg" onclick="location.href='../php/home.php'">
<input type="button" value="Go back" class="back" onclick="location.href='../php/home.php'">
<br><br><br><br>

<div class = "div_form">

<form action = "" method = "POST">

<!--heading!-->
<h1 class="header1">LOGIN</h1>

<!--E-mail!-->
<label class="label" for="email">E-mail</label><br></br>
<input type = "email" id = "email" name = "email" placeholder="abc@email.com..." pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
<br><br>

<!--Password!-->
<label class="label" for="psw">Password</label><br><br>
<input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z]).{5,}" title="Must contain at least one number and lowercase letter, and at least 5 or more characters"  placeholder="password...">

<!--Forgot Password!-->
<p id="fp"><a href="../html/recover.html">Forgot Password?</a></p>


<?php 

echo "<p class = 'error'>" .$error ."</p>";

?>

<!--login button!-->
<button type="Submit" name = "login" id="login" value = "Submit">Login</button>

<p class="para">Don't have an account?
<a href="../html/registration.html">Create one</a></p>
<br>

</form>

</div>
<br><br><br><br>

<!--link login java script sheet!-->
<script src="../js/loginScript.js"></script>

<!--copyright footer!-->
<div class="footer">
	<p  style = "padding-top:30px" class = "cpy">Copyright©2020</p>
	<img src  = "../images/whatsapp_icon.png" class = "whatsapp_icon">
	<img src  = "../images/facebook_icon.png" class = "facebook_icon">
</div>

</body>
</html>
