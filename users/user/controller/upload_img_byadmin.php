<?php
	include("../includes/session.php");
	include("../config/database.php");
	if(isset($_SESSION['admin']))
	{	
		echo $id = $_POST['hidden_id'];
		if(isset($_FILES['file']))
		{
			$target_dir = "/var/www/pssystem/users/user/image/";
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			$img_name=basename($_FILES["file"]["name"]);
			$tmp_name = $_FILES['file']['tmp_name'];
			$image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);
			$file_size = $_FILES['file']['size']."<br/>";
			$final_file = "upload/".$_FILES["file"]["name"];
			//check file type
			if($image_file_type != "jpg" && $image_file_type != "gif" && $image_file_type != "png" && $image_file_type != "jpeg" )
			{
				$_SESSION['errors'][] = "only JPG, JPEG, PNG & GIF files are allowed";
			}
			//check file size large or not
			if ($_FILES["file"]["size"] > 5000000)
			{
 				$_SESSION['errors'][] = "Sorry, your file is too large.";
			}
			if(count($_SESSION['errors']) == 0)
			{
				if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file))
				{
					$result = execute_query("UPDATE registration SET profile_pic = ? WHERE user_id = ?", array($img_name, $_POST['hidden_id']));	

				}
			}
			else
			{
				echo "Image is not uploaded.";
				//$_SESSION['user_id'] =  $hidden_id;
			}
		}
		header("Location:../edit_profile.php");
	}
	else
	{
		header("location: admin_login.php");
	}	
?>