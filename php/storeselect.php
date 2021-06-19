<?php
	require_once("../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();

	if(isset($_POST["x"]))
	{
		$fetch=json_decode($_POST["x"], true);
		if($fetch['status']=="country")
		{
			$res=$sql->query("SELECT DISTINCT(`State`) FROM `store` WHERE Country='$fetch[country]'");
?>
			<select id="state" class="form-control" onChange="Change_State();" >
				<option></option>
			<?php	
				while($row = mysqli_fetch_array($res))
				{
			?>	
					<option value="<?= $row['State'] ?>" ><?= $row['State'] ?></option>
			<?php	
				}
			?>
				</select>
	<?php	
		}
		if($fetch['status']=="state")
		{
			$res=$sql->query("SELECT DISTINCT(`City`) FROM `store` WHERE State='$fetch[State]'");
	?>
			<select id="city" class="form-control" onChange="Change_City();" >
				<option></option>
		<?php
				while($row = mysqli_fetch_array($res))
				{
		?>
					<option value="<?= $row['City'] ?>" ><?= $row['City'] ?></option>
		<?php
				}
		?>
			</select>
	<?php	
		}
		if($fetch['status']=="city")
		{
			$res=$sql->query("SELECT DISTINCT(`name`) FROM `store` WHERE City='$fetch[City]'");
		?>
			<select id="name" onChange="Change_Name();" class="form-control">
			<option></option>
		<?php
			while($row = mysqli_fetch_array($res))
			{
		?>
			<option value="<?= $row['name'] ?>" ><?= $row['name'] ?></option>
		<?php
			}
		?>
			</select>
			<?php	
		}
		if($fetch['status']=="name"){
			
			?>
			<input type="button" value="Find Store" class="btn btn-primary" onClick="fetchstore()">
			<?php	
		}
		
		$fetch=json_decode($_POST["x"], true);
		
		if($fetch['status']=="fetch"){
			$qry="SELECT *FROM store WHERE name ='$fetch[name]' AND City='$fetch[city]' AND State='$fetch[state]' AND Country='$fetch[country]'";
			$row=mysqli_fetch_assoc($sql->query($qry));
			$jsondata=json_encode($row);
			echo $jsondata;
			//print_r($row);
		}
		
	
		
		
		
		
		
	}

?>