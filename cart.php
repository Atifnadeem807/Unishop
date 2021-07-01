<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Cart
    </title>
    <meta name="description" content="Unishop - Universal E-Commerce Template">
    <meta name="keywords" content="shop, e-commerce, modern, flat style, responsive, online store, business, mobile, blog, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Rokaux">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">
      <!-- Page Title-->
      <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>Cart</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.php">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>Cart</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        
        <!-- Shopping Cart-->
        <div class="table-responsive shopping-cart">
          <table class="table">
            <thead>
              <tr>
				<th></th>  
                <th>Product Name</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Total</th>
                <th class="text-center">Update Cart</th>
              </tr>
            </thead>
            <tbody>
			<?php 
							            $id= $_SESSION['SESS-ID'];
	                                 $ch = "SELECT * FROM cart WHERE status = '0' AND u_id='$id'";
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
				<td class="text-center"><a class="remove-from-cart"  href="cart.php?delete=<?php echo $row['id']; ?>" data-toggle="tooltip" title="Remove item"><i class="icon-cross"></i></a></td>  
                <td>
                  <div class="product-item"><a class="product-thumb" href="product.php?id=<?php echo $r['p_id'] ?>"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']); ?>" alt="Product"></a>
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
                  <div class="count-input">
                    <input type="number" name="qnty1" min="1" style="text-align: center" value="<?php echo $row['p_qty'] ?>" class="form-control">
                  </div>
                </td>  
                <td class="text-center text-lg text-medium">$<?php echo $row['p_total'] ?></td>
                <td class="text-center"><button class="btn btn-outline-primary btn-sm" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!" type="submit" name="upd<?php echo $row['p_id'] ?>">Update</button></td>
              </tr>
			  </form>
				    <?php 
	                                  $pid=$row['p_id'];
									  if(isset($_REQUEST['upd'.$pid]))
									   {
										       $uid=$_SESSION['SESS-ID'];
											   
										            $qnty=$_REQUEST['qnty1'];
										            $p_price=$row['p_price'];
													$p_total=$p_price*$qnty;
													$p_tax=0;
													$p_ship=0;
													$g_total=$p_ship+$p_total+$p_tax;
                                                     $q = "UPDATE cart SET p_qty = '$qnty', p_total='$p_total', g_total='$g_total' WHERE  u_id = '$uid' AND p_id = '$pid'";
													 mysqli_query($con,$q);
										  	
										    $qty=$row['p_qty'];
										 
										  if($qnty<$qty)
										  {
											  $sub=$qty-$qnty;
											  $rr=$r['quantity']+$sub;
											  $qry = "UPDATE product SET quantity = '$rr' WHERE  p_id ='$pid'";
					                     	mysqli_query($con,$qry);
										  }
										  else
										  {
											  
										    $qty=$qnty - $qty;
											 if($qty<0)
										  {
											  $qty= -1 * $qty;
											  
											  
										  }  
											$lastquantity= $r['quantity'] -  $qty;
										  	$qry = "UPDATE product SET quantity = '$lastquantity' WHERE  p_id ='$pid'";
					                     	mysqli_query($con,$qry);
										  }
										  
										  echo "<script>window.location.replace('cart.php')</script>";
									   }
									   ?>
                    <?php
									if(isset($_GET['delete']))
									{
										
										$pid=$row['p_id'];
										$qty=$row['p_qty'];
										$pro=$r['quantity'];
										$rr=$qty+$pro;
										$q = "UPDATE product SET quantity = '$rr' WHERE  p_id ='$pid'";
					                    mysqli_query($con,$q);
										
										$d=$_GET['delete'];
										$delete="DELETE FROM cart where id='$d'";
										mysqli_query($con,$delete);
										echo "<script>window.location.replace('index.php')</script>";
									}
									
									?>
				<?php } } ?>
            </tbody>
          </table>
        </div>
		  
		  
		  
        <div class="shopping-cart-footer">
          <div class="column">
           <div class="column text-lg">Subtotal: <span class="text-medium">$<?php 
										$id= $_SESSION['SESS-ID'];
										$sum="SELECT sum(p_total) as p_tot FROM cart WHERE u_id='$id' AND status='0'";
										$sumr=mysqli_query($con,$sum);
										while($sumrr=mysqli_fetch_array($sumr))
										{
											echo $sumrr['p_tot'];
										}
										
										?></span></div>  
          </div>
        </div>
        <div class="shopping-cart-footer">
          <div class="column"><a class="btn btn-outline-secondary" href="index.php"><i class="icon-arrow-left"></i>&nbsp;Back to Shopping</a></div>
          <div class="column"><a class="btn btn-primary" href="checkout.php">Proceed To Checkout&nbsp;<i class="icon-arrow-right"></i></a></div>
        </div>
        
      </div>
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
</html>