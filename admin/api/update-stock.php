<?php
	if(isset($_POST))
	{
		require_once("../class/Authenticate.php");
		Authenticate::Authentication(array("admin","marketing","production"));
		
		require_once("../class/Products.php");
        $product = new Products();
		$product->updateStock($_POST['id'],$_POST['stock']);
	}
?>