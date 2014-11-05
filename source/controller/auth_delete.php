<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$id = $_GET['id'];

$delete_query = "DELETE FROM sign_auth WHERE id=$id;";
$result_delete = $mysqli->query( $delete_query );

if($result_delete) {

	header("LOCATION: ../view/invoice.php");

} else {

	echo "Database Error";

}

?>