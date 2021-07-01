<?php
$con = mysqli_connect("localhost","root","","unishop");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(isset($_REQUEST['specif']))
										{
										            $name=$_REQUEST['name'];
									               	$p=$_REQUEST['product'];
													$detail=$_REQUEST['detail'];
														$q2= "INSERT INTO product_spec (id,name,details,sort,status,p_id) VALUES ( NULL, '$name', '$detail', '1', '1', '$p')";
														mysqli_query($con,$q2);
									                    echo "<script> window.location.replace('addproduct.php')</script>";		
										}
?>	
