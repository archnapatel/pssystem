<?php
	include("../includes/session.php");
	include("../config/database.php");
	if(isset($_SESSION['user']))
	{
		if(isset($_FILES['file']))
		{
			$target_dir = "/var/www/user/image/";
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			$tmp_name = $_FILES['file']['tmp_name'];
			$image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);
			$file_size = $_FILES['file']['size']."<br/>";
			$final_file = "upload/".$_FILES["file"]["name"];
			//check file type
			if($image_file_type != "jpg" && $image_file_type != "gif" && $image_file_type != "png" && $image_file_type != "jpeg" )
			{
				$_SESSION['errors']['not_img'] = "only JPG, JPEG, PNG & GIF files are allowed";
			}
			if(count($_SESSION['errors']) == 0)
			{
				$success = move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
				$result = execute_query("update user_registration set file = ? where user_name = ?", 
				array($final_file, $_SESSION['user']));	
			}
			header("Location: ../my_profile.php");
		}
	}
	else
	{
		header("location: ../login.php");
	}	
?>