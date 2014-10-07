<?php

require( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'connect_to_mysql.php');

$result = array();
$result['status'] = false;
$result['msg'] = "UNKNOWN ERROR!";

$action = @$_GET['action'];

if($action == 'create')
{
	$first_name = @$_GET['first_name'];
	$last_name = @$_GET['last_name'];
	$email = @$_GET['email'];
	$contact = @$_GET['contact'];
	$startup_id = @$_GET['startup_id'];

	$primary = @$_GET['primary'];

	$password = substr(md5($email), 5, 6);
	$password = md5($password);

	$status = $mysqli->query("INSERT INTO startup_members VALUES ('', '{$first_name}', '{$last_name}', '{$email}', '{$password}', '{$contact}', {$startup_id})");

	if($status == false)
		$result['msg'] = "ERROR: ".$mysqli->error;
	else
	{
		$result['status'] = true;
		$result['msg'] = "Successfully added new member!";
		if($primary == 1)
			$mysqli->query("UPDATE startups SET p1_id={$mysqli->insert_id} WHERE startup_id={$startup_id}");
		else if($primary == 2)
			$mysqli->query("UPDATE startups SET p2_id={$mysqli->insert_id} WHERE startup_id={$startup_id}");
	}

	echo json_encode($result);
}
else if($action == 'show')
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM startup_members WHERE id=$id LIMIT 1")->fetch_assoc();
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
else if($action == 'show_by_startup_id')
{
	$startup_id = @$_GET['startup_id'];
	$sql = $mysqli->query("SELECT id FROM startup_members WHERE startup_id=$startup_id");
	$result['all'] = array();
	while($row = $sql->fetch_assoc())
		$result['all'][] = $row['id'];
	$result['status'] = true;
	echo json_encode($result);
}

?>