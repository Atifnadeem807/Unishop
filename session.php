<?php 
session_start();
if(isset($_SESSION['SESS-ID'])) 
{
	header("location:index.php");
}
?>