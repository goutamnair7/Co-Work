<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Startup Page</title>

<!--Common Styles -->
<link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>
<link href="../asset/css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/elements.css">
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

</head>
<body class="theme-blue-gradient fixed-header fixed-leftmenu">

<?php
	require_once( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "navbar.php" );
?>

<div id="page-wrapper" class="container">
	<div class="row">
		
		<?php
			require_once( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "navbar-col.php" );
		?>

		<div id="content-wrapper">
		<div class="main-box clearfix" style="min-height: 820px;">
			<div class='row'>
				<div class='col-md-6' style='margin-left:30px;'>
					<br />
					<div class = 'col-md-12 col-xs-12' style="text-align:center;"><h1>Startup Information</h1></div> 
					<br />
					<label>Select Startup</label> 
					
					<select onchange='choosestartup(this)' class="form-control" id = 'spacename' name="space" required>
						<option id='0' class='useless' value = "0"> - </option>
						<?php
							$id = $_GET['id'];
							require_once("../model/config_sql.php" );
							$sql = $mysqli->query("SELECT * FROM startups");
							while($row = $sql->fetch_assoc()){
								if($row['id'] == $id){
									echo "<option class = '" .$row['space']. "' id = '" .$row['id']. "' selected='selected'>".$row['name']."</option>";
								}
								else{
									echo "<option value=\"".$row['id']."\" class = '" .$row['space']. "' id = '" .$row['id']. "'>".$row['name']."</option>";
								}
							}
						?>
					</select>
					<br />
				</div>
				<div class='col-md-6'></div>
			</div>
			<div class='' id='data' style='margin-left:30px;'>
				<?php
					$id = @$_GET['id'];
					if($id>0){
						$date = date('m-d-Y');
						$sql = $mysqli->query("SELECT * FROM startups WHERE id='{$id}' LIMIT 1");
						if($sql->num_rows)
						{
							$row = $sql->fetch_assoc();
							if($row['status'] == "Present")
							{
								$mydate = $row['ending_date'];
								$a = strptime($date, '%m-%d-%Y');
								$b = strptime($mydate, '%m-%d-%Y');
								$timestampa = mktime(0, 0, 0, $a['tm_mon']+1, $a['tm_mday'], $a['tm_year']+1900);
								$timestampb = mktime(0, 0, 0, $b['tm_mon']+1, $b['tm_mday'], $b['tm_year']+1900);

								if($timestampa > $timestampb){
									$mysqli->query("UPDATE startups SET status = 'Left' WHERE id='{$id}'");
									$row['status'] = 'Left';
								}
							}
							echo "<br /><b>Startup Name: </b><span id='name'>".$row['name']."</span>";						
							echo "<br /><b>Space: </b><span id='space'>".$row['space']."</span>";						
							echo "<br /><b>Status: </b><span id='status'>".$row['status']."</span>";						
							echo "<br /><b>Joining Date: </b><span id='date1'>".$row['joining_date']."</span>";						
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							echo "<b>Ending Date: </b><span id='date2'>".$row['ending_date']."</span>";						
							echo "<br /><b>No. of Employees: </b><span id='emp'>".$row['employees']."</span>";						
							echo "<br /><b>Domain: </b><span id='domain'>".$row['domain']."</span>";						
							echo "<br /><b>Description: </b><span id='description'>".$row['description']."</span>";						
							echo "<br /><b>Web Address: </b><span id='web'>".$row['web_address']."</span>";	
							$p1_id = $row['p1_id'];
							$p2_id = $row['p2_id'];
							echo "<br /><br /><b>Primary Contacts - </b><br />";
							$sql = $mysqli->query("SELECT * FROM startup_members WHERE id='$p1_id' LIMIT 1");
							$row = $sql->fetch_assoc();
							echo "<div class='row'>";
							echo "<div class='col-md-4'>";
							echo "<br /><b>Name: </b><span id='Contact1_fName'>".$row['first_name']."</span><span id='Contact1_lName'> ".$row['last_name']."</span>";
							echo "<br /><b>Contact: </b><span id='Contact1_contact'>".$row['contact']."</span>";
							echo "<br /><b>Email: </b><span id='Contact1_Email'>".$row['email']."</span>";
							echo "</div><div class='col-md-8'>";
							if($p2_id>0){
								$sql = $mysqli->query("SELECT * FROM startup_members WHERE id='{$p2_id}' LIMIT 1");
								$row = $sql->fetch_assoc();
								echo "<br /><b>Name: </b><span id='Contact2_fName'>".$row['first_name']."</span><span id='Contact2_lName'> ".$row['last_name']."</span>";
								echo "<br /><b>Contact: </b><span id='Contact2_contact'>".$row['contact']."</span>";
								echo "<br /><b>Email: </b><span id='Contact2_Email'>".$row['email']."</span>";
							}
							echo "</div></div><br />";
							echo "<button style=width:100px;' id='change' class='btn btn-block btn-primary' onclick='change()'>Edit Details</button>";
							echo "<br />";
						}
					}
				?>
			</div>
			</div>
			<!--<footer id="footer-bar" class="row">
			</footer> -->
		</div>
	</div>
</div>


<!-- common js -->
<script src="../asset/js/jquery.js"></script>
<script src="../asset/js/bootstrap.js"></script>
<script src="../asset/js/demo.js"></script>  
<script src="../asset/js/scripts.js"></script>
<script src="../asset/js/demo-skin-changer.js"></script>
<script src="../asset/js/jquery.nanoscroller.min.js"></script> 
<script src="../asset/js/jquery.maskedinput.min.js"></script>	

<script type="text/javascript">
	$("#startup_page").addClass("active");
</script>
<script>
	function choosestartup(startups){
		var id = startups.value;
		window.location.href = './startup_page.php?id='+id;
	}
</script>"
<script>
function change()
{	var str = "<div class='col-md-6'><form id='reg_admin' role='form' action='../controller/startup.php' method='get'>";
	str += '<input hidden name="action" value="update">';
	str += '<input hidden name="startup_id" value="'+<?php echo $_GET['id'];?>+'">';
	str += '<div class="form-group"><label>Name</label><input class="form-control" type="text" placeholder="Name" id="name_new" name="name" value="'+document.getElementById('name').innerHTML+'" required /></div>';
	str += '<div class="form-group"><label>Space</label><input class="form-control" type="text" placeholder="Space" id="space_new" name="space" value="'+document.getElementById('space').innerHTML+'" readonly /></div>';
	str += '<div class="form-group"><label>Status</label><input class="form-control" type="text" placeholder="Status" id="status_new" name="status" value="'+document.getElementById('status').innerHTML+'" readonly /></div>';
	str += '<div class="form-group col-md-6"><label>Joining Date</label><input class="form-control" type="text" id="date1_new" name="date1" value="'+document.getElementById('date1').innerHTML+'" readonly /></div>';
	str += '<div class="form-group col-md-6"><label>Ending Date</label><input class="form-control" type="text" id="date2_new" name="date2" value="'+document.getElementById('date2').innerHTML+'" readonly /></div>';
	str += '<div class="form-group"><label>Number of Employees</label><input class="form-control" type="text" id="emp_new" name="employees" value="'+document.getElementById('emp').innerHTML+'" readonly /></div>';
	str += '<div class="form-group"><label>Domain</label><input class="form-control" type="text" id="domain_new" name="domain" value="'+document.getElementById('domain').innerHTML+'" /></div>';
	str += '<div class="form-group"><label>Description</label><input class="form-control" type="text" id="description_new" name="description" value="'+document.getElementById('description').innerHTML+'" /></div>';
	str += '<div class="form-group"><label>Web Address</label><input class="form-control" type="text" id="web_new" name="web_address" value="'+document.getElementById('web').innerHTML+'" /></div>';
	str += '<input hidden name="p1_id" value="'+<?php echo $p1_id;?>+'">';
	str += '<div class="form-group col-md-6"><label>First Name</label><input class="form-control" type="text" name="fname1" value="'+document.getElementById('Contact1_fName').innerHTML+'" /></div>';
	str += '<div class="form-group col-md-6"><label>Last Name</label><input class="form-control" type="text" name="lname1" value="'+document.getElementById('Contact1_lName').innerHTML+'" /></div>';
	str += '<div class="form-group"><label>Contact</label><input class="form-control" type="number" name="contact1" value="'+document.getElementById('Contact1_contact').innerHTML+'" /></div>';
	str += '<div class="form-group"><label>Email</label><input class="form-control" type="email" name="email1" value="'+document.getElementById('Contact1_Email').innerHTML+'" /></div>';
	if(document.getElementById('Contact2_fName')!= undefined){ 
		str += '<input hidden name="p2_id" value="'+<?php echo $p2_id;?>+'">';
		str += '<div class="form-group col-md-6"><label>First Name</label><input class="form-control" type="text" name="fname2" value="'+document.getElementById('Contact2_fName').innerHTML+'" /></div>';
		str += '<div class="form-group col-md-6"><label>Last Name</label><input class="form-control" type="text" name="lname2" value="'+document.getElementById('Contact2_lName').innerHTML+'" /></div>';
		str += '<div class="form-group"><label>Contact</label><input class="form-control" type="number" name="contact2" value="'+document.getElementById('Contact2_contact').innerHTML+'" /></div>';
		str += '<div class="form-group"><label>Email</label><input class="form-control" type="email" name="email2" value="'+document.getElementById('Contact2_Email').innerHTML+'" /></div>';
	}
	str += "<div class='form-group'><button style=width:100px;'  class='btn btn-block btn-primary'>Edit Details</button></div>";

	str +='</div>';
	document.getElementById('data').innerHTML=str;
}
</script>
</body>
</html>
