<?php

require( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "connect_to_mysql.php" );

$action = @$_GET['action'];

if($action == "create")
{
	$length = $_GET['length'];
	$width = $_GET['width'];
	$area = $_GET['area'];
	$desks = $_GET['desks'];
	$space = $_GET['space'];
	$side = $_GET['side'];
	$leased_to = $_GET['leased_to'];

	$status = $mysqli->query("INSERT INTO rooms values ('', '{$length}', '{$width}', '{$area}', {$desks}, '{$space}', '{$side}', {$leased_to});");
	if($status == false)
		die("ERROR: ".$mysqli->error);
}
else if($action == "show")
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM rooms WHERE id={$id} LIMIT 1")->fetch_assoc();
	echo json_encode($row);
}
else
	die("INVALID ACTION");

?>
