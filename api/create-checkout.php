<?php 
session_start();
	require_once("../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if($_POST['checkout']=='checkout'){
		if(isset($_SESSION['loggeduserid'])){
			$res=$sql->query("select * from cart WHERE User_id = $_SESSION[loggeduserid]");
			$row = "";
			$ship=0;$count=0;$delivery=0;$total=0;
			$r1=rand(1111,9999)+rand(1111,9999);
				$r1=md5($r1);
				$r1=strtoupper($r1);
			while($row = mysqli_fetch_array($res))
			{
				
				$row1=mysqli_fetch_array($sql->query("select * from product_detail WHERE product_id = $row[Product_id]"));
				
				$date=date('d-M-Y');
				$quary="INSERT INTO orderproduct (`orderid`, `product_id`, `user_id`, `quantity`, `date`, `payment`,`status`) VALUES('$r1','$row[Product_id]','$row[User_id]','$row[quantity]','$date',0,'checkout')";
				$sql->query($quary);	
			}
			$_SESSION['orderid']=$r1;
			
			header("location:../order-address.php");
		
		}
        else
        {
		    header("location:../register.php");
        }
		
	}
    else
    {
		header("location:../error.php");
	}
		
?>