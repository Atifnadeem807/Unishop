<?php
if(isset($_GET['id']))
{
	$uid=$_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login / Register Account
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
            <h1>Account</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li><a href="account-login.php">Already have account?</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="row">
		  <div class="col-md-1"></div>	
          <div class="col-md-10">
            <div class="padding-top-3x hidden-md-up"></div>
            <h3 class="margin-bottom-1x">No Account? Register Here</h3>
            <p>Registration takes less than a minute but gives you full control over your orders.</p>
          
			  <ul class="nav nav-tabs nav-justified" role="tablist">
             
              <li class="nav-item"><a class="nav-link active" href="#profile2" data-toggle="tab" role="tab" style="color: #0da9ef;"><i class="icon-map"></i>Shipping Address</a></li>
             
            </ul>
            <div class="tab-content">
			  
              <div class="tab-pane fade show active" id="profile2" role="tabpanel">
                <form class="row" method="post">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="reg-ad">Shipping Address</label>
					 <textarea class="form-control" name="address" id="reg-ad" rows="3" required></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-ct">City</label>
                  <input class="form-control" type="text" name="city" id="reg-ct" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-st">State</label>
                  <input class="form-control" type="text" name="state" id="reg-st" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-cn">Country</label>
                  <input class="form-control" type="text" name="country" id="reg-cn" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reg-zip">Zip Code</label>
                  <input class="form-control" type="text" name="zip" id="reg-zip" required>
                </div>
              </div>
			 	
              <div class="col-12 text-center text-sm-right">
						<button class="btn btn-outline-primary margin-bottom-none" style="width: 20%;" type="submit" name="addressbtn">Next <i class="icon-arrow-right"></i></button>
					  </div>
            </form>
				   <?php 
							if(isset($_REQUEST['addressbtn']))
							{
								/*$query="SELECT * FROM login ORDER BY u_id DESC limit 1";
								$result=mysqli_query($con,$query);
								$row=mysqli_fetch_array($result);
								$id=$row['u_id'];*/
								
								$address = $_REQUEST['address'];
								$city = $_REQUEST['city'];
								$state = $_REQUEST['state'];
								$country =  $_REQUEST['country'];
								$zip =  $_REQUEST['zip'];
								
								  $insert2= "INSERT INTO c_address(id,u_id,address,city,state,country,zip) VALUES(NULL,$uid,'$address','$city','$state','$country','$zip')";
								  mysqli_query($con,$insert2);	
								
								echo "<script>window.location.replace('account-signup3.php?id=$uid')</script>";
							}?>
              </div>
		
					
            </div>
          </div>	
		  <div class="col-md-1"></div>	
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

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-login.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
</html>