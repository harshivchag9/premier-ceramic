<?php
	if(isset($_POST))
	{
		require_once("../class/Authenticate.php");
		Authenticate::Authentication(array("admin"));

		require_once("../class/Blogs.php");
        $blog = new Blogs();

		echo $blog->getData();
	}
?>
