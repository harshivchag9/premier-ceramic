<?php 
//session_start();
	require_once("database/database.config.php");
	$sql = Database::getConnection();

	$id=$_GET['id'];
	if(isset($_SESSION['loggeduserid']))
	{
		$user=$_SESSION['loggeduserid'];
		$check=0;
		$lastnumber;
		$mainquery="SELECT * FROM recent WHERE user_id=$user AND product_id=$id";
		$mainquery=$sql->query($mainquery);

		if($mainquery->num_rows == 0)
		{
			if(isset($_SESSION['loggeduserid']))
			{
			$query = "SELECT * FROM recent WHERE user_id=$_SESSION[loggeduserid]";
			$res = $sql->query($query);
			$number = $res->num_rows;
			if($number>5)
			{
				while($row = $res->fetch_assoc()){
					if($check==0){
						$sql->query("DELETE FROM recent WHERE recent_no=$row[recent_no] AND user_id=$user");
						
						$check++;
						// echo $id;
					}
					$check++;
					if($check == 5){
						$lastnumber = $row['recent_no'];	
						$sql->query("INSERT INTO recent VALUE ('',$lastnumber,$id,$user)");
					}
					//$lastnumber=$row['recent_no'];	
				}
			}
			else{

				while($row=$res->fetch_assoc()){
					$lastnumber=$row['recent_no'];	
				}
				if(isset($lastnumber)){
					$lastnumber++;	
					$sql->query("INSERT INTO recent VALUE ('',$lastnumber,$id,$user)");
				}else{
					$sql->query("INSERT INTO recent VALUE ('',1,$id,$user)");
				}
			}
		}
}
}
?>