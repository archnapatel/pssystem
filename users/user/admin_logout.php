<?php
include("../includes/session.php");
if(isset($_SESSION['admin']))
{
	unset($_SESSION['admin']);
}
header("location: admin_login.php");
?>