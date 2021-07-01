<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
<head>
    <meta charset="utf-8">
    <title>My Profile
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
            <h1>My Profile</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="index.php">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li><a href="account-orders.php">Account</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>My Profile</li>
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
				
				<a class="list-group-item active" href="account-profile.php"><i class="icon-head"></i>Profile</a>
				
				<a class="list-group-item" href="account-address.php"><i class="icon-map"></i>Address</a>
				
				<a class="list-group-item" href="account-password.php"><i class="icon-lock"></i>Password</a>
				
				<a class="list-group-item with-badge " href="account-orders.php"><i class="icon-bag"></i>Orders<span class="badge badge-primary badge-pill">
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
			<?php 
				$id= $_SESSION['SESS-ID'];
				$qry = "SELECT * FROM login WHERE  u_id='$id'";
				$r1=mysqli_query($con,$qry);
				while($r=mysqli_fetch_array($r1))
								   {
							         ?>		
          <div class="col-lg-8">
            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
			  <h4>Personal Information</h4>
            <hr class="padding-bottom-1x">
            <form class="row" method="post" enctype="multipart/form-data">
				<div class="col-sm-12">
						  <div class="form-group">
						      <label for="reg-f">Profile Image</label>
						   
								<div class="image-preview" id="imagePreview" style="border: solid 1px #dbe2e8; padding: 30px;">
									<img src="<?php echo 'data:image/png;base64,'. base64_encode($r['image']); ?>" alt="Image Preview" class="image" style="width: 100px; height: 100px;" />
									<input type="file" name="inpFile" id="inpFile" style=" padding: 15px;">
									 <span class="default-text"></span>
								</div> 
							  
									
							  </div>
					  </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-fn">First Name</label>
                  <input class="form-control form-control-square" name="fname" type="text" value="<?php echo $r['name']?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-ln">Last Name</label>
                  <input class="form-control form-control-square" name="lname" type="text" value="<?php echo $r['lastname']?>" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="account-email">E-mail Address</label>
                  <input class="form-control form-control-square" name="email" type="email" value="<?php echo $r['email']?>" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="account-phone">Phone Number</label>
                  <input class="form-control form-control-square" name="phone" type="text" value="<?php echo $r['phone']?>" required>
                </div>
              </div>
			<div class="col-md-6">
                <div class="form-group">
                  <label for="account-dob">Date Of Birth</label>
                  <input class="form-control form-control-square" name="dob" type="text" value="<?php echo $r['dob']?>" required>
                </div>
              </div>	
              <div class="col-12">
                <hr class="mt-2 mb-3">
                <div align="right">
                  <button class="btn btn-outline-primary" type="submit" data-toast data-toast-position="bottomRight" data-toast-type="success" data-toast-icon="icon-circle-check" data-toast-title="Success!" name="upd" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                </div>
              </div>
            </form>
          </div>
			<?php 
									
									  if(isset($_REQUEST['upd']))
									   {
										   $id= $_SESSION['SESS-ID'];
										  $fname=$_REQUEST['fname'];
										  $lname=$_REQUEST['lname'];
										  $phone=$_REQUEST['phone'];
										  $dob=$_REQUEST['dob'];
										  $email=$_REQUEST['email'];
										  if(getimagesize($_FILES['inpFile']['tmp_name'])== FALSE)
								{
									echo "Select image";
								}
								else{
									
									$image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));
									
								}
								
                                          $q = "UPDATE login SET image='$image2', name = '$fname', lastname='$lname', phone='$phone', dob='$dob', email='$email' WHERE u_id = '$id'";
									      mysqli_query($con,$q);
										  echo "<script>window.location.replace('account-profile.php')</script>";
								    } ?>
			
			<?php } ?>
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
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
</html>