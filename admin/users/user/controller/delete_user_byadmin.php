<?php
	include("../config/database.php");
	include('../includes/session.php');
	foreach ($_POST as $key => $value)
	{
		echo $$key = trim($value);	
	}
	if(isset($_SESSION['admin']))
	{	
		if(isset($_GET['id']))
		{	
			$id = $_GET['id'];
			unset($_GET['id']);
		}
		$result = execute_query("DELETE FROM users WHERE user_id = ?",array($id));
		header('location: ../manage_user.php');
	}		
	else
	{
		header('location: ../login.php');
	}		
?>			