<?php
if(isset($_GET['id']))
{
	$tid=$_GET['id'];
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
					<div class="breadcrumb-title pe-3">Outlet Store</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Store Info</li>
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
												<div class="tab-icon"><i class='bx bxs-info-circle font-18 me-1'></i>
												</div>
												<div class="tab-title">Basic Information</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bx-image font-18 me-1'></i>
												</div>
												<div class="tab-title">Chnage Picture</div>
											</div>
										</a>
									</li>
									
								</ul>
								<div class="tab-content py-3">
									
									
									<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
										 <form method="post"  enctype="multipart/form-data">
											  <?php	           
													   $ch = "SELECT * FROM stores WHERE  id='$tid'";
													   $rr=mysqli_query($con,$ch);
													   while($row=mysqli_fetch_array($rr))
													   { ?>
												  <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
													   <div class="border border-3 p-4 rounded">
														
														  <div class="mb-3">
															<label for="inputProductDescription" class="form-label">Address</label>
															<textarea name="address" class="form-control" rows="3" required><?php echo $row['address']; ?></textarea>
														  </div>
														   <div class="mb-3">
															<label for="inputProductDescription" class="form-label">City</label>
															<textarea name="city" class="form-control" rows="1" required><?php echo $row['city']; ?></textarea>
														  </div>
														   <div class="mb-3">
															<label for="inputProductDescription" class="form-label">State</label>
															<textarea name="state" class="form-control" rows="1" required><?php echo $row['state']; ?></textarea>
														  </div>
														   <div class="mb-3">
															<label for="inputProductDescription" class="form-label">Country</label>
															<textarea name="country" class="form-control" rows="1" required><?php echo $row['country']; ?></textarea>
														  </div>
														 <div class="mb-3">
															<label for="inputProductTitle" class="form-label">Phone</label>
															<input type="text" value="<?php echo $row['phone']; ?>"  name="phone" class="form-control" required>
														  </div>
														   <div class="mb-3">
															<label for="inputProductTitle" class="form-label">Email</label>
															<input type="text" value="<?php echo $row['email']; ?>"  name="email" class="form-control" required>
														  </div>
														    <div class="col-12">
																  <div class="d-grid">
																	 <button type="submit" name="store" class="btn btn-primary">Save</button>
																  </div>
															  </div>
														</div>
													   </div>
											
												   </div><!--end row-->
												</div>
												<?php } ?>  
											  </form>	 
											  <?php
									  
									if(isset($_REQUEST['store']))
										{
										            $address=$_REQUEST['address'];
													$city=$_REQUEST['city'];
										            $state=$_REQUEST['state'];
													$country=$_REQUEST['country'];
													$phone=$_REQUEST['phone'];
										            $email=$_REQUEST['email'];
													
														
														$update="UPDATE stores SET  address='$address', city='$city', state='$state', country='$country', phone='$phone', email='$email' WHERE id='$tid'";
										
											     	    mysqli_query($con,$update);
									                    echo "<script> window.location.replace('stores.php')</script>";		
										}
										
								?>
									</div>
								
									
									
									<div class="tab-pane fade" id="profile" role="tabpanel">
										<?php	           
													   $ch = "SELECT * FROM stores WHERE  id='$tid'";
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
												    
												  
														$update="UPDATE stores SET image='$image2' WHERE id='$tid'";
											     	    mysqli_query($con,$update);
											            echo "<script> window.location.replace('stores.php')</script>";
												
											        
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
			
			document.getElementById("hid1").style.display="block";
  			loadData("stateData", country);
																		
  		}else{
			
			document.getElementById("hid1").style.display="none";
			document.getElementById("hid2").style.display="none";
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
			document.getElementById("hid1").style.display="block";
			document.getElementById("hid2").style.display="block";
  			loadData("stateData", country);
																		
  		}else{
			
			document.getElementById("hid2").style.display="none";
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