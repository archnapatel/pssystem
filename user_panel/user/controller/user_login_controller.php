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

	$user = get_rows("SELECT user_name, password, email FROM registration");
		foreach ($user as $row) 
		{	
			if($user_name == $row['user_name'] || $user_name == $row['email']) 
			{
				if($password == $row['password'])
				{
					$_SESSION['user'] = $row['user_name'];
				}
			}
		}
		if(isset($_SESSION['user']))
		{
			$result = execute_query("INSERT INTO login (user_name, password) VALUES (?, ?);", array($user_name, $password));
			header('location: ../my_profile.php');
		}
		else
		{
			$_SESSION['errors'] = "username and password not match";
			header('location: ../login.php');
		}
?>	