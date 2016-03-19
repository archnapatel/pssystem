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
		if(isset($email))
		{
			echo "string";
			echo $_SESSION['user_id'] =  $hidden_id;
			$result = execute_query("DELETE FROM registration WHERE user_id = ?", $hidden_id);
			echo "record deleted";
			//header('location: ../manage_user.php');
		}
	}
	else
	{
		header('location: ../manage_user.php');
	}		
?>			