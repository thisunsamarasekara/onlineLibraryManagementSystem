<?php
include 'connection.php';

$memberid = $_GET["memberid"];
$bookid = $_GET["bookid"];

$today = date("Y-m-d");

$reserve = "INSERT INTO status (m_id, b_id, status,date) VALUES ('$memberid', '$bookid', 'reserve','$today')";

if ($conn->query($reserve) === TRUE) {
  echo "<script> alert('Reserved Sucessfully'); window.location.href='search_books.php'; </script>";
} else {
  echo "Error: " . $reserve . "<br>" . $conn->error;
  echo "<script> alert('Reserve Failed'); window.location.href='search_books.php'; </script>";
}


?>