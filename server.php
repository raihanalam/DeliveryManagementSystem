<?php
	session_start();
	$conn= new mysqli('localhost','root','','delivery management system');

	if($conn->connect_error)
	{
		die("Connection error: " .mysqli_connect_error());
	}
?>