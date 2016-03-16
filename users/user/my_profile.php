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
			echo $error_message = '<strong>' . implode(', ', $_SESSION['errors']) . '</strong>';
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
		<form method="post" action="controller/upload_img.php" enctype="multipart/form-data">
			<div class="img-box">
			<!--<img src="">-->
			</div>
			<div class="file-heandal">
				<input type="file" name="file">
				<button type="submit" name="submit" value="upload" class="btn btn-default">upload</button>
			</div>
		</form>	
	</div>
	<div class="col-sm-5">
		<h3> My profile</h3>
			<form name="profile" role="form" method="post" action="controller/edit_profile_controller.php" >
	  			<div class="form-group">
		      		<label for="first_name">First name:</label>
		      		<input type="text" class="form-control" id="first_name" name="first_name" value="<?php if(isset($array_user_data['first_name'])) {echo $array_user_data['first_name'];} ?> ">
		    	</div>
		    	<div class="form-group">
		    		<label for="last_name">Last name:</label>
		      		<input type="text" class="form-control" id="last_name" name="last_name" value="<?php if(isset($array_user_data['last_name'])) {echo $array_user_data['last_name'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="email">Email Id:</label>
		      		<input type="text" class="form-control" id="email" name="email" value="<?php if(isset($array_user_data['email'])) {echo $array_user_data['email'];} ?>"readonly>
		    	</div>
		    	<div class="form-group">
		    		<label for="user_name">User name:</label>
		      		<input type="text" class="form-control" id="user_name" name="user_name"value="<?php if(isset($array_user_data['user_name'])) {echo $array_user_data['user_name'];} ?> " readonly>
		    	</div>
		    	<div class="form-group">
		    		<label for="password">Password:</label>
		      		<input type="password" class="form-control" id="password" name="password" value="<?php if(isset($array_user_data['password'])) {echo $array_user_data['password'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="address1">Address1:</label>
		      		<input type="text" class="form-control" id="address1" name="address1" rows="4" value="<?php if(isset($array_user_data['address1'])) {echo $array_user_data['address1'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="address2">Address2:</label>
		      		<input type="text" class="form-control" id="address2" name="address2" value="<?php if(isset($array_user_data['address2'])) {echo $array_user_data['address2'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="city">City:</label>
		      		<input type="text" class="form-control" id="city" name="city" value="<?php if(isset($array_user_data['city'])) {echo $array_user_data['city'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="zipcode">Zip code:</label>
		      		<input type="number" class="form-control" id="zipcode" name="zipcode" value="<?php if(isset($array_user_data['zipcode'])) {echo $array_user_data['zipcode'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="state">State:</label>
		      		<input type="text" class="form-control" id="state" name="state" value="<?php if(isset($array_user_data['state'])) {echo $array_user_data['state'];} ?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="country">Country:</label>
		      		<input type="text" class="form-control" id="country" name="country" value="<?php if(isset($array_user_data['country'])) {echo $array_user_data['country'];} ?>">
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
		header("location: login.php");
	}
?>