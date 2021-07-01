<?php
if (isset($_GET['detailsid'])) {
	# code...
	$idx=$_GET['detailsid'];
}
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title>Synadmin – Bootstrap5 Admin Template</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		
		<?php include('header.php'); ?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Order </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Order Details</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<hr/>
			    <div class="col" align="center">
						<div class="card text-center">
							<div class="card-body shadow ">
								<div class="text-primary rounded ">Invoice# <b> <?php echo $idx; ?>	</b></div>
							</div>
						</div>
					</div>
				<h5 class="mb-1 text-uppercase" style="padding: 15px;" align="center">Customer Details</h5>
				<div class="row">
				 <div class="col-lg-8 col-md-8 col-sm-12">
					<div class="card shadow" style="width:100%;" align="center">
					<div class="card-body">
						<div class="table-responsive t-3">
							<table class="table table-borderless align-middle mb-0" style="width:100%">
								<thead class="table-light">
									<tr>
											  <th class="text-primary">SHIPPING TO:</th>
									</tr>
								</thead>
								 <tbody>
									 	<?php

                                        $d="SELECT * FROM checkout WHERE id='$idx'";
                                        $dr=mysqli_query($con,$d);
                                        $row=mysqli_fetch_array($dr) 
                                            # code...
                                    ?>
									          <tr>
												  <td><b><i class="bx bx-user"></i> Name: </b><?php echo $row['f_name'].$row['l_name'] ?> </td>
							         		  </tr> 
									          <tr>
												  <td><b><i class="bx bx-map-alt"></i> Shipping Address: </b><?php echo $row['address'].", ".$row['city'].", ".$row['state'].", ".$row['country'] ?></td>
							         		  </tr> 
									          <tr>
												  <td><b><i class="bx bx-phone"></i> Phone: </b><?php echo $row['phone']?> </td>
									          </tr> 
									          <tr>
												  <td><b><i class="bx bx-map-pin"></i> Zip code: </b><?php echo $row['zip_code']?></td>
									 <?php  ?>
								 </tbody>
								
							</table>
							
						</div>
					</div>
					
				</div>
					</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="card shadow" style="width:100%;" align="center">
					<div class="card-body">
						<div class="table-responsive t-3">
							<table class="table table-borderless align-middle mb-0" style="width:100%">
								<thead class="table-light">
									<tr>
											  <th class="text-primary">PAYMENT DETAIL:</th>
									</tr>
								</thead>
								 <tbody>
									 <?php

                                        $d="SELECT * FROM payment WHERE order_id='$idx'";
                                        $dr=mysqli_query($con,$d);
                                        $row=mysqli_fetch_array($dr)
                                            # code...
                                    ?>
									          <tr>
												  <td><b><i class="bx bx-money"></i> Total Bill: </b>$<?php echo $row['total_price']?></td>
							         		  </tr>
									          <tr>
												  <td><b><i class="bx bx-credit-card-front"></i> Payment method:</b> Online banking</td>
							         		  </tr> 
									           <tr>
												  <td><b><i class="bx bx-user-check"></i> Name on card:</b> <?php echo $row['name']?></td>
							         		  </tr> 
									          <tr>
												  <td><b><i class="bx bx-credit-card"></i> Credit card: </b><?php echo $row['card_no']?></td>
							         		  </tr> 
									    <?php  ?>      
								 </tbody>
								
							</table>
							
						</div>
					</div>
					
				</div>
					</div>
				</div>
				<hr/>
	       		<h5 class="mb-1 text-uppercase" style="padding: 15px;" align="center">order Details</h5>
				<div class="card shadow">
					<div class="card-body">
						<div class="table-responsive t-3">
							<table class="table align-middle mb-0" style="width:100%">
								<thead class="table-light ">
									<tr>
											   <th>Product Name</th>
										       <th>Price</th>
											   <th>Quantity</th>
											   <th>Total</th>
										       <th>Date</th>
										   </tr>
								</thead>
								 <tbody>
									 <?php
                  		$cart="SELECT * FROM cart WHERE order_id='$idx'";
                  		$cartr=mysqli_query($con,$cart);
                  		while ($cartrr=mysqli_fetch_array($cartr)) {
                  			# code...
                  			$fet=$cartrr['p_id'];
                            $cart2="SELECT * FROM product WHERE p_id='$fet'";
                            $cart2r=mysqli_query($con,$cart2);
                            while($cart2rr=mysqli_fetch_array($cart2r)){
                  	?>
                  	<?php
                                        $order=$cartrr['order_id'];

                                        $date="SELECT * FROM checkout WHERE id='$order'";
                                        $dater=mysqli_query($con,$date);
                                        while ($daterr=mysqli_fetch_array($dater)) {
                                            # code...
                                    ?>
										   <tr>
											   <td>
												<div class="d-flex align-items-center">
													<div class="recent-product-img">
														<img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($cart2rr['image']); ?>" alt="">
													</div>
													<div class="ms-2">
														<h6 class="mb-1 font-14"><?php echo $cart2rr['p_name']; ?></h6>
													</div>
												</div>
											   </td>
											   <td><?php echo $cartrr['p_price'];?></td>
											   <td><?php echo $cartrr['p_qty'];?></td>
											   <td>$<?php echo $cartrr['g_total']; ?></td>
											   <td><?php echo $daterr['date']; ?></td>
										   </tr>
										<?php } } } ?>
									   </tbody>
								
									<?php
									if(isset($_GET['delete']))
									{
										$d=$_GET['delete'];
										$delete="DELETE FROM product where p_id='$d'";
										mysqli_query($con,$delete);
										echo "<script>window.location.replace('product.php')</script>";
									}
									
									?>
							</table>
							
						</div>
					</div>
					
				</div>
				<h5 class="mb-1 text-uppercase" style="padding: 15px;" align="center">Billing Details</h5>
				<div class="card shadow">
					<div class="card-body">
						<div class="table-responsive t-3">
							<table class="table table-borderless align-middle mb-0" style="width:100%">
								 <tbody>
									          <tr><th>Sub Total:</th>
												  <td>$<?php 
										
										$sum="SELECT sum(p_total) as p_tot FROM cart WHERE order_id='$idx'";
										$sumr=mysqli_query($con,$sum);
										while($sumrr=mysqli_fetch_array($sumr))
										{
											echo $sumrr['p_tot'];
										}
										
										?></td>
							         		  </tr> 
									          <tr><th>Shipping Tax:</th><td>$10</td></tr> 
									          <tr><th>Grand Total:</th><td>$<?php
                  		$total="SELECT * FROM checkout WHERE id='$idx'";
                  		$qry=mysqli_query($con,$total);
                  		while ($qryr=mysqli_fetch_array($qry)) {
                  			# code...
                  			echo $qryr['total'];
                  		}
                  		?></td></tr> 
								 </tbody>
								
							</table>
							
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>