<?php
session_start();
$id=$_GET['id'];	
?>

<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/shop-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:03 GMT -->
<head>
    <meta charset="utf-8">
    <title>Product Detail
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
            <h1>Product Details</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.php">Shop</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Product Details</li>
            </ul>
          </div>
        </div>
      </div>
	<?php 		
								   $id=$_GET['id'];			
								   $ch = "SELECT * FROM product WHERE p_id = '$id' AND status = '1'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   { ?>
		
	  <form method="post">
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Poduct Gallery-->
          <div class="col-md-6">
            <div class="product-gallery"><span class="product-badge text-danger"><!--30% Off--></span>
              <div class="product-carousel owl-carousel gallery-wrapper">
				  <?php 		
							 $ch1 = "SELECT * FROM product_images WHERE p_id = '$id' AND status = '1'";
							 $rr1=mysqli_query($con,$ch1);
							 while($r=mysqli_fetch_array($rr1))
							{ ?>
                <div class="gallery-item" data-hash="<?php echo $r['id'];  ?>"><a href="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']);  ?>" data-size="1000x667"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']);  ?>" alt="Product"></a></div>
				  
				  <?php } ?>
              </div>
              <ul class="product-thumbnails">
				  <?php 		
							 $ch1 = "SELECT * FROM product_images WHERE p_id = '$id' AND status = '1'";
							 $rr1=mysqli_query($con,$ch1);
							 while($r=mysqli_fetch_array($rr1))
							{ ?>
                <li><a href="#<?php echo $r['id'];  ?>"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']);  ?>" alt="Product"></a></li>
				  <?php } ?>
              </ul>
            </div>
          </div>
          <!-- Product Info-->
          <div class="col-md-6">
            <div class="padding-top-2x mt-2 hidden-md-up"></div>
              <div class="rating-stars">
				  <?php
									   $pid=$row['p_id'];
									$review="SELECT sum(review) as u_rate, count(id) as countt FROM reviews WHERE p_id='$pid'";
									$rew=mysqli_query($con, $review);
									while($r=mysqli_fetch_array($rew))
									{?>
				  <?php
									if($r['u_rate']>-1 || $r['countt']>0)
									 {
										$main=($r['u_rate']/$r['countt']);
										 
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
										<i class="icon-star filled"></i>
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
				  
				  
				  
				  <?php } ?>
				 
              </div>
			  <span class="text-muted align-middle">&nbsp;&nbsp;
			  <?php
									$id=$_GET['id'];							
									$review="SELECT sum(review) as u_rate, count(id) as countt FROM reviews WHERE p_id='$id'";
									$rew=mysqli_query($con, $review);
									while($r1=mysqli_fetch_array($rew))
									{?>
			                        <?php
									
									 if($r1['u_rate']>-1 || $r1['countt']>0)
									 {
										 $all=($r1['u_rate']/($r1['countt']*5))*5;
										 $main=($r1['u_rate']/$r1['countt']/5)*100;
										 
										 echo round($all, 1); 
									 }
										else
										{
											$main=0;
										}
										
							     ?>
			  | 
			  <?php echo $r1['countt'] ?> 
			  customer reviews
			  <?php } ?>
			  </span>
			  
			  
            <h2 class="padding-top-1x text-normal"><?php echo $row['p_name'];  ?></h2>
			  <?php 
					             if($row['sale_price']>0)
									{?>
			  <span class="h2 d-block">Price: 
              <del style="color: #ED001D;"> $<?php echo $row['price']?></del>&nbsp; <span style="color: #0da9ef;">$<?php echo $row['sale_price']?></span></span>
			  <?php } else { ?>
			  <span class="h2 d-block">$<?php echo $row['price']?></span>
			  <?php } ?>
           
            <div class="pt-1 mb-2"><span class="text-medium">Brand:</span> <?php 
																$brand= $row['brand_id'];  
																$ch = "SELECT * FROM brand WHERE brand_id = '$brand' AND status = '1'";
															   $rr=mysqli_query($con,$ch);
															   while($row1=mysqli_fetch_array($rr))
															   { ?>
																	  <?php echo $row1['name'];?>

																<?php } ?></div>
			 <div class="pt-1 mb-2"><span class="text-medium">Status:</span> <?php $status= $row['quantity'];
									  if($status<=0)
									  {
										  echo "Out Of Stock";
									  }
									else if($status >0 && $row['sale_price']>0)
									{
										echo "On Sale";
									}
									else if($status >0 && $row['sale_price']==0)
									{
										echo "Available";
									}
									
									?></div>
			  
			  <div class="pt-1 mb-2"><span class="text-medium">SKU:</span> <?php echo $row['SKU'];  ?></div>
			  
			  <div class="pt-1 mb-2"><span class="text-medium">Sold By:</span> <?php echo $row['sold_by'];  ?></div>
			  
            <div class="padding-bottom-1x mb-2"><span class="text-medium">Categories:&nbsp;</span><a class="navi-link" href="#"><?php 
									$cat= $row['cat_id'];
									$ch = "SELECT * FROM category WHERE cat_id = '$cat' AND status = '1'";
								   $rr=mysqli_query($con,$ch);
								   while($row1=mysqli_fetch_array($rr))
								   { ?>
									      <?php echo $row1['name'];  ?>
									
									<?php } ?></a></div>
			  
			  <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="quantity" style="color: #0da9ef;">Quantity:</label>
                  <input type="number" class="form-control" min="1" value="1" name="quantity1">
                </div>
              </div>
            </div> 
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-between">
              <div class="sp-buttons mt-2 mb-2">
				  <?php if(isset($_SESSION['SESS-ID'])){ ?>
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" name="wishlist12<?php echo $row['p_id'] ?>" data-toggle="tooltip" title="Whishlist" type="submit"><i class="icon-heart"></i></button>
                <button class="btn btn-primary" name="cart7<?php echo $row['p_id']?>" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="Login to add in cart!" type="submit"><i class="icon-bag"></i> Add to Cart</button>
				  <?php } else {?>
							<a class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist" href="account-login.php"><i class="icon-heart"></i></a>
                <a class="btn btn-primary" href="account-login.php" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="Login ti added in cart!" ><i class="icon-bag"></i> Add to Cart</a>		   
								  <?php } ?>
              </div>
            </div>
          </div>
        </div>
		  </form>
		  <?php
									
									$pid=$row['p_id'];							
									if(isset($_REQUEST['wishlist12'.$pid]))
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
					<?php 
	                                  $pid=$row['p_id'];
																
									  if(isset($_REQUEST['cart7'.$pid]))
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
													while($r=mysqli_fetch_array($u))
													{ 
													  $p_qty=$_REQUEST['quantity1']; 
													 $qnty=$r['p_qty']+$p_qty;
													$p_total=$p_price*$qnty;
													$p_tax=0;
													$p_ship=0;
													$g_total=$p_ship+$p_total+$p_tax;
                                                     $q = "UPDATE cart SET p_qty = '$qnty', p_total='$p_total', g_total='$g_total' WHERE  u_id = '$uid' AND p_id = '$pid'";
													 
													} 
													
												}
												else
												{
												       $p_qty=$_REQUEST['quantity1'];
													   $p_total=$p_price*$p_qty;
													   $p_tax=0;
													   $p_ship=0;
													   $g_total=$p_ship+$p_total+$p_tax; 
													   $status=0; 
													$q= "INSERT INTO cart (id, u_id, order_id, p_id, p_price, p_qty, p_total, p_tax, p_ship, g_total, status) VALUES ( NULL, '$uid', '$o_id', '$pid', '$p_price', '$p_qty', '$p_total', '$p_tax', '$p_ship', '$g_total', '$status')";
												}
											mysqli_query($con,$q);
										  	
										    $qty=$row['quantity'];
										    $qty=$qty - $p_qty;
										  	$qry = "UPDATE product SET quantity = '$qty' WHERE  p_id ='$pid'";
					                     	mysqli_query($con,$qry);
										   
										  	echo "<script>window.location.replace('product.php?id=$id')</script>";
									   }
									   ?>
        <!-- Product Tabs-->
        <div class="row padding-top-3x mb-3">
          <div class="col-lg-10 offset-lg-1">
            <ul class="nav nav-tabs" role="tablist">
			  <li class="nav-item"><a class="nav-link active" href="#spec" data-toggle="tab" role="tab">Specifications</a></li>	
              <li class="nav-item"><a class="nav-link " href="#description" data-toggle="tab" role="tab">Description</a></li>	
              <li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab" role="tab">Reviews (<?php	$id=$_GET['id'];
										$query = "SELECT id FROM reviews Where p_id= '$id'"; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} ?>)</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show" id="description" role="tabpanel">
				  <p>
				  <?php
									$ch = "SELECT * FROM product WHERE p_id = '$id' AND status = '1'";
								   $rr=mysqli_query($con,$ch);
								   while($row2=mysqli_fetch_array($rr))
								   { echo $row2['description'];   } ?>
				  </p>
              </div>
		      <div class="tab-pane fade show active" id="spec" role="tabpanel">
				  <div class="table-responsive">
              <table class="table  ">
				  <thead class="thead-inverse">
				  <tr>
					  <th>Name</th>
					 <th>Detail</th> 
			      </tr>
					  
				  </thead>
                <tbody>
					  <?php
									$ch = "SELECT * FROM product_spec WHERE p_id = '$id' AND status = '1'";
								   $rr=mysqli_query($con,$ch);
								   while($row2=mysqli_fetch_array($rr))
								   { ?>
                  <tr>
                    <th><?php echo $row2['name'];  ?></th>
                    <td><?php echo $row2['details'];  ?></td>
                  </tr>
					<?php } ?>
                </tbody>
              </table>
            </div>
              </div>	
              <div class="tab-pane fade" id="reviews" role="tabpanel">
                <!-- Review-->
				  <?php 
								   $ch = "SELECT * FROM reviews WHERE p_id= '$id'";
								   $rr=mysqli_query($con,$ch);
								   while($row3=mysqli_fetch_array($rr))
								   {
									$uid=$row3['u_id']  ; 
				  $ch1 = "SELECT * FROM login WHERE u_id= '$uid'";
								   $rr1=mysqli_query($con,$ch1);
								   while($row4=mysqli_fetch_array($rr1))
								   {
				  ?>
                <div class="comment">
                  <div class="comment-author-ava"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row4['image']); ?>" alt="Review author"></div>
                  <div class="comment-body">
                    <div class="comment-header d-flex flex-wrap justify-content-between">
                      <h4 class="comment-title"><?php echo $row4['name']." ".$row4['lastname'] ?></h4>
                      <div class="mb-2">
                          <div class="rating-stars">
				  <?php	$review= $row3['review']; 
					$i=1;
					 while($i<=$review)
					{  /*if($review<$i)
						{ ?>
							  <i class="icon-star"></i>
					<?php } else {*/
							  ?> 
							 <i class="icon-star filled"></i> 
					
				  <?php /*}*/  $i++; } ?>
				 
              </div>
                      </div>
                    </div>
                    <p class="comment-text"><?php echo $row3['des'] ?></p>
                  </div>
                </div>
				  
				  <?php } } ?>
				  
                <!-- Review Form-->
                <h5 class="mb-30 padding-top-1x">Leave Review</h5>
				  <?php 
										if(isset($_SESSION['SESS-ID']))
										{
                                            $uid=$_SESSION['SESS-ID'];
											$qry = "SELECT * FROM reviews WHERE u_id = '$uid'";
											$r=mysqli_query($con,$qry);
											$row = mysqli_fetch_assoc($r);
											
											$ch = "SELECT * FROM login WHERE u_id = '$uid'";
											$rr=mysqli_query($con,$ch);
											while($row2=mysqli_fetch_array($rr))
											{ ?>
				   <form class="row" method="post">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="review_name">Your Name</label>
                      <input name="nam" class="form-control form-control-rounded" value="<?php echo $row2['name']." ".$row2['lastname']; ?>" type="text" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="review_email">Your Email</label>
                      <input name="em" class="form-control form-control-rounded" type="email" value="<?php echo $row2['email']; ?>" required>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="review_rating">Rating</label>
                      <select name="rat" class="form-control form-control-rounded">
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="2">2 Stars</option>
                        <option value="1">1 Star</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="review_text">Review </label>
                      <textarea class="form-control form-control-rounded" name="des" rows="4" required></textarea>
                    </div>
                  </div>
                  <div class="col-12 text-right">
                    <button class="btn btn-outline-primary" type="submit" name="btn1">Submit Review</button>
                  </div>
                </form>
				                        <?php } 
										}
									else{ ?>
				  <form class="row" method="post">
                 
                  <div class="col-12 text-center">
                    <a class="btn btn-outline-primary" href="account-login.php">Login for review</a>
                  </div>
                </form>
				  <?php	}
                                     ?>
							<?php 
	
									  if(isset($_REQUEST['btn1']))
									   {
										   $n1=$_REQUEST['nam'];
										   $n2=$_REQUEST['em'];
										   $n3=$_REQUEST['des'];
										   $n4=$_REQUEST['rat'];
										   $n5=$_SESSION['SESS-ID'];
                                           
										    $q="INSERT INTO reviews(id,name,email,des,review,p_id,u_id) 
											VALUES(NULL,'$n1','$n2','$n3','$n4','$id','$n5')";
											mysqli_query($con,$q);
										  	echo "<script>window.location.replace('product.php?id=$id')</script>";
										  	
									   }
									   ?>
              </div>
            </div>
          </div>
        </div>
        <!-- Related Products Carousel-->
        <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">Other Products</h3>
        <!-- Carousel-->
		  
		<div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          <!-- Product-->
			<?php 
								  	   
								   $ch = "SELECT * FROM product WHERE status = '1'";
								   $rr=mysqli_query($con,$ch);
								   while($row12=mysqli_fetch_array($rr))
								   {

								   ?>
			<form method="post">
           <div class="grid-item">
            <div class="product-card">
               <div class="rating-stars">
				  <?php
									   $pid=$row12['p_id'];
									$review="SELECT sum(review) as u_rate, count(id) as countt FROM reviews WHERE p_id='$pid'";
									$rew=mysqli_query($con, $review);
									while($r=mysqli_fetch_array($rew))
									{?>
				  <?php
									if($r['u_rate']>-1 || $r['countt']>0)
									 {
										$main=($r['u_rate']/$r['countt']);
										 
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
										<i class="icon-star filled"></i>
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
				  
				  
				  
				  <?php } ?>
				 
              </div><a class="product-thumb" href="product.php?id=<?php echo $row12['p_id'] ?>"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row12['image']); ?>" alt="Product"></a>
              <h3 class="product-title"><a href="product.php?id=<?php echo $row12['p_id'] ?>"><?php echo $row12['p_name'] ?></a></h3>
              <h4 class="product-price">
                <del>$<?php echo $row12['price'] ?></del>$<?php echo $row12['sale_price'] ?>
              </h4>
              <div class="product-buttons">
				  <?php
					if(isset($_SESSION['SESS-ID']))
					{?>
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist" name="wishlist1<?php echo $row12['p_id'] ?>"><i class="icon-heart"></i></button>
				  
                <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" name="cart1<?php echo $row12['p_id'] ?>">Add to Cart</button>
				  <?php } else {?>
					
				  <a class="btn btn-outline-secondary btn-sm btn-wishlist" title="Login for Whishlist" href="account-login.php"><i class="icon-heart"></i></a>
                <a class="btn btn-outline-primary btn-sm" title="Login for Cart"  href="account-login.php">Add to Cart</a>
						
					<?php } ?>
              </div>
            </div>
          </div>
			</form>	
			<?php 
	                                  $pid=$row12['p_id'];
									   $qty=$row12['quantity'];
									  if(isset($_REQUEST['cart1'.$pid]))
									   {
										       $uid=$_SESSION['SESS-ID'];
											   $o_id=0;
										       if($row12['sale_price']<=0)
											   {
												  $p_price=$row12['price']; 
												   
											   }
										       else
											   {
												  $p_price=$row12['sale_price']; 
												   
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
      </div>
		
		<?php } ?>
      <!-- Site Footer-->
      <?php include('footer.php') ?>
    </div>
    <!-- Photoswipe container-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
          </div>
        </div>
      </div>
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/shop-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:26 GMT -->
</html>