<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-orders.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:31:29 GMT -->
<head>
    <meta charset="utf-8">
    <title>My Orders
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
            <h1>My Orders</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.php">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="account-orders.php">Account</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>My Orders</li>
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
				
				<a class="list-group-item with-badge active" href="account-orders.php"><i class="icon-bag"></i>Orders<span class="badge badge-primary badge-pill">
					<?php 
							   $id= $_SESSION['SESS-ID'];
							   $query = "SELECT id FROM checkout where u_id='$id' AND status='0'"; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} 
							  
							   ?></span></a>
				
				<a class="list-group-item with-badge" href="account-wishlist.php"><i class="icon-heart"></i>Wishlist<span class="badge badge-primary badge-pill">
					<?php 
							   $id= $_SESSION['SESS-ID'];
							   $query = "SELECT id FROM wishlist where u_id='$id'"; 
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
            <div class="table-responsive">
              <table class="table table-hover margin-bottom-none">
                <thead>
                  <tr align="center">
                    <th>Order #</th>
                    <th>Date Purchased</th>
                    <th>Status</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
					<?php 
							            $id= $_SESSION['SESS-ID'];
	                                 $ch = "SELECT * FROM checkout WHERE u_id='$id' ORDER BY id DESC";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {?>
                  <tr align="center">
                    <td><a class="text-medium navi-link" href="order_detail.php?msg=<?php echo $row['id']; ?>"><?php echo $row['id'] ?></a></td>
                    <td><?php echo $row['date'] ?></td>
                    <td align="center">
						<?php $s=$row['status'];
						if($s==0)
						{?>
							<span class="text-info">Pending</span>
						<?php }
						else if($s==1)
						{?>
						<span style="color:#00BC03;">Delivered</span>	
						<?php }
						else if($s==3)
						{?>
						<span style="color: orange;">Not Available</span>	
						<?php }
					    else{?>
							<span style="color:red;">Canceled</span>
						<?php }
						
						?>
						
				    </td>
                    <td><span class="text-medium">$<?php echo $row['total'] ?></span></td>
                  </tr>
					
					
					
					
                 <?php } ?>
                </tbody>
              </table>
            </div>
            <hr>
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-orders.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:31:37 GMT -->
</html>