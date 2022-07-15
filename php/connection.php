<?php
//Created by Ravindu Rajasinghe IT20200374 

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_management";


// Create connections
$con = mysqli_connect($servername, $username, $password,$dbname);
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

