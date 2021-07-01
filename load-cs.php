<?php

	$conn = mysqli_connect("localhost","root","","ecommerce") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM main_cat";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['main_id']}'>{$row['name']}</option>";
		}
	}
    else if($_POST['type'] == "stateData"){

		$sql = "SELECT * FROM sub_cat WHERE main_id = {$_POST['id']}";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		$str .= "<option value=''>Select Sub Category</option>";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['sub_id']}'>{$row['name']}</option>";
		}
	}
       

	echo $str;
 ?>
