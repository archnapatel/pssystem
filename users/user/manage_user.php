<?php
	include("includes/session.php");
	include("config/database.php");
	if(!isset($_SESSION['admin']))
	{
		header("location: admin_login.php");
	}
	/*if(isset($_GET['id']))
	{
		unset($_GET['id']);
	}*/	
	echo "<h3>Admin manage user</h3>";
	echo "<table border=1>";
	echo "<tr><td> First_name </td><td> Last_name </td><td> Email </td><td> User_name </td><td> Address1 </td><td> Address2 </td><td> City </td><td> Zipcode </td><td> State </td><td> Country </td><td> Edit </td><td> Delete</tr>";	
	$result = get_rows("SELECT  user_id, first_name, last_name, email, user_name, address1, address2, city, zipcode, state, country FROM registration");
	foreach($result as $row)
	{
		echo '<tr><td>'. $row['first_name'] .'</td><td>'. $row['last_name'].'</td><td>'. $row['email'].'</td><td>'. $row['user_name'].'</td><td>'. $row['address1'].'</td><td>'. $row['address2'].'</td><td>'. $row['city'].'</td><td>'. $row['zipcode'].'</td><td>'. $row['state'].'</td><td>'. $row['country'].'</td><td><a href="edit_profile.php?id='.$row['user_id'].'">edit</a></td><td><a href="../controller/delete_user_byadmin.php ? id='.$row['user_id'].'">delete</a></tr>';
	}
	if(isset($user_id))
	{
		header('location: edit_profile.php');
	}		
	echo "</table>";

	include("includes/footer.php");
 ?>