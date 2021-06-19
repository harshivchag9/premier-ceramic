<?php
	require_once("../../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if(isset($_POST['x']))
	{
		$fetch=json_decode($_POST["x"], true);
		if($fetch['status']=="address"){
			$qry="SELECT *FROM address WHERE orderid ='$fetch[id]'";
			$row=mysqli_fetch_assoc($sql->query($dbcon,$qry));
			$jsondata=json_encode($row);
			echo $jsondata;
			//print_r($row);
		}
		else if($fetch['status']=="payment"){
			$qry="SELECT *FROM payment WHERE orderid ='$fetch[id]'";
			$row=mysqli_fetch_assoc($sql->query($dbcon,$qry));
			$jsondata=json_encode($row);
			echo $jsondata;
			//print_r($row);
		}
	}
?>
