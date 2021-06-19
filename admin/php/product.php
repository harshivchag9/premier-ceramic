<div class="col-xl-12">
	<div class="box table-responsive" >
<?php
	require_once("../../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if(isset($_GET["status"]))
	{
		$status=$_GET["status"];
		if($status=="disp")
		{
			$res=$sql->query("select * from product_detail");
			echo "<table class='table table-striped table-bordered table-hover table-condensed' border='1px' style= ''><thead >";
			echo "<tr>
				<th>Id</th>	
				<th>Product_Name</th>	
				<th>Color</th>	
				<th>Type</th>	
				<th>Usage</th>	
				<th>Stock</th>	
				<th>price</th>	
				<th>piece</th>	
				<th>weight</th>	
				<th>thickness</th>	
				<th>size</th>
				<th>product Image</th>
				<th>Action</th>
				</tr></thead>";
			while($row=mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td style='width:30px;'>";?> <span id="img<?php echo $row["product_id"]; ?>"><?php echo $row["product_id"]; ?></span>  <?php echo "</td>";
				echo "<td width='150px'>"; ?><div id="name<?php echo $row["product_id"]; ?>"> <?php echo $row["product_name"]; ?> </div> <?php  echo "</td>";
				echo "<td width='80px'>"; ?><div id="color<?php echo $row["product_id"]; ?>"> <?php echo $row["color"]; ?> </div> <?php  echo "</td>";
				echo "<td width='120px'>"; ?><div id="type<?php echo $row["product_id"]; ?>"> <?php echo $row["type"]; ?> </div> <?php  echo "</td>";
				echo "<td width='120px'>"; ?><div id="usage<?php echo $row["product_id"]; ?>"> <?php echo $row["usage"]; ?> </div> <?php  echo "</td>";
				echo "<td width='90px'>"; ?><div id="stock<?php echo $row["product_id"]; ?>"> <?php echo $row["stock"]; ?> </div> <?php  echo "</td>";
				echo "<td width='8px'>"; ?><div id="price<?php echo $row["product_id"]; ?>"> <?php echo $row["price"]; ?> </div> <?php  echo "</td>";
				echo "<td width='60px'>"; ?><div id="pieceinbox<?php echo $row["product_id"]; ?>"> <?php echo $row["pieceinbox"]; ?> </div> <?php  echo "</td>";
				echo "<td width='75px'>"; ?><div id="weight<?php echo $row["product_id"]; ?>"> <?php echo $row["weight"]; ?> </div> <?php  echo "</td>";
				echo "<td width='100px'>"; ?><div id="thickness<?php echo $row["product_id"]; ?>"> <?php echo $row["thickness"]; ?> </div> <?php  echo "</td>";
				echo "<td width='100px'>"; ?><div id="size<?php echo $row["product_id"]; ?>"> <?php echo $row["size"]; ?> </div> <?php  echo "</td>";
				echo "<td width=''>"; ?><div id="productimg<?php echo $row["product_id"]; ?>"> <?php echo $row["productimg"]; ?> </div> <?php  echo "</td>";
				echo "<td>";
?>
				<input type="button" id="<?php echo $row["product_id"];?>" class="btn btn-danger" name="<?php echo $row["product_id"]; ?>" value="delete" onClick="delete1(this.id)">
				<input type="button" id="edit<?php echo $row["product_id"]; ?>" name="<?php echo $row["product_id"]; ?>" class="btn btn-success"  value="edit" onClick="aa(<?php echo $row["product_id"]; ?>)"> 
				<input type="button" id="update<?php echo $row["product_id"]; ?>" class="btn btn-info" name="<?php echo $row["product_id"]; ?>" value="update"  style="visibility:hidden " onClick="bb(this.name)">

<?php 
			echo "</td>";
?> 
	<form>
		<input type="hidden" value="<?php echo $row["productimg"]; ?>" id="img1<?php echo $row["product_id"]; ?>">
	</form>
<?php 
			}
			echo "</tr>";
			echo "</table>";
		}
?>
			<div class="row">
				<form method="POST" enctype="multipart/form-data" id="fileUploadForm" class="form-control">
					<div id="disp_data"></div>
					<input type="text" class="form-group" value="product1" name="name" id="txtnameins" placeholder="name">
					<input type="text" class="form-group" value="black" name="color" id="txtcityins1" placeholder="color">
					<select class="form-control-sm" name="type"  id="txtcityins2" placeholder="type">
							<option value="">Type</option>
							<option selected value="Double Charge">Double Charge</option>
							<option value="Digital Tiles">Digital Tiles</option>
							<option value="GVT">GVT</option>
							<option value="PGVT">PGVT</option>
					</select>
					<select class="form-control-sm" name="usage" placeholder="usage" id="txtcityins3">
							<option value="">Usage</option>
							<option selected value="Wall Tiles">Wall Tiles</option>
							<option value="Floor Tiles">Floor Tiles</option>
							<option value="Parking Tiles">Parking Tiles</option>
							<option value="Alivation Tiles">Alivation Tiles</option>
							<option value="Kitchen Tiles">Kitchen Tiles</option>
					</select>
					<input type="number" value="100" class="form-group" name="stock" id="txtcityins4" placeholder="stock">
					<input type="number" value="200" class="form-group" name="price" id="txtcityins5" placeholder="price">
					<input type="number" value="8" class="form-group" name="pieceinbox" id="txtcityins6" placeholder="pieceinbox">
					<input type="number" value="20" class="form-group" name="weight" id="txtcityins7" placeholder="weight">
					<select class="form-control-sm" name="thickness" id="txtcityins8" placeholder="thickness" style="width:100px">
							<option value="">Thickness</option>
							<option selected value="8mm">8mm</option>
							<option value="10mm">10mm</option>
							<option value="12mm">12mm</option>
					</select>
					<select class="form-control-sm" name="size" id="txtcityins9" placeholder="size">
							<option value="">Size</option>
							<option selected value="600x600(2x2)">600x600(2x2)</option>
							<option value="300x300(1x1)">300x300(1x1)</option>
							<option value="800x1200(2x4)">800x1200(2x4)</option>
							<option value="18x12">18x12</option>
							<option value="24x12">24x12</option>
					</select>
					<input type="file" name="files[]" class="form-control-sm" multiple >
					<input type="button" name="upload"  class="btn btn-primary" id="upload" value="insert" onClick="ins();">
				</form>	
			</div>
<?php

		if($status=="update")
		{
			$id=$_POST["id1"];
			$name=$_POST['name1'];
			$color=$_POST["color1"];
			$type=$_POST["type1"];
			$price=$_POST["price1"];
			$pieceinbox=$_POST["pieceinbox1"];
			$thickness=$_POST["thickness1"];
			$weight=$_POST["weight1"];
			$usage=$_POST["usage1"];
			//$productimg=$_POST["productimg1"];
			$size=$_POST["size1"];
			$stock=$_POST["stock1"];

			$name=trim($name);
			$color=trim($color);
			$type=trim($type);
			$price=trim($price);
			$pieceinbox=trim($pieceinbox);
			$thickness=trim($thickness);
			$weight=trim($weight);
			$usage=trim($usage);
			//$productimg=trim($productimg);
			$size=trim($size);
			$stock=trim($stock);

			$res=$sql->query("UPDATE `product_detail` SET `product_name`='$name',`color`='$color',`type`='$type',`usage`='$usage',`stock`=$stock,`price`=$price,`pieceinbox`=$pieceinbox,`weight`=$weight,`thickness`='$thickness',`size`='$size' WHERE `product_detail`.`product_id`=$id");
		}

		if($status=="delete")
		{
			$id=$_GET["id"];
			$sql->query("delete from product_detail where product_id=$id");
		}
	}
		if(isset($_GET['ins']))
		{
			if($_GET['ins']=="ins")
			{
				$v2 = md5(rand(1111,9999).rand(1111,9999));
				$insertValuesSQL="";
				$unique=strtoupper(substr($v2,0,4));
				//$id=$_GET["id1"];
				$name=$_POST["name"];
				$color=$_POST["color"];
				$type=$_POST["type"];
				$price=$_POST["price"];
				$pieceinbox=$_POST["pieceinbox"];
				$thickness=$_POST["thickness"];
				$weight=$_POST["weight"];
				$usage=$_POST["usage"];
				$size=$_POST["size"];
				$stock=$_POST["stock"];
				// $v1 = rand(1111,9999);
				// $v2 = rand(1111,9999);

				// $v3 = $v1 . $v2;
				// $v3 = md5($v3); 
				// $fnm=$_FILES["imgfile"]["name"];

				// $des="../../img/tiles/".$v3.$fnm;
				// $des1="img/tiles/".$v3.$fnm;
				$count=0;
		
				foreach($_FILES['files']['name'] as $key=>$val)
				{
					// File upload path
					$v1 = rand(1111,9999);
					$v2 = rand(1111,9999);
					$v3 = $v1 . $v2;
					$v3 = md5($v3); 
					$fnm=$_FILES['files']['name'][$key];

					$des="../../img/tiles/".$v3.$fnm;
					$des1="img/tiles/".$v3.$fnm;
		
					if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $des))
					{
						$count++;
						$insertValuesSQL .= "('','".$unique."','".$des1."'),";
					}
				}
				echo $insertValuesSQL;
				if(!empty($insertValuesSQL))
				{
					$l=strlen($insertValuesSQL);
					$insertValuesSQL = substr($insertValuesSQL,0,$l-1);
					// Insert image file name into database
					$sql->query("INSERT INTO product_photo VALUES $insertValuesSQL");
				}
				try{
					// $qry="insert into `product_detail`( `product_name`, `color`, `type`, `usage`, `stock`, `price`, `pieceinbox`, `weight`, `thickness`, `size`, `productimg`) "."VALUES('".$name."','".$color."','".$type."','".$usage."',".$stock.",".$price.",".$pieceinbox.",".$weight.",'".$thickness."','".$size."','".$unique."')";
					// echo $qry;
					$sql->query("INSERT INTO `product_detail`( `product_name`, `color`, `type`, `usage`, `stock`, `price`, `pieceinbox`, `weight`, `thickness`, `size`, `productimg`) VALUES('$name','$color','$type','$usage',$stock,$price,$pieceinbox,$weight,'$thickness','$size','$unique')");
				}
				catch(Exception $e) {
					echo 'Message: ' .$e->getMessage();
				}
			}
		}
	
?>

        </div>
    </div>
