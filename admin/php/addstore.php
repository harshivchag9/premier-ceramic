<div class="col-xl-12">
<div class="box table-responsive" >
		
	<?php
		if(isset($_GET['status']))
		{
			require_once("../../database/database.config.php");
			$db = new Database();
			$sql = Database::getConnection();
			$status=$_GET["status"];
			if($status=="disp")
			{
				$qry="select * from store";
				$res=$sql->query($qry);
				echo "<table class='table table-striped table-bordered table-hover  w-100 ' border='1px' ><thead >";
				echo "<tr>
						<th>Id</th>	
						<th>Name</th>	
						<th>Address</th>	
						<th>City</th>	
						<th>State</th>	
						<th>Country</th>	
						<th>lat</th>	
						<th>lng</th>	
						<th>Action</th>	
					</tr></thead>";
				while($row=mysqli_fetch_array($res))
				{
					echo "<tr>";
					echo "<td>";?> <span id="id<?php echo $row["id"]; ?>"><?php echo $row["id"]; ?></span>  <?php echo "</td>";
					echo "<td>"; ?><span id="name<?php echo $row["id"]; ?>" ><div id="name-<?php echo $row["id"]; ?>" onClick="storeedit(<?php echo $row["id"].",'name'";?>);" > <?php echo $row["name"]; ?> </div></span> <?php  echo "</td>";
					echo "<td>"; ?><span id="address<?php echo $row["id"]; ?>" ><div id="address-<?php echo $row["id"]; ?>" onClick="storeedit(<?php echo $row["id"].",'address'";?>);" > <?php echo $row["address"]; ?> </div></span> <?php  echo "</td>";
					echo "<td>"; ?><span id="city<?php echo $row["id"]; ?>" ><div id="city-<?php echo $row["id"]; ?>" onClick="storeedit(<?php echo $row["id"].",'city'";?>);" > <?php echo $row["City"]; ?> </div></span> <?php  echo "</td>";
					echo "<td>"; ?><span id="state<?php echo $row["id"]; ?>" ><div id="state-<?php echo $row["id"]; ?>" onClick="storeedit(<?php echo $row["id"].",'state'";?>);" > <?php echo $row["State"]; ?> </div></span> <?php  echo "</td>";
					echo "<td>"; ?><span id="country<?php echo $row["id"]; ?>" ><div id="country-<?php echo $row["id"]; ?>" onClick="storeedit(<?php echo $row["id"].",'country'";?>);" > <?php echo $row["Country"]; ?> </div></span> <?php  echo "</td>";
					echo "<td>"; ?><span id="lat<?php echo $row["id"]; ?>" ><div id="lat-<?php echo $row["id"]; ?>" onClick="storeedit(<?php echo $row["id"].",'lat'";?>);" > <?php echo $row["lat"]; ?> </div></span> <?php  echo "</td>";
					echo "<td>"; ?><span id="lng<?php echo $row["id"]; ?>" ><div id="lng-<?php echo $row["id"]; ?>" onClick="storeedit(<?php echo $row["id"].",'lng'";?>);" > <?php echo $row["lng"]; ?> </div></span> <?php  echo "</td>";
					echo "<td>"; ?><button type="button" onClick="deletestore(<?php echo $row['id']; ?>);" class="btn btn-danger" >Delete</button><?php  echo "</td>";
					
					$count=$row['id'];	
					echo "</td>";
				}
			}
		echo "</tr>";
	?>

			<tr>
				<form>
					<td></td>
					<td><input type="text" class="form-control" id="insname" required></td>
					<td><textarea type="text" class="form-control" id="insaddress" required></textarea></td>
					<td><input type="text" class="form-control" id="inscity" required></td>
					<td><input type="text" class="form-control" id="insstate" required></td>
					<td><input type="text" class="form-control" id="inscountry" required></td>
					<td><input type="number" class="form-control" id="inslat" style="display: none;" value="NULL" ></td>
					<td><input type="number" class="form-control" id="inslng" style="display: none;" value="NULL" ></td>
					<td>
						<input type="button" id="add" class="btn btn-primary" onClick="addstore()" value="Add" required><br><br>
						<input type="checkbox" id="toggle" onClick="toggle();" checked > Automatic lat And lng fetch
					</td>
				</form>					   
			</tr>		
			<tr>
				<td colspan="8"></td>
				<td >
					<a type="button" id="gotomap" align="right" class="btn btn-primary" href="adminmap.php" target="_blank" >Admin Map</a>
				</td>
			</tr>
										
			<?php
				echo "</table>";
				}
										
				if(isset($_POST["x"]))
				{
					$fetch=json_decode($_POST["x"], true);
					if($fetch['status']=="update")
					{
						$sql->query("UPDATE `store` SET `$fetch[column]` = '$fetch[data]' WHERE `store`.`id`=$fetch[id]");
					}
					if($fetch['status']=="ins"){
						if(isset($fetch[lat])&&$fetch[lng]){
							$sql->query("INSERT INTO store VALUES ('','$fetch[name]','$fetch[address]','$fetch[City]','$fetch[State]','$fetch[Country]','$fetch[lat]','$fetch[lng]')");
						}else{
							$sql->query("INSERT INTO store VALUES ('','$fetch[name]','$fetch[address]','$fetch[City]','$fetch[State]','$fetch[Country]',NULL,NULL)");
						}
					}
					if($fetch['status']=="delete"){
						$sql->query("DELETE FROM `store` WHERE `store`.`id` =$fetch[id]");
		}
	}
?>
</div>	
</div>	
	
