<?php
    require_once("../class/Authenticate.php");
    Authenticate::Authentication(array("admin","marketing","production"));
	
	require_once("../class/Products.php");
	$product = new Products();
	echo $product->getStocks(isset($_POST['search'])?$_POST['search']:'');
?>
