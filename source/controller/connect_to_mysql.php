<?php

	$db_host = 'localhost';
	$db_name = 'cie';
	$db_username = 'root';
	$db_password = 'anurag123';

	$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

	if($mysqli->connect_errno){
		die("Could not connect to database. Error: ". $mysqli->connect_error);
	}

?>