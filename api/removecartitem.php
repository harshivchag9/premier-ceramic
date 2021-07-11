<?php 
	require_once("../class/Products.php");
	$product = new Products();

	if(isset($_POST['id'])){
		$product->deleteFromCart($_POST['id']);
	}
	 
?>