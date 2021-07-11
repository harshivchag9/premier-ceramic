<?php
	if(isset($_POST))
	{

		require_once("../class/Authenticate.php");
		Authenticate::Authentication(array("admin","production"));

		require_once("../class/Products.php");
        $product = new Products();

		$product->updateProductImage($_POST['product_id'],$_POST['path'],$_FILES);
	}
?>
