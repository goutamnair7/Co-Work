<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$name = $_POST['name'];
$desig = $_POST['desig'];
$company = $_POST['company'];
$id = $_POST['id'];

$query = "UPDATE sign_auth SET name='$name', designation='$desig', company='$company' WHERE id=$id";
$result = $mysqli->query($query);

header("LOCATION: ../view/invoice.php");

?>