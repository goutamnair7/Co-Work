<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$message = false;
$email = @$_GET['email'];
$password = @$_GET['password'];

if($email == "" || $password == "")
{
	$message = "Invalid Email ID or Password";
}
else
{
	$password = md5($password);

	$sql = $mysqli->query("SELECT * FROM admins WHERE email='{$email}' AND password='{$password}' LIMIT 1");

	if($sql->num_rows == 0)
	{
		$message = "Invalid Email ID or Password";
	}
	else
	{
		$row = $sql->fetch_array();
		session_start();
		$_SESSION['user'] = $row;
		$_SESSION['name'] = $row['first_name'];
		$_SESSION['is_super'] = $row['is_super'];
	}
}

if ($message != false)
{
	$url = "../view/login.php?status=fail&message=" . $message;
}
else
{
	$url = "../view/dashboard.php";
}

header("location: " . $url);
?>
