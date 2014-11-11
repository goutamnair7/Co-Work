<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$result = array();
$result['status'] = false;
$result['msg'] = "UNKNOWN ERROR!";

$action = @$_GET['action'];

if($action == "create")
{
	$length = @$_GET['length'];
	$width = @$_GET['width'];
	$desks = @$_GET['desks'];
	$space = @$_GET['space'];
	$side = @$_GET['side'];
	$area = $length*$width;

	$status = $mysqli->query("INSERT INTO rooms values ('', '{$length}', '{$width}', '{$area}', '{$desks}', '{$space}', '{$side}');");
	
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
	$room_id = @$_GET['room_id'];
	$startup_id = @$_GET['startup_id'];
	$start_date = @$_GET['start_date'];
	$end_date = @$_GET['end_date'];

//	$status = $mysqli->query("UPDATE rooms SET leased_to={$startup_id} WHERE id={$id}");
	
	$start_date = explode('-', $start_date);
	$start_month = $start_date[0];
	$start_year = $start_date[2];

	$end_date = explode('-', $end_date);
	$end_month = $end_date[0];
	$end_year = $end_date[2];

	while(($start_month + 100*$start_year) <= ($end_month + 100*$end_year))
	{
		$status = $mysqli->query("INSERT INTO room_log VALUES ('', '{$room_id}', '{$start_year}', '{$start_month}', '{$startup_id}')");
		if(!$status)
		{
			$result['msg'] = "Error: ".$mysqli->error;
			break;
		}
		$start_month++;
		if($start_month > 12)
		{
			$start_month -= 12;
			$start_year += 1;
		}
	}
	if($status)
	{
		$result['status'] = true;
		$result['msg'] = "Successfully alloted room";
	}

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
