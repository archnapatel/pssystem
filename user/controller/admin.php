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
	if (count($_SESSION['errors']) == 0)
	{
		/*$result = execute_query(" INSERT INTO `user_panel`.`login` (`user_name`, `password`) VALUES (?, ?);", array($user_name, $password));
		header('location: ../login.php');	*/
	
		$user = get_rows("select user_name, password, email from registration");
		foreach ($user as $row) 
		{
			if($user_name == $row['user_name'] && $password = $row['password'])
			{
				$_SESSION['user'] = $row['user_name'];
				echo "string";
			}
			
		}
		if(isset($_SESSION['user']))
		{
			header("");
		}
		else
		{
			$_SESSION['errors'] = "username and passwod not match";
		}
	}
	else
	{
		$_SESSION['data'] = $_POST;	
	}
	//header('location: ../manage_user.php');
	
?>	