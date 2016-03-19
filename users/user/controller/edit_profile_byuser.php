<?php
	include("../config/database.php");
	include('../includes/session.php');
	foreach ($_POST as $key => $value)
	{
		$$key = trim($value);	
	}
	if(isset($_SESSION['user']))
	{	
		$array_user_data['user'] = $_SESSION['user'];
		$_SESSION['errors'] = array();
		if (empty($first_name))
		{
			$_SESSION['errors'][] = "Please enter first name ";
		}
		else
		{
			if(preg_match('/^[a-zA-Z]{10,}$/',$first_name))
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
			if(preg_match('/^[a-zA-Z]{10,}$/',$last_name))
			{	
				$_SESSION['errors'][] = "Please enter valid last name";
			}
		}
		//to check password
		if (empty($password))
		{
			$_SESSION['errors'][] = "Please enter password";	
		}
		else
		{
			if (strlen ($password) > 9)
	        {
	            $_SESSION['errors'][] = "Password must be minimum 8 characters";
	        }
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
			if(preg_match('/^[a-zA-Z]{10,}$/',$city))
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
			if(preg_match('/^[a-zA-Z]{10,}$/',$state))
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
			if(preg_match('/^[a-zA-Z]{10,}$/',$country))
			{	
				$_SESSION['errors'][] = "Please enter valid state name";
			}
		}
		if (count($_SESSION['errors']) == 0)
		{	
			if(isset($password))
			{	echo $array_user_data['user'];
				$result = execute_query("UPDATE registration SET first_name = ?, last_name = ?,password = ?, address1 = ?, address2 = ?, city = ?, zipcode = ?, state = ?, country = ? WHERE user_name = ?", array($first_name, $last_name, $password, $address1, $address2, $city, $zipcode, $state, $country, $array_user_data['user']));
				echo $_SESSION['message'] = "successful update.";
				header('location: ../my_profile.php');
			}
		}
		else
		{
			$_SESSION['data'] = $_POST;
		}	
	}	
	else
	{
		//header('location: ../my_profile.php');
	}	
?>