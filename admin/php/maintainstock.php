<div class="col-xl-12">
	<div class="box table-responsive" >
		<div class="form-row" style="margin-left: 10px">
			<input type="text" id="searchdata" class="form-row" placeholder="Search" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input  type="button" class="btn btn-primary" value="Search"  onClick="searchstock(searchdata.value);" >
		</div>
<?php
	$status=$_GET["status"];
	require_once("../../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if($status=="disp")
	{
		
		$qry="select * from product_detail";
		if(isset($_GET['search'])){
			$qry=$qry." WHERE product_name LIKE '%$_GET[search]%' OR product_id LIKE '%$_GET[search]%'";
		}
		$res=$sql->query($qry);
		
		echo "<table class='table table-striped table-bordered table-hover table-condensed' border='1px' style='width: 100%;'><thead >";
		echo "<tr>
			<th>Id</th>	
			<th>Product Name</th>	
			<th>Stock</th>	
			</tr></thead>";
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>";?> <span id="id<?php echo $row["product_id"]; ?>"><?php echo $row["product_id"]; ?></span>  <?php echo "</td>";
			echo "<td>"; ?><div id="name<?php echo $row["product_id"]; ?>"> <?php echo $row["product_name"]; ?> </div> <?php  echo "</td>";
			echo "<td>"; ?><span id="stock<?php echo $row["product_id"]; ?>" ><div id="stock-<?php echo $row["product_id"]; ?>" onClick="changestock(<?php echo $row["product_id"];?>);"><?php echo $row["stock"]; ?></div></span> <?php echo "</td>";
			echo "</td>";
			echo ""; ?> 
			<?php echo "";
		}
		echo "</tr>";
		echo "</table>";
	}
	echo "</div>";
	if(isset($_POST["x"]))
	{
		$fetch=json_decode($_POST["x"], true);
		if($fetch['status']=="update")
		{
			$sql->query("UPDATE `product_detail` SET `stock` = '$fetch[stock]' WHERE `product_detail`.`product_id` = $fetch[id]");
		}
	}
?>
	</div>
</div>						
   						   