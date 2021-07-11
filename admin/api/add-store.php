<?php
	if(isset($_POST))
	{
		require_once("../class/Authenticate.php");
   		Authenticate::Authentication(array("admin"));
		   
		require_once("../class/Stores.php");
        $store = new Stores();
		$store->addStore($_POST['name'],$_POST['address'],$_POST['city'],$_POST['state'],$_POST['country'],$_POST['lat'],$_POST['lng']);
	}
?>
