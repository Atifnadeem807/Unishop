<?php
if(isset($_GET['id']))
{
	$subid=$_GET['id'];
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
		<!--start form  -->
			<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Menu</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Sub-Category</li>
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
				<?php 
										     
											if(isset($_REQUEST['updatecat']))
											{
											        $menu=$_REQUEST['menu'];
												    $cat=$_REQUEST['cat'];
												    $name=$_REQUEST['name'];
													$sort=$_REQUEST['sort'];
													$status=$_REQUEST['status'];
												
												    $qry1 = "SELECT * FROM category WHERE name = '$name' AND sub_id='$cat'";
													$r1=mysqli_query($con,$qry1);
													if(mysqli_num_rows($r1)>1)
													{

														echo "<script> alert ('Menu is already exists.');</script>";
														echo "<script> window.location.replace('updsubcat.php?id=$subid')</script>";
													}
													else
													{
														$update="UPDATE category SET name='$name', status='$status', sort='$sort', sub_id='$cat' WHERE cat_id='$subid'";
											     	    mysqli_query($con,$update);
											            echo "<script> window.location.replace('subcat.php')</script>";
													}
											        
										}
										
										?>
				<div class="row">
					<hr/>
					<div class="col-xl-9 mx-auto">
						
						<div class="card border-top border-0 border-4 border-primary">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="lni lni-list me-1 font-22 text-primary"></i>
										</div>
										<h5 class="mb-0 text-primary">Update Sub-Category</h5>
									</div>
									<hr/>
									<?php	           
													   $ch = "SELECT * FROM category WHERE  cat_id='$subid'";
													   $rr=mysqli_query($con,$ch);
													   while($row=mysqli_fetch_array($rr))
													   { ?>
									<form class="row g-3" method="post">
									 <?php  
														$m = $row['sub_id'];
											             $ch2 = "SELECT * FROM sub_cat WHERE sub_id='$m'";
													   $rr2=mysqli_query($con,$ch2);
													   while($r2=mysqli_fetch_array($rr2))
													   { 
														  $sub= $r2['sub_id'];
										                  $subn= $r2['name'];
														  $mid= $r2['main_id'];
											         } 
										                  $ch1 = "SELECT * FROM main_cat WHERE main_id='$mid'";
													   $rr1=mysqli_query($con,$ch1);
													   while($r=mysqli_fetch_array($rr1))
													   { 
														   $mainn= $r['name'];
													   }
										
										
										?>	
									<div class="col-md-12">
										<label for="menu" class="form-label">Main Menu</label>
										<select id="country" name="menu" class="form-select" required>
											   
											         <option value="<?php echo $mid; ?>" selected><?php echo $mainn; ?></option>
										</select>
									</div>
										
									<div class="col-md-12">
										<label for="cat" class="form-label">Category</label>
										<select id="state" name="cat" class="form-select" required>
											         <option value="<?php echo $sub; ?>" selected><?php echo $subn; ?></option>
										</select>
									</div>		
									<div class="col-md-12">
										<label for="inputFirstName" class="form-label">Sub-Category Name</label>
										<input type="text" name="name" class="form-control" id="inputFirstName" value="<?php echo $row['name'] ?>" required>
									</div>	
									<div class="col-md-12">
										<label for="inputState" class="form-label">Status</label>
										<select id="inputState" name="status" class="form-select">
											<?php $x= $row['status'] ;
											if($x==0)
											{?>
											<option value="1">Active</option>
											<option value="0" selected>Disactive</option>
										<?php } else{ ?>
											<option value="1" selected>Active</option>
											<option value="0">Disactive</option>
											<?php } ?>
											
										</select>
									</div>
									<div class="col-md-12">
										<label for="inputCity" class="form-label">Sort By</label>
										<input type="number" class="form-control" name="sort" id="inputCity" value="<?php echo $row['sort'] ?>" readonly>
										   
										    
									</div>	
									<div class="col-12" align="center" style="margin-top: 30px;">
										<button type="submit" name="updatecat" class="col-12 btn btn-primary px-5">Update Menu</button>
									</div>
								</form>
									
									
									<?php } ?>
									
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
		<!--end form -->
		
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
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	
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
  			$("#state").html("");
  		}

  		
  	})
  });
</script>
</body>

</html>