<?php
    require_once("../class/Authenticate.php");
    Authenticate::Authentication(array("admin","production"));

	require_once("../class/Products.php");
	$product = new Products();
	echo $product->getProducts();
?>
