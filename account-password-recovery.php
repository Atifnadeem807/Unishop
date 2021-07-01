<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-password-recovery.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
<head>
    <meta charset="utf-8">
    <title>Password Recovery
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
              <li><span class="text-primary text-medium">1. </span>Fill in your email address below.</li>
              <li><span class="text-primary text-medium">2. </span>We'll email you a temporary code.</li>
              <li><span class="text-primary text-medium">3. </span>Use the code to change your password on our secure website.</li>
            </ol>
            <form class="card mt-4" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="email-for-pass">Enter your email address</label>
                  <input class="form-control" type="email" id="email-for-pass" name="email" required><small class="form-text text-muted">Type in the email address you used when you registered with Unishop. Then we'll email a code to this address.</small>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" name="getpassword" type="submit">Get New Password</button>
              </div>
            </form>
			  <?php
	                        if(isset($_REQUEST['getpassword']))
							{
	                                $code = str_pad(mt_rand(1,9999),4,'0',STR_PAD_LEFT);
	                                $e_mail =  $_REQUEST['email'];
								
                                	$qry = "SELECT * FROM login WHERE email = '$e_mail'";
									$r=mysqli_query($con,$qry);
									$row = mysqli_fetch_assoc($r);
									if((mysqli_num_rows($r))>0)
									{
										  $q = "UPDATE login SET code='$code' WHERE email = '$e_mail'";
									      mysqli_query($con,$q);
										  
										//////////////////////// EMAIL SENDING ///////////////////////
								
										    $subject="Test";
										    $header='From: support@unishop.delogiccoder.com' . "\r\n" .
										    'Reply-To: support@unishop.delogiccoder.com' . "\r\n" .
										    'X-Mailer: PHP/' . phpversion() . "\r\n" .
										    'Content-type: text/html; charset=iso-8859-1';
										    $e_mail =  $_REQUEST['email'];
										    $body='<div class="container" style="padding: 40px;">

														<div class="row" style="margin-bottom: 20px;">
														<div class="col-12" align="center">
															<div class="jumbotron" style="background-color:#0da9ef; padding: 20px;">
												<h1 style="color: white;">Change Password</h1>
												<p style="color: white;">We will send you a 4-digit code below. Use the code to change password.</p>
											</div>
														</div>
													</div>


														<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12" align="left">
														   <h2 style="color: black;">Your password recovery code is </h2>
															<h1 style="color:#0da9ef;" align="center">'.$code.'</h1>
															<p style="color: black;">Use this 4-digit code and change your password. We will secure your all information. Easily change your personal information after login.</p>
														</div>
														
													</div>
													
														<hr style=" width: 100%; border: 1px solid #0da9ef; margin-bottom: 20px;" />

														<div class="row" style="margin-top: 5px;">
															<div class="col-lg-12 col-md-12 col-sm-12" align="center">
														   <h4 style="color:#888888">Thank you Dear! for your response.</h4>
														</div>
															</div>




													</div>	


											  </body>
										   </html>
										   
										   ';
												mail ($e_mail,$subject,$body,$header);		
											/////////////////////////////////////////////////////////////
										
										
										
										    $q= "SELECT * FROM login WHERE email='$e_mail' AND status='1' ORDER BY u_id DESC LIMIT 0,1";
											$qry=mysqli_query($con,$q);
											$r1=mysqli_fetch_array($qry);
											$uid=$r1['u_id'];
										  echo "<script>window.location.replace('forget-password.php?id=$uid')</script>";
									}
									else
									{
										echo "<script>alert('This E-mail Address does not exist. Please! enter the correct Email.')</script>"; 
										echo "<script>window.location.replace('account-password-recovery.php')</script>";
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