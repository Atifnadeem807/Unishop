<?php
session_start();
if(isset($_GET['msg']))
{
	$checkouid=$_GET['msg'];
}
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/checkout-complete.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:36:17 GMT -->
<head>
    <meta charset="utf-8">
    <title>Checkout
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
		<link rel="stylesheet" href="css/all.min.css">	
    <link rel="stylesheet" href="css/style.css">	
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   
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
            <h1>Order Completed</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.php">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Order</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="card text-center">
          <div class="card-body padding-top-2x">
            <h1 class="card-title" style="color: #0da9ef;">Thank you for your order!</h1>
            <p class="card-text">Your order has been placed and will be processed as soon as possible.</p>
            <p class="card-text">Make sure you make note of your order number, which is <span class="text-md" style="color: #0da9ef;"><i>#<?php echo $checkouid; ?></i></span></p>
            <p class="card-text">You will be receiving an email shortly with confirmation of your order. 
              You can now:
            </p>
            <div class="padding-top-1x padding-bottom-1x"><a class="btn btn-outline-secondary" href="index.php">Go Back Shopping</a><a class="btn btn-outline-primary" href="account-orders.php"><i class="fa fa-history"></i>&nbsp;View History</a></div>
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/checkout-complete.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:36:17 GMT -->
</html>