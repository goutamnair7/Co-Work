<?php

require( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'connect_to_mysql.php');

$action = @$_GET['action'];

if($action == 'create')
{
	$first_name = $_GET['first_name'];
	$last_name = $_GET['last_name'];
	$email = $_GET['email'];
	$contact = $_GET['contact'];
	$startup_id = $_GET['startup_id'];

	$password = substr(md5($email), 5, 6);
	$password = md5($password);

	$status = $mysqli->query("INSERT INTO startup_members VALUES ('', '{$first_name}', '{$last_name}', '{$email}', '{$password}', '{$contact}', {$startup_id})");

	if($status == false)
		die('ERROR: '.$mysqli->error);
}
else if($action == 'show')
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM startup_members WHERE id=$id LIMIT 1")->fetch_assoc();
	echo json_encode($row);
}
else if($action == 'show_by_startup_id')
{
	$startup_id = @$_GET['startup_id'];
	$sql = $mysqli->query("SELECT id FROM startup_members WHERE startup_id=$startup_id");
	$all = array();
	while($row = $sql->fetch_assoc())
		$all[] = $row['id'];
	echo json_encode($all);
}