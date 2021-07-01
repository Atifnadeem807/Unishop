<?php
session_start();
if(isset($_GET['msg']))
{
	$checkouid=$_GET['msg'];
}
?>
<!DOCTYPE html>
<html lang="en">
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
    <!-- Interactive Credit Card-->
    <link rel="stylesheet" media="screen" href="css/card.min.css">
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
        <div class="row">
          <!-- Checkout Adress-->
          <div class="col-xl-9 col-lg-8">
			  <div class="checkout-steps"><a href="checkout-review.php">4. Review</a><a href="checkout-payment.php"  class="active" ><span class="angle"></span>3. Payment</a><a href="#" class="completed"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>2. Address</a><a href="#" class="completed"><span class="step-indicator icon-circle-check"></span><span class="angle"></span>1. Checkout</a></div>
            <h3>Order Payment</h3>
            <hr class="padding-bottom-1x">
            <div class="accordion" id="accordion" role="tablist">
              <div class="card">
                <div class="card-header" role="tab">
                  <h5>Pay with Credit Card</h5>
                </div>
				  <div class="card-body">
                    <p>We accept following credit cards:&nbsp;<img class="d-inline-block align-middle" src="img/credit-cards.png" style="width: 120px;" alt="Cerdit Cards"></p>
                    <div class="card-wrapper"></div>
                    <form class="interactive-credit-card row" method="post">
						 <?php	
													   $id= $_SESSION['SESS-ID'];
													   $ch = "SELECT * FROM c_payment WHERE u_id='$id'";
													   $rr=mysqli_query($con,$ch);
													   while($r=mysqli_fetch_array($rr))
													   {
			  ?>	  
					
                      <div class="form-group col-sm-6">
						  <label for="checkout-address1">Name on card</label>
                        <input class="form-control form-control-square form-control-lg" value="<?php echo $r['name'] ?>" type="text" name="name" placeholder="Full Name" required>
                      </div>	
                      <div class="form-group col-sm-6">
						  <label for="checkout-address1">Card Number</label>
                        <input class="form-control form-control-square form-control-lg" maxlength="16" name="card" value="<?php echo $r['card_no'] ?>" type="text"  placeholder="Card Number" required>
                      </div>
                      <div class="form-group col-sm-8">
						  <label for="checkout-address1">Expiry Date</label>
                        <input class="form-control form-control-square form-control-lg" name="expiry" type="text" value="<?php echo $r['expiry_date'] ?>"  placeholder="MM/YY" required>
                      </div>
                      <div class="form-group col-sm-4">
						 <label for="checkout-address1">CVC code</label> 
                        <input class="form-control form-control-square form-control-lg" maxlength="3" type="password" name="cvv" placeholder="CVC" required>
                      </div>
						<div class="checkout-footer" style="border: none;">
						  <div class="column"><a class="btn btn-outline-secondary" href="cart.php"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back To Cart</span></a></div>
						  <div class="column"><button class="btn btn-primary" name="payment" ><span class="hidden-xs-down">Confirm Order&nbsp;</span><i class="icon-arrow-right"></i></button></div>
						</div>
						<?php } ?>
                    </form>
					
					  <?php 
										$id= $_SESSION['SESS-ID'];
										$sum="SELECT * FROM checkout WHERE u_id='$id' AND status='0' AND id='$checkouid'";
										$sumr=mysqli_query($con,$sum);
										while($sumrr=mysqli_fetch_array($sumr))
										{
											if(isset($_REQUEST['payment']))
											{
											$total= $sumrr['total'];
											$id=$_SESSION['SESS-ID'];
											$name=$_REQUEST['name'];
											$card=$_REQUEST['card'];
											$expiry=$_REQUEST['expiry'];
											$cvv=$_REQUEST['cvv'];	
											$status= 0;
											$date=date('j/M/Y');
											
											$insert="INSERT INTO payment(
											payment_id,order_id,u_id,total_price,date,name,card_no,expiry_date,cvv,status)
											VALUES(null, '$checkouid',$id,'$total','$date','$name','$card','$expiry','$cvv','$status')";	
											mysqli_query($con,$insert);	
											$q= "SELECT * FROM checkout WHERE u_id='$id' AND status='0' ORDER BY id DESC LIMIT 0,1";
											$qry=mysqli_query($con,$q);
											$r=mysqli_fetch_array($qry);
											$invoice=$r['id'];
									
											//////////////////////// EMAIL SENDING ///////////////////////
									$x = '';
									$id= $_SESSION['SESS-ID'];
	                                $ch11 = "SELECT * FROM cart WHERE u_id='$id' AND status='0'";
								   $rr11=mysqli_query($con,$ch11);
								   while($row1=mysqli_fetch_array($rr11))
								   {
									   $pid=$row1['p_id'];
									   $qry1 = "SELECT * FROM product WHERE  p_id='$pid'";
								   $r12=mysqli_query($con,$qry1);
								   while($r1=mysqli_fetch_array($r12))
								   {
							
					              $x.= "<tr style='padding: 20px;' align='center'>" ;
								  $x.= "<td style='padding: 5px;'>".$row1['id']."</td>";
								  $x.= "<td style='padding: 5px;'>".$r1['p_name']."</td>" ;
								  $x.= "<td style='padding: 5px;'>".$row1['p_price']."</td>"; 
								  $x.= "<td style='padding: 5px;'>".$row1['p_qty']."</td>"; 
								  $x.= "<td style='padding: 5px;'>".$row1['p_total']."</td>" ;
								  $x.="</tr>" ;
						       
						   
					  } }
												
												
										//$to="atifch6464@gmail.com";
										    $subject="Test";
										    $header='From: support@unishop.delogiccoder.com' . "\r\n" .
										    'Reply-To: support@unishop.delogiccoder.com' . "\r\n" .
										    'X-Mailer: PHP/' . phpversion() . "\r\n" .
										    'Content-type: text/html; charset=iso-8859-1';
										    $name1=$sumrr['f_name']." ".$sumrr['l_name'];
										    $addr=$sumrr['address'].", ".$sumrr['city'].", ".$sumrr['state'].", ".$sumrr['country'];
										    $ph=$sumrr['phone'];
											$ema=$sumrr['email'];	
											$total1= $sumrr['total']-10;
											$zero=0;
												
										    $body='<div class="container" style="padding: 40px;">

														<div class="row" style="margin-bottom: 20px;">
														<div class="col-12" align="center">
															<div class="jumbotron" style="background-color:#0da9ef; padding: 20px;">
												<h1 style="color: white;">Thanks for order, '. $name1.'</h1>
												<p style="color: white;">We will mail you again when to let you know when your order ships.</p>
											</div>
														</div>
													</div>


														<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-12" align="left">
															<span style="color:#888888">Ship to:</span>
														   <h2 style="color: black;"> '. $name1.'</h2>
															<p style="color: black;"> '. $addr.'<br>'.$ph.'<br>'.$ema.'</p>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12" align="right">
														   <h1 style="color:#0da9ef;">Invoice: #'.$checkouid.'</h1>
															<p style="color: black;">Date: '.$date.'</p>
														</div>
													</div>
													<hr style=" width: 100%; border: 1px solid #0da9ef; margin-bottom: 20px;" />
													 <table style="width: 100%; padding: 20px;">
					  <thead>
						  <tr style="background-color:#0da9ef; color: white; padding: 20px;">
						   <th style="padding: 5px;">#</th>
						   <th style="padding: 5px;">Product</th>
						   <th style="padding: 5px;">Price</th>	  
						   <th style="padding: 5px;">Quantity</th>
						   <th style="padding: 5px;">Total</th>	  
						  </tr>
					  </thead>
						  <tbody>
						  '. $x .'
						 </tbody> </table>
														<hr style=" width: 100%; border: 1px solid #0da9ef; margin-bottom: 20px;" />
												
														<div class="row" style="margin-top: 20px;">
															<div class="col-lg-12 col-md-12 col-sm-12" align="right">
														   <h3 style="color: black;">Total: $'.$total1.'</h3>
														   <h3 style="color: black;">Shipping: $10</h3>
														   <h3 style="color: black;">Grand Total: $'.$total.'</h3>		
														</div>
															</div>

														<hr style=" width: 100%; border: 1px solid #0da9ef; margin-bottom: 20px;" />

														<div class="row" style="margin-top: 5px;">
															<div class="col-lg-12 col-md-12 col-sm-12" align="center">
														   <h4 style="color:#888888">Thank you Dear! '. $name1.' for ordering products from Unishop.</h4>
														</div>
															</div>




													</div>	


											  </body>
										   </html>
										   
										   ';
												mail ($ema,$subject,$body,$header);		
											/////////////////////////////////////////////////////////////	
												
												
											$update="UPDATE cart SET order_id='$invoice', status='1' WHERE u_id='$id' AND status='0'";
												mysqli_query($con,$update);
												echo "<script>window.location.replace('checkout-review.php?msg=$invoice')</script>";
											
										}
											
										}
										
										?>
					  
                  </div>
              </div>
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
      </div>
      <!-- Site Footer-->
      <?php include('footer.php') ?>
    </div>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="js/vendor.min.js"></script>
    <script src="js/card.min.js"></script>
    <script src="js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="customizer/customizer.min.js"></script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/checkout-payment.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:36:14 GMT -->
</html>