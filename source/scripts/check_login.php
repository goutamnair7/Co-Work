<?php
$error = false;
$email = $_POST['email'];
$password = $_POST['password'];

$email = preg_replace('#[^A-Za-z0-9@.]#i', '', $email); 
$password = preg_replace('#[^A-Za-z0-9]#i', '', $password);

if($email == "" || $password == "")
{
	$error = "Invalid Email ID or Password";
}

$password = md5($password);
include "connect_to_mysql.php";
$sql = mysql_query("SELECT * FROM admins WHERE email='$email' AND password='$password' LIMIT 1");
$existCount = mysql_num_rows($sql);

if($existCount == 0)
{
	$error = "Invalid Email ID or Password";
}
else
{
	$row = mysql_fetch_array($sql);
	session_start();
	$_SESSION['email'] = $row['email'];
	$_SESSION['first_name'] = $row['first_name'];
}

if ($error != false)
{
	$url = "../login.php?login_failed=true&reason=" . $error;
}
else
{
	$url = "../dashboard.php";
}

header("location: " . $url);
?>