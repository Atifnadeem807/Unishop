<?php
session_start();
if(isset($_GET['msg']))
{
	$orderid=$_GET['msg'];
}
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/checkout-review.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:36:17 GMT -->
<head>
    <meta charset="utf-8">
    <title>Order Details
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
            <h1>Order Details</h1>
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
		  <form method="post">
        <div class="row">
          <!-- Checkout Adress-->
          <div class="col-xl-9 col-lg-8">
            <h2 align="center">Order Number <span style="color: #0da9ef;">#<?php echo $orderid ?></span></h2>
            <hr class="padding-bottom-1x">
			  <h5 class="padding-bottom-1x">Your Order has been 
				   <?php 
							            $id= $_SESSION['SESS-ID'];
	                                 $ch = "SELECT * FROM checkout WHERE u_id = '$id' AND id='$orderid'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {
				$s=$row['status'];
				if($s==0)
				{?>
				  <span class="text-info"> <i class="fa fa-clock" style="margin-top: -4px;"></i> In Progress</span> and delivered soon
			   <?php } else if($s==1)
				{?>
					<span class="text-success"> <i class="fa fa-thumbs-up" style="margin-top: -4px;"></i> Delivered</span> Successfully	
				<?php } else{ ?>
				  <span class="text-danger"> <i class="icon-cross" style="margin-top: -4px;"></i> Canceled</span> by you
				  <?php } } ?>
			</h5>
           <div class="table-responsive shopping-cart">
          <table class="table" style="background-color:#F9F9F9">
            <thead>
              <tr>
                <th>Product Name</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Total</th>
              </tr>
            </thead>
            <tbody>
			<?php 
							            $id= $_SESSION['SESS-ID'];
	                                 $ch = "SELECT * FROM cart WHERE status = '1' AND order_id='$orderid'";
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
				  <td>
                  <div class="product-item"><a class="product-thumb" href="product.php?id=<?php echo $r['p_id'] ?>"><img src="<?php echo 'data:image/png;base64,'. base64_encode($r['image']); ?>" alt="Product"></a>
                    <div class="product-info">
                      <h4 class="product-title"><a href="product.php?id=<?php echo $r['p_id'] ?>"><?php echo $r['p_name'] ?></a></h4>
						<span><em>Brand:</em>
						<?php 
						$brand=	$r['brand_id'];		
						$qry1 = "SELECT * FROM brand WHERE  brand_id='$brand'";
								   $r11=mysqli_query($con,$qry1);
								   while($b=mysqli_fetch_array($r11))
								   {		
									   echo $b['name'];
								   }
						?>		
						</span>
						<span><em>Sold By:</em> <?php echo $r['sold_by'] ?></span>
                    </div>
                  </div>
                </td>
                
                <td class="text-center text-lg text-medium">$<?php echo $row['p_price'] ?></td>
				<td class="text-center">
                  <div class="count-input"><?php echo $row['p_qty'] ?>
                  </div>
                </td>  
                <td class="text-center text-lg text-medium">$<?php echo $row['p_total'] ?></td>
              </tr>
			  </form>
				  
				<?php } } ?>
            </tbody>
          </table>
        </div>
            <div class="row padding-top-1x mt-3">
              <div class="col-sm-6">
                <h5>Shipping to:</h5>
                <ul class="list-unstyled">
					<?php 
							            $id= $_SESSION['SESS-ID'];
	                                 $ch = "SELECT * FROM checkout WHERE id='$orderid'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {?>
									   
                  <li><span class="text-muted">Client: </span><?php echo $row['f_name']." ".$row['l_name'] ?></li>
                  <li><span class="text-muted">Address: </span><?php echo $row['address'].", ".$row['city'].", ".$row['state'].", ".$row['country'] ?></li>
                  <li><span class="text-muted">Phone: </span><?php echo $row['phone']?></li>
				  <li><span class="text-muted">Zip Code: </span><?php echo $row['zip_code']?></li>	
					<?php } ?>
                </ul>
              </div>
              <div class="col-sm-6">
                <h5>Payment method:</h5>
                <ul class="list-unstyled">
					<?php 
							            $id= $_SESSION['SESS-ID'];
	                                 $ch = "SELECT * FROM payment WHERE status = '0' AND order_id='$orderid'";
								   $rr=mysqli_query($con,$ch);
								  $row=mysqli_fetch_array($rr)
					?>
                  <li><span class="text-muted">Credit Card: </span><?php echo $row['card_no']?></li>
					<?php  ?>
                </ul>
              </div>
            </div>
            <div class="checkout-footer">
						  
				         <?php 
							            $id= $_SESSION['SESS-ID'];
	                                 $ch = "SELECT * FROM checkout WHERE u_id = '$id' AND id='$orderid'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {
				$s=$row['status'];
				if($s==0)
				{?>
						<div class="column"><a class="btn btn-outline-secondary" href="account-orders.php"><i class="icon-arrow-left"></i><span>&nbsp;Back To Orders</span></a></div>
					<div class="column"><a class="btn btn-danger" onClick="return confirm('Do you want to cancel order?')" href="order_detail.php?delete3=<?php echo $row['id']; ?>"><span><i class="icon-cross" style="margin-top: -4px;"></i>&nbsp;Cancel Order</span></a></div>
				<?php } else{
				?>
				      		<div class="column"><a class="btn btn-outline-secondary" href="index.php"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back To Shop</span></a></div>
						  <div class="column"><a class="btn btn-primary" href="account-orders.php"><span>View all Order&nbsp;</span><i class="icon-arrow-right"></i></a></div>
				<?php } ?>
				
				<?php } ?>
			</div>
			  
          </div>
           <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
              <!-- Order Summary Widget-->
              <section class="widget widget-order-summary">
                <h3 class="widget-title">Billing Details</h3>
                <table class="table">
                  <tr>
                    <td>Cart Subtotal:</td>
                    <td class="text-medium">$<?php 
										$id= $_SESSION['SESS-ID'];
										$sum="SELECT sum(p_total) as p_tot FROM cart WHERE u_id='$id' AND status='1' AND order_id='$orderid'";
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
										$sum="SELECT sum(g_total) as g_tot FROM cart WHERE u_id='$id' AND status='1' AND order_id='$orderid'";
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
											$q="SELECT * FROM checkout WHERE status='0' AND u_id='$id'";
									        $qry=mysqli_query($con,$q);
									   
									         if(isset($_GET['delete3']))
											{
												$d=$_GET['delete3'];
												$status=2; 
												$delete="UPDATE checkout SET status='$status' where id='$d'";
												mysqli_query($con,$delete);
												 
												 $num= mysqli_num_rows($qry);
													if($num>=0)
													{
														echo "<script>window.location.replace('account-orders.php')</script>";
													}
													else{

														echo "<script>window.location.replace('account-orders.php')</script>";
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/checkout-review.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:36:17 GMT -->
</html>