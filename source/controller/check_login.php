<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$message = false;
$email = @$_GET['email'];
$password = @$_GET['password'];

$email = preg_replace('#[^A-Za-z0-9@.]#i', '', $email); 
$password = preg_replace('#[^A-Za-z0-9]#i', '', $password);

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
		$_SESSION['user_type'] = 'admin';
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
