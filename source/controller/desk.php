<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$result = array('status' => false, 'msg' => 'UNKNOWN ERROR');

$action = @$_GET['action'];

if($action == 'create')
{
	$space_id = @$_GET['space_id'];
	$desk_count_array = json_decode(@$_GET['desk_count_array']);
	
	$row = count($desk_count_array);
	$label = 1;

	for($r = 1; $r<=$row; $r++)
	{
		$desk_count = $desk_count_array[$r-1];
		for ($i=1; $i <= $desk_count; $i++)
		{	
			$status = $mysqli->query("INSERT INTO desks VALUES ('', '{$space_id}', '{$r}', '{$i}', '{$label}')");
			$label++;
			if(!$status)
				break;
		}
	}

	if($status == false)
		$result['msg'] = "ERROR: ".$mysqli->error;
	else
	{
		$result['status'] = true;
		$result['msg'] = "Successfully added new desks";
	}

	echo json_encode($result);
}
else if($action == 'show')
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM desks WHERE id={$id} LIMIT 1")->fetch_assoc();
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
	$desks = json_decode(@$_GET['desks']);
	$startup_id = @$_GET['startup_id'];
	$start_date = @$_GET['start_date'];
	$end_date = @$_GET['end_date'];

	$start_date = explode('-', $start_date);
	$start_month = $start_date[0];
	$start_year = $start_date[2];

	$end_date = explode('-', $end_date);
	$end_month = $end_date[0];
	$end_year = $end_date[2];

	while(($start_month + 100*$start_year) <= ($end_month + 100*$end_year))
	{
		foreach ($desks as $desk_id)
		{
			$status = $mysqli->query("INSERT INTO desk_log VALUES ('', '{$desk_id}', '{$start_year}', '{$start_month}', '{$startup_id}')");
			if(!$status)
			{
				$result['msg'] = "Error: ".$mysqli->error;
				break;
			}
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
		$result['msg'] = "Successfully alloted desk";
	}

	echo json_encode($result);
}
else if($action == "show_by_space_name")
{
	$space = @$_GET['space'];
	$month = @$_GET['month'];
	$year = @$_GET['year'];

	$type = $mysqli->query("SELECT type FROM spaces WHERE name='{$space}' LIMIT 1")->fetch_assoc();
	$type = $type['type'];
	
	$free = array();

	if($type == "Co-Working")
	{
		$sql = $mysqli->query("SELECT * FROM desks WHERE space='{$space}'");

		if($sql)
		{
			$all  = array();

			while($row = $sql->fetch_assoc())
			{
				$r = $row['row'];
				$c = $row['column'];

				if(!isset($free[$r-1]))
					$free[$r-1] = array();

				$free[$r-1][$c-1] = array('desk_id' => $row['id'], 'startup_id' => 0, 'label' => $row['label']);

				$all[$row['id']] = array('r' => $r, 'c' => $c);

			}

			$details = $mysqli->query("SELECT * FROM desk_log WHERE year='{$year}' AND month='{$month}'");

			while($row = $details->fetch_assoc())
			{
				if(!isset($all[$row['desk_id']]))
					continue;
				$r = $all[$row['desk_id']]['r'];
				$c = $all[$row['desk_id']]['c'];

				$free[$r-1][$c-1]['startup_id'] = intval($row['startup_id']);
			}
		}
	}
	else if($type == 'Wing')
	{
		$free = array(array(), array());
		
		$sql = $mysqli->query("SELECT * FROM rooms WHERE space='{$space}'");

		if($sql)
		{
			$all  = array();

			while($row = $sql->fetch_assoc())
			{
				$side = 1;
				if($row['side'] == "Left")
					$side = 0;

				$free[$side][] = array('desk_id' => $row['id'], 'startup_id' => 0);

				$all[$row['id']] = array('r' => $side, 'c' => count($free[$side]));

			}

			$details = $mysqli->query("SELECT * FROM room_log WHERE year='{$year}' AND month='{$month}'");

			while($row = $details->fetch_assoc())
			{
				if(!isset($all[$row['room_id']]))
					continue;
				$r = $all[$row['room_id']]['r'];
				$c = $all[$row['room_id']]['c'];

				$free[$r][$c-1]['startup_id'] = intval($row['startup_id']);
			}
		}
	}

	echo json_encode($free);
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
	$result['msg'] = 'Action Not Defined';
	echo json_encode($result);
}


?>
