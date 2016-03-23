<?php
	include("../includes/session.php");
	include("../config/database.php");
	if(isset($_SESSION['user']))
	{	
		if(isset($_FILES['file']))
		{
			$target_dir = "/var/www/pssystem/users/user/image/";
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			$img_name=basename($_FILES["file"]["name"]);
			$tmp_name = $_FILES['file']['tmp_name'];
			$image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);
			$file_size = $_FILES['file']['size']."<br/>";
			$final_file = "upload/".$_FILES["file"]["name"];
			//check file is choose or not
			if($image_file_type == "")
			{
				$_SESSION['errors'][] = "Please first chooose image file";
			}
			//check file type
			else if($image_file_type != "jpg" && $image_file_type != "gif" && $image_file_type != "png" && $image_file_type != "jpeg" )
			{
				$_SESSION['errors'][] = "only JPG, JPEG, PNG & GIF files are allowed";
			}
			//check file size large or not
			if ($_FILES["file"]["size"] > 500000)
			{
 				$_SESSION['errors'][] = "Sorry, your file is too large.";
			}
			if(count($_SESSION['errors']) == 0)
			{
				if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file))
				{
					$result = execute_query("UPDATE users SET profile_pic = ? WHERE user_id = ?", array($img_name, $_SESSION['user']));	
				}
			}
			else
			{
				echo "Image is not uploaded.";
			}
		}
		header("Location: ../my_profile.php");
	}
	else
	{
		header("location: ../login.php");
	}	
?>