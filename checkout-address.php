<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/checkout-address.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:36:13 GMT -->
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
            <h1>Checkout</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.php">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Checkout</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
		  
		 <form method="post">
        <div class="row">
			<!-- Checkout Adress-->
          <div class="col-xl-9 col-lg-8">
          <div class="checkout-steps"><a href="#">4. Review</a><a href="#"><span class="angle"></span>3. Payment</a><a href="checkout-address.php" class="active" ><span class="angle"></span>2. Address</a><a href="checkout.php"><span class="angle"></span>1. Checkout</a></div>
            <h3>Shipping Address</h3>
            <hr class="padding-bottom-1x">
		    <?php	
													   $id= $_SESSION['SESS-ID'];
													   $ch = "SELECT * FROM login WHERE status = '1' AND u_id='$id'";
													   $rr=mysqli_query($con,$ch);
													   while($row=mysqli_fetch_array($rr))
													   {
														   
														   $ch1 = "SELECT * FROM c_address WHERE u_id='$id'";
													   $rr1=mysqli_query($con,$ch1);
													   while($r=mysqli_fetch_array($rr1))
													   {
			  ?>	  
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-fn">First Name</label>
                  <input class="form-control form-control-square form-control-lg" value="<?php echo $row['name'] ?>" name="fname" type="text" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-ln">Last Name</label>
                  <input class="form-control form-control-square form-control-lg" value="<?php echo $row['lastname'] ?>" type="text" name="lname" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-email">E-mail Address</label>
                  <input class="form-control form-control-square form-control-lg" value="<?php echo $row['email'] ?>" type="email" name="email" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-phone">Phone Number</label>
                  <input class="form-control form-control-square form-control-lg"  type="number" value="<?php echo $row['phone'] ?>" minlength="12" name="phone" required>
                </div>
              </div>
            </div>
			<div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="checkout-address1">Address</label>
                  <input class="form-control form-control-square form-control-lg" value="<?php echo $r['address'] ?>" type="text" name="address" required>
                </div>
              </div>
            </div>  
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-address1">City</label>
                  <input class="form-control form-control-square form-control-lg" value="<?php echo $r['city'] ?>" type="text" name="city" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-address2">State</label>
                  <input class="form-control form-control-square form-control-lg" value="<?php echo $r['state'] ?>" type="text" name="state" required>
                </div>
              </div>
            </div>
			<div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-address1">Country</label>
                  <input class="form-control form-control-square form-control-lg" value="<?php echo $r['country'] ?>" type="text" name="country" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-address2">Zip</label>
                  <input class="form-control form-control-square form-control-lg" type="text" value="<?php echo $r['zip'] ?>" name="zipcode" required>
                </div>
              </div>
            </div> 
			  <?php } } ?>
            
            <div class="checkout-footer">
              <div class="column"><a class="btn btn-outline-secondary" href="checkout.php"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back To Cart</span></a></div>
              <div class="column"><button class="btn btn-primary" name="checkout"><span  class="hidden-xs-down">Continue to payment&nbsp;</span><i class="icon-arrow-right"></i></button></div>
            </div>
          </div>
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
              <!-- Order Summary Widget-->
              <section class="widget widget-order-summary">
                <h3 class="widget-title">Order Summary</h3>
                <table class="table">
                  <tr>
                    <td>Cart Subtotal:</td>
                    <td class="text-medium">$<?php 
										$id= $_SESSION['SESS-ID'];
										$sum="SELECT sum(p_total) as p_tot FROM cart WHERE u_id='$id' AND status='0'";
										$sumr=mysqli_query($con,$sum);
										while($sumrr=mysqli_fetch_array($sumr))
										{
											echo $sumrr['p_tot'];
										}
										
										?></td>
                  </tr>
                  <tr>
                    <td>Shipping:</td>
                    <td class="text-medium">$6.00</td>
                  </tr>
                  <tr>
                    <td>Estimated tax:</td>
                    <td class="text-medium">$4.00</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="text-lg text-medium">$<?php 
										$id= $_SESSION['SESS-ID'];
										$sum="SELECT sum(g_total) as g_tot FROM cart WHERE u_id='$id' AND status='0'";
										$sumr=mysqli_query($con,$sum);
										while($sumrr=mysqli_fetch_array($sumr))
										{
											echo $sumrr['g_tot']+10;
										}
										
										?></td>
                  </tr>
                </table>
              </section>
            </aside>
          </div>
		 	
          
        </div>
			 </form>
		  <?php 
										$id= $_SESSION['SESS-ID'];
										$sum="SELECT sum(g_total) as g_tot FROM cart WHERE u_id='$id' AND status='0'";
										$sumr=mysqli_query($con,$sum);
										while($sumrr=mysqli_fetch_array($sumr))
										{
											if(isset($_REQUEST['checkout']))
											{
											$total= $sumrr['g_tot']+10;
											$id=$_SESSION['SESS-ID'];
											$fname=$_REQUEST['fname'];
											$lname=$_REQUEST['lname'];
											$country=$_REQUEST['country'];
											$address=$_REQUEST['address'];
											$city=$_REQUEST['city'];
											$state=$_REQUEST['state'];
											$zip=$_REQUEST['zipcode'];
											$phone=$_REQUEST['phone'];
											$email=$_REQUEST['email'];
											$status= 0;
											$date=date('j/M/Y');
											
											$insert="INSERT INTO checkout(
											id,u_id,f_name,l_name,country,address,city,state,zip_code,phone,email,total,status,date)
											VALUES(null, '$id','$fname','$lname','$country','$address','$city','$state','$zip','$phone','$email','$total','$status','$date')";	
											mysqli_query($con,$insert);	
											$q= "SELECT * FROM checkout WHERE u_id='$id' AND status='0' ORDER BY id DESC LIMIT 0,1";
											$qry=mysqli_query($con,$q);
											$r=mysqli_fetch_array($qry);
											$invoice=$r['id'];
												/*$update="UPDATE cart SET order_id='$invoice', status='1' WHERE u_id='$id' AND status='0'";
												mysqli_query($con,$update);*/
												echo "<script>window.location.replace('checkout-payment.php?msg=$invoice')</script>";
											
										}
											
										}
										
										?>
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/checkout-address.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:36:13 GMT -->
</html>