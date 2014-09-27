<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Centaurus - Bootstrap Admin Template</title>

<link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>


<link href="../asset/css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="../asset/css/libs/nanoscroller.css" type="text/css"/>

<link rel="stylesheet" type="text/css" href="../asset/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/elements.css">
<link rel="stylesheet" href="../asset/css/libs/datepicker.css" type="text/css"/>

<link rel="stylesheet" href="../asset/css/libs/fullcalendar.css" type="text/css"/>
<link rel="stylesheet" href="../asset/css/libs/fullcalendar.print.css" type="text/css" media="print"/>
<link rel="stylesheet" href="../asset/css/compiled/calendar.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="../asset/css/libs/morris.css" type="text/css"/>
<link rel="stylesheet" href="../asset/css/libs/daterangepicker.css" type="text/css"/>
<link rel="stylesheet" href="../asset/css/libs/jquery-jvectormap-1.2.2.css" type="text/css"/>

<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

<style>
#emp {
	display : none;
}
#empbut {
	display : none;
}
#back {
	display : none;
}
</style>

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
			<div class="row">
			
				<a data-toggle="modal" href="#startupModal" class="btn btn-primary btn-lg" onclick="funcclear()">Startup Register</a>

				<div class="modal fade" id="startupModal" tabindex="-1" role="dialog" aria-labelledby="startupModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Register New Startup</h4>
							</div>
							<form role="form" action="../controller/check_signup_startup.php">
								<div class="modal-body">
									
									 <div id = "statusdiv" class="row">
										<div class="col-xs-12">
											<p id="status" class="alert fade in" style="padding:3px;"></p>
										</div>
									</div>
									<div id='start'>	
										<div class="form-group">
											<label>Startup Name</label>
												<input class="form-control" type="text" placeholder="Startup Name" name="name" required>
										</div>

										<div class="form-group">
											<div class="col-md-6 form-group">
												<label>Space</label>
												<select class="form-control" name="space" required>
													<option>Launchpad</option>
													<option>Propel</option>
													<option>Leased Spaces</option>
												</select>
											</div>

											<div class="col-md-6 form-group">
												<label>Status</label>
												<select class="form-control" name="startup_status" required>
													<option>Present</option>
													<option>Left</option>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-md-6 form-group">
												<label for="datepickerDate">Joining Date</label>
													<input type="text" class="form-control" id="datepickerjoin" name="joining_date" required>
											</div>

											<div class="col-md-6 form-group">
												<label for="datepickerDate">Ending Date</label>
													<input type="text" class="form-control" id="datepickerend" name="ending_date">
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-6 form-group">
												<label>Number of Employees</label>
												<input class="form-control" type="text" placeholder="Number of Employees" name="employees" required>
											</div>
											
											<div class="col-md-6 form-group">
												<label>Domain</label>
												<input class="form-control" type="text" placeholder="Domain" name="domain" required>
											</div>
										</div>

										<div class="form-group">
											<label>Startup Description</label>
												<input class="form-control" type="text" placeholder="Startup Description" name="description">
										</div>

										<div class="form-group">
											<label>Web Address</label>
												<input class="form-control" type="text" placeholder="Web Address" name="web_address">
										</div>
									</div>
									<div id = 'emp'>
										<div class="form-group">
											<div class="col-md-6 form-group">
												<label>First Name</label>
												<input class="form-control" type="text" placeholder="First Name" name="p1_first_name" required>
											</div>
											
											<div class="col-md-6 form-group">
												<label>Last Name</label>										
												<input class="form-control" type="text" placeholder="Last Name" name="p1_last_name" required>
											</div>
										</div>

										<div class="form-group">
											<label>Email Id</label>
											<input class="form-control" type="text" placeholder="Email id" name="p1_email" required>
										</div>

										<div class="form-group">
											<label>Contact Number</label>
											<input class="form-control" type="text" placeholder="Contact Number" name="p1_contact" required>
										</div>
										<div class="form-group">
											<div class="col-md-6 form-group">
												<label>First Name</label>
												<input class="form-control" type="text" placeholder="First Name" name="p2_first_name">
											</div>
											
											<div class="col-md-6 form-group">
												<label>Last Name</label>										
												<input class="form-control" type="text" placeholder="Last Name" name="p2_last_name">
											</div>
										</div>

										<div class="form-group">
											<label>Email Id</label>
											<input class="form-control" type="text" placeholder="Email id" name="p2_email">
										</div>

										<div class="form-group">
											<label>Contact Number</label>
											<input class="form-control" type="text" placeholder="Contact Number" name="p2_contact">
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="button" class="btn btn-default" id = 'back' onclick="func()">Back</button>
									<button id = "startbut" type="button" class="btn btn-primary start" onclick="myFunction()">Next</button>
									<button id = 'empbut' type="submit" class="btn btn-primary">Register</button>
								</div>
							</form>	
						</div>
					</div> 
				</div> 

				
				<a data-toggle="modal" href="#adminModal" class="btn btn-primary btn-lg">Admin Register</a>

				<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Register New Admin</h4>
							</div>
							<form role="form" action="../controller/check_signup_admin.php">
								<div class="modal-body">
									
									 <div id = "statusdiv" class="row">
										<div class="col-xs-12">
											<p id="status" class="alert fade in" style="padding:3px;"></p>
										</div>
									</div>
										
									<div class="form-group">
										<label>First Name</label>
										<input class="form-control" type="text" placeholder="First Name" name="first_name" required>
									</div>

									<div class="form-group">
										<label>Last Name</label>
										<input class="form-control" type="text" placeholder="Last Name" name="last_name" required>
									</div>
									
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" type="text" placeholder="Email" name="email" required>
									</div>

									<div class="form-group">
										<label>Password</label>
										<input class="form-control" type="password" placeholder="Password" name="password" required>
									</div>

									<div class="form-group">
										<label>Confirm Password</label>
										<input class="form-control" type="password" placeholder="Confirm Password" name="verify_password" required>
									</div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary">Register</button>
								</div>

							</form>	
						</div> 
					</div> 
				</div> 

			</div>
			<footer id="footer-bar" class="row">
				<p id="footer-copyright" class="col-xs-12">
				&copy; 2014 <a href="http://www.adbee.sk/" target="_blank">Adbee digital</a>. Powered by Centaurus Theme.
				</p>
			</footer>
		</div>
	</div>
</div>


<script src="../asset/js/demo-skin-changer.js"></script>  
<script src="../asset/js/jquery.js"></script>
<script src="../asset/js/bootstrap.js"></script>
<script src="../asset/js/jquery.nanoscroller.min.js"></script>
<script src="../asset/js/demo.js"></script>  
 
<script src="../asset/js/jquery.maskedinput.min.js"></script>
<script src="../asset/js/bootstrap-datepicker.js"></script>
<script src="../asset/js/moment.min.js"></script>
<script src="../asset/js/daterangepicker.js"></script>
<script src="../asset/js/bootstrap-timepicker.min.js"></script>
<script src="../asset/js/select2.min.js"></script>
<script src="../asset/js/hogan.js"></script>
<script src="../asset/js/typeahead.min.js"></script>
<script src="../asset/js/jquery.pwstrength.js"></script>
 
<script src="../asset/js/scripts.js"></script>
<script>
	$(function($) {
		
		//datepicker
		$('#datepickerjoin').datepicker({
		  format: 'mm-dd-yyyy'
		});

		$('#datepickerend').datepicker({
		  format: 'mm-dd-yyyy';
		});

		$('#datepickerDateComponent').datepicker();
	
	});
</script>

<script type="text/javascript">
	function myFunction() {
		document.getElementById("start").style.display = "none";
		document.getElementById("emp").style.display = "inline";
		document.getElementById("startbut").style.display = "none";
		document.getElementById("empbut").style.display = "inline";
		document.getElementById("back").style.display = "inline";
	}
	function func() {
		document.getElementById("start").style.display = "inline";
		document.getElementById("emp").style.display = "none";
		document.getElementById("startbut").style.display = "inline";
		document.getElementById("empbut").style.display = "none";
		document.getElementById("back").style.display = "none";	
	}
	function funcclear() {
		var x = document.getElementsByTagName("input");
		var i;
		for(i=0;i<x.length;i++){
			x[i].value="";
		}
		func();
	}
</script>

<script type="text/javascript">
	var status = "<?php echo $_GET['status'] ?>";
	var msg = "<?php echo $_GET['message'] ?>";
	
	if(status.toLowerCase() == "fail"){
		document.getElementById("status").innerHTML = "<i class='fa fa-warning fa-fw fa-lg'></i>"+msg;
		document.getElementById("status").className += " alert-warning";
	}
	else if(status.toLowerCase() == "success"){
		document.getElementById("status").innerHTML = "<i class='fa fa-check-circle fa-fw fa-lg'></i>"+msg;
		document.getElementById("status").className += " alert-success";

	}
	else{
		document.getElementById("statusdiv").style.display = "none";
	}

</script>
</body>
</html>
