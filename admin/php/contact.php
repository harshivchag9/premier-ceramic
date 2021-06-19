<div class="col-xl-12">
	<div class="box table-responsive" >
		
<?php
	require_once("../../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	$status=$_GET["status"];
	if($status=="disp")
	{
		$res= $sql->query("SELECT * FROM `contact` ORDER BY `cformid` DESC");
		echo "<table class='table table-striped table-bordered table-hover table-condensed' border='1px'>";
		echo "<tr>
					<th>Id</th>	
					<th>Fname</th>	
					<th>Lname</th>	
					<th>Email</th>	
					<th>Subject</th>	
					<th>Message</th>	
					<th>Remark</th>	
					<th>Status</th>	
			</tr>";
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>"; echo $row["cformid"];  echo "</td>";
			echo "<td>"; ?><div id="fname<?php echo $row["cformid"]; ?>"> <?php echo $row["fname"]; ?> </div> <?php  echo "</td>";
			echo "<td>"; ?><div id="lname<?php echo $row["cformid"]; ?>"> <?php echo $row["lname"]; ?> </div> <?php  echo "</td>";
			echo "<td>"; ?><div id="email<?php echo $row["cformid"]; ?>"> <?php echo $row["email"]; ?> </div> <?php  echo "</td>";
			echo "<td>"; ?><div id="subject<?php echo $row["cformid"]; ?>"> <?php echo $row["subject"]; ?> </div> <?php  echo "</td>";
			echo "<td>"; ?><div id="message<?php echo $row["cformid"]; ?>"> <?php echo $row["message"]; ?> </div> <?php  echo "</td>";
			if($row['status']==0){
				echo "<td>"; ?><div id="remark1<?php echo $row["cformid"]; ?>"> <textarea rows="2" cols="50" type="text" id="remark<?php echo $row["cformid"];?>" name="" ><?php echo $row["remark"]; ?></textarea> </div> <?php  echo "</td>";
				echo "<td>"; ?> 
				<input type="button" id="status<?php echo $row["cformid"]; ?>" class="btn btn-primary" name=status"<?php echo $row["cformid"]; ?>" value="<?php echo 'unchecked'; ?>" onClick="cntctupdate(<?php echo $row["cformid"]; ?>)"> 
				<?php echo "</td>";
				echo "</tr>";
			}else if($row['status']==1){
				echo "<td>"; ?><div id="remark1<?php echo $row["cformid"]; ?>"><?php echo $row["remark"]; ?></div> <?php  echo "</td>";
				echo "<td>"; ?> 
				<input type="button" class="btn btn-primary disabled" id="status<?php echo $row["cformid"]; ?>" value="checked"> 
				<?php echo "</td>";
				echo "</tr>";
			}
		}
		echo "</table>";
	}

	if($status=="update")
	{
		$id=$_GET["id"];
		$remark=$_GET["remark"];
		$name=trim($remark);
		$res= $sql->query("update contact set remark='$remark',status=1 where cformid=$id");
	}
?>
		
	</div>
</div>							   