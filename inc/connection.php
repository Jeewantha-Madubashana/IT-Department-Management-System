<?php 

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'it'; 

	$connection = mysqli_connect('127.0.0.1', 'root', '', 'it');

	// Checking the connection
	if (mysqli_connect_errno()) {
		die('Database connection failed ' . mysqli_connect_error());
	}
	else
	{
		//echo "Connected with it";**/
	}

	

?>