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
					<div class="breadcrumb-title pe-3">Our Team</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add New Member</li>
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
								<h5 class="card-title">Add New Member</h5>
											  <form method="post"  enctype="multipart/form-data">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
													   <div class="border border-3 p-4 rounded">
														   <div class="mb-3">
															<div class="col-sm-12" align="left">
															  <div class="form-group">
																  <label for="reg-f">Select Image</label>

																	<div class="image-preview" id="imagePreview" align="center" style="border: solid 1px #dbe2e8; border-radius: 5px; padding: 10px;">
																		<img src="img/user.png" alt="Image Preview" class="image" style="width: 100px; height:100px;" />
																		<input type="file" name="inpFile" id="inpFile" style=" padding: 15px;" accept=".jpg , image/jpeg" required>
																		 <span class="default-text"></span>
																	</div> 


																  </div>
														  </div>
														  </div>
														<div class="mb-3">
															<label for="inputProductTitle" class="form-label">Name</label>
															<input type="text"  name="name" class="form-control" required>
														  </div>
														   <div class="mb-3">
															<label for="inputProductTitle" class="form-label">Position</label>
															<input type="text"  name="position" class="form-control" required>
														  </div>
														  <div class="mb-3">
															<label for="inputProductDescription" class="form-label">Facebook Link</label>
															<textarea name="fb" class="form-control" rows="2" required></textarea>
														  </div>
														   <div class="mb-3">
															<label for="inputProductDescription" class="form-label">Instagram Link</label>
															<textarea name="insta" class="form-control" rows="2" required></textarea>
														  </div>
														   <div class="mb-3">
															<label for="inputProductDescription" class="form-label">Linkedin Link</label>
															<textarea name="linkedin" class="form-control" rows="2" required></textarea>
														  </div>
														   <div class="mb-3">
															<label for="inputProductDescription" class="form-label">Twitter Link</label>
															<textarea name="twitter" class="form-control" rows="2" required></textarea>
														  </div>
														  
														    <div class="col-12">
																  <div class="d-grid">
																	 <button type="submit" name="team" class="btn btn-primary">Save</button>
																  </div>
															  </div>
														</div>
													   </div>
											
												   </div><!--end row-->
												</div>
											  </form>	 
											  <?php
									  
									if(isset($_REQUEST['team']))
										{
										            $name=$_REQUEST['name'];
													$position=$_REQUEST['position'];
										            $fb=$_REQUEST['fb'];
													$insta=$_REQUEST['insta'];
													$linkedin=$_REQUEST['linkedin'];
										            $twitter=$_REQUEST['twitter'];
										
													
															if(getimagesize($_FILES['inpFile']['tmp_name'])== FALSE)
													{
														echo "Select image";
													}
													else{

														$image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));

													}
										                $image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));
														$q= "INSERT INTO team (id,image,name,position,fb,insta,linkedin,twitter,status) VALUES ( NULL, '$image2', '$name', '$position', '$fb', '$insta', '$linkedin', '$twitter', '1')";
														mysqli_query($con,$q);
									                    echo "<script> window.location.replace('team.php')</script>";		
										}
										
								?>
								
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