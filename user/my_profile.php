
<?php
	include("includes/header.php");
?>
		<div class="container">
			<div class="col-sm-4">
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
				<h3> Edit profile</h3>
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
			      		<input type="text" class="form-control" id="state" placeholder= "Enter state" value="">
			    	</div>
			    	<div class="form-group">
			    		<label for="country">Country:</label>
			      		<input type="text" class="form-control" id="country" placeholder= "Enter country" value="">
			    	</div>
			    	<button type="submit" class="btn btn-default">submit</button>
			   	</form>
			</div>
		</div>	