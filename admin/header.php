<?php 
		if(isset($SESSION['loggeduserid]'])){
      require_once("database/database.config.php");
      $sql = Database::getConnection();
		$res=$sql->query("SELECT * FROM registration WHERE user_id='$SESSION[loggeduserid]'"); 
		$check=$res->fetch_assoc();
		if($check['role']=='admin'||$check['role']='production'||$check['role']='marketing'){}else{header("location:../header.php");}}
		?>
  <header class="header mb-5">
  <div id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offer mb-3 mb-lg-0"></div>
          <div class="col-lg-6 text-center text-lg-right">
            <ul class="menu list-inline mb-0">
              <li class="list-inline-item"><a onClick="displayStockScreen();" >Stock Update</a></li>
              <li class="list-inline-item"><a href="../" >User Panel</a></li>
              <!-- <li class="list-inline-item"><a onClick="disp_data('php/AdminChangeContactUs.php?status=disp');" >Contact Detail</a></li> -->
              <?php 
                if(isset($_SESSION['userData']))
                {	
                  echo '<li class="list-inline-item"><a href="../api/logout.php">Logout</a></li>';
                }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg">
      <div class="container"><a class="navbar-brand home"><img src="../img/premierlogo.png" alt="Premier Logo" class="d-none d-md-inline-block"><img src="../img/premierlogo1.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
        <div class="navbar-buttons">
          <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
          <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
        </div>
        <div id="navigation" class="collapse navbar-collapse">
          <?php 
              $res=$sql->query("SELECT (`role`) FROM `registration` WHERE user_id='$_SESSION[loggeduserid]'");
              $row=$res->fetch_assoc();
          ?>
          <?php 
            if($row['role']=='admin')
            { 
          ?>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="index.php" onClick="clearCookie();" class="nav-link active">Home</a></li>
                <li class="nav-item"><a id="addproductnav" onClick="displayProductScreen()" class="nav-link ">Add Product</a></li>
                <li class="nav-item"><a id="contactinquirynav" onClick="displayInquiryScreen()" class="nav-link ">Contact Inquiry</a></li>
                <li class="nav-item"><a id="manageusernav" onClick="displayUsers()" class="nav-link ">Manage User</a></li>
                <li class="nav-item"><a id="addblognav" onClick="displayBlogs()" class="nav-link ">Add Blog</a></li>
                <li class="nav-item"><a id="AdminOrder" onClick="displayOrders()" class="nav-link ">Order</a></li>
                <li class="nav-item"><a id="Map" onClick="displayStores()" class="nav-link ">Manage Store</a></li>
          <?php 
            }
            else if($row['role']=='marketing')
            { 
          ?>
    <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                <li class="nav-item"><a id="contactinquirynav" onClick="displayInquiryScreen();" class="nav-link ">Contact Inquiry</a></li>
                <li class="nav-item"><a id="AdminOrder" onClick="displayOrders();" class="nav-link ">Order</a></li>
                <li class="nav-item"><a id="AdminStock" onClick="displayStockScreen()" class="nav-link ">Stock Maintain</a></li>
          <?php 
            } 
            else if($row['role']=='production')
            { 
          ?>
          <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                <li class="nav-item"><a id="addproductnav" onClick="displayProductScreen();" class="nav-link ">Add Product</a></li>
                <li class="nav-item"><a id="AdminOrder" onClick="displayOrders();" class="nav-link ">Order</a></li>
        <?php 
            } 
        ?>
              </ul>
        </div>
      </div>
    </nav>
  </div>
</header>
