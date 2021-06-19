<?php 
			
			$path=substr($_POST['path'],4);
			$des1=".".$path;
			move_uploaded_file($_FILES["uploadimage"]["tmp_name"],$des1); 
			//mysqli_query($con,"UPDATE `product_detail` SET `productimg`='$des' WHERE `product_detail`.`product_id`=$id")



?>