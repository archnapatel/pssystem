<?php
	include("includes/session.php");
	include("includes/header.php");
	if(isset($_SESSION['user']))
	{
		$result = get_rows("select first_name, last_name, email, user_name, password, address1, address2, city, zipcode, country, state, zipcode, profile_pic from  registration where user_name = ?",
		array($_SESSION['user']));
		$array_user_data = array();
		foreach ($result as $row) 
		{
			$array_user_data = $row ;
		}
		if (isset($_SESSION['message']))
		{		
			echo $message = '<strong>' . $_SESSION['message'] . '</strong>';
			unset($_SESSION['message']);
		}
		if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0)
		{
			$error_message = '<strong>' . implode(', ', $_SESSION['errors']) . '</strong>';
			unset($_SESSION['errors']);	
		}
?>
<div class="login_icon">
	<ul class="login-status">
		<li><a href="#"><span class="glyphicon glyphicon-user"></span>
		<?php  echo "Welcome ".ucfirst($_SESSION['user']); ?></a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
	</ul>
</div>
<div class="container-fluid content">
	<div class="col-md-3">
			<?php 
			/*if(isset($error_msg['not_img']))
				{
					echo $error_msg['not_img'];
				}
				if(isset($error_msg['size_large']))
				{
					echo $error_msg['size_large'];
				}
				echo"<img class='img-responsive' src='../".$array_user_data['file']."' alt='image'>";*/ 
			?>
			<form method="post" action="controller/upload_img.php" enctype="multipart/form-data">
				<div class="img-box">
				</div>
				<div class="file-heandal">
					<input type="file" name="file">
					<button type="submit" name="submit" value = "upload" class="btn btn-default">upload</button>
				</div>
			</form>	
		</div>
		<div class="col-sm-5">
			<h3> My profile</h3>
				<form role="form">
		  			<div class="form-group">
			      		<label for="first_name">First name:</label>
			      		<input type="text" class="form-control" id="First_name" placeholder= "Enter first name" value="">
			    	</div>
			    	<div class="form-group">
			    		<label for="last_name">Last name:</label>
			      		<input type="text" class="form-control" id="Last_name" placeholder= "Enter last name" value="">
			    	</div>
			    	<div class="form-group">
			    		<label for="email">Email Id:</label>
			      		<input type="text" class="form-control" disabled="true" id="email" placeholder= "Enter email address"value="">
			    	</div>
			    	<div class="form-group">
			    		<label for="user_name">User name:</label>
			      		<input type="text" class="form-control" disabled="true"  id="user_name" placeholder= "Enter user name" value=" ">
			    	</div>
			    	<div class="form-group">
			    		<label for="password">Password:</label>
			      		<input type="password" class="form-control" id="password" value="">
			    	</div>
			    	<div class="form-group">
			    		<label for="address1">Address1:</label>
			      		<textarea class="form-control" id="address1" rows="4" placeholder= "Write address" value=""></textarea>
			    	</div>
			    	<div class="form-group">
			    		<label for="address2">Address2:</label>
			      		<textarea class="form-control" id="address2" rows="4" placeholder= "Write address" value=""></textarea>
			    	</div>
			    	<div class="form-group">
			    		<label for="city">City:</label>
			      		<input type="text" class="form-control" id="city" placeholder= "Enter city" value="">
			    	</div>
			    	<div class="form-group">
			    		<label for="zipcode">Zip code:</label>
			      		<input type="number" class="form-control" id="zipcode" placeholder= "Enter zipcode" value="">
			    	</div>
			    	<div class="form-group">
			    		<label for="state">State:</label>
			      		<input type="text" class="form-control" id="state" placeholder= "Enter state" value="<?=isset($post_data['state']) ? $post_data['state'] : $post_data['state'];?>">
			    	</div>
			    	<div class="form-group">
			    		<label for="country">Country:</label>
			      		<input type="text" class="form-control" id="country" placeholder= "Enter country" value="">
			    	</div>
			    	<button type="submit" class="btn btn-default">submit</button>
			   	</form>
			</div>
		</div>	
<?php 
		include("includes/footer.php");
	}
	else
	{
		//header("location: login.php");
	}
?>