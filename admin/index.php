<?php 
	session_start();
	if(isset($_SESSION['loggeduserid'])){
		require_once("../database/database.config.php");
        $db = new Database();
		$sql = Database::getConnection();
		$res=$sql->query("SELECT (`role`) FROM registration WHERE user_id='$_SESSION[loggeduserid]'");
		$row=mysqli_fetch_assoc($res);
        if($row['role']=='admin' || $row['role']=='marketing' || $row['role']=='production')
        {
	
?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <title>Premier Ceramic</title>
                    <meta name="description" content="">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="robots" content="all,follow">
                    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
                    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
                    <link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.carousel.css">
                    <link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.theme.default.css">
                    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
                    <link rel="stylesheet" href="../css/custom.css">
                    <link rel="shortcut icon" href="favicon.ico">
                </head>
                <body>
                    <?php 
                        include('header.php');
                        include('php/adminpopup.php');
                    ?>
<div id="all">
    <div id="content">
        <div class="container-fluit">
        	<div class="row">
				<div class="col-md-12">
                   
                        <!-- Main Div For Admin Panel -->
                        <div id="disp_data"></div>
                </div>
            </div>
        </div>
    </div>
</div>
                    <!-- Java Scripts -->
                    <script src="js/admin.js"></script>
                    <script src="js/adminblog.js"></script>
                    <script src="js/admincontactinquiry.js"></script>
                    <script src="js/mangeuser.js"></script>
                    <script src="js/stockupdate.js"></script>
                    <script src="js/adminorder.js"></script>
                    <script src="js/storelocator.js"></script>
                    <script src="js/googlemap.js"></script>
                    <script src="js/ContactUs.js"></script>
                    <script src="js/ProductDetail.js"></script>
                    <script src="../vendor/jquery/jquery.min.js"></script>
                    <script src="../vendor/popper.js/umd/popper.min.js"></script>
                    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
                    <script src="../vendor/jquery.cookie/jquery.cookie.js"></script>
                    <script src="../vendor/owl.carousel/owl.carousel.min.js"></script>
                    <script src="../vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
                    <script src="../js/front.js"></script>
                </body>
            </html>
<?php 
        }
    }
    else
    { 
        echo "You are not Authorized"; 
	} 
?>