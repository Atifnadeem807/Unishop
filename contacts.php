<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:34:07 GMT -->
<head>
    <meta charset="utf-8">
    <title>Contacts
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
    <!-- Google Tag Manager (noscript)-->
    <noscript>
      <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-T4DJFPZ" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>

   <?php include('header.php') ?>
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Contacts</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.html">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Contacts</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-2x mb-2">
		 <h2 class="margin-top-3x text-center mb-30">Get in touch</h2> 
		  <div class="row">
			  <div class="col-md-1"></div>	
          <div class="col-md-10">
			   <form class="row" method="post" style="border: 1px solid #E5E5E5; padding: 40px; padding-top: 60px;">
				   <h6 class="margin-top-2x text-center mb-10"></h6> 
			  <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ct">*Name</label>
                  <input class="form-control form-control-square" type="text" name="name" id="reg-ct" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-st">*Email Address</label>
                  <input class="form-control form-control-square" type="text" name="email" id="reg-st" required>
                </div>
              </div>
				 <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-s">*Subject</label>
                  <input class="form-control form-control-square" type="text" name="subject" id="reg-s" required>
                </div>
              </div>  
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-ad">*Message</label>
					 <textarea class="form-control form-control-square" name="message" id="reg-ad" rows="3" required></textarea>
                </div>
              </div>
			 	
              <div class="col-12 text-center text-sm-center">
				<button class="btn btn-primary" style="width:50%;" name="msg" type="submit">Send Message</button>
              </div>
            </form>
			  <?php 
											if(isset($_REQUEST['msg']))
											{
												
											$nam=$_REQUEST['name'];
											$emai=$_REQUEST['email'];
											$sub=$_REQUEST['subject'];
											$msg=$_REQUEST['message'];
											$status= 0;
											$date=date('j/M/Y');
											$qry="INSERT INTO contact_us(id,u_name,u_email,sub,msg,date,status)
											VALUES(null, '$nam','$emai','$sub','$msg','$date','$status')";	
											mysqli_query($con,$qry);	
											echo "<script>window.location.replace('contacts.php')</script>";
											
										    }
										
										?>
          </div>
			  <div class="col-md-1"></div>	
		  </div>
        <h2 class="margin-top-3x text-center mb-30">Outlet Stores</h2>
		  
        <div class="row">
			 <?php 
	                                 $ch = "SELECT * FROM stores";
								   $rr=mysqli_query($con,$ch);
								   while($r=mysqli_fetch_array($rr))
								   {
									 
							         ?>	
          <div class="col-md-4 col-sm-6">
            <div class="card mb-30"><img class="card-img-top" src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']); ?>" alt="Orlando">
              <div class="card-body">
                <ul class="list-icon">
                  <li> <i class="icon-map"></i><?php echo $r['address'].", ".$r['city'].", ".$r['state'],", ".$r['country']; ?></li>
                  <li> <i class="icon-bell"></i><?php echo $r['phone'] ?></li>
                  <li> <i class="icon-mail"></i><a class="navi-link"><?php echo $r['email'] ?></a></li>
                </ul>
              </div>
            </div>
          </div>
       <?php } ?>
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:34:12 GMT -->
</html>