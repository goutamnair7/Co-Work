<?php

require( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "config_sql.php" );

$tbl_name1 = "admins"; //tablename 1.
$tbl_name2 = "desks"; //tablename 2.
$tbl_name3 = "desk_log"; //tablename 3.
$tbl_name4 = "rooms"; //tablename 4.
$tbl_name5 = "room_log"; //tablename 5.
$tbl_name6 = "startups"; //tablename 6.
$tbl_name7 = "startup_members"; //tablename 7.
$tbl_name8 = "spaces"; //tablename 8.
$tbl_name9 = "sign_auth"; //tablename 9.
$tbl_name10 = "invoice"; //tablename 10.
$tbl_name11 = "purchase_order_invoice"; //tablename 11.
$tbl_name12 = "reciept_invoice"; //tablename 12.
$tbl_name13 = "general_invoice"; //tablename 13.
//$tbl_name14 = "reimbursement_invoice"; //tablename 14.

// Delete table "admins"
$sql_tbl_1 = "DROP TABLE `$tbl_name1`";
$result_tbl_1 = $mysqli->query( $sql_tbl_1 );

// Delete table "desks"
$sql_tbl_2 = "DROP TABLE `$tbl_name2`";
$result_tbl_2 = $mysqli->query( $sql_tbl_2 );

// Delete table "desk_log"
$sql_tbl_3 = "DROP TABLE `$tbl_name3`";
$result_tbl_3 = $mysqli->query( $sql_tbl_3 );

// Delete table "rooms"
$sql_tbl_4 = "DROP TABLE `$tbl_name4`";
$result_tbl_4 = $mysqli->query( $sql_tbl_4 );

// Delete table "room_log"
$sql_tbl_5 = "DROP TABLE `$tbl_name5`";
$result_tbl_5 = $mysqli->query( $sql_tbl_5 );

// Delete table "startups"
$sql_tbl_6 = "DROP TABLE `$tbl_name6`";
$result_tbl_6 = $mysqli->query( $sql_tbl_6 );

// Delete table "startup_member"
$sql_tbl_7 = "DROP TABLE `$tbl_name7`";
$result_tbl_7 = $mysqli->query( $sql_tbl_7 );

$sql_tbl_8 = "DROP TABLE `$tbl_name8`";
$result_tbl_8 = $mysqli->query( $sql_tbl_8 );

$sql_tbl_9 = "DROP TABLE `$tbl_name9`";
$result_tbl_9 = $mysqli->query( $sql_tbl_9 );

$sql_tbl_10 = "DROP TABLE `$tbl_name10`";
$result_tbl_10 = $mysqli->query( $sql_tbl_10 );

$sql_tbl_11 = "DROP TABLE `$tbl_name11`";
$result_tbl_11 = $mysqli->query( $sql_tbl_11 );

$sql_tbl_12 = "DROP TABLE `$tbl_name12`";
$result_tbl_12 = $mysqli->query( $sql_tbl_12 );

$sql_tbl_13 = "DROP TABLE `$tbl_name13`";
$result_tbl_13 = $mysqli->query( $sql_tbl_13 );

if ($result_tbl_1) {
	echo "Table $tbl_name1 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name1 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_2) {
	echo "Table $tbl_name2 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name2 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_3) {
	echo "Table $tbl_name3 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name3 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_4) {
	echo "Table $tbl_name4 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name4 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_5) {
	echo "Table $tbl_name5 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name5 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_6) {
	echo "Table $tbl_name6 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name6 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_7) {
	echo "Table $tbl_name7 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name7 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_8) {
	echo "Table $tbl_name8 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name8 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_9) {
	echo "Table $tbl_name9 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name9 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_10) {
	echo "Table $tbl_name10 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name10 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_11) {
	echo "Table $tbl_name11 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name11 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_12) {
	echo "Table $tbl_name12 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name12 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

if ($result_tbl_13) {
	echo "Table $tbl_name13 succesfully deleted. \r\n";
} else {
	echo "Table $tbl_name13 couldnt be deleted. Check the hostname,username,password,database_name. Maybe table of the same name doesnt exist. \r\n";
}

?>
