<?php
$message = false;
$email = $_GET['email'];
$password = $_GET['password'];

$email = preg_replace('#[^A-Za-z0-9@.]#i', '', $email); 
$password = preg_replace('#[^A-Za-z0-9]#i', '', $password);

if($email == "" || $password == "")
{
	$message = "Invalid Email ID or Password";
}
else
{
	$password = md5($password);
	
	include "connect_to_mysql.php";
	$sql = $mysqli->query("SELECT * FROM admins WHERE email='{$email}' AND password='{$password}' LIMIT 1");
	$existCount = $sql->num_rows($sql);

	if($existCount == 0)
	{
		$message = "Invalid Email ID or Password";
	}
	else
	{
		$row = $sql->fetch_array();
		session_start();
		$_SESSION['email'] = $row['email'];
		$_SESSION['first_name'] = $row['first_name'];
	}
}

if ($message != false)
{
	$url = "../login.php?status=fail&message=" . $message;
}
else
{
	$url = "../dashboard.php";
}

$mysqli->close();

header("location: " . $url);
?>
