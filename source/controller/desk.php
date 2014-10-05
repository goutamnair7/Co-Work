<?php

require( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'connect_to_mysql.php');

$action = $_GET['action'];

if($action == 'create')
{
	$space = $_GET['space'];
	$side = $_GET['side'];
	$row_no = $_GET['row_no'];
	$desk_no = $_GET['desk_no'];
	$leased_to = $_GET['leased_to'];

	$status = $mysqli->query("INSERT INTO desks VALUES ('', '{$}space', '{$side}', {$row_no}, {$desk_no}, {$leased_to})");

	if($status == false)
		die("ERROR: " . $mysqli->error);
}
else if($action == 'show')
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM desks WHERE id={$id} LIMIT 1")->fetch_assoc();
	echo json_encode($row);
}
else
	die("INVALID ACTION: {$action}");

?>