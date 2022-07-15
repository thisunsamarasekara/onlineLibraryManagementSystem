<?php

include "connection.php"; 


$Bid = $_GET['book_id'];
$Mid = $_GET['member_id'];


$issue = "UPDATE status SET status = 'issue' WHERE b_id = '$Bid' AND m_id = '$Mid' ";
$iss = mysqli_query($conn,$issue); // update query


if($iss)
{
    mysqli_close($conn); // Close connection
    header("location:admin.php"); // redirect to admin page
    exit;	
}
else
{
    echo "Error while updating record"; // display error message if not delete
}
?>

