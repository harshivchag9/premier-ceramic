<?php
	if(isset($_POST))
	{
		require_once("../class/Authenticate.php");
		Authenticate::Authentication(array("admin"));

		require_once("../class/Stores.php");
        $store = new Stores();
		$store->updateStore($_POST['id'],$_POST['column'],$_POST['data']);
	}
?>