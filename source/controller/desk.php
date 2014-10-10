<?php

require( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'connect_to_mysql.php');

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
	$id = @$_GET['id'];
	$startup_id = @$_GET['startup_id'];
	
	$status = $mysqli->query("UPDATE desks SET leased_to={$startup_id} WHERE id={$id}");
	
	if($status)
	{
		$result['status'] = true;
		$result['msg'] = "Successfully alloted desk";
	}
	else
		$result['msg'] = "Error: ".$mysqli->error;

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