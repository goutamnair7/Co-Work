<?php

require( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'connect_to_mysql.php' );

require( dirname(__FILE__) . DIRECTORY_SEPARATOR . 'mailer.php');

$result = array();
$result['status'] = false;
$result['msg'] = "UNKNOWN ERROR!";

$action = @$_GET['action'];

if($action == 'create')
{
	$name = @$_GET['name'];
	$space = @$_GET['space'];
	$startup_status = @$_GET['startup_status'];
	$joining_date = @$_GET['joining_date'];
	$ending_date = @$_GET['ending_date'];
	$employees = @$_GET['employees'];
	$domain = @$_GET['domain'];
	$description = @$_GET['description'];
	$web_address = @$_GET['web_address'];

	if($name == "" || $space == "" || $startup_status == "" || $joining_date == "" || $employees == "" || $domain == "")
	{
		$result['status'] = false;
		$result['msg'] = "Fields marked with * are necessary!";
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
		
		$stat = $mysqli->query("INSERT INTO startups VALUES ('', '{$name}', '{$space}', '{$startup_status}', '{$joining_date}', '{$ending_date}', '{$employees}', '{$domain}', '{$description}', '{$web_address}', '', '')");

		if($stat == false)
		{
			$result['status'] = false;
			$result['msg'] = "ERROR: ".$mysqli->error;
		}
		else
		{
			$result['status'] = true;
			$result['msg'] = "Successfully created new startup!";
			$result['id'] = $mysqli->insert_id;
/*			$subject = "You have been Registered on CIE SITE";
			$msg = "Congratulations!";
			$msg = "Your Startup(".$name.") has been registered on CIE Website by ".$_SESSION['row']['first_name']." ".$_SESSION['row']['last_name'].".Your login id is '".$p1_email."' and password is '".$p1_email."'";
			$from = "noreply.cie@gmail.com";

			sendmail($p1_email, $subject, $msg, $from);
*/
		}
	}
	echo json_encode($result);
}
else if($action=='show')
{
	$id = @$_GET['id'];
	$row = $mysqli->query("SELECT * FROM startups WHERE id=$id LIMIT 1")->fetch_assoc();
	echo json_encode($row);
}

?>