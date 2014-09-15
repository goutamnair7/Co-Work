<?php

$status = "none";
$message = false;

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$verify_password = $_POST['verify_password'];

if($first_name == "" || $last_name == "" || $email == "" || $country == "" || $email == "" || $password == "" || $verify_password == "")
{
	$status = "fail";
	$message = "All fields are necessary!";
}
else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
{
	$status = "fail";
	$message = "Email format incorrect!";
}
else if($password != $verify_password)
{
	$status = "fail";
	$message = "Passwords do not match!";
}

if($message == false)
{
	$first_name = preg_replace('#[^A-Za-z0-9]#i', '', $first_name);
	$last_name = preg_replace('#[^A-Za-z0-9]#i', '', $last_name);
	$email = preg_replace('#[^A-Za-z0-9@.]#i', '', $email);
	$password = preg_replace('#[^A-Za-z0-9]#i', '', $password);
	$password = md5($password);
	
	include "connect_to_mysql.php";
	
	$check_email = mysql_query("SELECT * FROM admins WHERE email='$email' OR email='$email' LIMIT 1");
	$exist_count = mysql_num_rows($check_email);
	if($exist_count != 0)
	{
		$status = "fail"
		$message = "Email ID already registered!";
	}
	else
	{
		mysql_query("INSERT INTO admins VALUES ('', '{$email}', '{$password}', '{$first_name}', '{$last_name}')");
	}
}
if($message != false)
{
	$status = "success";
	$message = "Successfully created new user!";	
}

header("location: ../signup.php?status={$status}&message={$message}");
?>