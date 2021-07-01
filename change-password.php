<?php
if(isset($_GET['id']))
{
	$uid=$_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-address.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
<head>
    <meta charset="utf-8">
    <title>Change Password
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
            <h1>Change Password</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
             
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row justify-content-cente">
          <div class="col-lg-2"></div>
          <div class="col-lg-8 col-md-10">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
            <h2>Change your password</h2>
            <p>Change your password in three easy steps. This helps to keep your new password secure.</p>
            <ol class="list-unstyled">
              <li><span class="text-primary text-medium">1. </span>Enter your new password below.</li>
              <li><span class="text-primary text-medium">2. </span>Password must be atleast 5-digits.</li>
              <li><span class="text-primary text-medium">3. </span>Then confirm your password</li>
            </ol>
            <hr class="padding-bottom-1x">
            <form class="row" method="post" name="n1">
				
				<div class="col-md-12">
                <div class="form-group">
                  <label for="account-address1">New Password</label>
                  <input class="form-control" type="password" id="password" name="p1" required>
                </div>
              </div>
				<div class="col-md-12">
                <div class="form-group">
                  <label for="account-address1">Confirm Password</label>
                  <input class="form-control" onchange="test();" type="password" id="confirm_password" name="p2" required>
                </div>
					<h6 id="message" align="right" style="font-size: 13px;"></h6>
              </div>
				<div class="col-md-12">
				<div class="custom-control  custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="ex-check-1" onclick="myFunction()">
                  <label class="custom-control-label" for="ex-check-1">Show Password</label>
                </div>
					
              </div>
				
              <div class="col-12 padding-top-1x">
                <hr class="margin-top-1x margin-bottom-1x">
                <div class="text-right">
                  <button class="btn btn-primary margin-bottom-none" type="submit" name="upd" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="icon-circle-check" data-toast-title="Success!" data-toast-message="Your password updated successfuly.">Change Password</button>
                </div>
              </div>
            </form>
			  
			  <?php 
									
									  if(isset($_REQUEST['upd']))
									   {
										  $uid=$_GET['id'];
										  $p1=$_REQUEST['p1'];
										  $p2=$_REQUEST['p2'];
										  if($p1==$p2 && $p2==$p1)
										  {
										  $q = "UPDATE login SET password = '$p2' WHERE u_id = '$uid'";
									      mysqli_query($con,$q);
										  echo "<script>window.location.replace('account-login.php')</script>";
										  }
                                          
								    } ?>
		
          </div>
			 <div class="col-lg-2"></div>
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
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	  
				<script>
				function myFunction() {
  var x = document.getElementById("password");
  var y = document.getElementById("confirm_password");
  if (x.type === "password" || y.type === "password") {
    x.type = "text";
	y.type="text";  
  } else {
    x.type = "password";
	 y.type="password"
  }
}
				</script>
	  <script>
	  $('#confirm_password').on('keyup', function () {
  if ($('#confirm_password').val() == $('#password').val()) {
    $('#message').html('Password matched').css('color', '#07D037');
  } else 
    $('#message').html('Password! does not match').css('color', 'red'); 
		  
});
	  </script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-address.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
</html>