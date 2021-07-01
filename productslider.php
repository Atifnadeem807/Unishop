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
					<div class="breadcrumb-title pe-3">Product on slider</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Slider</li>
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
								<ul class="nav nav-tabs nav-primary" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bxs-detail font-18 me-1'></i>
												</div>
												<div class="tab-title">View Slider</div>
											</div>
										</a>
									</li>
									<li class="nav-item" role="presentation">
										<a class="nav-link" data-bs-toggle="tab" href="#slider" role="tab" aria-selected="false">
											<div class="d-flex align-items-center">
												<div class="tab-icon"><i class='bx bxs-add-to-queue font-18 me-1'></i>
												</div>
												<div class="tab-title">Add new</div>
											</div>
										</a>
									</li>
								</ul>
								<div class="tab-content py-3">
									<div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
											 <div class="table-responsive">
							<table id="example" class="table table-bordered table-hover" style="width:100%">
					    		 <thead>
									<tr align="center" class="bg-primary text-white">
										       <th></th>
											   <th>#</th>
											   <th>Product Name</th>
											   <th>Price</th>
										       <th>Status</th>
											   
										   </tr>
								</thead>
								
								 <tbody>
									 <?php
                        $q="SELECT * FROM slider";
                        $r=mysqli_query($con,$q);
                        while($p=mysqli_fetch_array($r)){
                        $pid=$p['p_id']; 
                        $q1="SELECT * FROM product where p_id='$pid'";
                        $r1=mysqli_query($con,$q1);
                        while($p1=mysqli_fetch_array($r1)){
							$upslider=$p['id'];
                        ?> 
								<form method="post">
									 <tr align="center">
										 <td>
												<div class="d-flex order-actions">	<a onClick="return confirm('Do you want to remove this product?')" href="productslider.php?delete=<?php echo $p['id']; ?>" class="text-primary border-0" style="background-color:transparent; text-align: center;"><i class='bx bxs-trash'></i></a>
													
												</div>
												 
											   </td>
									
											   <td>#<?php echo $p['id']; ?></td>
											   <td>
												<div class="d-flex align-items-center">
													<div class="recent-product-img">
														<img src="<?php echo 'data:image/png;base64,'. base64_encode($p['image']); ?>" alt="">
													</div>
													<div class="ms-2">
														<h6 class="mb-1 font-14"><?php echo $p1['p_name']; ?></h6>
													</div>
												</div>
											   </td>
											   <td>$<?php 
							if($p1['sale_price']==0)
							{
								echo $p1['price']; 
							}
							else{
								echo $p1['sale_price']; 
							}
							?></td>
										 <td><?php 
							                    $status= $p['status'];
							                   if($status==1)
											   {?>
												  <a href="upslider.php?id=<?php echo $upslider; ?>"> <span class="badge bg-success">Active</span></a>
											  <?php } else {?>
											      <a href="upslider.php?id=<?php echo $upslider; ?>"> <span class="badge bg-danger">Disactive</span></a>
											 <?php } ?></td>
											   
										   </tr>
								</form>	
										<?php 
										     
											if(!empty($_POST['status']))
											{
													$st=$_REQUEST['status'];
												     $id=$p['id'];
														$update="UPDATE slider SET status='$st' WHERE id='$menuid'";
											     	    mysqli_query($con,$update);
											            echo "<script> window.location.replace('productslider.php')</script>";
												
											        
										     }
										
										?>	
									 <?php } } ?>
									   </tbody>
								
									<?php
									if(isset($_GET['delete']))
									{
										$d=$_GET['delete'];
										$delete="DELETE FROM slider where id='$d'";
										mysqli_query($con,$delete);
										echo "<script>window.location.replace('productslider.php')</script>";
									}
									
									?>
							
							</table>
							
						</div>
									</div>
									<div class="tab-pane fade" id="slider" role="tabpanel">
										  <div class="card-body p-4">
											  <form method="post" enctype="multipart/form-data">
												   <div class="form-body mt-4">
													<div class="row">
													   <div class="col-lg-12">
													   <div class="border border-3 p-4 rounded">
														 <div class="mb-3">
															<div class="col-12">
																<label for="inputProductType" class="form-label">Product name</label>
																<select class="form-select" name="product" id="product" required>
																	<option value="" selected>Select the product</option>
													<?php	           
													   $ch = "SELECT * FROM product";
													   $rr=mysqli_query($con,$ch);
													   while($row=mysqli_fetch_array($rr))
													   { ?>
														<option value="<?php echo $row['p_id'] ?>"><?php echo $row['p_id']."-".$row['p_name'] ?></option>
														<?php } ?>			
																  </select>
															  </div>
														  </div>  
															<div class="mb-3">
															<div class="col-sm-12" align="left">
															  <div class="form-group">
																  <label for="reg-f">Image (Must be .png)</label>

																	<div class="image-preview" id="imagePreview" style="border: solid 1px #dbe2e8; border-radius: 5px; padding: 30px;">
																		<img src="img\404.jpg" alt="Image Preview" class="image" style="width: 50%; height:50%;" />
																		<br />
																		<br />
																		<input type="file" name="inpFile" id="inpFile" style=" padding: 15px;" accept=".png , image/png" required> <br />
																		 <span class="default-text"></span>
																	</div> 


																  </div>
														  </div>
														  </div>
														   
														   <div class="col-12">
																  <div class="d-grid">
																	 <button type="submit" name="insert" class="btn btn-primary">Upload</button>
																  </div>
															  </div>
														</div>
													   </div>
												   </div><!--end row-->
												</div>
											  </form> 
											    <?php
									  
									if(isset($_REQUEST['insert']))
										{
										            $product=$_REQUEST['product'];
													
															if(getimagesize($_FILES['inpFile']['tmp_name'])== FALSE)
													{
														echo "Select image";
													}
													else{

														$image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));

													}
										                $image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));
														$q= "INSERT INTO slider (id,image,p_id,status) VALUES ( NULL, '$image2', '$product', '1')";
														mysqli_query($con,$q);
									                    echo "<script> window.location.replace('productslider.php')</script>";		
										}
										
								?>
											  </div>
										
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