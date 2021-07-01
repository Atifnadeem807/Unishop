<?php
if(isset($_GET['id']))
{
	$uid=$_GET['id'];
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
					<div class="breadcrumb-title pe-3">Customer</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Customer</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
  
              <div class="card">
				  <div class="col">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Edit Information</h5>
								<hr/>
								<ul class="nav nav-tabs nav-primary" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bxs-user font-18 me-1'></i>
												</div>
												<div class="tab-title">Personal Information</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bxs-map font-18 me-1'></i>
												</div>
												<div class="tab-title">Address Info</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#img" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-money font-18 me-1'></i>
												</div>
												<div class="tab-title">Payment info</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-image font-18 me-1'></i>
												</div>
												<div class="tab-title">Profile Picture</div>
											</div>
										</a>
									</li>
									
								</ul>
								<div class="tab-content py-3">
									
									
									<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
										<?php	           
													   $ch = "SELECT * FROM login WHERE  u_id='$uid'";
													   $rr=mysqli_query($con,$ch);
													   while($row=mysqli_fetch_array($rr))
													   { ?>
										  <div class="card-body p-4">
											  <form method="post"  enctype="multipart/form-data">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
														<div class="border border-3 p-4 rounded">
														  <div class="row g-3">
															  
															<div class="col-md-6">
																<label for="inputPrice" class="form-label">Firstname</label>
																<input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="fname"  required>
															  </div>
															  
															  <div class="col-md-6">
																<label for="inputCompareatprice" class="form-label">Lastname</label>
																<input type="text" class="form-control" value="<?php echo $row['lastname'] ?>" name="lname"  required>
															  </div>
															  
															  <div class="col-md-6">
																<label for="inputPrice" class="form-label">Phone</label>
																<input type="text" class="form-control" value="<?php echo $row['phone'] ?>" name="phone"  required>
															  </div>
															  
															  <div class="col-md-6">
																<label for="inputCompareatprice" class="form-label">DOB</label>
																<input type="text" placeholder="DD/MM/YYYY" class="form-control" value="<?php echo $row['dob'] ?>" name="dob"  required>
															  </div>
															  
															  <div class="col-md-12">
																<label for="inputCostPerPrice" class="form-label">Email</label>
																<input type="email" class="form-control" value="<?php echo $row['email'] ?>" name="email" required>
															  </div>
															  <div class="col-md-12">
																<label for="inputStarPoints" class="form-label">Password</label>
																<input type="password" class="form-control" value="<?php echo $row['password'] ?>" name="password" required>
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
												    $uid=$_GET['id'];
											        $name=$_REQUEST['fname'];
													$lname=$_REQUEST['lname'];
										            $phone=$_REQUEST['phone'];
													$dob=$_REQUEST['dob'];
													$email=$_REQUEST['email'];
										            $password=$_REQUEST['password'];
													
														$update="UPDATE login SET  name='$name', lastname='$lname', email='$email', password='$password', phone='$phone', dob='$dob' WHERE u_id='$uid'";
											     	    mysqli_query($con,$update);
											            echo "<script> window.location.replace('customer.php')</script>";
												
											        
										}
										
										?>
											  </div>
									<?php } ?>	
									</div>
									
									
									<div class="tab-pane fade" id="primaryprofile" role="tabpanel">
										<?php	           
													   $ch = "SELECT * FROM c_address WHERE  u_id='$uid'";
													   $rr=mysqli_query($con,$ch);
													   while($row=mysqli_fetch_array($rr))
													   { ?>
										   <div class="card-body p-4">
											  <form method="post"  enctype="multipart/form-data">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
														<div class="border border-3 p-4 rounded">
														  <div class="row g-3">
															  
															<div class="col-md-12">
																<label for="inputPrice" class="form-label">Address</label>
																<textarea name="address" class="form-control" rows="3"><?php echo $row['address']; ?></textarea>
															  </div>
															  
															  <div class="col-md-6">
																<label for="inputCompareatprice" class="form-label">City</label>
																<input type="text" class="form-control" value="<?php echo $row['city'] ?>" name="city"  required>
															  </div>
															  
															  <div class="col-md-6">
																<label for="inputPrice" class="form-label">State</label>
																<input type="text" class="form-control" value="<?php echo $row['state'] ?>" name="state"  required>
															  </div>
															  
															  <div class="col-md-6">
																<label for="inputCompareatprice" class="form-label">Country</label>
																<input type="text" class="form-control" value="<?php echo $row['country'] ?>" name="country"  required>
															  </div>
															  
															  <div class="col-md-6">
																<label for="inputCostPerPrice" class="form-label">Zip code</label>
																<input type="text" class="form-control" value="<?php echo $row['zip'] ?>" name="zip" required>
															  </div>
															  <div class="col-12">
																  <div class="d-grid">
																	 <button type="submit" name="updateaddress" class="btn btn-primary">Save Changes</button>
																  </div>
															  </div>
														  </div> 
													  </div>
													  </div>
												   </div><!--end row-->
												</div>
											  </form>	 
											
											  <?php 
										     
											if(isset($_REQUEST['updateaddress']))
											{
												    $uid=$_GET['id'];
											        $address=$_REQUEST['address'];
													$city=$_REQUEST['city'];
										            $state=$_REQUEST['state'];
													$country=$_REQUEST['country'];
													$zip=$_REQUEST['zip'];
													
														$update="UPDATE c_address SET address='$address', city='$city', state='$state', country='$country', zip='$zip' WHERE u_id='$uid'";
											     	    mysqli_query($con,$update);
											            echo "<script> window.location.replace('customer.php')</script>";
												
											        
										}
										
										?>
											  </div>
										<?php } ?>
									</div>
									
									
									<div class="tab-pane fade" id="img" role="tabpanel">
										<?php	           
													   $ch = "SELECT * FROM c_payment WHERE  u_id='$uid'";
													   $rr=mysqli_query($con,$ch);
													   while($row=mysqli_fetch_array($rr))
													   { ?>
										   <div class="card-body p-4">
											  <form method="post"  enctype="multipart/form-data">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
														<div class="border border-3 p-4 rounded">
														  <div class="row g-3">
															  
															  <div class="col-md-6">
																<label for="inputCompareatprice" class="form-label">Name on card</label>
																<input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="name"  required>
															  </div>
															  
															  <div class="col-md-6">
																<label for="inputPrice" class="form-label">Card number</label>
																<input type="text" class="form-control" value="<?php echo $row['card_no'] ?>" name="card"  required>
															  </div>
															  
															  <div class="col-md-6">
																<label for="inputCompareatprice" class="form-label">CVC</label>
																<input type="password" class="form-control" value="<?php echo $row['cvc'] ?>" name="cvc" readonly>
															  </div>
															  
															  <div class="col-md-6">
																<label for="inputCostPerPrice" class="form-label">Expiry Date</label>
																<input type="text" class="form-control" placeholder="MM/YYYY" value="<?php echo $row['expiry_date'] ?>" name="expiry" required>
															  </div>
															  <div class="col-12">
																  <div class="d-grid">
																	 <button type="submit" name="updatepay" class="btn btn-primary">Save Changes</button>
																  </div>
															  </div>
														  </div> 
													  </div>
													  </div>
												   </div><!--end row-->
												</div>
											  </form>	 
											
											  <?php 
										     
											if(isset($_REQUEST['updatepay']))
											{
												    $uid=$_GET['id'];
											        $name=$_REQUEST['name'];
													$card=$_REQUEST['card'];
										            $expiry=$_REQUEST['expiry'];
												  
														$update="UPDATE c_payment SET name='$name', card_no='$card', expiry_date='$expiry' WHERE u_id='$uid'";
											     	    mysqli_query($con,$update);
											            echo "<script> window.location.replace('customer.php')</script>";
												
											        
										}
										
										?>
											  </div>
										<?php } ?>
									</div>
									
									
									<div class="tab-pane fade" id="profile" role="tabpanel">
										<?php	           
													   $ch = "SELECT * FROM login WHERE  u_id='$uid'";
													   $rr=mysqli_query($con,$ch);
													   while($row=mysqli_fetch_array($rr))
													   { ?>
										   <div class="card-body p-4">
											  <form method="post"  enctype="multipart/form-data">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
														<div class="border border-3 p-4 rounded">
														  <div class="row g-3">
															  
															 <div class="mb-3">
															<div class="col-sm-12"
															  <div class="form-group">
																  <label for="reg-f">Change Image</label>

																	<div class="image-preview" id="imagePreview" align="center" style="border: solid 1px #dbe2e8; border-radius: 5px; padding: 30px;">
																		<img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['image']); ?>" alt="Image Preview" class="image" style="width: 40%; height:40%;" /><br />
																		<input type="file" value="<?php echo 'data:image/jpeg;base64,'. base64_encode($row['image']); ?>" name="inpFile" id="inpFile" style=" padding: 15px;" required>
																		 <span class="default-text"></span>
																	</div> 


																  </div>
														  </div>
														  </div>
															  <div class="col-12">
																  <div class="d-grid">
																	 <button type="submit" name="updatepic" class="btn btn-primary">Save Changes</button>
																  </div>
															  </div>
														  </div> 
													  </div>
													  </div>
												   </div><!--end row-->
												</div>
											  </form>	 
											
											  <?php 
										     
											if(isset($_REQUEST['updatepic']))
											{
												 
															if(getimagesize($_FILES['inpFile']['tmp_name'])== FALSE)
													{
														$image=$row['image'];
														$image2=addslashes(file_get_contents($_FILES['$image']['tmp_name']));		
													}
													else{

														$image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));

													}
										               // $image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));
												    
												  
														$update="UPDATE login SET image='$image2' WHERE u_id='$uid'";
											     	    mysqli_query($con,$update);
											            echo "<script> window.location.replace('customer.php')</script>";
												
											        
										}
										
										?>
											  </div>
										<?php } ?>
									</div>
									
							
									
							
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