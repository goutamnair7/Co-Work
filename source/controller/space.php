<?php

include 'connect_to_mysql.php';

$action = @$_GET['action'];

if($action == "create")
{
	$name = @$_GET['name'];
	$type = @$_GET['type'];

	if($name == "" || $type == "")
		die("INVALID FIELDS");
	$status = $mysqli->query("INSERT INTO spaces VALUES('', '{$name}', '{$type}', 0, 0);");
	if($status == false)
		die("Name Already Exists");
}
else if($action == "show")
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM spaces WHERE id={$id} LIMIT 1")->fetch_assoc();
	echo json_encode($row);
}
else
	die("INVALID ACTION!");
?>
