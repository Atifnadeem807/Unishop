<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-wishlist.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
<head>
    <meta charset="utf-8">
    <title>My Wishlist
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
            <h1>My Wishlist</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.php">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="account-orders.php">Account</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>My Wishlist</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
			<div class="col-lg-4">
		  <?php 
							            $id= $_SESSION['SESS-ID'];
									   $qry = "SELECT * FROM login WHERE  u_id='$id'";
								   $r1=mysqli_query($con,$qry);
								   while($r=mysqli_fetch_array($r1))
								   {
							         ?>		  
            <aside class="user-info-wrapper">
              <div class="user-cover" style="background-image: url(img/account/user-cover-img.jpg);">
              </div>
              <div class="user-info">
                <div class="user-avatar"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']); ?>" alt="User"></div>
                <div class="user-data">
                  <h4><?php echo $r['name']." ".$r['lastname'] ?></h4><span><?php echo $r['email']?></span>
                </div>
              </div>
            </aside>
			  <?php } ?>
            <nav class="list-group">
				
				<a class="list-group-item" href="account-profile.php"><i class="icon-head"></i>Profile</a>
				
				<a class="list-group-item" href="account-address.php"><i class="icon-map"></i>Address</a>
				
				<a class="list-group-item" href="account-password.php"><i class="icon-lock"></i>Password</a>
				
				<a class="list-group-item with-badge " href="account-orders.php"><i class="icon-bag"></i>Orders<span class="badge badge-primary badge-pill">
					<?php 
							   $id= $_SESSION['SESS-ID'];
							   $query = "SELECT id FROM checkout where u_id='$id' AND status='0'"; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} 
							  
							   ?></span></a>
				
				<a class="list-group-item with-badge active" href="account-wishlist.php"><i class="icon-heart"></i>Wishlist<span class="badge badge-primary badge-pill">
					<?php 
							   $id= $_SESSION['SESS-ID'];
							   $query = "SELECT id FROM wishlist where u_id='$id' "; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} 
							  
							   ?></span></a>
				
				<a class="list-group-item" href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
				
			  </nav>
          </div>
          <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
			  <?php 
							            $id= $_SESSION['SESS-ID'];
	                                 $ch = "SELECT * FROM wishlist WHERE u_id='$id'";
								   $rr=mysqli_query($con,$ch);
								  // $wish=mysqli_fetch_array($rr);
								   if(mysqli_num_rows($rr)<=0)
								   {?>
			  <h2 style="color: gainsboro; font-size: 60px;" align="center"><i class="fa fa-shopping-cart"></i> </h2>
                                    <h3 align="center" style="color:#0da9ef;">Empty! no item in your wishlist <i class="fa fa-heart"></i></h3>
			  <?php } else{ ?>
			  
			  <!-- Wishlist Table-->
            <div class="table-responsive wishlist-table margin-bottom-none">
              <table class="table">
                <thead>
                  <tr>
					 <th></th>
                    <th>Product Name</th>
                    <th class="text-center">Add To Cart</th>
                  </tr>
                </thead>
                <tbody>
					<?php 
							            $id= $_SESSION['SESS-ID'];
	                                 $ch = "SELECT * FROM wishlist WHERE u_id='$id'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {
									   $pid=$row['p_id'] ;
									   $qry = "SELECT * FROM product WHERE  p_id='$pid'";
								   $r1=mysqli_query($con,$qry);
								   while($r=mysqli_fetch_array($r1))
								   {
							         ?>
					<form method="post">
                  <tr>
                    <td class="text-center"><a class="remove-from-cart" onClick="return confirm('Do you want to remove this item from wishlist?')" href="account-wishlist.php?delete1=<?php echo $row['id']; ?>" data-toggle="tooltip" title="Remove item"><i class="icon-cross"></i></a></td>
					  
                    <td>
                      <div class="product-item"><a class="product-thumb" href="product.php?id=<?php echo $r['p_id'] ?>"><img style="display: block;" src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']); ?>" alt="Product"></a>
                        <div class="product-info">
                          <h1 class="product-title"><a href="product.php?id=<?php echo $r['p_id'] ?>"><?php echo $r['p_name'] ?></a></h1>
                          <div class="text-md text-medium text-muted">$<?php 
										 $p=$r['sale_price'];
									   if($p<=0)
									   {
										   echo $r['price'];
									   }
									   else
									   {
										  echo $r['sale_price']; 
									   }?></div>
                          <div>Availability:
							  <?php 
										 $q=$r['quantity'];
									   if($q<=0)
									   {?>
                            <div class="d-inline text-danger">Out of Stock</div>
							  <?php } else {?>
							  <div class="d-inline text-success">In Stock</div>
							  <?php } ?>
                          </div>
                        </div>
                      </div>
                    </td>
					  
					  <td align="center"><button class="btn btn-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!" name="cart"><i class="fa fa-shopping-cart"></i> Cart</button></td>
                  </tr>
					</form>
					<?php
									if(isset($_GET['delete1']))
									{
										$d=$_GET['delete1'];
										$delete="DELETE FROM wishlist where id='$d'";
										mysqli_query($con,$delete);
										echo "<script>window.location.replace('account-wishlist.php')</script>";
									}
									
									?>
					 <?php 
									   $pid=$r['p_id'];
									   $qty=$r['quantity'];
									  if(isset($_REQUEST['cart']))
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
										  echo "<script> window.location.replace('account-wishlist.php')</script>";
									   }
									  
									   ?>
					<?php } } ?>
                </tbody>
              </table>
            </div>
			  
			  <?php } ?>
            
            
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-wishlist.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
</html>