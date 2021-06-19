<?php
	
	require_once("database/database.config.php");
	$db = new Database();
	$sql = Database::getConnection();
	
	$r=rand(1111,9999).rand(1111,9999);
	$r=md5($r);
	
	$name = $_FILES['resume']['name'];
	$des = "img/resume/".$r.$name;
	
	$filename = $_FILES['video_file']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if( $ext !== 'pdf' ) {
		//header("location:../Career.php");
	}
	else{
	move_uploaded_file($_FILES['resume']['tmpname'],'../'.$des);
	
	$qry = "INSERT INTO `career`(`id`, `fname`, `lname`, `email`, `date`, `resume_file`) VALUES ('','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[bdate]','$des')";
	$sql->query($qry);
	header('location:../Career.php');
	?>
	<script type="text/javascript">alert('hello');</script>
<?php
	}
?>