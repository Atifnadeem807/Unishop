<?php include('connect.php');
?>
    <!-- Off-Canvas Category Menu-->
    <div class="offcanvas-container" id="shop-categories">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title">Shop by Categories</h3>
      </div>
      <nav class="offcanvas-menu">
        <ul class="menu">
		<?php
                        $q="SELECT * FROM main_cat WHERE status = '1' ORDER BY sort ASC ";
                        $r=mysqli_query($con,$q);
                        while($rr=mysqli_fetch_array($r)){
                        ?> 	
          <li class="has-children"><span><a href="#"><?php echo $rr['name']; ?></a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
				<?php
                                    $main_id=$rr['main_id'];
                                    $q1="SELECT * FROM sub_cat WHERE main_id='$main_id' and  status = '1' ORDER BY sort ASC ";
                                    $ru=mysqli_query($con,$q1);
                                    while($rr2=mysqli_fetch_array($ru)){
                                    ?>
              <li class="has-children"><span><a href="#"><?php echo $rr2['name']; ?></a><span class="sub-menu-toggle"></span></span>
				  
			        <ul class="offcanvas-submenu">
						<?php
                                            $sub_id=$rr2['sub_id'];
                                            $q2="SELECT * FROM category WHERE sub_id= '$sub_id' and  status = '1' ORDER BY sort ASC";
                                            $ru1=mysqli_query($con,$q2);
                                            while ($rr3=mysqli_fetch_array($ru1)) {
                                                # code...
                                            ?>
					  <li><a href="home.php?cat_id=<?php echo $rr3['cat_id']; ?>"><?php echo $rr3['name']; ?></a></li>
						
						<?php } ?>
					</ul>
				  
			  </li>
				<?php } ?>
            </ul>
          </li>
			
		<?php } ?>	
        </ul>
      </nav>
    </div>
    <!-- Off-Canvas Mobile Menu-->
    <div class="offcanvas-container" id="mobile-menu">
		 <?php if(isset($_SESSION['SESS-ID'])) 
         {?>
		<a class="account-link" href="account-profile.php">
			<?php 
							            $id= $_SESSION['SESS-ID'];
									   $qry = "SELECT * FROM login WHERE  u_id='$id'";
								   $r1=mysqli_query($con,$qry);
								   while($r=mysqli_fetch_array($r1))
								   {
							         ?>	
        <div class="user-ava"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']); ?>">
        </div>
			<?php } ?>
        <div class="user-info">
          <h6 class="user-name active"><?php echo $_SESSION['SESS-NAME'] ?></h6>
			<span class="text-sm text-white opacity-60">Welcome Back sir</span>
        </div></a>
		<?php } ?>
      <nav class="offcanvas-menu">
        <ul class="menu">
		  <li class="has-children active"><span><a href="#">Shop by Categories</a><span class="sub-menu-toggle"></span></span>
            <ul class="offcanvas-submenu">
				<?php
                        include 'connect.php';
                        $q="SELECT * FROM main_cat WHERE status = '1' ORDER BY sort ASC ";
                        $r=mysqli_query($con,$q);
                        while($rr=mysqli_fetch_array($r)){
                        ?> 
              <li class="has-children"><span><a href="#"><?php echo $rr['name']; ?></a><span class="sub-menu-toggle"></span></span>
                <ul class="offcanvas-submenu">
					<?php
                                    $main_id=$rr['main_id'];
                                    $q1="SELECT * FROM sub_cat WHERE main_id='$main_id' and  status = '1' ORDER BY sort ASC ";
                                    $ru=mysqli_query($con,$q1);
                                    while($rr2=mysqli_fetch_array($ru)){
                                    ?>
                  <li class="has-children"><span><a href="#"><?php echo $rr2['name']; ?></a><span class="sub-menu-toggle"></span></span>
					<ul class="offcanvas-submenu">
						<?php
                                            $sub_id=$rr2['sub_id'];
                                            $q2="SELECT * FROM category WHERE sub_id= '$sub_id' and  status = '1' ORDER BY sort ASC";
                                            $ru1=mysqli_query($con,$q2);
                                            while ($rr3=mysqli_fetch_array($ru1)) {
                                                # code...
                                            ?>
					  <li><a href="home.php?cat_id=<?php echo $rr3['cat_id']; ?>"><?php echo $rr3['name']; ?></a></li>
						<?php } ?>
					</ul>
				  </li>
					<?php } ?>
                </ul>
              </li>
				<?php } ?>
            </ul>
          </li>
			
			
          <li><a href="index.php"><span>Home</span></a></li>
		<li><a href="shop.php"><span>Shop</span></a></li>
			<?php if(isset($_SESSION['SESS-ID'])) {?>
		  <li><a href="account-wishlist.php"><span>Wishlist&nbsp;<i class="icon-heart" style="margin-top: -3px; color:#0da9ef;"></i>&nbsp;(<?php 
							   $id= $_SESSION['SESS-ID'];
							   $query = "SELECT id FROM wishlist where u_id='$id'"; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} 
							  
							   ?>)</span></a></li> 
			
			<li><a href="checkout.php"><span>Checkout</span></a></li>
		  <li><a href="order_history.php"><span>Order History</span></a></li>
			<?php } ?>
			
		  <li><a href="contacts.php"><span>Contact Us</span></a></li>
		  <li><a href="about.php"><span>About Us</span></a></li>	
			<?php if(isset($_SESSION['SESS-ID'])) 
         {?>
		  <li class="active"><a href="logout.php"><span><i class="icon-unlock" style="margin-top: -3px;"></i>&nbsp; Logout</span></a></li>
			<?php } else {?>
			<li class="active"><a href="account-login.php"><span><i class="icon-head" style="margin-top: -3px;"></i>&nbsp; Login your account</span></a></li>
			<?php } ?>
        </ul>
      </nav>
    </div>
    <!-- Topbar-->

     <div class="topbar">
		 <?php 
	                                 $ch = "SELECT * FROM about";
								   $rr=mysqli_query($con,$ch);
								   while($row1=mysqli_fetch_array($rr))
								   {
									 
							         ?>	
      <div class="topbar-column"><a class="hidden-md-down" href="#"><i class="icon-mail"></i>&nbsp; <?php echo $row1['email']; ?></a><a class="hidden-md-down" href="tel:00331697720"><i class="icon-bell"></i>&nbsp; <?php echo $row1['phone']; ?></a><a class="social-button sb-facebook shape-none sb-dark" href="<?php echo $row1['fb']; ?>" target="_blank"><i class="socicon-facebook"></i></a><a class="social-button sb-twitter shape-none sb-dark" href="<?php echo $row1['twitter']; ?>" target="_blank"><i class="socicon-twitter"></i></a><a class="social-button sb-instagram shape-none sb-dark" href="<?php echo $row1['insta']; ?>" target="_blank"><i class="socicon-instagram"></i></a><a class="social-button sb-pinterest shape-none sb-dark" href="<?php echo $row1['pin']; ?>" target="_blank"><i class="socicon-pinterest"></i></a>
      </div>
		 <?php } ?>
      <div class="topbar-column">
        <div class="lang-currency-switcher-wrap">
          <div class="lang-currency-switcher dropdown-toggle"><span class="currency">Settings</span></div>
          <div class="dropdown-menu">
            <div class="currency-select" style="margin-bottom: -15px;">
				<script type="text/javascript">
						function googleTranslateElementInit() {
						  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
						}
						</script>
				 <div class="ps-dropdown language">
								<div  id="google_translate_element" class="translate" ></div>
                 </div>
            </div>
			  <hr style="margin-bottom: 10px;">
			  <?php if(isset($_SESSION['SESS-ID'])) 
{?>
			  <a class="dropdown-item" href="logout.php"><i class="icon-head" style="margin-top: -4px;"></i>&nbsp;Logout</a>
	
<?php } else{?>
	<a class="dropdown-item" href="account-login.php"><i class="icon-head" style="margin-top: -4px;"></i>&nbsp;Sign In</a><a class="dropdown-item"  href="account-signup.php"><i class="icon-plus" style="margin-top: -4px;"></i>&nbsp;Join Us</a>
	
<?php }
			  ?>
			  
          </div>
        </div>
      </div>
    </div>
    <!-- Navbar-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
     <header class="navbar navbar-sticky">
      <!-- Search-->
      <form class="site-search" method="get">
        <input type="text" name="site_search" placeholder="Type to search...">
        <div class="search-tools"><span class="clear-search">Clear</span><span class="close-search"><i class="icon-cross"></i></span></div>
      </form>
      <div class="site-branding">
        <div class="inner">
          <!-- Off-Canvas Toggle (#shop-categories)--><a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
          <!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
          <!-- Site Logo--><a class="site-logo" href="index.php"><img src="img/logo/logo.png" alt="Unishop"></a>
        </div>
      </div>
      <!-- Main Navigation-->
      <nav class="site-menu">
        <ul>
          <li class="active"><a href="index.php"><span>Home</span></a></li>
		  <li><a href="shop.php"><span>Shop</span></a></li>	
		<?php if(isset($_SESSION['SESS-ID'])) 
{?>	
		  <li><a href="account-wishlist.php"><span>Wishlist (<?php	
                                      $uid=$_SESSION['SESS-ID'];
                                       $query = "SELECT id FROM wishlist where u_id='$uid'"; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} ?>)</span></a></li>
			<?php } ?>
		  <li><a href="contacts.php"><span>Contact Us</span></a></li>
		  <li><a href="about.php"><span>About Us</span></a></li>
        </ul>
      </nav>
      <!-- Toolbar-->
      <div class="toolbar">
        <div class="inner">
          <div class="tools">
            <div class="search"><i class="icon-search"></i></div>
			  <?php if(isset($_SESSION['SESS-ID'])) 
{?>
               <div class="account"><a href="account-profile.php"></a><i class="icon-head"></i>
              <ul class="toolbar-dropdown">
                <li class="sub-menu-user">
					<?php 
							            $id= $_SESSION['SESS-ID'];
									   $qry = "SELECT * FROM login WHERE  u_id='$id'";
								   $r1=mysqli_query($con,$qry);
								   while($r=mysqli_fetch_array($r1))
								   {
							         ?>	
						
                  <div class="user-ava"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']); ?>">
                  </div>
					
                  <div class="user-info">
                    <h6 class="user-name"><?php echo $r['name'] ?></h6>
                  </div>
					<?php } ?>
                </li>
                  <li ><a href="account-profile.php"><i class="icon-head"></i>My Profile</a></li>
                  <li ><a href="account-orders.php"><i class="icon-bag"></i>Orders History</a></li>
                  <li ><a href="account-wishlist.php"><i class="icon-heart"></i>Wishlist (<?php 
							   $id= $_SESSION['SESS-ID'];
							   $query = "SELECT id FROM wishlist where u_id='$id'"; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} 
							  
							   ?>)</a></li>
                <li class="sub-menu-separator"></li>
                <li class="active"><a href="logout.php"> <i class="icon-unlock"></i>Logout</a></li>
              </ul>
            </div>
			  
			   <div class="cart">
				    <?php 
					$id= $_SESSION['SESS-ID'];
	                $ch = "SELECT * FROM cart WHERE u_id='$id' AND status='0'";
					$rr=mysqli_query($con,$ch);
					if(mysqli_num_rows($rr)<=0)
					{?>
				   <a href="#"></a><i class="icon-bag"></i><span class="count">Empty</span>
				   <?php } else{ ?>
				    <a href="cart.php"></a><i class="icon-bag"></i>
				   <span class="count">
				              <?php 
							   $id= $_SESSION['SESS-ID'];
							   $query = "SELECT id FROM cart where u_id='$id' AND status='0'"; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} 
							  
							   ?>
				   
				   </span>
				   <span class="subtotal"><b>$</b> <?php 
										$id= $_SESSION['SESS-ID'];
										$sum="SELECT sum(g_total) as g_tot FROM cart WHERE status = '0' AND u_id='$id'";
										$sumr=mysqli_query($con,$sum);
										while($s=mysqli_fetch_array($sumr))
										{
					                        echo $s['g_tot'];
										} ?>
				   
				          </span>
              <div class="toolbar-dropdown">
				   <?php  
							            $id= $_SESSION['SESS-ID'];
	                                 $ch = "SELECT * FROM cart WHERE status = '0' AND u_id='$id'";
								   $rr=mysqli_query($con,$ch);
								   while($row=mysqli_fetch_array($rr))
								   {
									   $pid=$row['p_id'] ;
									   $qry = "SELECT * FROM product WHERE  p_id='$pid'";
								   $r1=mysqli_query($con,$qry);
								   while($r=mysqli_fetch_array($r1))
								   {
							         ?>
                <div class="dropdown-product-item"><a class="dropdown-product-remove" onClick="return confirm('Do you want to remove this item from cart?')" href="index.php?delete=<?php echo $row['id']; ?>"><i class="icon-cross"></i></a><a class="dropdown-product-thumb" href="product.php?id=<?php echo $r['p_id'] ?>"><img src="<?php echo 'data:image/jpeg;base64,'. base64_encode($r['image']); ?>" alt="Product"></a>
                  <div class="dropdown-product-info"><a class="dropdown-product-title" href="product.php?id=<?php echo $r['p_id'] ?>"><?php echo $r['p_name'] ?></a><span class="dropdown-product-details"><?php echo $row['p_qty'] ?> x $<?php echo $row['p_price'] ?></span></div>
                </div>
				  <?php
									if(isset($_GET['delete']))
									{
										$pid=$row['p_id'];
										$qty=$row['p_qty'];
										$pro=$r['quantity'];
										$rr=$qty+$pro;
										$q = "UPDATE product SET quantity = '$rr' WHERE  p_id ='$pid'";
					                    mysqli_query($con,$q);
										$d=$_GET['delete'];
										$delete="DELETE FROM cart where id='$d'";
										mysqli_query($con,$delete);
										echo "<script>window.location.replace('index.php')</script>";
									}
									
									?>
             <?php } } ?>
				  
				  
                <div class="toolbar-dropdown-group">
                  <div class="column"><span class="text-lg">Total:</span></div>
                  <div class="column text-right"><span class="text-lg text-medium">
					  <b>$</b> <?php 
										$id= $_SESSION['SESS-ID'];
										$sum="SELECT sum(g_total) as g_tot FROM cart WHERE status = '0' AND u_id='$id'";
										$sumr=mysqli_query($con,$sum);
										while($s=mysqli_fetch_array($sumr))
										{
					                        echo $s['g_tot'];
										} ?>
					  &nbsp;</span></div>
                </div>
                <div class="toolbar-dropdown-group">
                  <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="cart.php">View Cart</a></div>
                  <div class="column"><a class="btn btn-sm btn-block btn-primary" href="checkout.php">Checkout</a></div>
                </div>
				  
              </div>
				   <?php } ?>
            </div>
			  
			  
			  <?php }
			  else{?>
				  <div class="account" style="margin-right: 30px;"><a href="#"></a><i class="icon-head"></i>
              <ul class="toolbar-dropdown" style="width: 150px;">
                  <li><a href="account-login.php">LogIn</a></li>
                <li class="sub-menu-separator"></li>
                  <li><a href="account-signup.php">Join Us</a></li>
              </ul>
            </div>
			 <?php }
			  ?>
			 
          </div>
        </div>
      </div>
    </header>


<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>

.goog-te-banner-frame{
display:none !important
}
.goog-logo-link {
   display:none !important;
} 

.goog-te-gadget{
   color: transparent !important;
}
	.translate select {
        max-width:150px !important; 
		height: 40px;
		background-color:#f5f5f5;
		padding: 10px;
		border: none;
		color:#606975;
		border-radius: 5px;
        }
</style> 