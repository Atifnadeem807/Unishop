<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Unishop
    </title>
    <meta name="description" content="Unishop - Universal E-Commerce Template">
    <meta name="keywords" content="shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Rokaux">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
    <link rel="stylesheet" media="screen" href="css/vendor.min.css">
    <link id="mainStyles" rel="stylesheet" media="screen" href="css/styles.min.css">
    <link rel="stylesheet" media="screen" href="customizer/customizer.min.css">
   
    <!-- Modernizr-->
    <script src="js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include('header.php') ?>
    <div class="offcanvas-wrapper">
      <!-- Page Content-->
      <!-- Main Slider-->
      <section class="hero-slider" style="background-image: url(img/hero-slider/main-bg.jpg);">
        <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
			
			<?php 
							         
	                                 $ch = "SELECT * FROM slider WHERE status = '1'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {
									   $pid=$row['p_id'] ;
									   $qry = "SELECT * FROM product WHERE  p_id='$pid'";
								   $r1=mysqli_query($con,$qry);
								   while($r=mysqli_fetch_array($r1))
								   {
							         ?>	
          <div class="item">
            <div class="container padding-top-3x">
              <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 col-md-7 text-md-left text-center">
                  <div class="from-bottom">
                    <div class="h1 text-body text-normal mb-2 pt-1"><?php echo $r['p_name'] ?></div>
                    <div class="h2 text-body text-normal mb-4 pb-1">Starting at <span class="text-bold">$<?php echo $r['price'] ?></span></div>
                  </div><a class="btn btn-primary scale-up delay-1" href="product.php?id=<?php echo $r['p_id'] ?>">Buy Now</a>
                </div>
                <div class="col-md-5 padding-bottom-2x"><img style="max-height: 80%;" class="d-block" src="<?php echo 'data:image/png;base64,'. base64_encode($row['image']); ?>" alt="<?php echo $r['p_name'] ?>"></div>
              </div>
            </div>
          </div>
			
			<?php } } ?>
         
        </div>
      </section>
	  <!-- Featured Products Carousel-->
      <section class="container padding-top-3x padding-bottom-3x">
        <h3 class="text-center mb-30">Popular Products</h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          <!-- Product-->
			<?php 
								   $ch = "SELECT * FROM product WHERE status = '1' AND review > '10'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {

								   ?>
			<form method="post">
           <div class="grid-item">
            <div class="product-card">
                <div class="rating-stars">
					<?php
									   $pid=$row['p_id'];
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
					
                </div><a class="product-thumb" href="product.php?id=<?php echo $row['p_id'] ?>"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['image']); ?>" alt="Product"></a>
              <h3 class="product-title"><a href="product.php?id=<?php echo $row['p_id'] ?>"><?php echo $row['p_name'] ?></a></h3>
              <h4 class="product-price">
                <del>$<?php echo $row['price'] ?></del>$<?php echo $row['sale_price'] ?>
              </h4>
              <div class="product-buttons">
				  <?php
					if(isset($_SESSION['SESS-ID']))
					{?>
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist" name="wishlist2<?php echo $row['p_id'] ?>"><i class="icon-heart"></i></button>
				  <?php $qty0=$row['quantity']; 
				  if($qty0 <= 0)
				  {?>
					<button class="btn btn-outline-secondary btn-sm">Not Available</button> 
				  <?php } else {?>
					   <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" name="cart2<?php echo $row['p_id'] ?>">Add to Cart</button> 
				 <?php } ?>
                
				  
				  
				  <?php } else {?>
					
				  <a class="btn btn-outline-secondary btn-sm btn-wishlist" title="Login for Whishlist" href="account-login.php"><i class="icon-heart"></i></a>
                <a class="btn btn-outline-primary btn-sm" title="Login for Cart"  href="account-login.php">Add to Cart</a>
						
					<?php } ?>
              </div>
            </div>
          </div>
			</form>	
		                    	<?php 
	                                  $pid=$row['p_id'];
									   $qty=$row['quantity'];
									  if(isset($_REQUEST['cart2'.$pid]))
									   {
										       $uid=$_SESSION['SESS-ID'];
											   $o_id=0;
										       if($row['sale_price']<=0)
											   {
												  $p_price=$row['price']; 
												   
											   }
										       else
											   {
												  $p_price=$row['sale_price']; 
												   
											   }
										      
											   $qry1 = "SELECT * FROM cart WHERE u_id = '$uid' AND p_id = '$pid' AND status='0'";
												$r1=mysqli_query($con,$qry1);
												$row1 = mysqli_fetch_assoc($r1);
												if((mysqli_num_rows($r1))>0)
												{
													$up="SELECT * FROM cart WHERE p_id='$pid' AND u_id='$uid'";
													$u=mysqli_query($con, $up);
													while($r3=mysqli_fetch_array($u))
													{ 
													  
													 $qnty=$r3['p_qty']+1;
													$p_total=$p_price*$qnty;
													$p_tax=0;
													$p_ship=0;
													$g_total=$p_ship+$p_total+$p_tax;
                                                     $qrr = "UPDATE cart SET p_qty = '$qnty', p_total='$p_total', g_total='$g_total' WHERE  u_id = '$uid' AND p_id = '$pid'";
										         	mysqli_query($con,$qrr);
													 
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
													$qr= "INSERT INTO cart (id, u_id, order_id, p_id, p_price, p_qty, p_total, p_tax, p_ship, g_total, status) VALUES ( NULL, '$uid', '$o_id', '$pid', '$p_price', '$p_qty', '$p_total', '$p_tax', '$p_ship', '$g_total', '$status')";
									           		mysqli_query($con,$qr);
												}
										    $qty--;
										  	$qry5 = "UPDATE product SET quantity = '$qty' WHERE  p_id ='$pid'";
					                     	mysqli_query($con,$qry5);
										  echo "<script> window.location.replace('index.php')</script>";
									   }
									  
									   ?>
		 						
								<?php
									   
										$pid=$row['p_id'];
									   if(isset($_REQUEST['wishlist2'.$pid]))
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
																echo "<script> window.location.replace('index.php')</script>";
												}
																
													   }
										
								?>
			<?php } ?>
        </div>
      </section>
	  <!-- Product Widgets-->
      <section class="container padding-bottom-2x" style="padding-top: 50px;">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">Top Sellers</h3>
              <!-- Entry-->
			<?php 
								   $ch1 = "SELECT * FROM offers WHERE status = '1' AND offer = 'Best Sellers'";
								   $rr1=mysqli_query($con,$ch1);
								   while($row1=mysqli_fetch_array($rr1))
								   {
									   $pid=$row1['p_id'];
                                   $ch = "SELECT * FROM product WHERE status = '1' AND p_id = '$pid'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {

								   ?>	
							  <div class="entry">
								<div class="entry-thumb"><a href="product.php?id= <?php echo $row['p_id'] ?>"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['image']); ?>" alt="Product"></a></div>
								<div class="entry-content">
								  <h4 class="entry-title"><a href="product.php?id= <?php echo $row['p_id'] ?>"><?php echo $row['p_name'] ?></a></h4><span class="entry-meta">$<?php echo $row['price'] ?></span>
								</div>
							  </div>
				
				<?php } } ?>
              
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">New Arrivals</h3>
              <!-- Entry-->
              <?php 
								   $ch1 = "SELECT * FROM offers WHERE status = '1' AND offer = 'New Arrival'";
								   $rr1=mysqli_query($con,$ch1);
								   while($row1=mysqli_fetch_array($rr1))
								   {
									   $pid=$row1['p_id'];
                                   $ch = "SELECT * FROM product WHERE status = '1' AND p_id = '$pid'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {

								   ?>	
							  <div class="entry">
								<div class="entry-thumb"><a href="product.php?id= <?php echo $row['p_id'] ?>"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['image']); ?>" alt="Product"></a></div>
								<div class="entry-content">
								  <h4 class="entry-title"><a href="product.php?id= <?php echo $row['p_id'] ?>"><?php echo $row['p_name'] ?></a></h4><span class="entry-meta">$<?php echo $row['price'] ?></span>
								</div>
							  </div>
				
				<?php } } ?>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">Hot Product</h3>
              <!-- Entry-->
				<?php 
								   $ch1 = "SELECT * FROM offers WHERE status = '1' AND offer = 'Hot Product'";
								   $rr1=mysqli_query($con,$ch1);
								   while($row1=mysqli_fetch_array($rr1))
								   {
									   $pid=$row1['p_id'];
                                   $ch = "SELECT * FROM product WHERE status = '1' AND p_id = '$pid'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {

								   ?>	
							  <div class="entry">
								<div class="entry-thumb"><a href="product.php?id= <?php echo $row['p_id'] ?>"><img src="<?php echo'data:image/jpeg;base64,'. base64_encode($row['image']); ?>" alt="Product"></a></div>
								<div class="entry-content">
								  <h4 class="entry-title"><a href="product.php?id= <?php echo $row['p_id'] ?>"><?php echo $row['p_name'] ?></a></h4><span class="entry-meta">$<?php echo $row['price'] ?></span>
								</div>
							  </div>
				
				<?php } } ?>
             
            </div>
          </div>
        </div>
      </section>
	  <!-- new Products Carousel-->
      <section class="container padding-top-1x padding-bottom-3x">
        <h3 class="text-center mb-30">New Arrival</h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:3}} }">
          <!-- Product-->
			<?php
								   $ch1 = "SELECT * FROM offers WHERE status = '1' AND offer = 'New Arrival'";
								   $rr1=mysqli_query($con,$ch1);
								  while($row1=mysqli_fetch_array($rr1))
								   {
									   $pid=$row1['p_id'];
								   $ch = "SELECT * FROM product WHERE status = '1'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {

								   ?>
			<form method="post">
           <div class="grid-item">
            <div class="product-card"  style="border: 1px solid #0da9ef;">
              <div class="rating-stars">
					<?php
									   $pid=$row['p_id'];
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
					
                </div><a class="product-thumb" href="product.php?id=<?php echo $row['p_id'] ?>"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['image']); ?>" alt="Product"></a>
              <h3 class="product-title"><a href="product.php?id=<?php echo $row['p_id'] ?>"><?php echo $row['p_name'] ?></a></h3>
              <h4 class="product-price">
                <del>$<?php echo $row['price'] ?></del>$<?php echo $row['sale_price'] ?>
              </h4>
              <div class="product-buttons">
				  <?php
					if(isset($_SESSION['SESS-ID']))
					{?>
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist" name="wishlist1<?php echo $row['p_id'] ?>"><i class="icon-heart"></i></button>
				  
                <?php $qty0=$row['quantity']; 
				  if($qty0 <= 0)
				  {?>
					<button class="btn btn-outline-secondary btn-sm">Not Available</button> 
				  <?php } else {?>
					   <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" name="cart1<?php echo $row['p_id'] ?>">Add to Cart</button> 
				 <?php } ?>
				  <?php } else {?>
					
				  <a class="btn btn-outline-secondary btn-sm btn-wishlist" title="Login for Whishlist" href="account-login.php"><i class="icon-heart"></i></a>
                <a class="btn btn-outline-primary btn-sm" title="Login for Cart"  href="account-login.php">Add to Cart</a>
						
					<?php } ?>
              </div>
            </div>
          </div>
			</form>	
			
			<?php } ?>
									  <?php 
	                                  $pid=$row['p_id'];
									   $qty=$row['quantity'];
									  if(isset($_REQUEST['cart1'.$pid]))
									   {
										       $uid=$_SESSION['SESS-ID'];
											   $o_id=0;
										       if($row['sale_price']<=0)
											   {
												  $p_price=$row['price']; 
												   
											   }
										       else
											   {
												  $p_price=$row['sale_price']; 
												   
											   }
										      
											   $qry1 = "SELECT * FROM cart WHERE u_id = '$uid' AND p_id = '$pid' AND status='0'";
												$r1=mysqli_query($con,$qry1);
												$row1 = mysqli_fetch_assoc($r1);
												if((mysqli_num_rows($r1))>0)
												{
													$up="SELECT * FROM cart WHERE p_id='$pid' AND u_id='$uid'";
													$u=mysqli_query($con, $up);
													while($r3=mysqli_fetch_array($u))
													{ 
													  
													 $qnty=$r3['p_qty']+1;
													$p_total=$p_price*$qnty;
													$p_tax=0;
													$p_ship=0;
													$g_total=$p_ship+$p_total+$p_tax;
                                                     $qrr = "UPDATE cart SET p_qty = '$qnty', p_total='$p_total', g_total='$g_total' WHERE  u_id = '$uid' AND p_id = '$pid'";
										         	mysqli_query($con,$qrr);
													 
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
													$qr= "INSERT INTO cart (id, u_id, order_id, p_id, p_price, p_qty, p_total, p_tax, p_ship, g_total, status) VALUES ( NULL, '$uid', '$o_id', '$pid', '$p_price', '$p_qty', '$p_total', '$p_tax', '$p_ship', '$g_total', '$status')";
									           		mysqli_query($con,$qr);
												}
										    $qty--;
										  	$qry5 = "UPDATE product SET quantity = '$qty' WHERE  p_id ='$pid'";
					                     	mysqli_query($con,$qry5);
										  echo "<script> window.location.replace('index.php')</script>";
									   }
									  
									   ?>
								
							          <?php
									   
										$pid=$row['p_id'];
									   if(isset($_REQUEST['wishlist1'.$pid]))
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
																echo "<script> window.location.replace('index.php')</script>";
												}
																
													   }
										
								?>
								  
							<?php	  } ?>
        </div>
      </section>
      <!-- Promo #2-->
      <section class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-lg-12">
            <div class="fw-section rounded padding-top-4x padding-bottom-4x" style="background-image: url(img/banners/home02.jpg);"><span class="overlay rounded" style="opacity: .35;"></span>
              <div class="text-center">
                <h2 class="display-2 text-bold text-white text-shadow">HOT PRODUCTS!</h2>
                <h4 class="d-inline-block h2 text-normal text-white text-shadow border-default border-left-0 border-right-0 mb-4">at our outlet stores</h4><br><a class="btn btn-primary margin-bottom-none" href="shop.php">Locate Stores</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Featured Products Carousel-->
      <section class="container padding-top-3x padding-bottom-3x">
        <h3 class="text-center mb-30">Available Products</h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          <!-- Product-->
			<?php 
								   $ch = "SELECT * FROM product WHERE status = '1'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {

								   ?>
			<form method="post">
           <div class="grid-item">
            <div class="product-card">
              <div class="product-badge text-danger"><!--22% Off--></div><a class="product-thumb" href="product.php?id=<?php echo $row['p_id'] ?>"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['image']); ?>" alt="Product"></a>
              <h3 class="product-title"><a href="product.php?id=<?php echo $row['p_id'] ?>"><?php echo $row['p_name'] ?></a></h3>
              <h4 class="product-price">
                <del>$<?php echo $row['price'] ?></del>$<?php echo $row['sale_price'] ?>
              </h4>
              <div class="product-buttons">
				  <?php
					if(isset($_SESSION['SESS-ID']))
					{?>
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist" name="wishlist1<?php echo $row['p_id'] ?>"><i class="icon-heart"></i></button>
				  
                <?php $qty0=$row['quantity']; 
				  if($qty0 <= 0)
				  {?>
					<button class="btn btn-outline-secondary btn-sm">Not Available</button> 
				  <?php } else {?>
					   <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" name="cart5<?php echo $row['p_id'] ?>">Add to Cart</button> 
				 <?php } ?>
				  <?php } else {?>
					
				  <a class="btn btn-outline-secondary btn-sm btn-wishlist" title="Login for Whishlist" href="account-login.php"><i class="icon-heart"></i></a>
                <a class="btn btn-outline-primary btn-sm" title="Login for Cart"  href="account-login.php">Add to Cart</a>
						
					<?php } ?>
              </div>
            </div>
          </div>
			</form>	
			<?php 
	                                  $pid=$row['p_id'];
									   $qty=$row['quantity'];
									  if(isset($_REQUEST['cart5'.$pid]))
									   {
										       $uid=$_SESSION['SESS-ID'];
											   $o_id=0;
										       if($row['sale_price']<=0)
											   {
												  $p_price=$row['price']; 
												   
											   }
										       else
											   {
												  $p_price=$row['sale_price']; 
												   
											   }
										      
											   $qry1 = "SELECT * FROM cart WHERE u_id = '$uid' AND p_id = '$pid' AND status='0'";
												$r1=mysqli_query($con,$qry1);
												$row1 = mysqli_fetch_assoc($r1);
												if((mysqli_num_rows($r1))>0)
												{
													$up="SELECT * FROM cart WHERE p_id='$pid' AND u_id='$uid'";
													$u=mysqli_query($con, $up);
													while($r3=mysqli_fetch_array($u))
													{ 
													  
													 $qnty=$r3['p_qty']+1;
													$p_total=$p_price*$qnty;
													$p_tax=0;
													$p_ship=0;
													$g_total=$p_ship+$p_total+$p_tax;
                                                     $qrr = "UPDATE cart SET p_qty = '$qnty', p_total='$p_total', g_total='$g_total' WHERE  u_id = '$uid' AND p_id = '$pid'";
										         	mysqli_query($con,$qrr);
													 
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
													$qr= "INSERT INTO cart (id, u_id, order_id, p_id, p_price, p_qty, p_total, p_tax, p_ship, g_total, status) VALUES ( NULL, '$uid', '$o_id', '$pid', '$p_price', '$p_qty', '$p_total', '$p_tax', '$p_ship', '$g_total', '$status')";
									           		mysqli_query($con,$qr);
												}
										    $qty--;
										  	$qry5 = "UPDATE product SET quantity = '$qty' WHERE  p_id ='$pid'";
					                     	mysqli_query($con,$qry5);
										  echo "<script> window.location.replace('index.php')</script>";
									   }
									  
									   ?>
								
								<?php
									   
										$pid=$row['p_id'];
									   if(isset($_REQUEST['wishlist1'.$pid]))
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
																echo "<script> window.location.replace('index.php')</script>";
												}
																
													   }
										
								?>
			<?php } ?>
        </div>
      </section>
   
      <!-- Site Footer-->
     <?php include('footer.php') ?>
    </div>
	  
    <a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <div class="site-backdrop"></div>
    <script src="js/vendor.min.js"></script>
    <script src="js/scripts.min.js"></script>
    <script src="customizer/customizer.min.js"></script>
	  <script>
	  
// Set the date we're counting down to
var countDownDate = new Date("Jun 30, 2021 12:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
 var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
	document.getElementById("dd").innerHTML = days ;
	document.getElementById("h").innerHTML = hours ;
	document.getElementById("m").innerHTML = minutes ;
	document.getElementById("d").innerHTML = seconds ;
	
	document.getElementById("d1").innerHTML = days + "Day";
	document.getElementById("h1").innerHTML = hours + "Hour" ;
	document.getElementById("m1").innerHTML = minutes + "Min" ;
	document.getElementById("s1").innerHTML = seconds + "Sec";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("h").innerHTML = 0;
	  document.getElementById("m").innerHTML = 0;
	  document.getElementById("d").innerHTML = 0;
	  document.getElementById("dd").innerHTML = 0 + "Day";
	document.getElementById("h1").innerHTML = 0 + "Hour" ;
	document.getElementById("m1").innerHTML = 0 + "Min" ;
	document.getElementById("s1").innerHTML = 0 + "Sec";
	  
  }
}, 1000);
	  </script>
  </body>
</html>