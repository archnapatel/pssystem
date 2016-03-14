<?php
	include('includes/session.php');

	if (isset($_SESSION['message']))
	{		
		$message = '<strong>' . $_SESSION['message'] . '</strong>';
		unset($_SESSION['message']);
	}
	if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0)
	{
		$error_message = '<strong>' . implode(', ', $_SESSION['errors']) . '</strong>';
		unset($_SESSION['errors']);	
	}
	$post_data = array();
	include("includes/header.php");
	if (isset($message))
	{
		echo $message;
	}
	else
	{
		if (isset($error_message))
		{
			echo $error_message;	
		}
?>	
<!-- registration form contain-->
<div class="container">
	<div class="col-sm-5">
		<div class="reg-box">
  			<h3>Registration form</h3>
	  		<form role="form" name = "registration" method = "post" action = "controller/user.php" onsubmit = "return validateForm()">
	  			<div class="form-group">
		    		<label for="first_name">First name:</label>
		    		<input type="text" class="form-control" id="First_name" name="first_name" value="<?=isset($post_data['first_name']) ? $post_data['first_name']: ''?>" placeholder= "Enter first name" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="last_name">Last name:</label>
		    		<input type="text" class="form-control" id="Last_name" name="last_name" value="<?=isset($post_data['last_name']) ? $post_data['last_name']: ''?>" placeholder= "Enter last name" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="email">Email Id:</label>
		    		<input type="text" class="form-control" id="email" name="email" value="<?=isset($post_data['email']) ? $post_data['email']: ''?>" autocomplete = "off" placeholder= "Enter email address" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="user_name">User name:</label>
		    		<input type="text" class="form-control" id="user_name" name="user_name" value="<?=isset($post_data['user_name']) ? $post_data['user_name']: ''?>" placeholder= "Enter user name" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="password">Password:</label>
		    		<input type="password" class="form-control" id="password" name="password" value="<?=isset($post_data['password']) ? $post_data['password']: ''?>" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="confirm_password">Confirm password:</label>
		    		<input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?=isset($post_data['confirm_password']) ? $post_data['confirm_password']: ''?>" placeholder= "Confirm password" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="address1">Address1:</label>
		    		<textarea class="form-control" id="address1" rows="4" name="address1" value="<?=isset($post_data['address1']) ? $post_data['address1']: ''?>" placeholder= "Write address" required></textarea>
		    	</div>
		    	<div class="form-group">
		    		<label for="address2">Address2:</label>
		    		<textarea class="form-control" id="address2" rows="4" name="address2" value="<?=isset($post_data['address2']) ? $post_data['address2']: ''?>" placeholder= "Write address"></textarea>
		    	</div>
		    	<div class="form-group">
		    		<label for="city">City:</label>
		    		<input type="text" class="form-control" id="city" name="city" value="<?=isset($post_data['city']) ? $post_data['city']: ''?>" placeholder= "Enter city" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="zipcode">Zip code:</label>
		    		<input type="number" class="form-control" id="zipcode" name="zipcode" value="<?=isset($post_data['zipcode']) ? $post_data['zipcode']: ''?>" placeholder= "Enter zipcode" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="state">State:</label>
		    		<input type="text" class="form-control" id="state" name="state" value="<?=isset($post_data['state']) ? $post_data['state']: ''?>" placeholder= "Enter state" required>
		    	</div>
		    	<div class="form-group">
		    		<label for="country">Country:</label>
		    		<input type="text" class="form-control" id="country" name="country" value="<?=isset($post_data['country']) ? $post_data['country']: ''?>" placeholder= "Enter country" required>
		    	</div>
		    	<button type="submit" class="btn btn-default" id="submit"name="login" value="submit">Submit</button>
		    </form>
		</div>	
    </div>	
<?php
	}
	include("includes/footer.php");	
?>	