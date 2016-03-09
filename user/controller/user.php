<?php
	include("includes/user.php");
	include("config/database.php");
	foreach ($_POST as $key => $value)
	{
		$$key = trim($value);	
	}
	
	$_SESSION['errors'] = $user;
	if (empty($user_name))
	{
		$_SESSION['errors'][] = "Please enter user name";	
	}
	if (empty($password))
	{
		$_SESSION['errors'][] = "Please enter password";	
	}
	if (count($_SESSION['errors']) == 0)
	{
		$result = execute_query("insert into login(user_name, password) values(?, ?)", array($user_name, $password));
		$_SESSION['message'] = 'login sucessfully';
	}
	else
	{
		$_SESSION['data'] = $_POST;	
	}
	
	header('location: ../login.php');
?>	
?>