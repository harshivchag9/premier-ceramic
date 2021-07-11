<?php 
    session_start();
	require_once("../class/Products.php");
    $product = new Products();
    if(isset($_POST['id'])&&isset($_SESSION['loggeduserid'])){
		$response = $product->addToCart($_POST['id'],$_SESSION['loggeduserid']);
        echo $response;
	}
	 
?>