<?php
if(isset($_GET['id']))
{
	$uid=$_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forget Password
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Unishop - Universal E-Commerce Template">
    <meta name="keywords" content="shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Rokaux">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="css/styles.min.css">
    <!-- Customizer Styles-->
    <link rel="stylesheet" media="screen" href="customizer/customizer.min.css">
    
    <!-- Modernizr-->
    <script src="js/modernizr.min.js"></script>
  </head>
  <!-- Body-->
  <body>
   
    <?php include('header.php') ?>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
           <h1>Password Recovery</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
             <h2>Forgot your password?</h2>
            <p>Change your password in three easy steps. This helps to keep your new password secure.</p>
            <ol class="list-unstyled">
              <li><span class="text-primary text-medium">1. </span>We'll Email you a temporary code.</li>
              <li><span class="text-primary text-medium">2. </span>Use the 4-digit code to change your password on our secure website.</li>
              <li><span class="text-primary text-medium">3. </span>Enter your code below.</li>
            </ol>
            <form class="card mt-4" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="email-for-pass">Enter your 4-digit Code</label>
                  <input class="form-control" type="number" name="getcode" id="email-for-pass" required>
                </div>
              </div>
              <div class="card-footer" align="center">
                <button class="btn btn-primary" name="verify" type="submit">Verify to go next</button>
              </div>
            </form>
			  <?php 
							if(isset($_REQUEST['verify']))
							{
								            $q= "SELECT * FROM login WHERE u_id='$uid'";
											$qry=mysqli_query($con,$q);
											$r=mysqli_fetch_array($qry);
											$code=$r['code'];
								            $getcode=$_REQUEST['getcode'];
								           // echo $code;
								if($getcode==$code && $code==$getcode)
								{
									echo "<script>window.location.replace('change-password.php?id=$uid')</script>";
								}
								else
								{
									echo "<script>alert('Invalid code! please enter the correct 4-digit code.')</script>";
									echo "<script>window.location.replace('forget-password.php?id=$uid')</script>";
								}
							}
					
				?>
          </div>
        </div>
      </div>
      <!-- Site Footer-->
      <?php include('footer.php') ?>
    </div>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="js/vendor.min.js"></script>
    <script src="js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="customizer/customizer.min.js"></script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-password-recovery.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
</html>