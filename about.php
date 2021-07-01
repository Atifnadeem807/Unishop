<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>About Us
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
            <h1>About Us</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.php">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>About Us</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-2x mb-2">
		  
        <div class="text-center padding-top-3x mb-30">
          <h2>Meet Our Team</h2>
          <p class="text-muted">People behind your awesome shopping experience.</p>
        </div>
        <div class="row">
			<?php $up="SELECT * FROM team Where status='1'";
													$u=mysqli_query($con, $up);
													while($r3=mysqli_fetch_array($u))
													{ ?>
          <div class="col-md-3 col-sm-6 mb-30 text-center"><img class="d-block w-150 mx-auto img-thumbnail rounded-circle mb-2" src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r3['image']); ?>" alt="Team">
            <h6><?php echo $r3['name'] ?></h6>
            <p class="text-muted mb-2"><?php echo $r3['position'] ?></p>
            <div class="social-bar"><a class="social-button shape-circle sb-facebook" href="<?php echo $r3['fb'] ?>" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a>
				<a class="social-button shape-circle sb-twitter" href="<?php echo $r3['twitter'] ?>" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a>
				<a class="social-button shape-circle sb-google-plus" href="<?php echo $r3['insta'] ?>" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a>
				<a class="social-button shape-circle sb-linkedin" href="<?php echo $r3['linkedin'] ?>" data-toggle="tooltip" data-placement="top" title="LinkdIn"><i class="socicon-linkedin"></i></a>
			  </div>
          </div>
        <?php } ?>
        </div>
		  <hr>
		  <div class="row align-items-center padding-bottom-2x padding-top-2x">
          <div class="col-md-5"><img class="d-block w-270 m-auto" src="img/features/01.jpg" alt="Online Shopping"></div>
          <div class="col-md-7 text-md-left text-center">
            <div class="mt-30 hidden-md-up"></div>
            <h2>Search, Select, Buy Online.</h2>
            <p></p><a class="text-medium text-decoration-none" href="index.php">View Products&nbsp;<i class="icon-arrow-right"></i></a>
          </div>
        </div>
        <hr>
        <div class="row align-items-center padding-top-2x padding-bottom-2x">
          <div class="col-md-5 order-md-2"><img class="d-block w-270 m-auto" src="img/features/02.jpg" alt="Delivery"></div>
          <div class="col-md-7 order-md-1 text-md-left text-center">
            <div class="mt-30 hidden-md-up"></div>
            <h2>Fast Delivery Worldwide.</h2>
            <p></p><a class="text-medium text-decoration-none" href="index.php">Shipping Details&nbsp;<i class="icon-arrow-right"></i></a>
          </div>
        </div>
        <hr>
        <div class="row align-items-center padding-top-2x padding-bottom-2x">
          <div class="col-md-5"><img class="d-block w-270 m-auto" src="img/features/03.jpg" alt="Mobile App"></div>
          <div class="col-md-7 text-md-left text-center">
            <div class="mt-30 hidden-md-up"></div>
            <h2>Great Mobile App. Shop On The Go.</h2>
           <a class="market-button apple-button" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">App Store</span></a><a class="market-button google-button" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Google Play</span></a><a class="market-button windows-button" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Windows Store</span></a>
          </div>
        </div>
        <hr>
        <div class="row align-items-center padding-top-2x padding-bottom-2x">
          <div class="col-md-5 order-md-2"><img class="d-block w-270 m-auto" src="img/features/04.jpg" alt="Delivery"></div>
          <div class="col-md-7 order-md-1 text-md-left text-center">
            <div class="mt-30 hidden-md-up"></div>
            <h2>Shop Offline. Cozy Outlet Stores.</h2>
            <p></p><a class="text-medium text-decoration-none" href="contacts.php">See Outlet Stores&nbsp;<i class="icon-arrow-right"></i></a>
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:34:07 GMT -->
</html>