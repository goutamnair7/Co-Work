<?php

$status = "none";
$message = "";

$name = $_GET['name'];
$space = $_GET['space'];
$startup_status = $_GET['startup_status'];
$joining_date = $_GET['joining_date'];
$ending_date = $_GET['ending_date'];
$employees = $_GET['employees'];
$domain = $_GET['domain'];
$description = $_GET['description'];
$web_address = $_GET['web_address'];

if($name == "" || $space == "" || $startup_status == "" || $joining_date == "" || $employees == "" || $domain == "")
{
	$status = "fail";
	$message = "Fields marked with * are necessary!";
}
else
{
	$name = preg_replace('#[^A-Za-z0-9 ]#i', '', $name);
	$space = preg_replace('#[^A-Za-z0-9]#i', '', $space);
	$startup_status = preg_replace('#[^A-Za-z0-9]#i', '', $startup_status);
	$joining_date = preg_replace('#[^A-Za-z0-9]#i', '', $joining_date);
	$ending_date = preg_replace('#[^A-Za-z0-9]#i', '', $ending_date);
	$employees = preg_replace('#[^A-Za-z0-9]#i', '', $employees);
	$domain = preg_replace('#[^A-Za-z0-9]#i', '', $domain);
	$description = preg_replace('#[^A-Za-z0-9, ]#i', '', $description);
	$web_address = preg_replace('#[^A-Za-z0-9/.]#i', '', $web_address);

	include "connect_to_mysql.php";
	
	$check_name = mysql_query("SELECT * FROM startup_details WHERE name='{$name}' LIMIT 1");
	$exist_count = mysql_num_rows($check_name);
	if($exist_count != 0)
	{
		$status = "fail";
		$message = "Startup name already registered!";
	}
	else
	{
		mysql_query("INSERT INTO startup_details VALUES ('', '{$name}', '{$space}', '{$startup_status}', '{$joining_date}', '{$ending_date}', '{$employees}', '{$domain}', '{$description}', '{$web_address}')");
		$status = "success";
		$message = "Successfully created new startup!";
	}
}

header("location: ../signup_startup.php?status={$status}&message={$message}");
?>