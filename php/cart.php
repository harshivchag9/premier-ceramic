<?php 
    session_start();
	require_once("../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	$date = date('y/m/d', time());
	if(!$sql)
	{
		die("could not connect".mysqli_connect_error());
	}
	else
	{
		
		$id = $_POST['id'];
		$sql = $sql->query("SELECT * FROM product_detail WHERE product_id ='$id' LIMIT 1");
		
		if(mysqli_num_rows($sql) > 0)
		{
			$row = mysqli_fetch_assoc($sql);
			$id= "$row[product_id]";
			$user=$_SESSION['loggeduserid'];
			$sql->query("INSERT INTO cart(User_id,Product_id,quantity,date) VALUES ($user,$id,1,'$date')");
			//$sql1= mysqli_query($dbcon,"SELECT * FROM cart WHERE Product_id='$id' AND User_id='$user'");
			//$numberofrow = mysqli_num_rows( $sql1 );
			//if ( $numberofrow === 1 ) {
			//echo "hello";	
			//$_SESSION['cartmessage'] = "product was added to cart";
			//}else
			//{
				//$_SESSION['cartmessage'] = "already Item in the cart";
				
			//}
		}
	}
	 
?>