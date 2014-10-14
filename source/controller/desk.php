<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$action = @$_GET['action'];

if($action == 'create')
{
	$space_id = @$_GET['space_id'];
	$desk_count_array = json_decode(@$_GET['desk_count_array']);
	
	$row = count($desk_count_array);

	for($r = 1; $r<=$row; $r++)
	{
		$desk_count = $desk_count_array[$r-1];
		for ($i=1; $i <= $desk_count; $i++)
			$mysqli->query("INSERT INTO desks VALUES ('', '{$space_id}', '{$r}', '{$i}', '')");
	}

	$result['status'] = true;
	$result['msg'] = "Successfully added new desk";
	
	echo json_encode($result);
}
else if($action == 'show')
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM desks WHERE id={$id} LIMIT 1")->fetch_assoc();
	echo json_encode($row);
}
else if($action == "book")
{
	$desk_id = @$_GET['desk_id'];
	$startup_id = @$_GET['startup_id'];
	$start_date = @$_GET['start_date'];
	$end_date = @$_GET['end_date'];

	$start_date = explode('-', $start_date);
	$start_month = $start_date[0];
	$start_year = $start_date[2];

	$end_date = explode('-', $end_date);
	$end_month = $end_date[0];
	$end_year = $end_date[2];

	while($start_month <= $end_month or $start_year <= $end_year)
	{
		$status = $mysqli->query("INSERT INTO desk_log VALUES ('', '{$desk_id}', '{$start_year}', '{$start_month}', '{$startup_id}')");
		if(!$status)
		{
			$result['msg'] = "Error: ".$mysqli->error;
			break;
		}
		$start_month++;
		if($start_month > 12)
		{
			$start_date -= 12;
			$start_year += 1;
		}
	}
	if($status)
	{
		$result['status'] = true;
		$result['msg'] = "Successfully alloted desk";
	}

	echo json_encode($result);
}
else if($action == "show_by_startup_id")
{
	$startup_id = @$_GET['startup_id'];
	$sql = $mysqli->query("SELECT id FROM desks WHERE leased_to={$startup_id}");

	if($sql->num_rows == 0)
		$result['msg'] = "No desks alloted";
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
