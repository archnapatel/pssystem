<?php
include("../includes/session.php");
if(isset($_SESSION['user']))
{
	unset($_SESSION['user']);
}
else if(isset($_SESSION['admin']))
{
	unset($_SESSION['admin']);
}
header("location: login.php");
?>