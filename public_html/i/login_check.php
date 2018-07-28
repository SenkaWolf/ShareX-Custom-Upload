<?php
include 'protected/config.php';

	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	if($user == $USERNAME
	&& $pass == $PASSWORD)
	{
		$_SESSION["login"] = "true";
			include("index.php");
	}
else{
	header('Location: login.php');
}
?>