<?php

require(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'connect_to_mysql.php');

$result = array();
$result['status'] = false;
$result['msg'] = "UNKNOWN ERROR";

$oldpass = @$_GET['old_pass'];
$newpass = @$_GET['new_pass'];
$confirmpass = @$_GET['confirm_pass'];
$email = @$_GET['email'];

$status = $mysqli->query("SELECT * FROM startup_members WHERE password = '{oldpass}' AND email = '{email}' LIMIT 1");
if($status->num_rows == 0) {
	$result['msg'] = "Incorrect Password";
}
else if($newpass != $confirmpass) {
	$result['msg'] = "Passwords don't match";
}
else {
	$password = md5($password);
	$status = $mysqli->query("UPDATE startup_members SET password = '{$newpass}' WHERE email = '{$email}'");
	if($status == false)
		$result['msg'] = "ERROR" . $mysqli->error;
	else
	{
		$result['msg'] = "Successfully changed";
		$result['status'] = true;
	}
}
echo json_encode($result);

?>
