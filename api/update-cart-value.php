<?php 
	
	require_once("../class/Products.php");
	if(isset($_POST['cart_id']) && $_POST['quantity']){
		$product = new Products();
		echo $product->cartUpdate($_POST['cart_id'],$_POST['quantity']);
	}
	else
	{
		exit;
	}
		
		
?>