<div class="col-xl-12">
	<div class="box table-responsive" >
	
<?php

	$status=$_GET["status"];
	require_once("../../database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	if($status=="disp")	
	{
		$res=$sql->query("select * from registration");
		echo "<table class='table table-striped table-bordered table-hover table-condensed' border='1px' style=''><thead >";
		echo "<tr>
			<th>Id</th>	
			<th>User Name</th>	
			<th>Email</th>	
			<th>Password</th>	
			<th>Role</th>	
			<th>Action</th>
			</tr></thead>";
			while($row=mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td >";?> <span id="userid<?php echo $row["user_id"]; ?>"><?php echo $row["user_id"]; ?></span>  <?php echo "</td>";
				echo "<td >";?> <span id="username<?php echo $row["user_id"]; ?>"><?php echo $row["username"]; ?></span>  <?php echo "</td>";
				echo "<td >"; ?><div id="email<?php echo $row["user_id"]; ?>"> <?php echo $row["email"]; ?> </div> <?php  echo "</td>";
				echo "<td >"; ?><div id="password<?php echo $row["user_id"]; ?>"> <?php echo base64_decode($row["pswrd"]); ?> </div> <?php  echo "</td>";
				echo "<td >"; ?><div id="role<?php echo $row["user_id"]; ?>"> <?php echo $row["role"]; ?> </div> <?php  echo "</td>";
				echo "<td>";
?>
				<input type="button" id="delete<?php echo $row["user_id"];?>" class="btn btn-danger" name="<?php echo $row["user_id"]; ?>" value="delete" onClick="deleteuser(<?php echo $row["user_id"]; ?>)">
				<input type="button" id="edit<?php echo $row["user_id"]; ?>" name="<?php echo $row["user_id"]; ?>" class="btn btn-success"  value="edit" onClick="edituser(<?php echo $row["user_id"]; ?>)"> 
				<input type="button" id="update<?php echo $row["user_id"]; ?>" class="btn btn-info" name="<?php echo $row["user_id"]; ?>" value="update"  style="visibility:hidden " onClick="updateuser(<?php echo $row["user_id"]; ?>)">
<?php 
				echo "</td>";
			}
		echo "</tr>";
		echo "</table>";
	}

	if($status=="update")
	{
		$id=$_GET["id"];
		$username=$_GET['name'];
		$email=$_GET["email"];
		$password=$_GET["password"];
		$role=$_GET["role"];

		$id=trim($id);
		$username=trim($username);
		$email=trim($email);
		$password=trim($password);
		$password=base64_encode($password);
		$role=trim($role);

		$res=$sql->query("UPDATE `registration` SET `username`='$username',`email`='$email',`pswrd`='$password',`role`='$role' WHERE `registration`.`user_id`=$id");
	}

	if($status=="delete")
	{
		$id=$_GET["id"];
		$res=$sql->query("delete from registration where user_id=$id");
	}
?>
    </div>
</div>
