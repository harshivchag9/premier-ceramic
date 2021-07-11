<?php
	if(isset($_POST))
	{
		require_once("../class/Authenticate.php");
    	Authenticate::Authentication(array("admin","production"));
		require_once("../class/Products.php");
        $product = new Products();

		$product->addProductImage($_POST['id'],$_FILES);
	}
?>
