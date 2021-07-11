<?php 
    session_start();
	require_once("../class/Products.php");

	if(isset($_POST['id']) && isset($_SESSION['loggeduserid']))
	{
		$product = new Products();
		$id = $_POST['id'];
		$user=$_SESSION['loggeduserid'];

		$product->addToWishlist($id,$user);
		
	}	



?>
