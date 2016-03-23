<?php
	include("../config/database.php");
	include('../includes/session.php');
	foreach ($_POST as $key => $value)
	{
		$$key = trim($value);	
	}
	$_SESSION['errors'] = array();
	if (empty($user_name))
	{
		$_SESSION['errors'][] = "Please enter user name";
	}
	if (empty($password))
	{
		$_SESSION['errors'][] = "Please enter password";	
	}
	else
	{
		$_SESSION['data'] = $_POST;
		header('location: ../login.php');
	}
	$user = get_rows("SELECT role, user_id, user_name, password, email FROM users");
	foreach ($user as $row) 
	{	
		if($user_name == $row['user_name'] || $user_name == $row['email']) 
		{
			if($password == $row['password'])
			{
				if($row['role'] == '2')
				{
					$_SESSION['user'] = $row['user_id'];
				}
				else if($row['role'] == '1')
				{
					$_SESSION['admin'] = $row['user_id'];
				}	
			}
		}
	}
	if(isset($_SESSION['user']))
	{
		header('location: ../my_profile.php');
	}
	else if(isset($_SESSION['admin']))
	{
		header('location: ../manage_user.php');
	}
	else
	{
		$_SESSION['errors'] = "username and password not match";
		header('location: ../login.php');
	}
?>	