<?php
	if(isset($_GET['status']))
	{
		$row;
		require_once("../../database/database.config.php");
		$db = new Database();
		$sql = Database::getConnection();
		$res=$sql->query("select * from product_photo WHERE product_id='$_GET[id]'");
		while($row=mysqli_fetch_array($res))
		{
?>
			<div class="col-lg-4 col-md-4">
				<div class="product">
					<img height="350px" width="350px" id="img-" src="../<?php echo $row['image']; ?>" alt="">
					<div class="text">
						<form id="id<?php echo $row['id']; ?>" >
							<input type="file" name="uploadimage" >
							<input type="hidden" name="path" value="<?php echo $row['image']; ?>" >
							<input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" >
						</form>
						<p class="buttons">
							<input type="button" class="btn btn-primary" name="update" value="upload" onClick="up(<?php echo $row['id']; ?>,'<?php echo $_GET['id']; ?>');"> 
							<input type="button" class="btn btn-danger" name="delete" value="Delete" onClick="productphotodelete(<?php echo $row['id']; ?>,'<?php echo $_GET['id']; ?>');"> 
						</p>
					</div>
				</div>
			</div>
<?php 
		} 
?>
		<br><br><br>
		<h4><b>Add New Image</b></h4>
		<form id="addnewproductimage">
			<input type="file" name="addphoto">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<input class="btn btn-primary" value="Add Image" onClick="addproductimage('<?php echo $_GET['id']; ?>');">
		</form>
<?php	
	}
?>
