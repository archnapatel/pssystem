<?php
	include("includes/session.php");
	include("includes/header.php");
	if(isset($_SESSION['user']))
	{
		$result = get_row("select user_id, first_name, last_name, email, user_name, password, address1, address2, city, zipcode, country, state, zipcode, profile_pic from  registration where user_id = ?",
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

<div class="container-fluid content">
	<div class="col-md-3">
		<form method="post" action="controller/upload_img.php" enctype="multipart/form-data">
			<div class="img-box">
			</div>
			<div class="file-heandal">
				<input type="file" name="file">
				<button type="submit" name="submit" value="upload" class="btn btn-default">upload</button>
			</div>
		</form>	
	</div>
	<div class="col-sm-5">
		<h3> My profile</h3>
			<form role="form" method="post" action="controller/edit_profile_controller.php">
	  			<div class="form-group">
		      		<label for="first_name">First name:</label>
		      		<input type="text" class="form-control" id="First_name" value="<?php if(isset($array_user_data['first_name'])) {echo $array_user_data['first_name'];} ?> ">
		    	</div>
		    	<div class="form-group">
		    		<label for="last_name">Last name:</label>
		      		<input type="text" class="form-control" id="Last_name" value="<?php if(isset($array_user_data['last_name'])) {echo $array_user_data['last_name'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="email">Email Id:</label>
		      		<input type="text" class="form-control" disabled="true" id="email" value="<?php if(isset($array_user_data['email'])) {echo $array_user_data['email'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="user_name">User name:</label>
		      		<input type="text" class="form-control" disabled="true"  id="user_name" value="<?php if(isset($array_user_data['user_name'])) {echo $array_user_data['user_name'];} ?> ">
		    	</div>
		    	<div class="form-group">
		    		<label for="password">Password:</label>
		      		<input type="password" class="form-control" id="password" value="<?php if(isset($array_user_data['password'])) {echo $array_user_data['password'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="address1">Address1:</label>
		      		<textarea class="form-control" id="address1" rows="4" value="<?php if(isset($array_user_data['address1'])) {echo $array_user_data['address1'];} ?>"></textarea>
		    	</div>
		    	<div class="form-group">
		    		<label for="address2">Address2:</label>
		      		<textarea class="form-control" id="address2" rows="4" value="<?php if(isset($array_user_data['address2'])) {echo $array_user_data['address2'];} ?>"></textarea>
		    	</div>
		    	<div class="form-group">
		    		<label for="city">City:</label>
		      		<input type="text" class="form-control" id="city" value="<?php if(isset($array_user_data['city'])) {echo $array_user_data['city'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="zipcode">Zip code:</label>
		      		<input type="number" class="form-control" id="zipcode" value="<?php if(isset($array_user_data['zipcode'])) {echo $array_user_data['zipcode'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="state">State:</label>
		      		<input type="text" class="form-control" id="state" value="<?php if(isset($array_user_data['state'])) {echo $array_user_data['state'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="country">Country:</label>
		      		<input type="text" class="form-control" id="country" value="<?php if(isset($array_user_data['country'])) {echo $array_user_data['country'];} ?>">
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
		header("location: edit_profile.php");
	}
?>