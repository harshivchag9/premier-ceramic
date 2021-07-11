
<?php
	session_start();
	require_once("../class/Products.php");

    $product = new Products();
	$min = isset($_GET['minimum_price'])?$_GET['minimum_price']:"";
	$max = isset($_GET['maximum_price'])?$_GET['maximum_price']:"";
	$color = isset($_GET['color'])?$_GET['color']:"";
	$type = isset($_GET['type'])?$_GET['type']:"";
	$thickness = isset($_GET['thickness'])?$_GET['thickness']:"";
	$size = isset($_GET['size'])?$_GET['size']:"";

	// echo "<pre>";
    echo $product->getAllProducts($min,$max,$color,$type,$thickness,$size);
    // echo "</pre>";
?> 

	

