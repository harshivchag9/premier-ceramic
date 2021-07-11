<?php 
	session_start();
	if(isset($_SESSION['loggeduserid'])){
		require_once("../database/database.config.php");
		$sql = Database::getConnection();
		$res=$sql->query("SELECT (`role`) FROM registration WHERE user_id='$_SESSION[loggeduserid]'");
		$row=$res->fetch_assoc();
        if($row['role']=='admin' || $row['role']=='marketing' || $row['role']=='production')
        {
	
?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <title>Premier Ceramic</title>
                    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
                    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
                    <link rel="stylesheet" href="../css/custom.css">
                    <link rel="shortcut icon" href="../favicon.ico">
                </head>
                <body>
                    <?php 
                        include('header.php');
                        include('adminpopup.php');
                    ?>
<div id="all">
    <div id="content">
        <div class="container-fluit">
        	<div class="row">
				<div class="col-md-12">
                    <div class='col-xl-12'> 
                        <div class='box table-responsive' >
                            <!-- Main Div For Admin Panel -->
                            
                            <div id="disp_data"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    <!-- Java Scripts -->
                    <script src="js/DisplayData.js"></script>
                    <script src="js/adminorder.js"></script>
                    <script src="js/ProductDetail.js"></script>
                    <script src="../vendor/jquery/jquery.min.js"></script>
                    <script src="../vendor/jquery.cookie/jquery.cookie.js"></script>
                    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
                    <script src="../js/front.js"></script>
                    <script>remembered();</script>
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