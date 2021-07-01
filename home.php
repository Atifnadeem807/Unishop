<?php
$cat_id=$_GET['cat_id'];
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/shop-grid-ls.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:32:46 GMT -->
<head>
    <meta charset="utf-8">
    <title>Home
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
            <h1>Shop</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.php">Category</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><?php 
								   $ch = "SELECT * FROM category WHERE cat_id='$cat_id'";
								   $rr=mysqli_query($con,$ch);
								   while($r4=mysqli_fetch_array($rr))
								   {?> 
										<li><?php echo $r4['name'] ?></li>

									<?php } ?></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <!-- Shop Toolbar-->
        <div class="shop-toolbar padding-bottom-1x mb-2">
          <div class="column">
            <div class="shop-sorting">
              <label for="sorting">Sort by:</label>
              <select class="form-control" id="sorting">
                <option>Popularity</option>
                <option>Low - High Price</option>
                <option>High - Low Price</option>
                <option>Avarage Rating</option>
                <option>A - Z Order</option>
                <option>Z - A Order</option>
              </select><span class="text-muted">Products found:&nbsp;</span><span>(<?php	$query = "SELECT p_id FROM product where cat_id='$cat_id'"; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} ?>) </span>
            </div>
          </div>
        </div>
        <!-- Products Grid-->
        <div class="isotope-grid cols-4 mb-2">
          <div class="gutter-sizer"></div>
          <div class="grid-sizer"></div>
          <!-- Product-->
			<?php 
								   $ch = "SELECT * FROM product WHERE cat_id='$cat_id' and status = '1'";
								   $rr=mysqli_query($con,$ch);
								   while($r=mysqli_fetch_array($rr))
								   {
								   ?> 
			<form method="post">
          <div class="grid-item">
            <div class="product-card">
                <div class="rating-stars">
					<?php
									   $pid=$r['p_id'];
									$rreview="SELECT sum(review) as u_rate, count(id) as countt FROM reviews WHERE p_id='$pid'";
									$rrew=mysqli_query($con, $rreview);
									while($r2=mysqli_fetch_array($rrew))
									{?>
										
										<?php
									if($r2['u_rate']>-1 || $r2['countt']>0)
									 {
										$main=($r2['u_rate']/$r2['countt']);
										 
									 }
										else
										{
											$main=0;
										}
										
										for($i=1; $i<6; $i++)
										{
											if(($i-1<$main)&&($i>$main))
											{
												?>
				                        	<i class="icon-star"></i>
										<?php
												
											}
											else if($i<$main)
											{
												?>
					                             <i class="icon-star filled"></i>
										<?php
												
											}
											else{ 
												?>
												<i class="icon-star"></i>
                                            <?php      
											
											}
										}
							     ?>
									<?php }   ?>
					
                </div><a class="product-thumb" href="product.php?id=<?php echo $r['p_id'] ?>"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']); ?>" alt="Product"></a>
              <h3 class="product-title"><a href="product.php?id=<?php echo $r['p_id'] ?>"><?php echo $r['p_name'] ?></a></h3>
				<?php if($r['sale_price']>0)
									{?>
              <h4 class="product-price" style="color:  #0da9ef;"><del style="color: #ED001D;"> $<?php echo $r['price']?></del>&nbsp;$<?php echo $r['sale_price']?></h4>
				<?php } else {?>
								<h4 class="product-price" style="color: #0da9ef;"><?php echo $row['price']?></h4>		
										
								<?php	} ?>
				<?php
				if(isset($_SESSION['SESS-ID']))
				{?>
              <div class="product-buttons">
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist" type="submit" name="wishlist0<?php echo $r['p_id'] ?>"><i class="icon-heart"></i></button>
                <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" type="submit" name="cart2<?php echo $r['p_id'] ?>">Add to Cart</button>
              </div>
				<?php } else {?>
				<div class="product-buttons">
                <a href="account-login.php" class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></a>
                <a href="account-login.php" class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="Login to add in cart!">Add to Cart</a>
              </div>	
				<?php } ?>
            </div>
          </div>
			</form>	
			<?php
									   
										$pid=$r['p_id'];
									   if(isset($_REQUEST['wishlist0'.$pid]))
													   {
										   $uid=$_SESSION['SESS-ID'];
										$qry1 = "SELECT * FROM wishlist WHERE u_id = '$uid' AND p_id = '$pid'";
												$r1=mysqli_query($con,$qry1);
												$row1 = mysqli_fetch_assoc($r1);
												if((mysqli_num_rows($r1))>0)
												{
												 
												}
										        else
												{
													$q= "INSERT INTO wishlist (id, p_id,u_id) VALUES ( NULL, '$pid', '$uid')";
																mysqli_query($con,$q);
																echo "<script>window.location.replace('home.php?cat_id=$cat_id')</script>";
												}
																
													   }
										
								?>	
										<?php 
	                                  $pid=$r['p_id'];
									   $qty=$r['quantity'];
									  if(isset($_REQUEST['cart2'.$pid]))
									   {
										       $uid=$_SESSION['SESS-ID'];
											   $o_id=0;
										       if($r['sale_price']<=0)
											   {
												  $p_price=$r['price']; 
												   
											   }
										       else
											   {
												  $p_price=$r['sale_price']; 
												   
											   }
										      
										      $qry1 = "SELECT * FROM cart WHERE u_id = '$uid' AND p_id = '$pid' AND status='0'";
												$r1=mysqli_query($con,$qry1);
												$row1 = mysqli_fetch_assoc($r1);
												if((mysqli_num_rows($r1))>0)
												{
													$up="SELECT * FROM cart WHERE p_id='$pid' AND u_id='$uid'";
													$u=mysqli_query($con, $up);
													while($r=mysqli_fetch_array($u))
													{ 
													  
													 $qnty=$r['p_qty']+1;
													$p_total=$p_price*$qnty;
													$p_tax=0;
													$p_ship=0;
													$g_total=$p_ship+$p_total+$p_tax;
                                                     $q = "UPDATE cart SET p_qty = '$qnty', p_total='$p_total', g_total='$g_total' WHERE  u_id = '$uid' AND p_id = '$pid'";
													 
													} 
													
												}
												else
												{
												       $p_qty=1;
													   $p_total=$p_price*$p_qty;
													   $p_tax=0;
													   $p_ship=0;
													   $g_total=$p_ship+$p_total+$p_tax; 
													   $status=0; 
													$q= "INSERT INTO cart (id, u_id, order_id, p_id, p_price, p_qty, p_total, p_tax, p_ship, g_total, status) VALUES ( NULL, '$uid', '$o_id', '$pid', '$p_price', '$p_qty', '$p_total', '$p_tax', '$p_ship', '$g_total', '$status')";
												}
											mysqli_query($con,$q);
										  	
										    $qty--;
										  	$qry = "UPDATE product SET quantity = '$qty' WHERE  p_id ='$pid'";
					                     	mysqli_query($con,$qry);
										  echo "<script>window.location.replace('home.php?cat_id=$cat_id')</script>";
									   }
									   ?>
           <?php } ?>
        </div>
        
      </div>
      <!-- Site Footer-->
      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <!-- Contact Info-->
              <section class="widget widget-light-skin">
                <h3 class="widget-title">Get In Touch With Us</h3>
                <p class="text-white">Phone: 00 33 169 7720</p>
                <ul class="list-unstyled text-sm text-white">
                  <li><span class="opacity-50">Monday-Friday:</span>9.00 am - 8.00 pm</li>
                  <li><span class="opacity-50">Saturday:</span>10.00 am - 6.00 pm</li>
                </ul>
                <p><a class="navi-link-light" href="#">support@unishop.com</a></p><a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a>
              </section>
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
                <h3 class="widget-title">About Us</h3>
                <ul>
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">About Unishop</a></li>
                  <li><a href="#">Our Story</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Our Blog</a></li>
                </ul>
              </section>
            </div>
            <div class="col-lg-3 col-md-6">
              <!-- Account / Shipping Info-->
              <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title">Account &amp; Shipping Info</h3>
                <ul>
                  <li><a href="#">Your Account</a></li>
                  <li><a href="#">Shipping Rates & Policies</a></li>
                  <li><a href="#">Refunds & Replacements</a></li>
                  <li><a href="#">Taxes</a></li>
                  <li><a href="#">Delivery Info</a></li>
                  <li><a href="#">Affiliate Program</a></li>
                </ul>
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
              <form class="subscribe-form" action="http://rokaux.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=1194bb7544" method="post" target="_blank" novalidate>
                <div class="clearfix">
                  <div class="input-group input-light">
                    <input class="form-control" type="email" name="EMAIL" placeholder="Your e-mail"><span class="input-group-addon"><i class="icon-mail"></i></span>
                  </div>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                  </div>
                  <button class="btn btn-primary" type="submit"><i class="icon-check"></i></button>
                </div><span class="form-text text-sm text-white opacity-50">Subscribe to our Newsletter to receive early discount offers, latest news, sales and promo information.</span>
              </form>
            </div>
          </div>
          <!-- Copyright-->
          <p class="footer-copyright">© All rights reserved. Made with &nbsp;<i class="icon-heart text-danger"></i><a href="http://rokaux.com/" target="_blank"> &nbsp;by rokaux</a></p>
        </div>
      </footer>
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/shop-grid-ls.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:32:50 GMT -->
</html>