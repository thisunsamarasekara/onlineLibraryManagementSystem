<?php
include "connection.php";


//add 7dats to the current date
$date_overdue = date('Y-m-d', strtotime('+7 days'));


					$sql = "SELECT * FROM book";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) 
					{
	
  
						while($row1 = $result->fetch_assoc()) 
						{
						$Bid = $row1["b_id"];
						$Boverdue = "SELECT * FROM status WHERE b_id= '$Bid'";
						
			
						$res = mysqli_query($conn,$Boverdue);
		
							while($row2 = $res->fetch_assoc()) 
							{
							$status = $row2["status"];
							$db_date = $row2["date"];
							
								//check for overdue books
								if ($status == 'issue')
								{
									
									//check if the book date is greater than overdue date
									if($db_date > $date_overdue)
									{
									
										//get member name from member table
										$Mid = $row2["m_id"];
										$Missue = "SELECT * FROM member WHERE m_id= '$Mid'";
										$ress = mysqli_query($conn,$Missue);
						
										while($row3 = $ress->fetch_assoc()) 
										{	
											$issue = "UPDATE status SET status = 'overdue' WHERE b_id = '$Bid' AND m_id = '$Mid' ";
											$iss = mysqli_query($conn,$issue); // update query
										
										}	
									}
								}
							}
						}
					} 
	


?>