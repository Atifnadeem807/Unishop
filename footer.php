 <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <!-- Contact Info-->
				 <?php 
	                                 $ch = "SELECT * FROM about";
								   $rr=mysqli_query($con,$ch);
								   while($row1=mysqli_fetch_array($rr))
								   {
									 
							         ?>	
              <section class="widget widget-light-skin">
                <h3 class="widget-title">Get In Touch With Us</h3>
                <p class="text-white">Phone: <?php echo $row1['phone']; ?></p>
                <ul class="list-unstyled text-sm text-white">
                  <li><span class="opacity-50">Monday-Friday:</span>9.00 am - 8.00 pm</li>
                  <li><span class="opacity-50">Saturday:</span>10.00 am - 6.00 pm</li>
                </ul>
                <p><a class="navi-link-light" href="#"><?php echo $row1['email']; ?></a></p><a class="social-button shape-circle sb-facebook sb-light-skin" href="<?php echo $row1['fb']; ?>"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="<?php echo $row1['twitter']; ?>"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="<?php echo $row1['insta']; ?>"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-pinterest sb-light-skin" href="<?php echo $row1['pin']; ?>"><i class="socicon-pinterest"></i></a>
              </section>
				
				<?php } ?>
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- Mobile App Buttons-->
              <section class="widget widget-light-skin">
                <h3 class="widget-title">Our Mobile App</h3><a class="market-button apple-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">App Store</span></a><a class="market-button google-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Google Play</span></a><a class="market-button windows-button mb-light-skin" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Windows Store</span></a>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- About Us-->
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title">Unishop</h3>
                <ul>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="account-signup.php">Create a account</a></li>
                  <li><a href="contacts.php">Contact Us</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="services.php">Services</a></li>
                </ul>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- Account / Shipping Info-->
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title">Account &amp; Order Info</h3>
				  <?php if(isset($_SESSION['SESS-ID']))
{?> <ul>
                  <li><a href="account-profile.php">My Profile</a></li>
                  <li><a href="account-address.php">Addresses</a></li>
                  <li><a href="account-password.php">Password</a></li>
                  <li><a href="account-orders.php">Order History</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
				  
				 <?php } else { ?>
                <ul>
                  <li><a href="account-signup.php">Create Your Account</a></li>
                  <li><a href="account-login.php">Login my account</a></li>
                  <li><a href="#">Refunds & Replacements</a></li>
                </ul>
				  <?php } ?>
              </section>
            </div>
          </div>
          <hr class="hr-light mt-2 margin-bottom-2x">
          <div class="row">
            <div class="col-md-7 padding-bottom-1x">
              <!-- Payment Methods-->
              <div class="margin-bottom-1x" style="max-width: 615px;"><img src="img/payment_methods.png" alt="Payment Methods">
              </div>
            </div>
            <div class="col-md-5 padding-bottom-1x">
              <div class="margin-top-1x hidden-md-up"></div>
              <!--Subscription-->
              <form class="subscribe-form" method="post">
                <div class="clearfix">
                  <div class="input-group input-light">
                    <input class="form-control" type="email" name="mail" placeholder="Your e-mail"><span class="input-group-addon"><i class="icon-mail"></i></span>
                  </div>
                  
                  <button class="btn btn-primary" name="btn" type="submit"><i class="icon-check"></i></button>
                </div><span class="form-text text-sm text-white opacity-50">Subscribe to our Newsletter to receive early discount offers, latest news, sales and promo information.</span>
              </form>
				<?php 
											if(isset($_REQUEST['btn']))
											{
											$emai=$_REQUEST['mail'];
											$date=date('j/M/Y');
											$qry="INSERT INTO newsletter(id,email,date)
											VALUES(null, '$emai','$date')";	
											mysqli_query($con,$qry);	
											echo "<script>window.location.replace('index.php')</script>";
											
										    }
										
									?>
            </div>
          </div>
          <!-- Copyright-->
          <p class="footer-copyright">© All rights reserved. Made with &nbsp;<i class="icon-heart text-danger"></i><a href="#" target="_blank"> &nbsp;by Eye-Developers</a></p>
        </div>
      </footer>