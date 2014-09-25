<?php

include 'connect_to_mysql.php';

$action = @$_GET['action'];

if($action == "create")
{
	$space = @$_GET['space'];
	$side = @$_GET['side'];
	$length = @$_GET['length'];
	$breadth = @$_GET['breadth'];

	if($space=="" || $side=="" || $length=="" || $breadth=="")
		die();
	$status = $mysqli->query("INSERT INTO rooms values ('', '{$space}', '{$side}', '{$length}', '{$breadth}');");
	if($status==false)
		die("ERROR: ".$mysqli->error);
#	$status = $mysqli->query("ALTER TABLE room_schedule ADD 'room_ INT NOT NULL AFTER `year` ;
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
