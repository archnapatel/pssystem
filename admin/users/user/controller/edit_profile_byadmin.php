<?php
	include("../config/database.php");
	include('../includes/session.php');
	foreach ($_POST as $key => $value)
	{
		$$key = trim($value);	
	}
	$result1 = get_rows("SELECT email, user_name FROM users WHERE user_id != ?",array($hidden_id));
	if(isset($_SESSION['admin']))
	{	
		$_SESSION['errors'] = array();
		if(!preg_match('/^[a-zA-Z]+$/',$first_name))
		{	
			$_SESSION['errors'][] = "Please enter valid first name";
		}
		if(!preg_match('/^[a-zA-Z]+$/',$last_name))
		{	
			$_SESSION['errors'][] = "Please enter valid last name";
		}
		if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z._-]+\.([a-zA-Z]{2,4})$/',$email))	
		{	
			$_SESSION['errors'][] = "Please enter valid email";
		}
		if(!empty($email))
		{
			foreach ($result1 as $row) 
			{
				if($email == $row['email'])
				{
					$_SESSION['errors'][] = "Email id is already exists, please enter other";
					break;
				}	
			}
		}
		if(!preg_match('/^[a-zA-Z0-9]+$/', $user_name))
		{	
			$_SESSION['errors'][] = "Please enter valid user name";
		}
		if(!empty($user_name))
		{
			foreach ($result1 as $row) 
			{
				if($user_name == $row['user_name'])
				{
					$_SESSION['errors'][] = "user name already exists, please enter other. ";
					break;
				}	
			}
		}
		if(!empty($password))
		{
			if (!preg_match('/^[A-Za-z0-9!@#$%^&*()_]{6,20}+$/',$password))
	        {	
	            $_SESSION['errors'][] = "Password must be minimum 6 characters";
	        }
		}	
		if(!preg_match('/^[a-zA-Z]+$/',$city))
		{	
			$_SESSION['errors'][] = "Please enter valid city name";
		}
		if(!preg_match('/^[0-9]{6}+$/',$zipcode))
		{	
			$_SESSION['errors'][] = "Please enter valid zipcode";
		}
		if(!preg_match('/^[a-zA-Z]+$/',$state))
		{	
			$_SESSION['errors'][] = "Please enter valid state name";
		}
		if(!preg_match('/^[a-zA-Z]+$/',$country))
		{	
			$_SESSION['errors'][] = "Please enter valid country name";
		}
		if (count($_SESSION['errors']) == 0)
		{	
			if(!empty($password))
			{
				$result = execute_query("UPDATE users SET role = ?, first_name = ?, last_name = ?, email = ?, user_name = ?, password = ?, address1 = ?, address2 = ?, city = ?, zipcode = ?, state = ?, country = ? WHERE user_id = ?", array(2,$first_name, $last_name, $email, $user_name, $password, $address1, $address2, $city, $zipcode, $state, $country, $hidden_id));
				$_SESSION['message'] = "successful update.";
				$_SESSION['user_id'] = $hidden_id;
				header("location: ../edit_profile.php");
			}
			else
			{
				$result = execute_query("UPDATE users SET role = ?, first_name = ?, last_name = ?, email = ?, user_name = ?, address1 = ?, address2 = ?, city = ?, zipcode = ?, state = ?, country = ? WHERE user_id = ?", array(2,$first_name, $last_name, $email, $user_name, $address1, $address2, $city, $zipcode, $state, $country, $hidden_id));
				$_SESSION['message'] = "successful update.";
				$_SESSION['user_id'] = $hidden_id;
				header("location: ../edit_profile.php");
			}	
		}
		else
		{
			$_SESSION['data'] = $_POST;	
			$_SESSION['user_id'] = $hidden_id;
			header("location: ../edit_profile.php");
		}	
	}
	else
	{
		header('Location: login.php');
	}	
?>