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
		if (empty($last_name))
		{
			$_SESSION['errors'][] = "Please enter last name";
		}
		if (empty($password))
		{
			$_SESSION['errors'][] = "Please enter password";	
		}
		if (empty($address1))
		{
			$_SESSION['errors'][] = "Please enter address1";	
		}
		if (empty($address2))
		{
			$_SESSION['errors'][] = "Please enter address2";	
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
			if(isset($password))
			{
				$result = execute_query("UPDATE registration SET first_name = ?, last_name = ?,password = ?, address1 = ?, address2 = ?, city = ?, zipcode = ?, state = ?, country = ? WHERE user_name = ?", array($first_name, $last_name, $password, $address1, $address2, $city, $zipcode, $state, $country, $array_user_data['user']));
					echo $_SESSION['message'] = "successful update.";
					header('location: ../my_profile.php');
			}
			else
			{
				$_SESSION['data'] = $_POST;	
						}
		}	
		
	}
	else
	{
		header('location: ../my_profile.php');
	}	
?>