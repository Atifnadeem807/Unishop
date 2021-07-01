<?php 
require_once("session.php");
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-login.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
<head>
    <meta charset="utf-8">
    <title>Login / Register Account
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
	  <?php 
	if(isset($_REQUEST['b1']))
	{
	   $v1=$_REQUEST['v1'];
	   $v2=$_REQUEST['v2'];
	  
		 //setcookie("E-mail",$v1, time()+3600, "/","", 0);  #cookies........
  
	   	$qry = "SELECT * FROM login WHERE email = '$v1' AND password = '$v2' AND status='1'";
		$r=mysqli_query($con,$qry);
		$row = mysqli_fetch_assoc($r);
		if((mysqli_num_rows($r))>0)
		{
			
session_start();			
session_regenerate_id();
$_SESSION['SESS-ID']=$row['u_id'];
$_SESSION['SESS-NAME']=$row['name'];			
session_write_close();			
header("location:index.php");
		}
		else
		{
			echo"<script>alert('Login error! Incorrect Email or Password.')</script>";
		}

	}
?> 
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Account</h1>
          </div>
          <div class="column">
			  <ul class="breadcrumbs">
              <li><a href="account-signup.php">Create new account?</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row" align="center">
		<div class="col-md-3"></div>	
          <div class="col-md-6" align="center">
            <form class="login-box" method="post">
           
              <h3 class="margin-bottom-1x">Welcome Back! Login here</h3>
              <div class="form-group input-group">
                <input class="form-control" type="email" name="v1" placeholder="Email" required><span class="input-group-addon"><i class="icon-mail"></i></span>
				  
              </div>
              <div class="form-group input-group">
                <input class="form-control" type="password" name="v2" placeholder="Password" id="password" required><span class="input-group-addon"><i class="icon-lock"></i></span>
              </div>
              <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
				  <div class="custom-control  custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="ex-check-1" onclick="myFunction()">
                  <label class="custom-control-label" for="ex-check-1">Show Password</label>
                </div> <div align="center" style="font-size: 20px; font-weight: 900; margin-top: -5px;"><b><i class="icon-align-center"></i></b></div>
				<a class="navi-link" href="account-password-recovery.php">Forgot password?</a>
              
				  
              </div>
              <div class="text-center">
                <button class="btn btn-outline-primary" name="b1" style="width: 50%;" type="submit"><i class="icon-unlock"></i>&nbsp;Login</button>
              </div>
            </form>
          </div>
          <div class="col-md-3"></div>
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
	  <script>
				function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
	
  } else {
    x.type = "password";

  }
}
				</script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-login.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
</html>