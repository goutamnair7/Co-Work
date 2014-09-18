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
$p1_first_name = $_GET['p1_first_name'];
$p2_first_name = $_GET['p2_first_name'];
$p1_last_name = $_GET['p1_last_name'];
$p2_last_name = $_GET['p2_last_name'];
$p1_email = $_GET['p1_email'];
$p2_email = $_GET['p2_email'];
$p1_contact = $_GET['p1_contact'];
$p2_contact = $_GET['p2_contact'];

if($name == "" || $space == "" || $startup_status == "" || $joining_date == "" || $employees == "" || $domain == "" || $p1_first_name == "" || $p1_last_name == "" || $p1_email == "" || $p1_contact == "")
{
	$status = "fail";
	$message = "Fields marked with * are necessary!";
}
else if(($p1_email!="" && filter_var($p1_email, FILTER_VALIDATE_EMAIL)==false) || ($p2_email!="" && filter_var($p2_email, FILTER_VALIDATE_EMAIL)==false))
{
	$status = "fail";
	$message = "Email Format Incorrect!";
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
	$p1_first_name = preg_replace('#[^A-Za-z0-9]#i', '', $p1_first_name);
	$p2_first_name = preg_replace('#[^A-Za-z0-9]#i', '', $p2_first_name);
	$p1_last_name = preg_replace('#[^A-Za-z0-9]#i', '', $p1_last_name);
	$p2_last_name = preg_replace('#[^A-Za-z0-9]#i', '', $p2_last_name);
	$p1_email = preg_replace('#[^A-Za-z0-9@._]#i', '', $p1_email);
	$p2_email = preg_replace('#[^A-Za-z0-9@._]#i', '', $p2_email);
	$p1_contact = preg_replace('#[^0-9]#i', '', $p1_contact);
	$p2_contact = preg_replace('#[^0-9]#i', '', $p2_contact);

	include "connect_to_mysql.php";
	
	$stat = $mysqli->query("INSERT INTO startup_details VALUES ('', '{$name}', '{$space}', '{$startup_status}', '{$joining_date}', '{$ending_date}', '{$employees}', '{$domain}', '{$description}', '{$web_address}', '{$p1_first_name}', '{$p1_last_name}', '{$p1_email}', '{$p1_contact}', '{$p2_first_name}', '{$p2_last_name}', '{$p2_email}', '{$p2_contact}')");

	if($stat==false)
	{
		$status = "fail";
		$message = "Databse Error! Contact Developer ASAP.";
	}
	else
	{
//		session_start();
		$status = "success";
		$message = "Successfully created new startup!";
		$subject = "You have been Registered on CIE SITE";
		$msg = "";
//		$msg = "Your Startup(".$name.") has been registered on CIE Website by ".$_SESSION['first_name']." ".$_SESSION['last_name'].".\r\nYour login id is: ".$p1_email."\r\nYour password is: ".$p1_email;
		$headers = "From: noreply.cie@gmail.com";

		mail($p1_email, $subject, $msg, $headers);

		if($p2_email != "")
			mail($p2_email, $subject, $msg, $headers);
	}
}

header("location: ../register_startup.php?status={$status}&message={$message}");
?>
