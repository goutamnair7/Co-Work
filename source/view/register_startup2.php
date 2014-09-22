<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Register Startup</title>

<link href="../asset/css/bootstrap/bootstrap.css" rel="stylesheet"/>

<link href="../asset/css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/elements.css">
<link rel="stylesheet" href="../asset/css/libs/datepicker.css" type="text/css"/>
<link rel="stylesheet" href="../asset/css/libs/daterangepicker.css" type="text/css"/>
<link rel="stylesheet" href="../asset/css/libs/bootstrap-timepicker.css" type="text/css"/>

<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

<style>
.input-group{
	min-width:100%;
}

</style>
</head>

<body id="login-page">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div id="login-box" style="max-width:600px;">
					<div class="row">
						<div class="col-xs-12">
							<div id="login-box-inner">
							    <div id = "statusdiv" class="row">
									<div class="col-xs-12">
										<p id="status" class="alert fade in" style="padding:3px;"></p>
									</div>
								</div>
								
								<form role="form" action="../controller/check_signup_startup.php">
																		
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Startup Name" name="name" required>
									</div>

									<div class="input-group">
										<div class="col-md-6">
											<label>Space</label>
											<select class="form-control" name="space" required>
												<option>Launchpad</option>
												<option>Propel</option>
												<option>Leased Spaces</option>
											</select>
										</div>

										<div class="col-md-6">
											<label>Status</label>
											<select class="form-control" name="startup_status" required>
												<option>Present</option>
												<option>Left</option>
											</select>
										</div>
									</div>
									
									<div class="input-group">
										<div class="col-md-6">
											<label for="datepickerDate">Joining Date</label>
												<input type="text" class="form-control" id="datepickerjoin" name="joining_date" required>
										</div>

										<div class="col-md-6">
											<label for="datepickerDate">Ending Date</label>
												<input type="text" class="form-control" id="datepickerend" name="ending_date">
										</div>
									</div>

									<div class="input-group">
											<input class="form-control" type="text" placeholder="Number of Employees" name="employees" style="height:45px;" required>
									</div>
										
									<div class="input-group">
											<input class="form-control" type="text" placeholder="Domain" name="domain" style="height:45px;"required>
									</div>

									<div class="input-group">
										<input class="form-control" type="text" placeholder="Startup Description" name="description">
									</div>

									<div class="input-group">
										<input class="form-control" type="text" placeholder="Web Address" name="web_address">
									</div>
									<br>
									<div class="row">
										<div class='col-md-4 col-xs-3'></div>
											<button type="submit" class="btn btn-success col-md-4 col-xs-6" style='height:40px;'>Login</button>
										<div class='col-md-4 col-xs-3'></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
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
		  format: 'mm-dd-yyyy'
		});

		$('#datepickerDateComponent').datepicker();
	
	});
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