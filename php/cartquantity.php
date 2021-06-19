<?php 
    session_start();
	
	require_once("../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if(!$sql)
	{
		die("could not connect".mysqli_connect_error());
	}
	else{
		
		
		$sql->query("UPDATE `cart` SET `quantity` = '$_POST[quantity]' WHERE `cart`.`cart_id` = $_POST[cart_id]");
		
		
	}
	 
?>