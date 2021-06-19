<div class="col-xl-12">
<div class="box table-responsive" >
	&nbsp;&nbsp;&nbsp;&nbsp; 
	<a style="float: right;" class='btn btn-primary' data-toggle='modal' data-target='#blog-insert'>Add New Blog</a>        
	<br><br><br>
	<div class="form-group">
		<div class="row">
			<?php
				if(isset($_GET["status"])){
					$status=$_GET["status"];
				}
				echo "<div class='row'>";
				require_once("../../database/database.config.php");
				$db = new Database();
				$sql = Database::getConnection();
				if($status=="disp")
				{
					$res = $sql->query("select * from blog");
					while($row=mysqli_fetch_assoc($res)){
			?>
			<div  class=' col-lg-4'>
				<div class="product">
					<a  class="visible"><img height="350px" width="550px" id="img-<?php echo $row['blog_id']; ?>" src="../<?php echo $row['blogimage']; ?>" alt=""></a>
					<div class="text">
					<h3><a id="title-<?php echo $row['blog_id']; ?>" href="detail.html"><?php echo $row['title']; ?></a></h3>
					<p id="date-<?php echo $row['blog_id']; ?>" > <?php echo $row['date']; ?>  </p>
					<p id="description-<?php echo $row['blog_id']; ?>" > <?php echo $row['description']; ?>  </p>
					<p class="buttons">
						<a class="btn btn-danger" onClick="blogdelete(<?php echo $row['blog_id'] ?>);" >Delete</a>
						<a class='btn btn-primary' onClick="blogdata(<?php echo $row['blog_id'] ?>);" data-toggle='modal' data-target='#blog-edit'>Edit</a>
					</p>
	
			</div>
		</div>
	</div>
			<?php 
					} 
					echo "</div>"; 
				} 
			?>	
</div>
</div>
<?php
	// Update Blog Post 
	if($status=="update")
	{
		if($_FILES['blogimage']['size']==0){
			
			$date=date('d-M-Y');

			$sql->query("UPDATE `blog` SET `title`='$_POST[blogedittitle]',`date`='$date',`description`='$_POST[blogdescription]' WHERE `blog_id`='$_POST[blogid]'");
			
		}else {
			
			$v1 = rand(1111,9999);
			$v2 = rand(1111,9999);

			$v3 = $v1 . $v2;
			$v3 = md5($v3); 
			$fnm=$_FILES["blogimage"]["name"];
			$a='../img/blog/'.$v3.$fnm;
			$des='img/blog/'.$v3.$fnm;
			move_uploaded_file($_FILES["blogimage"]["tmp_name"],'../'.$a); 	

			$date=date('d-M-Y');

			$sql->query("UPDATE `blog` SET `title`='$_POST[blogedittitle]',`date`='$date',`description`='$_POST[blogdescription]', `blogimage` ='$des' WHERE `blog_id`='$_POST[blogid]'");
			//$path=substr($_POST['path'],4);
			$a=$_POST['blogpath'];
			unlink($a);
		}
	}
	// Delete Blog Post
	if($status=="delete")
	{
		$id=$_POST["id"];
		$res=$sql->query("delete from blog where blog_id=$id");
	}
	// Insert Blog Post
	if($status=="ins")
	{
		$title=$_POST["insblogtitle"];
		$description=$_POST["insblogdescription"];
		
		$date=date('d-M-Y');
		$dbcon = mysqli_connect( 'localhost',"root","","premierdb" ) or die(mysqli_error($dbcon));

		$v1 = rand(1111,9999);
		$v2 = rand(1111,9999);

		$v3 = $v1 . $v2;
		$v3 = md5($v3); 
		$fnm=$_FILES["insblogimage"]["name"];
		$a='../img/blog/'.$v3.$fnm;
		$des='img/blog/'.$v3.$fnm;
		move_uploaded_file($_FILES["insblogimage"]["tmp_name"],'../'.$a); 	

		$sql->query("INSERT INTO `blog`(`blog_id`, `title`, `date`, `description`, `blogimage`) VALUES ('','$title','$date','$description','$des')");
	}
?>

