<?php
	include("../config/database.php");
	include('../includes/session.php');
	foreach ($_POST as $key => $value)
	{
		$$key = trim($value);	
	}
	if(isset($_SESSION['admin']))
	{	
		//$array_user_data['admin'] = $_SESSION['admin'];
		$_SESSION['errors'] = array();
		if (empty($first_name))
		{
			$_SESSION['errors'][] = "Please enter first name ";
		}
		else
		{
			if(preg_match('/^[a-zA-Z]{,15}$/',$first_name))
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
			if(preg_match('/^[a-zA-Z]{15,}$/',$last_name))
			{	
				$_SESSION['errors'][] = "Please enter valid last name";
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
		else
		{
			if(preg_match('/^[0-9]{7}$/',$zipcode))
			{	
				$_SESSION['errors'][] = "Please enter valid zipcode";
			}
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
			if(isset($email))
			{
				$result = execute_query("UPDATE registration SET first_name = ?, last_name = ?, email = ?, user_name = ?, 	address1 = ?, address2 = ?, city = ?, zipcode = ?, state = ?, country = ? WHERE user_id = ?", array($first_name, $last_name, $email, $user_name, $address1, $address2, $city, $zipcode, $state, $country, $hidden_id));
				$_SESSION['message'] = "successful update.";
				$_SESSION['user_id'] =  $hidden_id;
				//$_SESSION['set_image'] =  $hidden_id;
				header("Location: ../edit_profile.php?id=".$_SESSION['user_id']);
			}
		}
		else
		{
			$_SESSION['data'] = $_POST;	
			$_SESSION['user_id'] =  $hidden_id;
			//$_SESSION['set_image'] =  $hidden_id;
		}	
	}
	else
	{
		header('location: admin_login.php');
	}	
?>