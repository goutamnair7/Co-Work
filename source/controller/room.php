<?php

require( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "connect_to_mysql.php" );

$result = array();
$result['status'] = false;
$result['msg'] = "UNKNOWN ERROR!";

$action = @$_GET['action'];

if($action == "create")
{
	$length = @$_GET['length'];
	$width = @$_GET['width'];
	$area = @$_GET['area'];
	$desks = @$_GET['desks'];
	$space = @$_GET['space'];
	$side = @$_GET['side'];
	$leased_to = @$_GET['leased_to'];

	$status = $mysqli->query("INSERT INTO rooms values ('', '{$length}', '{$width}', '{$area}', {$desks}, '{$space}', '{$side}', {$leased_to});");
	
	if($status == false)
		$result['msg'] = "ERROR: ".$mysqli->error;
	else
	{
		$result['status'] = true;
		$result['msg'] = "Successfully added new room";
	}

	echo json_encode($result);
}
else if($action == "show")
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM rooms WHERE id={$id} LIMIT 1")->fetch_assoc();
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
else if($action == "book")
{
	$id = @$_GET['id'];
	$startup_id = @$_GET['startup_id'];
	
	$status = $mysqli->query("UPDATE rooms SET leased_to={$startup_id} WHERE id={$id}");
	
	if($status)
	{
		$result['status'] = true;
		$result['msg'] = "Successfully alloted room";
	}
	else
		$result['msg'] = "Error: ".$mysqli->error;

	echo json_encode($result);
}
else if($action == "show_by_startup_id")
{
	$startup_id = @$_GET['startup_id'];
	$sql = $mysqli->query("SELECT id FROM rooms WHERE leased_to={$startup_id}");

	if($sql->num_rows == 0)
		$result['msg'] = "No rooms alloted";
	else
		$result['msg'] = "";
	$result['status'] = true;
	$result['all'] = array();

	while($row = $sql->fetch_assoc())
		$result['all'][] = $row['id'];

	echo json_encode($result);
}
else
{
	$result['action'] = $action;
	echo json_encode($result);
}


?>
