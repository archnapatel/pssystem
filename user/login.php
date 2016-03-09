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
		$user = get_row("select user_name from login");
?>
<div class="container">
	<div class="col-sm-4">
		<div class="box">
			<h3>Login</h3>
			<form role="form" action="controller/user.php">
				<div class="form-group">
					<label for="user_name">User name: </label>
					<input type="text" id="user_name" value="">
				</div>
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" id="password" value="">
				</div>
				<button type="submit" class = "btn btn-success" value="login">Login</button>
			</form>
		</div>
	</div>		
</div>

<?php
	}
	echo "user name".$user;

	include("includes/footer.php");
?>	