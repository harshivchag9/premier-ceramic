<?php 
	require_once("../../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if($_POST['status']=='update')
	{
		$v1 = rand(1111,9999);
		$v2 = rand(1111,9999);

		$v3 = $v1 . $v2;
		$v3 = md5($v3); 
		$fnm=$_FILES["uploadimage"]["name"];
		$a='../../img/tiles/'.$v3.$fnm;
		$des='img/tiles/'.$v3.$fnm;
		move_uploaded_file($_FILES["uploadimage"]["tmp_name"],$a); 	

		$sql->query("UPDATE `product_photo` SET `image`='$des' WHERE `product_id`='$_POST[product_id]' AND `image`='$_POST[path]'");
		//$path=substr($_POST['path'],4);
		unlink('../../'.$_POST['path']);
	}

	if($_POST['status']=='add'){
		$v1 = rand(1111,9999);
		$v2 = rand(1111,9999);

		$v3 = $v1 . $v2;
		$v3 = md5($v3); 
		$fnm=$_FILES["addphoto"]["name"];
		$a='../../img/tiles/'.$v3.$fnm;
		$des='img/tiles/'.$v3.$fnm;
		move_uploaded_file($_FILES["addphoto"]["tmp_name"],$a); 	

		$sql->query("INSERT INTO `product_photo` VALUES ('','$_POST[id]','$des')");
	}

	if($_POST['status']=='delete'){
		$sql->query("DELETE FROM `product_photo` WHERE `product_photo`.`id` =$_POST[id]");
	}
?>