<?php
	
	$sql_hostname = "localhost"; //Enter hostname
	$sql_user = "goutam"; // Enter Username
	$sql_password = "1234"; // Enter password
	$sql_db = "cie"; // Enter db_name
	
	$mysqli = new mysqli( $sql_hostname, $sql_user, $sql_password, $sql_db );
	if ($mysqli == 0) {
		die("Connection Problem. Check credentials.");
	}
?>
