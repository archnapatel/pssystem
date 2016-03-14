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
<div class="container">
	<div class="col-sm-4">
		<div class="box">
			<h3>Login</h3>
			<form role="form" method = "post" action="controller/admin.php">
				<div class="form-group">
					<label for="user_name">User name: </label>
					<input type="text" id="user_name" name="user_name"value="<?=isset($post_data['user_name']) ? $post_data['user_name']: ''?> " required>
					
				</div>
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" id="password" name="password"value="<?=isset($post_data['password']) ? $post_data['password']: ''?>" required>
				</div>
				<button type="submit" class = "btn btn-success" value="">Login</button>
			</form>
		</div>
	</div>		
</div>
<?php
	}
	include("includes/footer.php");
?>	