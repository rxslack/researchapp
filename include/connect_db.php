<?php

	DEFINE ('DB_USER', 'root');
	DEFINE ('DB_PASSWORD', 'root');
	DEFINE ('DB_HOST', 'localhost:3306');
	DEFINE ('DB_NAME', 'research');

	// Create connection
	$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// Check connection
	if ($dbc->connect_error) {
		die("Connection failed: " . $dbc->connect_error);
	}

	// echo "Connected successfully";
	// echo "Initial character set is: " . $conn -> character_set_name();

	$dbc -> set_charset("utf8");

	// echo "Current character set is: " . $conn -> character_set_name();
	// $conn -> close();
?>

