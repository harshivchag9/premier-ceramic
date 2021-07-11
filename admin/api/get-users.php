<?php
	if(isset($_POST))
	{
		require_once("../class/Authenticate.php");
		Authenticate::Authentication(array("admin"));

		require_once("../class/Users.php");
        $user = new Users();

		echo $user->getData();
	}
?>
