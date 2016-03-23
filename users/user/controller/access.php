<?php
	include("includes/global.php");
	include("includes/session.php");

	$url=$_SERVER['REQUEST_URI'];
	$file_name = basename($_SERVER["PHP_SELF"]);
	if(isset($_SESSION['user']))
	{	
		if(!in_array($file_name, $user_url))
		{
			header("location: login.php");	
		}
	}
	else if(isset($_SESSION['admin']))
	{	
		if(!in_array($file_name, $admin_url))
		{	
			header("location: login.php");
		}
	}
	else
	{
		header("location: login.php");
	}	

?>	