<?php
if(isset($_GET['id']))
{
	$pid=$_GET['id'];
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
	<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
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
					<div class="breadcrumb-title pe-3">Product</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Product</li>
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
  
              <div class="card">
				  <div class="col">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Edit Product</h5>
								<hr/>
								<ul class="nav nav-tabs nav-primary" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bxs-add-to-queue font-18 me-1'></i>
												</div>
												<div class="tab-title">Product Information</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bxs-detail font-18 me-1'></i>
												</div>
												<div class="tab-title">Product Specifications</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#img" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-image font-18 me-1'></i>
												</div>
												<div class="tab-title">Product Images</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#rew" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
												</div>
												<div class="tab-title">Product Reviews</div>
											</div>
										</a>
									</li>
									
								</ul>
								<div class="tab-content py-3">
									<?php	           
													   $ch = "SELECT * FROM product WHERE  p_id='$pid'";
													   $rr=mysqli_query($con,$ch);
													   while($row=mysqli_fetch_array($rr))
													   { ?>
									
									<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
										  <div class="card-body p-4">
											  <form method="post"  enctype="multipart/form-data">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-8">
													   <div class="border border-3 p-4 rounded">
														<div class="mb-3">
															<label for="inputProductTitle" class="form-label">Product Title</label>
															<input type="text"  name="name" class="form-control" placeholder="Enter product name of atleast 5 words" value="<?php echo $row['p_name']; ?>">
														  </div>
														  <div class="mb-3">
															<label for="inputProductDescription" class="form-label">Description</label>
															<textarea name="descp" class="form-control" rows="5"><?php echo $row['description']; ?></textarea>
														  </div>
														  <div class="mb-3">
															<div class="col-sm-12" align="left">
															  <div class="form-group">
																  <label for="reg-f">Select Product Image</label>

																	<div class="image-preview" id="imagePreview" align="center" style="border: solid 1px #dbe2e8; border-radius: 5px; padding: 30px;">
																		<img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['image']); ?>" alt="Image Preview" class="image" style="width: 50%; height:50%;" />
																		<input type="file" value="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['image']); ?>" name="inpFile" id="inpFile" style=" padding: 15px;" required>
																		 <span class="default-text"></span>
																	</div> 


																  </div>
														  </div>
														  </div>
														</div>
													   </div>
													   <div class="col-lg-4">
														<div class="border border-3 p-4 rounded">
														  <div class="row g-3">
															  <div class="col-12">
																<label for="inputProductType" class="form-label">Brand name</label>
																<select class="form-select" name="brand" required>
																	<?php	     
														$b=$row['brand_id'];
													   $ch = "SELECT * FROM brand where brand_id='$b' ";
													   $rr=mysqli_query($con,$ch);
													   while($row2=mysqli_fetch_array($rr))
													   { ?>
														<option value="<?php echo $row2['brand_id'] ?>" selected><?php echo $row2['name'] ?></option>
														<?php } ?>	
																	<?php	           
													   $ch = "SELECT * FROM brand";
													   $rr=mysqli_query($con,$ch);
													   while($row1=mysqli_fetch_array($rr))
													   { ?>
														<option value="<?php echo $row1['brand_id'] ?>"><?php echo $row1['name'] ?></option>
														<?php } ?>			
																  </select>
															  </div>
															  
															  
															  
															  <div class="col-12">
																<label for="inputVendor" class="form-label">Main Category</label>
																<select id="country" name="main" class="form-select" required>
																	    <?php	    
														$cat=$row['cat_id'];
													   $ch = "SELECT * FROM category WHERE  cat_id='$cat'";
													   $rr=mysqli_query($con,$ch);
													   while($row1=mysqli_fetch_array($rr))
													   { 
														   $sub=$row1['sub_id'];
													   $ch = "SELECT * FROM sub_cat WHERE  sub_id='$sub'";
													   $rr=mysqli_query($con,$ch);
													   while($row2=mysqli_fetch_array($rr))
													   { 
														   $main=$row2['main_id'];
													   $ch = "SELECT * FROM main_cat WHERE  main_id='$main'";
													   $rr=mysqli_query($con,$ch);
													   while($row3=mysqli_fetch_array($rr))
													   { 
																	?>
																	    <option value="<?php echo $row3['main_id'] ?>" selected><?php echo $row3['name'] ?></option>
														<?php } } } ?>			
																  </select>
															  </div>
															  
															  
															  
															  
															  
															  
															  <div class="col-12" id="hid1">
																<label for="inputCollection" class="form-label">Sub Category</label>
																<select class="form-select" id="state" name="sub" required>
																	 <?php	    
														$cat=$row['cat_id'];
													   $ch = "SELECT * FROM category WHERE  cat_id='$cat'";
													   $rr=mysqli_query($con,$ch);
													   while($row1=mysqli_fetch_array($rr))
													   { 
														   $sub=$row1['sub_id'];
													   $ch = "SELECT * FROM sub_cat WHERE  sub_id='$sub'";
													   $rr=mysqli_query($con,$ch);
													   while($row2=mysqli_fetch_array($rr))
													   { 
														  ?>
																	    <option value="<?php echo $row2['sub_id'] ?>" selected><?php echo $row2['name'] ?></option>
														<?php }  } ?>	
																</select>
															  </div>
															  
															  
															  
															  <div class="col-12" id="hid2">
																<label for="inputCollection" class="form-label">Category</label>
																<select class="form-select" id="city" name="cat" required>
																	 <?php	    
														$cat=$row['cat_id'];
													   $ch = "SELECT * FROM category WHERE  cat_id='$cat'";
													   $rr=mysqli_query($con,$ch);
													   while($row1=mysqli_fetch_array($rr))
													   { 
																	?>
																	    <option value="<?php echo $row1['cat_id'] ?>" selected><?php echo $row1['name'] ?></option>
														<?php } ?>	
																  </select>
															  </div>
															  
															<div class="col-md-6">
																<label for="inputPrice" class="form-label">Price</label>
																<input type="number" class="form-control" value="<?php echo $row['price'] ?>" name="price" placeholder="00.00" required>
															  </div>
															  <div class="col-md-6">
																<label for="inputCompareatprice" class="form-label">Sale Price</label>
																<input type="number" class="form-control" value="<?php echo $row['sale_price'] ?>" name="sprice" placeholder="00.00" required>
															  </div>
															  <div class="col-md-12">
																<label for="inputCostPerPrice" class="form-label">SKU</label>
																<input type="text" class="form-control" value="<?php echo $row['SKU'] ?>" name="sku" required>
															  </div>
															  <div class="col-md-12">
																<label for="inputStarPoints" class="form-label">Sold by</label>
																<input type="text" class="form-control" value="<?php echo $row['sold_by'] ?>" name="soldby" required>
															  </div>
															  <div class="col-12">
																  <div class="d-grid">
																	 <button type="submit" name="updatep" class="btn btn-primary">Save Changes</button>
																  </div>
															  </div>
														  </div> 
													  </div>
													  </div>
												   </div><!--end row-->
												</div>
											  </form>	 
											
											  <?php 
										     
											if(isset($_REQUEST['updatep']))
											{
												    $pid=$_GET['id'];
											        $product=$_REQUEST['name'];
													$descp=$_REQUEST['descp'];
										            $brand=$_REQUEST['brand'];
													$main=$_REQUEST['main'];
													$sub=$_REQUEST['sub'];
										            $cat=$_REQUEST['cat'];
													$p=$_REQUEST['price'];
													$sp=$_REQUEST['sprice'];
										            $sku=$_REQUEST['sku'];
										            $sold=$_REQUEST['soldby'];
													
															if(getimagesize($_FILES['inpFile']['tmp_name'])== FALSE)
													{
														$image=$row['image'];
														$image2=addslashes(file_get_contents($_FILES['$image']['tmp_name']));		
													}
													else{

														$image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));

													}
										               // $image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));
												    
												  
														$update="UPDATE product SET image='$image2', p_name='$product', price='$p', sale_price='$sp', SKU='$sku', sold_by='$sold', cat_id='$cat', description='$descp', brand_id='$brand' WHERE p_id='$pid'";
											     	    mysqli_query($con,$update);
											            echo "<script> window.location.replace('product.php')</script>";
												
											        
										}
										
										?>
											  </div>
										
									</div>
									
									<?php } ?>
									<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
										  <div class="card-body p-4">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
													   <div class="border border-3 p-4 rounded">
														
														   <div class="table-responsive">
															<table class="table table-bordered table-hover" style="width:100%">
																 <thead  class="bg-primary text-white">
																	<tr>
																		<th>Action</th>
																		<th>Specification</th>
																		<th>Detail</th>
																	</tr>
																</thead>
																 <tbody>
												<?php
												$pro="SELECT * FROM product_spec WHERE p_id='$pid'";
												$qry=mysqli_query($con,$pro);
												while ($qryr=mysqli_fetch_array($qry)) {
												  # code...
												?>
											  <form method="post">
																		   <tr>
																			   <td align="center">
																				<div class="col">
																					<div class="btn-group" role="group" aria-label="Basic example">
																						<a onClick="return confirm('Do you want to remove the product specification?')" href="upproduct.php?delete=<?php echo $qryr['id']; ?>&&delete1=<?php echo $qryr['p_id']; ?>" class="btn btn-outline-primary btn-sm"><i class="bx bx-trash"></i>
																						</a>
																						<button type="submit" name="update1<?php echo $qryr['id']; ?>" class="btn btn-sm btn-primary"><i class="bx bx-edit"></i>
																						</button>
																					</div>
																				</div>
																			   </td>
																			   <td>
																				   <div class="mb-3">
																						<input type="text" class="form-control form-control-sm" value="<?php echo $qryr['name'];?> " name="name" placeholder="Enter specification">
																					  </div>
																				</td>
																			   <td>
																				   <div class="mb-3">
																						<textarea class="form-control form-control-sm" name="detail" rows="3" placeholder="Enter the details"><?php echo $qryr['details']; ?></textarea>
																					  </div>
																				   </td>
																			   
																		   </tr>
												 
											  </form>  
											<?php 
										     $a=$qryr['id'];
											if(isset($_REQUEST['update1'.$a]))
											{
												    $pid=$_GET['id'];
													$name=$_REQUEST['name'];
												    $detail=$_REQUEST['detail'];
												  
														$update="UPDATE product_spec SET name='$name', details='$detail' WHERE id='$a'";
											     	    mysqli_query($con,$update);
											            echo "<script> window.location.replace('upproduct.php?id=$pid')</script>";
												
											        
										}
										
										?>
												<?php } ?>
																	   </tbody>
															</table>
														</div>
														
														</div>
													   </div>
												   </div><!--end row-->
												</div>
											  <?php
									if(isset($_GET['delete']))
									{
										$d=$_GET['delete'];
										$p=$_GET['delete1'];
										$delete="DELETE FROM product_spec where id='$d'";
										mysqli_query($con,$delete);
										echo "<script>window.location.replace('upproduct.php?id=$p')</script>";
									}
									
									?>
											  
											  </div>
										
									</div>
									
									
									<div class="tab-pane fade" id="img" role="tabpanel">
										  <div class="card-body p-4">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
													   <div class="border border-3 p-4 rounded">
														     <div class="table-responsive">
															<table class="table table-bordered table-hover" style="width:100%">
																 <thead  class="bg-primary text-white">
																	<tr align="center">
																		<th>Action</th>
																		<th>Image</th>
																		<th>Choose image</th>
																	</tr>
																</thead>
																 <tbody>
												<?php
												$pro="SELECT * FROM product_images WHERE p_id='$pid'";
												$qry=mysqli_query($con,$pro);
												while ($qryr=mysqli_fetch_array($qry)) {
												  # code...
												?>
																	  <form method="post" enctype="multipart/form-data">
																		   <tr align="center">
																			   <td align="center">
																				<div class="col">
																					<div class="btn-group" role="group" aria-label="Basic example">
																						<a onClick="return confirm('Do you want to remove the product image?')" href="upproduct.php?delete2=<?php echo $qryr['id']; ?>&&delete3=<?php echo $qryr['p_id']; ?>" class="btn btn-outline-primary btn-sm"><i class="bx bx-trash"></i>
																						</a>
																						<button type="submit" name="update<?php echo $qryr['id']; ?>" class="btn btn-sm btn-primary"><i class="bx bx-edit"></i>
																						</button>
																					</div>
																				</div>
																			   </td>
																			   <td>
																				   <div class="d-flex align-items-center">
																					<div class="product-img">
																						<img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($qryr['image']); ?>" alt="">
																					</div>
																					  </div>
																				</td>
																			   <td>
																				   <div class="mb-3">
																						<input type="file" name="inpFile" id="inpFile" accept=".jpg , image/jpeg" class="form-group">
																					  </div>
																				   </td>
																			   
																		   </tr>
																		    </form> 
									               	<?php 
										     $a=$qryr['id'];
											if(isset($_REQUEST['update'.$a]))
											{
												    $pid=$_GET['id'];
													
															if(getimagesize($_FILES['inpFile']['tmp_name'])== FALSE)
													{
														$image=$row['image'];
														$image2=addslashes(file_get_contents($_FILES['$image']['tmp_name']));		
													}
													else{

														$image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));

													}
										               // $image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));
												    
												  
														$update="UPDATE product_images SET image='$image2' WHERE id='$a'";
											     	    mysqli_query($con,$update);
											            echo "<script> window.location.replace('upproduct.php?id=$pid')</script>";
												
											        
										}
										
										?>
																		<?php } ?>
																	   </tbody>
															</table>
														</div>
														
														</div>
													   </div>
												   </div><!--end row-->
												</div>
											
											   	  <?php
									if(isset($_GET['delete2']))
									{
										$d=$_GET['delete2'];
										$p=$_GET['delete3'];
										$delete="DELETE FROM product_images where id='$d'";
										mysqli_query($con,$delete);
										echo "<script>window.location.replace('upproduct.php?id=$p')</script>";
									}
									
									?>
											  </div>
										
									</div>
									
									<div class="tab-pane fade" id="rew" role="tabpanel">
										  <div class="card-body p-4">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
													   <div class="border border-3 p-4 rounded">
														     <div class="table-responsive">
															<table class="table table-bordered table-hover" style="width:100%">
																 <thead  class="bg-primary text-white">
																	<tr align="center">
																		<th>Action</th>
																		<th>Name</th>
																		<th>Email</th>
																		<th>Rate</th>
																		<th>Comment</th>
																	</tr>
																</thead>
																 <tbody>
												<?php
												$pro="SELECT * FROM reviews WHERE p_id='$pid'";
												$qry=mysqli_query($con,$pro);
												while ($qryr=mysqli_fetch_array($qry)) {
												  # code...
												?>
																	  <form method="post" enctype="multipart/form-data">
																		   <tr align="center">
																			   <td align="center">
																				<div class="col">
																					<div class="btn-group" role="group" aria-label="Basic example">
																						<a onClick="return confirm('Do you want to remove the product image?')" href="upproduct.php?delete5=<?php echo $qryr['id']; ?>&&delete6=<?php echo $qryr['p_id']; ?>" class="btn btn-outline-primary btn-sm"><i class="bx bx-trash"></i>
																						</a>
																					</div>
																				</div>
																			   </td>
																			   <td>
																				  <?php echo $qryr['name']; ?>
																				</td>
																			   <td><?php echo $qryr['email']; ?></td>
																			   <td>
																				    <?php	$review= $qryr['review']; 
													
													                                      if($review==5)
																						  {?>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																						  <?php } else if($review==4){ ?>
																					<i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star"></i>		  
																						 <?php } else if($review==3){ ?>
													                                  <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star"></i>
																				   <i style="color: gold;" class="lni lni-star"></i>	       
																				   <?php } else if($review==2){ ?>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star"></i>
																				   <i style="color: gold;" class="lni lni-star"></i>
																				   <i style="color: gold;" class="lni lni-star"></i>	
																				   <?php } else if($review==1){ ?>
																				   <i style="color: gold;" class="lni lni-star-filled"></i>
																				   <i style="color: gold;" class="lni lni-star"></i>
																				   <i style="color: gold;" class="lni lni-star"></i>
																				   <i style="color: gold;" class="lni lni-star"></i>
																				   <i style="color: gold;" class="lni lni-star"></i>	
													
													<?php } ?>
																						

																			
																			   </td>
																			   <td><?php echo $qryr['des']; ?></td>
																		   </tr>
																		    </form> 
									 
																		<?php } ?>
																	   </tbody>
															</table>
														</div>
														
														</div>
													   </div>
												   </div><!--end row-->
												</div>
											
											   	  <?php
									if(isset($_GET['delete5']))
									{
										$d=$_GET['delete5'];
										$p=$_GET['delete6'];
										$delete="DELETE FROM reviews where id='$d'";
										mysqli_query($con,$delete);
										echo "<script>window.location.replace('upproduct.php?id=$p')</script>";
									}
									
									?>
											  </div>
										
									</div>
									
									<!--	
                <div class="tab-pane fade" id="offer" role="tabpanel">
										  <div class="card-body p-4">
											  <?php	           
													   $ch = "SELECT * FROM offer where p_id='$pid'";
													   $rr=mysqli_query($con,$ch);
													   while($row=mysqli_fetch_array($rr))
													   { ?>
											  <form method="post">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
													   <div class="border border-3 p-4 rounded">
														 <div class="mb-3">
															<div class="col-12">
															<label for="inputProductTitle" class="form-label">Product Name</label>
																<?php	           
													   $ch = "SELECT * FROM product where p_id='$pid'";
													   $rr=mysqli_query($con,$ch);
													   while($row1=mysqli_fetch_array($rr))
													   { ?>
															<input type="text"  name="name" class="form-control" value="<?php echo $row1['p_name'] ?>"  readonly>
														<?php } ?>		
															
															  </div>
														  </div>  
														<div class="mb-3">
															<div class="col-12">
																<label for="inputProductType" class="form-label">Offer</label>
																<select class="form-select" name="name" required>
																	<option value="<?php echo $row['offer'] ?>" selected><?php echo $row['offer'] ?></option>
																	<option value="New Arrival">New Arrival</option>
																	<option value="Hot Product" >Hot Product</option>
																	<option value="Best Sellers" >Best Sellers</option>			
																  </select>
															  </div>
														  </div>
														   
														   <div class="col-12">
																  <div class="d-grid">
																	 <button type="submit" name="offer" class="btn btn-primary">Save</button>
																  </div>
															  </div>
														</div>
													   </div>
												   </div><!--end row-->
												</div>
											  </form> 
											   <?php
													   }
						                		?>
											  </div>
										
									</div>
				  -->
									
							
								</div>
							</div>
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
	<script src="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
	</script>
	<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	  <script>



    const inpFile=document.getElementById("inpFile");
	const previewcontainer=document.getElementById("imagePreview");
	const previewImage=previewcontainer.querySelector(".image");
	const previewText=previewcontainer.querySelector(".default-text");
	
	inpFile.addEventListener("change",function()
	{
		const file=this.files[0];
		if(file)
		{
			const reader= new FileReader();
			previewText.style.display="none";
			previewImage.style.display="block";
			
			reader.addEventListener("load",function()
			{
				console.log(this);
				previewImage.setAttribute("src",this.result);
			});
			reader.readAsDataURL(file);
		}
		else
		{
			previewText.style.display=null;
			previewImage.style.display=null;
			previewImage.setAttribute("src","");
			
		}
	});
	
	</script>
	  <script type="text/javascript">
  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "load-cs.php",
  			type : "POST",
  			data: {type : type, id : category_id},
  			success : function(data){
  				if(type == "stateData"){
  					$("#state").html(data);
  				}else{
  					$("#country").append(data);
  				}
  				
  			}
  		});
  	}

  	loadData();

  	$("#country").on("change",function(){
  		var country = $("#country").val();

  		if(country != ""){
			
  			loadData("stateData", country);
																		
  		}else{
			
  		}

  	})
  });
</script>	
	
	
	<script type="text/javascript">
  $(document).ready(function(){
  	function loadData(type, sub_id){
  		$.ajax({
  			url : "load-cs1.php",
  			type : "POST",
  			data: {type : type, id : sub_id},
  			success : function(data){
  				if(type == "stateData"){
  					$("#city").html(data);
  				}else{
  					$("#state").append(data);
  				}
  				
  			}
  		});
  	}

  	loadData();

  	$("#state").on("change",function(){
  		var country = $("#state").val();
  		if(country != ""){
  			loadData("stateData", country);
																		
  		}else{
			
  		}

  	})
  });
</script>
<script>  
$(document).ready(function(){

    $('#upload_multiple_images').on('submit', function(event){
        event.preventDefault();
        var image_name = $('#image-uploadify').val();
        if(image_name == '')
        {
            alert("Please Select Image");
            return false;
        }
        else
        {
			var id=5;
            $.ajax({
                url:"image_upload.php",
                method:"POST",
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data)
                {
                    $('#image-uploadify').val('');
                }
            });
        }
    });
 
});  
</script>
</body>

</html>