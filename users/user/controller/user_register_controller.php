<?php
	include("../config/database.php");
	include('../includes/session.php');
	foreach ($_POST as $key => $value)
	{
		$$key = trim($value);	
	}
	$result1 = get_rows("SELECT email, user_name FROM registration");
	$_SESSION['errors'] = array();
	if (empty($first_name))
	{
		$_SESSION['errors'][] = "Please enter first name ";
	}
	if (empty($last_name))
	{
		$_SESSION['errors'][] = "Please enter last name";
	}
	if (empty($email))
	{
		$_SESSION['errors'][] = "Please enter email";
	}
	//to check user name  is already exists or not!
	if(isset($email))
	{
		foreach ($result1 as $row) 
		{
			if($email == $row['email'])
			{
				$_SESSION['errors'][''] = "Email id is already exists, please enter other";
				break;
			}	
		}
	}
	if (empty($user_name))
	{
		$_SESSION['errors'][] = "Please enter user name";
	}
	//to check user name  is already exists or not!
	if(isset($user_name))
	{
		foreach ($result1 as $row) 
		{
			if($user_name == $row['user_name'])
			{
				$_SESSION['errors'][] = "It's already exists, please enter other. ";
				break;
			}	
		}
	}
	if (empty($password))
	{
		$_SESSION['errors'][] = "Please enter password";	
	}
	if (empty($confirm_password))
	{
		$_SESSION['errors'][] = "Please enter confirm password";	
	}
	if ($password != $confirm_password)
	{
		$_SESSION['errors'][] = "Password and confirm password do not match";
	}
	if (empty($address1))
	{
		$_SESSION['errors'][] = "Please enter address";	
	}
	if (empty($city))
	{
		$_SESSION['errors'][] = "Please enter city";	
	}
	if (empty($zipcode))
	{
		$_SESSION['errors'][] = "Please enter zipcode";	
	}
	if (empty($state))
	{
		$_SESSION['errors'][] = "Please enter state";	
	}
	if (empty($country))
	{
		$_SESSION['errors'][] = "Please enter country";	
	}

	if (count($_SESSION['errors']) == 0)
	{
		$result = execute_query("INSERT INTO registration (user_id, first_name, last_name, email, user_name, password, address1, address2, city, zipcode, state, country) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);", array($first_name, $last_name, $email, $user_name, $password, $address1, $address2, $city, $zipcode, $state, $country));
		$_SESSION['user'] = $user_id;
		header('location: ../my_profile.php');
		$_SESSION['message'] = 'Entry has been inserted.';
	}
	else
	{
		$_SESSION['data'] = $_POST;	
		header('location: ../registration.php');
	}
?>	
