<?php
	include("controller/access.php");
	include("includes/header.php");
	if(isset($_SESSION['admin']))
	{
		if(isset($_GET['id']))
		{	
			$_SESSION['user_id'] = $_GET['id'];
			$id = $_GET['id'];
			unset($_GET['id']);
		}
		else if(isset($_SESSION['user_id']))
		{
			$id = $_SESSION['user_id'];
		}
		$result = get_row("select user_id, first_name, last_name, email, user_name, password, address1, address2, city, zipcode, country, state, zipcode, profile_pic from  users where user_id = ?",array($_SESSION['user_id']));
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
		<div class="container-fluid content">
			<div class="login_icon">
				<ul class="login-status">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span>
					<?php  echo "Welcome ".$result['user_name']; ?></a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<form method="post" action="controller/upload_img_byadmin.php" enctype="multipart/form-data" onsubmit="validateForm()">
					<div class="img-box">
					<img src='image/<?php echo $result['profile_pic'] ?>' height='200px' width='200px'>
					</div>
					<div class="file-heandal">
						<input type="file" name="file">
						<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $_SESSION['user_id']; ?>"> 
						<button type="submit" name="submit" value="upload" class="btn btn-default">upload</button>
					</div>
				</form>	
			</div>
			<div class="col-sm-5">
				<h3> Edit profile</h3>
					<form name="edit_profile" role="form" method="post" action="controller/edit_profile_byadmin.php">
						<div class="form-group">
				      		<label for="first_name">First name:</label>
				      		<input type="text" class="form-control" id="first_name" name="first_name" value="<?php if(isset($result['first_name'])) {echo $result['first_name'];} ?>">
				    	</div>
				    	<div class="form-group">
				    		<label for="last_name">Last name:</label>
				      		<input type="text" class="form-control" id="last_name" name="last_name" value="<?php if(isset($result['last_name'])) {echo $result['last_name'];} ?>">
				    	</div>
				    	<div class="form-group">
				    		<label for="email">Email Id:</label>
				      		<input type="text" class="form-control" id="email" name="email" value="<?php if(isset($result['email'])) {echo $result['email'];} ?>">
				    	</div>
				    	<div class="form-group">
				    		<label for="user_name">User name:</label>
				      		<input type="text" class="form-control" id="user_name" name="user_name" value="<?php if(isset($result['user_name'])) {echo $result['user_name'];} ?>" >
				    	</div>
				    	<div class="form-group">
				    		<label for="password">Password:</label>
				      		<input type="password" class="form-control" id="password" name="password" value="<?php if(isset($array_user_data['password'])) {echo $array_user_data['password'];} ?>">
				    	</div>
				    	<div class="form-group">
				    		<label for="address1">Address1:</label>
				      		<input type="text" class="form-control" id="address1" name="address1" rows="4" value="<?php if(isset($result['address1'])) {echo $result['address1'];} ?>">
				    	</div>
				    	<div class="form-group">
				    		<label for="address2">Address2:</label>
				      		<input type="text" class="form-control" id="address2" name="address2" value="<?php if(isset($result['address2'])) {echo $result['address2'];} ?>">
				    	</div>
				    	<div class="form-group">
				    		<label for="city">City:</label>
				      		<input type="text" class="form-control" id="city" name="city" value="<?php if(isset($result['city'])) {echo $result['city'];} ?>">
				    	</div>
				    	<div class="form-group">
				    		<label for="zipcode">Zip code:</label>
				      		<input type="number" class="form-control" id="zipcode" name="zipcode" value="<?php if(isset($result['zipcode'])) {echo $result['zipcode'];} ?>">
				    	</div>
				    	<div class="form-group">
				    		<label for="state">State:</label>
				      		<input type="text" class="form-control" id="state" name="state" value="<?php if(isset($result['state'])) {echo $result['state'];} ?>">
				    	</div>
				    	<div class="form-group">
				    		<label for="country">Country:</label>
				      		<input type="text" class="form-control" id="country" name="country" value="<?php if(isset($result['country'])) {echo $result['country'];} ?>">
				    	</div>
				    	<input type="hidden" name="hidden_id" value="<?php echo $id; ?>">
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