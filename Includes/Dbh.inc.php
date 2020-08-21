<?php
	$dbServername = "localhost:3307";
	$dbUsername = "root";
	$dbPassword = "admin";
	$dbName = "survey";

	$connect = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	if(!$connect)
	{
		die("Connection Failed : ".mysqli_connect_error());
	}
?>