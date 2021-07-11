      <div id="top">
        <div class="container">
          <div class="row">
            <div  class="col-lg-6 offer mb-3 mb-lg-0"></div>
            <div class="col-lg-6 text-center text-lg-right">
              <ul class="menu list-inline mb-0">
                <?= isset($_SESSION['userData'])?'':'<li class="list-inline-item"><a id="login" href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>'?>
                <?= isset($_SESSION['userData'])?'':'<li class="list-inline-item"><a href="register.php">Register</a></li>'?>
                <li class="list-inline-item"><a href="contact-us.php">Contact us</a></li>
                <li class="list-inline-item"><a href="blog.php">Blog</a></li>
                
                <?= isset($_SESSION['userData'])?'<li class="list-inline-item"><a href="changepassword.php">Change Password</a></li>':''?>
                <?= isset($_SESSION['userData'])?'<li class="list-inline-item"><a href="api/logout.php">Logout</a></li>':''?>
              </ul>
            </div>
          </div>
          </div>
        </div>
        <!--------------------------------------   Login Popup    ------------------------------------------------->
        <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Customer login</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form action="api/login.php" method="post">
                  <div class="form-group" style="color: red;">
                    <strong>
                    	<?php $message =  isset($_SESSION['loginmsg'])?$_SESSION['loginmsg']:"";
							         unset($_SESSION['loginmsg']);?> 
                       <?=$message?>
                    </strong>
                  </div>
					        <div class="form-group">
                    <input name="emailid" type="text" placeholder="email" value="harshivchag@gmail.com" class="form-control">
                  </div>
                  <div class="form-group">
                    <input name="password1" type="password" placeholder="password" value="H@rshiv1711" class="form-control">
                  </div>
                  <p class="text-center">
                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                  </p>
                </form>
                <p class="text-center text-muted">Not registered yet?</p>
                <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1 minute</p>
              </div>
            </div>
          </div>
        </div>


        <!-- *** TOP BAR END ***-->
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="index.html" class="navbar-brand home"><img src="img/premierlogo.png" alt="Premier Logo" class="d-none d-md-inline-block"><img src="img/premierlogo1.png" alt="Obaju logo" class="d-inline-block d-md-none"><span class="sr-only">Obaju - go to homepage</span></a>
          <div class="navbar-buttons">
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="basket.html" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
          </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a href="index.php" id="navindex" class="nav-link deactive">Home</a></li>
              <li class="nav-item"><a href="category.php" id="navcategory" class="nav-link deactive">Product</a></li>
              <li class="nav-item"><a href="store-locator.php" class="nav-link deactive">Store Locator</a></li>
              <li class="nav-item"><a href="tiles-calculator.php" class="nav-link deactive">Calculator</a></li>
              <li class="nav-item"><a href="your-orders.php" class="nav-link deactive">Order</a></li>
              <li class="nav-item"><a href="contact-us.php" class="nav-link deactive">Contact US</a></li>
              <!-- <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">Catagory<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <h5>Material</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">T-shirts</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Shirts</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Pants</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Accessories</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <h5>Shoes</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <h5>Accessories</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Casual</a></li>
                        </ul>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <h5>Featured</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                        </ul>
                        <h5>Looks and trends</h5>
                        <ul class="list-unstyled mb-3">
                          <li class="nav-item"><a href="category.html" class="nav-link">Trainers</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Sandals</a></li>
                          <li class="nav-item"><a href="category.html" class="nav-link">Hiking shoes</a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </li> -->
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
              <!--<div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>-->
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="wishlist.php" class="btn btn-primary navbar-btn"><i class="fa fa-heart"></i><span></span></a></div>
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="basket.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span></span></a></div>
            </div>
          </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto">
            <div class="input-group">
              <input type="text" placeholder="Search" class="form-control">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>
	  
	  </body>
</html>