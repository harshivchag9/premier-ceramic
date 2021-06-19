<?php 
    session_start();
	
	$dbcon = mysqli_connect('localhost','root','','premierdb');
	if(!$dbcon)
	{
		die("could not connect".mysqli_connect_error());
	}
	else{
		
		$id = $_POST['id'];
		$sql = mysqli_query($dbcon,"SELECT * FROM product_detail WHERE product_id ='$id' LIMIT 1");
		
		if(mysqli_num_rows($sql) > 0)
					{
						
						
						$row = mysqli_fetch_assoc($sql);
						$id= "$row[product_id]";
						$user=$_SESSION['loggeduserid'];
			
						mysqli_query($dbcon,"INSERT INTO wishlist(User_id,Product_id) VALUES ($user,$id)");
						
					}
	}
	 
?>
