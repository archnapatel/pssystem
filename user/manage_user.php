<?php
	//include("includes/header.php");
	include("config/database.php");
  	
 	echo "<table border=1>";
	echo "<tr><td> First_name </td><td> Last_name </td><td> Email </td><td> User_name </td><td> password </td><td> Address1 </td><td> Address2 </td><td> City </td><td> Zipcode </td><td> State </td><td> Country </td></tr>";	
	$result = get_rows("SELECT first_name, last_name, email, user_name, password, address1, address2, city, zipcode, state, country FROM registration");
	foreach($result as $row)
	{
		echo '<tr><td>'. $row['first_name'] .'</td><td>'. $row['last_name'].'</td><td>'. $row['email'].'</td><td>'. $row['user_name'].'</td><td>'. $row['password'].'</td><td>'. $row['address1'].'</td><td>'. $row['address2'].'</td><td>'. $row['city'].'</td><td>'. $row['zipcode'].'</td><td>'. $row['state'].'</td><td>'. $row['country'].'</td></tr>';
	}
	echo "</table>";

	include("includes/footer.php");
 ?>