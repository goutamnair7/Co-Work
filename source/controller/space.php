<?php

require( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'connect_to_mysql.php');

$result = array();
$result['status'] = false;
$result['msg'] = "UNKNOWN ERROR!";

$action = @$_GET['action'];

if($action == 'create')
{
	$type = @$_GET['type'];
	$name = @$_GET['name'];
	$rows = @$_GET['rows'];

	$status = $mysqli->query("INSERT INTO spaces VALUES ('', '{$type}', '{$name}', '{$rows}')");

	if($status == false)
		$result['msg'] = "ERROR: ".$mysqli->error;
	else
	{
		$result['status'] = true;
		$result['msg'] = "Successfully added new member!";
		$result['space_id'] = $mysqli->insert_id;
	}

	echo json_encode($result);
}
else if($action == 'show')
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM spaces WHERE id=$id LIMIT 1")->fetch_assoc();
	if($row != NULL)
	{
		$result['status'] = true;
		$result['msg'] = "";
		$result['row'] = $row;
	}
	else
		$result['msg'] = "Record Not Found!";

	echo json_encode($result);
}
else
{
	$result['action'] = $action;
	echo json_encode($result);
}

?>