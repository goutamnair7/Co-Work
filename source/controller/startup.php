<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

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
	
	if($row != NULL)
	{
		$result['status'] = true;
		$result['msg'] = "Success";
		$result['row'] = $row;
	}
	else
		$result['msg'] = "Record Not Found!";
	
	echo json_encode($result);
}
else if($action='update')
{
	$startup_id = @$_GET['startup_id'];
	$name = @$_GET['name'];
	$domain = @$_GET['domain'];
	$description = @$_GET['description'];
	$web_address = @$_GET['web_address'];
	$p1_id = @$_GET['p1_id'];
	$fname1 = @$_GET['fname1'];
	$lname1 = @$_GET['lname1'];
	$contact1 = @$_GET['contact1'];
	$email1 = @$_GET['email1'];
	$p2_id = @$_GET['p2_id'];
	$fname2 = @$_GET['fname2'];
	$lname2 = @$_GET['lname2'];
	$contact2 = @$_GET['contact2'];
	$email2 = @$_GET['email2'];

	$mysqli->query("UPDATE startups SET name='$name', domain='$domain', description='$description', web_address='$web_address' WHERE id='$startup_id'");
	$mysqli->query("UPDATE startup_members SET first_name='$fname1', last_name='$lname1', email='$email1', contact='$contact1' WHERE id='$p1_id'");
	if($p2_id != "")
		$mysqli->query("UPDATE startup_members SET first_name='$fname2', last_name='$lname2', email='$email2', contact='$contact2' WHERE id='$p2_id'");

	header('location: ../view/startup_page.php?id='.$startup_id);
}
else
{
	$result['action'] = $action;
	echo json_encode($result);
}

?>