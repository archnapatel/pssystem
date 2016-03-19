<?php
include("../includes/session.php");
include("../config/database.php");


	foreach ($_POST as $key => $value)	
	{
		$$key = trim($value);	
	}

	$_SESSION['errors'] = array();

	if (empty($admin_name))
	{
		$_SESSION['errors'][] = "Please enter adminname";	
	}
	if (empty($password))
	{
		$_SESSION['errors'][] = "Please enter password";	
	}
	if(count($_SESSION['errors']) == 0)
	{	
		$result = get_rows("SELECT admin_id, admin_name, admin_email, password FROM admin");
		foreach ($result as $row) 
		{
			if($admin_name == $row['admin_name'] || $admin_name == $row['admin_email'])
			{
				if($password == $row['password'])
				{	
					$_SESSION['admin'] = $row['admin_id'];
					break;
				}	
			}	
		}
		if(isset($_SESSION['admin']))
		{
			header("location: ../manage_user.php");	
		}
		else
		{
			$_SESSION['errors'][] = "Username & password not match";
			header("Location: ../admin_login.php");
		}
	}
	else
	{
		$_SESSION['data'] = $_POST;
		header("Location: ../admin_login.php");
	}
	
?>
