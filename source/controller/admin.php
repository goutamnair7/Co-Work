<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$result = array();
$result['status'] = false;
$result['msg'] = "UNKNOWN ERROR!";

$action = @$_GET['action'];

if($action=='create')
{
	$first_name = @$_GET['first_name'];
	$last_name = @$_GET['last_name'];
	$email = @$_GET['email'];
	$password = @$_GET['password'];
	$verify_password = @$_GET['verify_password'];

	if($first_name == "" || $last_name == "" || $email == "" || $password == "" || $verify_password == "")
	{
		$result['status'] = false;
		$result['message'] = "All fields are necessary!";
	}
	else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
	{
		$result['status'] = false;
		$result['message'] = "Email format incorrect!";
	}
	else if($password != $verify_password)
	{
		$result['status'] = false;
		$result['message'] = "Passwords do not match!";
	}
	else
	{
		$first_name = preg_replace('#[^A-Za-z]#i', '', $first_name);
		$last_name = preg_replace('#[^A-Za-z]#i', '', $last_name);
		$email = preg_replace('#[^A-Za-z0-9@._]#i', '', $email);
		$password = preg_replace('#[^A-Za-z0-9]#i', '', $password);
		$password = md5($password);
		
		$sql = $mysqli->query("SELECT * FROM admins WHERE email='{$email}' LIMIT 1");
		if($sql->num_rows != 0)
		{
			$result['status'] = false;
			$result['message'] = "Email ID already registered!";
		}
		else
		{
			$status = $mysqli->query("INSERT INTO admins VALUES ('', '{$email}', '{$password}', '{$first_name}', '{$last_name}')");

			if($status != false)
			{
				$result['status'] = true;
				$result['msg'] = "Successfully created new Admin!";
			}
			else
			{
				$result['status'] = false;
				$result['message'] = "ERROR: ".$mysqli->error;
			}
		}
	}

	echo json_encode($result);
}
else if($action=='show')
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM admins WHERE id=$id LIMIT 1")->fetch_assoc();
	echo json_encode($row);
}
else
{
	$result['action'] = $action;
	echo json_encode($result);
}

?>
