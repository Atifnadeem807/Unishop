<?php

	$conn = mysqli_connect("localhost","root","","ecommerce") or die("Connection failed");

	if($_POST['type'] == ""){
	
	echo "empty";
	}
    else if($_POST['type'] == "stateData"){

		$sql = "SELECT * FROM category WHERE sub_id = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['cat_id']}'>{$row['name']}</option>";
		}
		
	echo $str;
	}
       

 ?>
