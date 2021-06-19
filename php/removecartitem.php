<?php 
    session_start();
	$user=$_SESSION['loggeduserid'];
	require_once("../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();

	if(!$sql)
	{
		die("could not connect".mysqli_connect_error());
	}
	else{
		$sql->query("DELETE FROM `cart` WHERE `cart_id` ='$_POST[id]'");
	}
	 
?>