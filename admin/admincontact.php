<!DOCTYPE html>
<html>
  <head>
	   <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Premier Ceramic</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
    <link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.theme.default.css">
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="shortcut icon" href="../favicon.png">
  </head>
  <body>
	    <?php
	  
	  	require('../header.php')
	  
	  
	  ?>
  <div id="all">
        <div id="content">
            <div class="container">
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="box">
							
							<h1 style="color:#5AC3AD">Contact Form :</h1>
								<div id="disp_data"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

	  
	  
	  <?php
	  
	  	require('../footer.php')
	  
	  
	  ?>
    <script type="text/javascript">
		disp_data();
		function disp_data()
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("GET","php/contact.php?status=disp",false);
			xmlhttp.send(null);
			document.getElementById("disp_data").innerHTML=xmlhttp.responseText;

		}
		function cntctupdate(b)
		{
			var remarkid="remark"+b;
			var remark=document.getElementById(remarkid).value;
			update_contact_remark(b,remark);
			document.getElementById("remark1"+b).innerHTML=remark;
		}


		function update_contact_remark(id,remark)
		{
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("GET","php/contact.php?id="+id+"&remark="+remark+"&status=update",false);
			xmlhttp.send(null);
			disp_data();

		}

</script>
    
   
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js"></script> -->
    <script src="js/front.js"></script>
  </body>
</html>