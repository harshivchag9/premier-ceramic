<?php
	if(isset($_POST))
	{
		require_once("../class/Authenticate.php");
		Authenticate::Authentication(array("admin","marketing","production"));
		
		require_once("../class/Orders.php");
        $order = new Orders();
		$order->updateOrderStatus($_POST['id'],$_POST['data']);
	}
?>