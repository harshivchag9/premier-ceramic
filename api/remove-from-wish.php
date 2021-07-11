<?php 
    session_start();
	require_once("../class/Products.php");

	if(isset($_GET['id']) && isset($_SESSION['loggeduserid']))
	{
		$product = new Products();
		$id = $_GET['id'];
		$user=$_SESSION['loggeduserid'];

		$product->removeFromWishlist($id,$user);
		header("location:../wishlist.php");
	}	



?>