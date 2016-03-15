<?php
	include("includes/session.php");
	if(isset($_SESSION['user']))
	{
		unset($_SESSION['user']);
	}

	if (isset($_SESSION['message']))
	{		
		$message = '<strong>' . $_SESSION['message'] . '</strong>';
		unset($_SESSION['message']);
	}
	if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0)
	{
		$error_message = '<strong>' . implode(',' ,(array) $_SESSION['errors']) . '</strong>';
		unset($_SESSION['errors']);	
	}
	$post_data = array();
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
		include("includes/header.php");
?>	
<div class="container">
	<div class="col-sm-7">
		<div class="box">
			<h3>Admin login</h3>
			<form role="form" method = "post" action="controller/admin_login_controller.php">
				<div class="form-group">
					<label for="admin_name">Admin name: </label>
					<input type="text" id="admin_name" name="admin_name"value="" placeholder="admin name or email" required>
				</div>
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" id="password" name="password"value="" required>
				</div>
				<button type="submit" class = "btn btn-success" value="">Login</button>
				<div class="form-group">
					<div class="col-sm-5 col-sm-offset-8">
						<a class="" href="registration.php">
							<span class="glyphicon glyphicon-hand-right">&nbsp;</span>Signup
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>		
</div>
<?php
	}
	include("includes/footer.php");
?>	