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
              <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab" role="tab" style="color: #0da9ef;"><i class="icon-head"></i>Personal Profile</a></li>
              
            </ul>
            <div class="tab-content">
               <div class="tab-pane fade show active" id="personal" role="tabpanel">
                  <form class="row" method="post" enctype="multipart/form-data">
					  
					  <div class="col-sm-12" align="left">
						  <div class="form-group">
						      <label for="reg-f"><big><b style="color: #0da9ef;">*</b></big>Select Image</label>
						   
								<div class="image-preview" id="imagePreview" align="center" style="border: solid 1px #dbe2e8; border-radius: 22px; padding: 30px;">
									<img src="img\account\1.png" alt="Image Preview" class="image" style="width: 100px; height: 100px;" />
									<input type="file" name="inpFile" id="inpFile" style=" padding: 15px;"  accept=".jpg , image/jpeg">
									 <span class="default-text"></span>
								</div> 
							  
									
							  </div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group">
						  <label for="reg-fn"><big><b style="color: #0da9ef;">*</b></big>First Name</label>
						  <input class="form-control" name="name" type="text" required>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group">
						  <label for="reg-ln"><big><b style="color: #0da9ef;">*</b></big>Last Name</label>
						  <input class="form-control" name="lastname" type="text">
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group">
						  <label for="reg-phone"><big><b style="color: #0da9ef;">*</b></big>Phone Number</label>
						  <input class="form-control" name="phone" minlength="12" type="number" value="92" required>
						</div>
					  </div>
				      <div class="col-sm-6">
						<div class="form-group">
						  <label for="reg-dob"><big><b style="color: #0da9ef;">*</b></big>Date Of Birth</label>
						  <input class="form-control" name="dob" type="date" required>
						</div>
					  </div>
					
					  <div class="col-sm-12" style="padding: 30px;" align="center">
                        <h3  align="center">Login info Here</h3>
						 <p style="color: #0da9ef;">This may take less time when you order next time</p> 
					  </div>
					 
					  <div class="col-sm-12">
						<div class="form-group">
						  <label for="reg-email"><big><b style="color: #0da9ef;">*</b></big>E-mail Address</label>
						  <input class="form-control" name="email" type="email" required>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group">
						  <label for="reg-pass"><big><b style="color: #0da9ef;">*</b></big>Password (Minimum 5-Letters)</label>
						  <input class="form-control" name="password" minlength="5"  id="password" type="password" required>
						</div>
					  </div>
					  <div class="col-sm-6">
						<div class="form-group">
						  <label for="reg-pass-confirm"><big><b style="color: #0da9ef;">*</b></big>Confirm Password (Minimum 5-Letters)</label>
						  <input class="form-control" onchange="test();" type="password" minlength="5" id="confirm_password" name="cpassword" required>
							<h6 id="message" align="right" style="font-size: 13px; padding: 10px;"></h6>
						</div>
						  
					  </div>
					  <div class="col-md-12" align="center">
				<div class="custom-control  custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="ex-check-1" onclick="myFunction()">
                  <label class="custom-control-label" for="ex-check-1">Show Password</label>
                </div>
              </div>
					  <div class="col-12 text-center " align="center">
						<button class="btn btn-primary margin-bottom-none" style="width: 45%;" type="submit" name="personalbtn">Next  <i class="icon-arrow-right"></i></button>
					  </div>
                </form>
				 <?php 
							if(isset($_REQUEST['personalbtn']))
							{
								$fname = $_REQUEST['name'];
								$lastname = $_REQUEST['lastname'];
								$phone = $_REQUEST['phone'];
								$e_mail =  $_REQUEST['email'];
								$dob =  $_REQUEST['dob'];
								$password = $_REQUEST['password'];
								$cpassword = $_REQUEST['cpassword'];
								$date =  date ('j/M/Y');
								
								$code = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
								
								
								if(getimagesize($_FILES['inpFile']['tmp_name'])== FALSE)
								{
									echo "Select image";
								}
								else{
									
									$image2=addslashes(file_get_contents($_FILES['inpFile']['tmp_name']));
									
								}
								
								
								$qry = "SELECT * FROM login WHERE email = '$e_mail'";
									$r=mysqli_query($con,$qry);
									$row = mysqli_fetch_assoc($r);
									if((mysqli_num_rows($r))>0)
									{
										echo "<script>alert('User with this E-mail Address is already exists')</script>";     
									}
									else
									{
										if($phone=="92")
										{
											echo "<script>alert('Invalid! phone number. Please provide the 12-digit number.')</script>";
										}
										else
										{
											if($password==$cpassword && $cpassword==$password)
											{
											  $insert2= "INSERT INTO login(u_id,image,name,lastname,email,password,phone,dob,date,status,code) VALUES(NULL,'$image2','$fname','$lastname','$e_mail','$password','$phone','$dob','$date','1',$code)";
											  mysqli_query($con,$insert2);	
											
											//////////////SMS CODE SENDING TO MOBILE/////////////
										        $api_key = "923136203010-160d4651-39e1-42bc-af94-9916aa0c58ec";///YOUR API KEY
												$mobile = "923078398564";///Recepient Mobile Number
												$sender = "MEEZAN CITY";
												$message = "Welcome to Unishop! Your account verification code is ".$code;

												////sending sms

												$post = "sender=".urlencode($sender)."&mobile=".urlencode($phone)."&message=".urlencode($message)."";
												$url = "https://sendpk.com/api/sms.php?api_key=$api_key";
												$ch = curl_init();
												$timeout = 30; // set to zero for no timeout
												curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
												curl_setopt($ch, CURLOPT_URL,$url);
												curl_setopt($ch, CURLOPT_POST, 1);
												curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
												curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
												curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
												$result = curl_exec($ch); 
												/*Print Responce*/
												//echo $result; 
												//print_r($result);
											////////////////////////////////////////////////////
											$q= "SELECT * FROM login WHERE email='$e_mail' AND status='1' ORDER BY u_id DESC LIMIT 0,1";
											$qry=mysqli_query($con,$q);
											$r=mysqli_fetch_array($qry);
											$uid=$r['u_id'];
											echo "<script>window.location.replace('account-verification.php?id=$uid')</script>";
											}
											else{

												echo "<script>alert('Password does not match. Please try again!')</script>";
											}
										}
										
									}
								
							
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
	  	<script>
				function myFunction() {
  var x = document.getElementById("password");
  var y = document.getElementById("confirm_password");
  if (x.type === "password" || y.type === "password") {
    x.type = "text";
	y.type="text";  
  } else {
    x.type = "password";
	 y.type="password"
  }
}
				</script>
	  <script>
	  $('#confirm_password').on('keyup', function () {
  if ($('#confirm_password').val() == $('#password').val()) {
    $('#message').html('Password matched').css('color', '#07D037');
  } else 
    $('#message').html('Password! does not match').css('color', 'red'); 
		  
});
	  </script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.2.1/template-1/account-login.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Mar 2021 15:33:27 GMT -->
</html>