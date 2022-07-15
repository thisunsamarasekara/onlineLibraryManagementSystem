<?php

include "connection.php"; 

$Bid = $_GET['book_id'];
$Mid = $_GET['member_id'];


$delete = "DELETE FROM status WHERE b_id = '$Bid' AND m_id = '$Mid' ";
$del = mysqli_query($conn,$delete); // delete query


if($del)
{
    mysqli_close($conn); // Close connection
    header("location:admin.php"); // redirect to admin page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>

