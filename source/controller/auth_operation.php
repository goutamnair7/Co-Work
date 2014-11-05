<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$auth_name = $_POST['name'];
$auth_desig = $_POST['designation'];
$auth_company = $_POST['company'];

$insert_query = "INSERT INTO sign_auth values ('', '$auth_name', '$auth_desig', '$auth_company')";
$result_insert = $mysqli->query($insert_query);

if ($result_insert) {

	header("LOCATION: ../view/invoice.php");

} else {

	echo "Database Error";

}
?>