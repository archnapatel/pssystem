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
<script type="text/javascript">
function validform()
{
	var alphabat = "/^[a-zA-Z]{3,20}$/";
	var userex = "/^[a-zA-Z0-9]{3,20}$/"; 
	var emailex =  "/^[a-zA-Z0-9._-]+@[a-zA-Z._-]+\.([a-zA-Z]{2,4})$/";
	var zipex =  /[0-9]{6}$/;
	var first_name = document.forms["registration"]["first_name"];
	
	if (first_name.value == "" || first_name.value == null || (first_name.value.match(alphabat)))
	{
		alert("enter valid firstname");
		first_name.focus();
		return false;
	}
	var last_name = document.forms["registration"]["last_name"];
	if (last_name.value == "" || last_name.value == null ||  (last_name.value.match(alphabat)))
	{
		alert("enter valid last name");
		last_name.focus();
		return false;
	}
	var user_name = document.forms["registration"]["user_name"];
	if (user_name.value == "" || user_name.value == null ||  (user_name.value.match(userex)))
	{
		alert("enter valid user name");
		user_name.focus();
		return false;
	}
	var email = document.forms["registration"]["email"];
	if (email.value == "" || email.value == null ||  (email.value.match(emailex)))
	{
		alert("enter valid email name");
		email.focus();
		return false;
	}
	var password = document.forms["registration"]["password"];
	if (password.value == "" || password.value == null )
	{
		alert("enter valid password name");
		password.focus();
		return false;
	}
	var confirm_password = document.forms["registration"]["confirm_password"];
	if (confirm_password.value == "" || confirm_password.value == null )
	{
		alert("enter valid confirm_password name");
		confirm_password.focus();
		return false;
	}
	if (password.value != confirm_password.value)
 	{
       	alert("Passwords do not match.");
       	return false;
    }
	var city = document.forms["registration"]["city"];
	if (city.value == "" || city.value == null ||  (city.value.match(alphabat)))
	{
		alert("enter valid city name");
		city.focus();
		return false;
	}
	var state = document.forms["registration"]["state"];
	if (state.value == "" || state.value == null ||  (state.value.match(alphabat)))
	{
		alert("enter valid state name");
		state.focus();
		return false;
	}
	var country = document.forms["registration"]["country"];
	if (country.value == "" || country.value == null ||  (country.value.match(alphabat)))
	{
		alert("enter valid country name");
		country.focus();
		return false;
	}
	var zipcode = document.forms["registration"]["zipcode"];
	if (zipcode.value == "" || zipcode.value == null ||  (zipcode.value.match(alphabat)))
	{
		alert("enter valid zipcode name");
		zipcode.focus();
		return false;
	}
		
}
</script>

<div class="container">
	<div class="col-sm-5">
		<div class="reg-box">
  			<h3>Registration form</h3>
	  		<form role="form" name = "registration" action = "controller/user_register_controller.php"  method = "post" onsubmit="return validform()">
	  			<div class="form-group">
		    		<label for="first_name">First name:</label>
		    		<input type="text" class="form-control" id="first_name" name="first_name" value="<?=isset($post_data['first_name']) ? $post_data['first_name']: ''?>" placeholder= "Enter first name">
		    	</div>
		    	<div class="form-group">
		    		<label for="last_name">Last name:</label>
		    		<input type="text" class="form-control" id="last_name" name="last_name" value="<?=isset($post_data['last_name']) ? $post_data['last_name']: ''?>" placeholder= "Enter last name">
		    	</div>
		    	<div class="form-group">
		    		<label for="email">Email Id:</label>
		    		<input type="text" class="form-control" id="email" name="email" value="<?=isset($post_data['email']) ? $post_data['email']: ''?>" autocomplete = "off" placeholder= "Enter email address">
		    	</div>
		    	<div class="form-group">
		    		<label for="user_name">User name:</label>
		    		<input type="text" class="form-control" id="user_name" name="user_name" value="<?=isset($post_data['user_name']) ? $post_data['user_name']: ''?>" placeholder= "Enter user name">
		    	</div>
		    	<div class="form-group">
		    		<label for="password">Password:</label>
		    		<input type="password" class="form-control" id="password" name="password" value="<?=isset($post_data['password']) ? $post_data['password']: ''?>">
		    	</div>
		    	<div class="form-group">
		    		<label for="confirm_password">Confirm password:</label>
		    		<input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?=isset($post_data['confirm_password']) ? $post_data['confirm_password']: ''?>" placeholder= "Confirm password">
		    	</div>
		    	<div class="form-group">
		    		<label for="address1">Address1:</label>
		    		<textarea class="form-control" id="address1" rows="4" name="address1" value="<?=isset($post_data['address1']) ? $post_data['address1']: ''?>" placeholder= "Write address" ></textarea>
		    	</div>
		    	<div class="form-group">
		    		<label for="address2">Address2:</label>
		    		<textarea class="form-control" id="address2" rows="4" name="address2" value="<?=isset($post_data['address2']) ? $post_data['address2']: ''?>" placeholder= "Write address"></textarea>
		    	</div>
		    	<div class="form-group">
		    		<label for="city">City:</label>
		    		<input type="text" class="form-control" id="city" name="city" value="<?=isset($post_data['city']) ? $post_data['city']: ''?>" placeholder= "Enter city">
		    	</div>
		    	<div class="form-group">
		    		<label for="zipcode">Zipcode:</label>
		    		<input type="number" class="form-control" id="zipcode" name="zipcode" value="<?=isset($post_data['zipcode']) ? $post_data['zipcode']: ''?>" placeholder= "Enter zipcode">
		    	</div>
		    	<div class="form-group">
		    		<label for="state">State:</label>
		    		<input type="text" class="form-control" id="state" name="state" value="<?=isset($post_data['state']) ? $post_data['state']: ''?>" placeholder= "Enter state">
		    	</div>
		    	<div class="form-group">
		    		<label for="country">Country:</label>
		    		<input type="text" class="form-control" id="country" name="country" value="<?=isset($post_data['country']) ? $post_data['country']: ''?>" placeholder= "Enter country">
		    	</div>
		    	<button type="submit" class="btn btn-default" id="submit"name="login" value="submit">Submit</button>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-8">
						<a class="" href="login.php">
							<span class="glyphicon glyphicon-hand-right">&nbsp;</span>Signin
						</a>
					</div>
				</div>
			</form>
		</div>	
    </div>	
<?php
	}
	include("includes/footer.php");	
?>	