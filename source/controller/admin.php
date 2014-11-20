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
		$result['msg'] = "All fields are necessary!";
	}
	else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
	{
		$result['status'] = false;
		$result['msg'] = "Email format incorrect!";
	}
	else if($password != $verify_password)
	{
		$result['status'] = false;
		$result['msg'] = "Passwords do not match!";
	}
	else
	{
		$password = md5($password);
		
		$sql = $mysqli->query("SELECT * FROM admins WHERE email='{$email}' LIMIT 1");
		if($sql->num_rows != 0)
		{
			$result['status'] = false;
			$result['msg'] = "Email ID already registered!";
		}
		else
		{
			$status = $mysqli->query("INSERT INTO admins VALUES ('', '{$email}', '{$password}', '{$first_name}', '{$last_name}', '')");

			if($status != false)
			{
				$result['status'] = true;
				$result['msg'] = "Successfully created new Admin!";
			}
			else
			{
				$result['status'] = false;
				$result['msg'] = "ERROR: ".$mysqli->error;
			}
		}
	}

	echo json_encode($result);
}
else if($action=="update")
{
	$id = @$_GET['id'];
	$first_name = @$_GET['first_name'];
	$last_name = @$_GET['last_name'];
	$email = @$_GET['email'];
	$password = @$_GET['password'];
	$verify_password = @$_GET['verify_password'];

	$query = "UPDATE admins SET email='$email', first_name='$first_name', last_name='$last_name'";
	if($password != "" && $password == $verify_password)
	{
		$password = md5($password);
		$query .= ", password='$password'";
	}
	$query .= " WHERE id='$id'";
	$status = $mysqli->query($query);

	header('location: ../view/admin_details.php?id='.$id);
}
else if($action=="delete")
{
	$id = @$_GET['id'];
	$mysqli->query("DELETE FROM admins WHERE id='$id'");
	
	$result['status'] = true;
	$result['msg'] = "Successfully Updated Admin!";

	header('location: ../view/admin_details.php');
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
