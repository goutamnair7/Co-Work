<?php
/*
 * Script to change pending status of an incoice to completed.
 * @params: id {int}
 */

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$id = $_GET['id'];
$action = $_GET['action'];

if($action == "confirm")
    $change_query = "UPDATE invoice SET status=1 WHERE id=$id";
else if($action == "pending") {
    $change_query = "UPDATE invoice SET status=0 WHERE id=$id";

}
$result_change = $mysqli->query( $change_query );

if($result_change) {

	/*
	 * Redirect to the page from where its called. Also can use ajax for best use.
	 * If ajax is used instead of header(LOCATION), use echo "Invoice Completed."
	 */
	echo "Invoice confirmed successfully";

} else {

	echo "Database Error";

}
?>
