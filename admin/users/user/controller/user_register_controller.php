<?php
	include("../config/database.php");
	include('../includes/session.php');
	foreach ($_POST as $key => $value)
	{
		$$key = trim($value);	
	}
	$result1 = get_rows("SELECT email, user_name FROM users");
	
	$_SESSION['errors'] = array();
	if (empty($first_name))
	{
		$_SESSION['errors'][] = "Please enter first name ";
	}
	else
	{
		if(!preg_match('/^[a-zA-Z]+$/',$first_name))
		{	
			$_SESSION['errors'][] = "Please enter valid first name";
		}
	}
	if (empty($last_name))
	{
		$_SESSION['errors'][] = "Please enter last name";
	}
	else
	{
		if(!preg_match('/^[a-zA-Z]+$/',$last_name))
		{	
			$_SESSION['errors'][] = "Please enter valid last name";
		}
	}
	if (empty($email))
	{
		$_SESSION['errors'][] = "Please enter email";
	}
	else
	{
		if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})+$/',$email))	
		{	
			$_SESSION['errors'][] = "Please enter valid email";
		}
		foreach ($result1 as $row) 
		{
			if($email == $row['email'])
			{
				$_SESSION['errors'][] = "Email id is already exists, please enter other";
				break;
			}	
		}
	}
	//to check user name  is already exists or not!
	if (empty($user_name))
	{
		$_SESSION['errors'][] = "Please enter user name";
	}
	//to check user name  is already exists or not!
	if(isset($user_name))
	{	
		if(!preg_match('/^[a-zA-Z0-9]+$/', $user_name))
		{	
			$_SESSION['errors'][] = "Please enter valid user name";
		}
		foreach ($result1 as $row) 
		{
			if($user_name == $row['user_name'])
			{
				$_SESSION['errors'][] = "user name already exists, please enter other. ";
				break;
			}	
		}
	}
	if (empty($password))
	{
		$_SESSION['errors'][] = "Please enter password";	
	}
	else
	{
		if (!preg_match('/^[A-Za-z0-9!@#$%^&*()_]{6,20}+$/',$password))
        {
            $_SESSION['errors'][] = "Password must be minimum 6 characters";
        }
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
	else
	{
		if(!preg_match('/^[a-zA-Z]+$/',$city))
		{	
			$_SESSION['errors'][] = "Please enter valid city name";
		}
	}
	if (empty($zipcode))
	{
		$_SESSION['errors'][] = "Please enter zipcode";	
	}
	if (empty($state))
	{
		$_SESSION['errors'][] = "Please enter state";	
	}
	else
	{
		if(!preg_match('/^[a-zA-Z]+$/',$state))
		{	
			$_SESSION['errors'][] = "Please enter valid state name";
		}
	}
	if (empty($country))
	{
		$_SESSION['errors'][] = "Please enter country ";	
	}
	else
	{
		if(!preg_match('/^[a-zA-Z]+$/',$country))
		{	
			$_SESSION['errors'][] = "Please enter valid country name";
		}
	}
	if (count($_SESSION['errors']) == 0)
	{
		$result = execute_query("INSERT INTO users (user_id, first_name, last_name, email, user_name, password, address1, address2, city, zipcode, state, country) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);", array($first_name, $last_name, $email, $user_name, $password, $address1, $address2, $city, $zipcode, $state, $country));
		$_SESSION['user'] = $user_id;
		header('location: ../my_profile.php');
	}
	else
	{
		$_SESSION['data'] = $_POST;	
		header('location: ../registration.php');
	}
?>	
