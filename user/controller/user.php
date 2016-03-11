<?php
	include("../config/database.php");
	include('../includes/session.php');
	foreach ($_POST as $key => $value)
	{
		$$key = trim($value);	
	}
	//echo $value;
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
	if (empty($user_name))
	{
		$_SESSION['errors'][] = "Please enter user name";
	}
	if (empty($password))
	{
		$_SESSION['errors'][] = "Please enter password";	
	}
	if (empty($confirm_password))
	{
		$_SESSION['errors'][] = "Please enter confirm password";	
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
		$result = execute_query("INSERT INTO `user_panel`.`registration` (`first_name`, `last_name`, `email`, `user_name`, `password`, `address1`, `address2`, `city`, `zipcode`, `state`, `country`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);", array($first_name, $last_name, $email, $user_name, $password, $address1, $address2, $city, $zipcode, $state, $country));
		//$_SESSION['message'] = 'registration sucessfully';
		header('location: ../registration.php');	
	}
	else
	{
		$_SESSION['data'] = $_POST;	
	}
	header('location: ../my_profile.php');
	
?>	
