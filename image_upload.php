<?php
$con = mysqli_connect("localhost","root","","unishop");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
if(count($_FILES["image-uploadify"]["tmp_name"]) > 0)
{
 for($count = 0; $count < count($_FILES["image-uploadify"]["tmp_name"]); $count++)
 {
  $image_file = addslashes(file_get_contents($_FILES['image-uploadify']['tmp_name'][$count]));
$p2=$_REQUEST['product'];
$q4= "INSERT INTO product_images (id,image,sort,status,p_id) VALUES ( NULL, '$image_file', '1', '1', '$p2')";
mysqli_query($con,$q4);
 }
		
}


?>	
