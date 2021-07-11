<?php
	if(isset($_POST))
	{
		require_once("../class/Authenticate.php");
    	Authenticate::Authentication(array("admin","marketing"));

		require_once("../class/Inquiries.php");
        $inquiry = new Inquiries();

		$inquiry->checkInquiry($_POST['id'],$_POST['remark']);
	}
?>
