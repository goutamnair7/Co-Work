<?php
	
	$sql_hostname = "localhost"; //Enter hostname
	$sql_user = "root"; // Enter Username
	$sql_password = "root"; // Enter password
	$sql_db = "ssad_production"; // Enter db_name
	
	$mysqli = new mysqli( $sql_hostname, $sql_user, $sql_password, $sql_db );
	if ($mysqli == 0) {
		die("Connection Problem. Check credentials.");
	}
?>
