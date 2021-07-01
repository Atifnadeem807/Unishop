<?php include 'connect.php';?>
<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<a href="index.php"><img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon"></a>
				</div>
				<div>
					<h4 class="logo-text">Synadmin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='lni lni-close'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="index.php">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li class="menu-label">Product</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-store-alt' ></i>
						</div>
						<div class="menu-title">Brand</div>
					</a>
					<ul>
						<li> <a href="brand.php"><i class="bx bx-caret-right"></i>View Brand</a>
						</li>
						<li> <a href="addbrand.php"><i class="bx bx-caret-right"></i>Add Brand</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-menu" ></i>
						</div>
						<div class="menu-title">Menu</div>
					</a>
					<ul>
						<li> <a href="menu.php"><i class="bx bx-caret-right"></i>Main Menu</a>
						</li>
						<li> <a href="category.php"><i class="bx bx-caret-right"></i>Category</a>
						<li> <a href="subcat.php"><i class="bx bx-caret-right"></i>Sub Category</a>	
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category" ></i>
						</div>
						<div class="menu-title">Product</div>
					</a>
					<ul>
						
						<li> <a href="product.php"><i class="bx bx-caret-right"></i>View Products</a>
						</li>
						<li> <a href="addproduct.php"><i class="bx bx-caret-right"></i>Add Product</a>
						</li>
						<li> <a href="offerproduct.php"><i class="bx bx-caret-right"></i>Offers</a>
						</li>
						<li> <a  href="productslider.php"><i class="bx bx-caret-right"></i>Main Slider</a>
						</li>
					</ul>
				</li>
				<li class="menu-label">Stock</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-package" ></i>
						</div>
						<div class="menu-title">Stock</div>
					</a>
					<ul>
						
						<li> <a href="stores.php"><i class="bx bx-caret-right"></i>View Stock</a>
						</li>
						<li> <a href="addstore.php"><i class="bx bx-caret-right"></i>Add Stock</a>
						</li>
						
					</ul>
				</li>
				<li class="menu-label">Orders</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-cart" ></i>
						</div>
						<div class="menu-title">Orders</div>
					</a>
					<ul>
						<li> <a href="pend_order.php"><i class="bx bxs-bell-ring"></i>New Orders &nbsp; <span class="badge bg-primary"><?php 
							   
							   $query = "SELECT id FROM checkout where status='0'"; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} 
							  
							   ?></span></a>
						</li>
						<li> <a href="order.php"><i class="bx bxs-box"></i>Order History</a>
						</li>
						
					</ul>
				</li>
				
				<li class="menu-label">Users & Info</li>
				<li>
					<a href="customer.php">
						<div class="parent-icon"><i class="lni lni-customer"></i>
						</div>
						<div class="menu-title">Customers</div>
					</a>
				</li>
				<li>
					<a href="contactus.php">
						<div class="parent-icon"><i class='bx bx-message-detail'></i>
						</div>
						<div class="menu-title">Contact Us</div>
					</a>
				</li>
				<li class="menu-label">About Store</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-users" ></i>
						</div>
						<div class="menu-title">Our Team</div>
					</a>
					<ul>
						
						<li> <a href="team.php"><i class="bx bx-caret-right"></i>View Team</a>
						</li>
						<li> <a href="addteam.php"><i class="bx bx-caret-right"></i>Add Member</a>
						</li>
					</ul>
				</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-shopify" ></i>
						</div>
						<div class="menu-title">Outlet Stores</div>
					</a>
					<ul>
						
						<li> <a href="stores.php"><i class="bx bx-caret-right"></i>View Stores</a>
						</li>
						<li> <a href="addstore.php"><i class="bx bx-caret-right"></i>Add Store</a>
						</li>
						
					</ul>
				</li>
				
				
				
				
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center bg-dark shadow-none border-light-2 border-bottom">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu text-white me-3"><i class='bx bx-menu'></i>
					</div>
					
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<form>
							  <input type="text" class="form-control search-control" autofocus placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							   <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						    </form>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link text-white" href="javascript:;">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item mobile-search-icon">
								<a class="nav-link text-white" href="app-to-do.php">	<i class='bx bx-check-square'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count bg-primary"><?php 
							   
							   $query = "SELECT id FROM checkout where status='0'"; 
										$result = mysqli_query($con, $query); 
										if ($result) { 
											echo $row = mysqli_num_rows($result); 
										} 
							  
							   ?></span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">New Orders</p>
										</div>
									</a>
									<div class="header-notifications-list">
									<?php
                $checkout="SELECT * FROM checkout WHERE status='0'";
                $qry=mysqli_query($con,$checkout);
                while ($qryr=mysqli_fetch_array($qry)) {
                  # code...
                ?>	
										<a class="dropdown-item" href="order_details.php?detailsid=<?php echo $qryr['id']; ?>">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name"><?php echo $qryr['f_name']." ".$qryr['l_name']; ?> <span class="msg-time float-end"><?php echo $qryr['date']; ?></span></h6>
													<p class="msg-time"><?php echo $qryr['email']; ?></p>
												</div>
											</div>
										</a>
								<?php } ?>		
									</div>
									<a href="pend_order.php">
										<div class="text-center msg-footer">View All Order</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
												sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
												min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
												ago</span></h6>
													<p class="msg-info">Duis aute irure dolor in reprehenderit</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">The passage is attributed to an unknown</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">The point of using Lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
												ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
												ago</span></h6>
													<p class="msg-info">Various versions have evolved over</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
												ago</span></h6>
													<p class="msg-info">If you are going to use a passage</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
												ago</span></h6>
													<p class="msg-info">All the Lorem Ipsum generators</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					
					
					
					<div class="user-box dropdown border-light-2">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0 text-white">Pauline Seitz</p>
								<p class="designattion mb-0">Web Designer</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->