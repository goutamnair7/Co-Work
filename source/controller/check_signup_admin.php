<?php

require( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "connect_to_mysql.php" );

$status = "none";
$message = false;

$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email = $_GET['email'];
$password = $_GET['password'];
$verify_password = $_GET['verify_password'];

if($first_name == "" || $last_name == "" || $email == "" || $password == "" || $verify_password == "")
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
else
{
	$first_name = preg_replace('#[^A-Za-z0-9]#i', '', $first_name);
	$last_name = preg_replace('#[^A-Za-z0-9]#i', '', $last_name);
	$email = preg_replace('#[^A-Za-z0-9@.]#i', '', $email);
	$password = preg_replace('#[^A-Za-z0-9]#i', '', $password);
	$password = md5($password);
	
	$sql = $mysqli->query("SELECT * FROM admins WHERE email='{$email}' LIMIT 1");
	$exist_count = $sql->num_rows($check_email);
	if($exist_count != 0)
	{
		$status = "fail";
		$message = "Email ID already registered!";
	}
	else
	{
		if($mysqli->query("INSERT INTO admins VALUES ('', '{$email}', '{$password}', '{$first_name}', '{$last_name}')"))
		{
			$status = "success";
			$message = "Successfully created new user!";
		}
		else
		{
			$status = "fail";
			$message = "Database Error! Contact Developers ASAP."
		}
	}
}

$mysqli->close();

header("location: ../view/register_startup.php?status={$status}&message={$message}");

?>
