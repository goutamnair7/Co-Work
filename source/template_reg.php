<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Centaurus - Bootstrap Admin Template</title>

<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet"/>


<link href="css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="css/libs/nanoscroller.css" type="text/css"/>

<link rel="stylesheet" type="text/css" href="css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="css/compiled/elements.css">

<link rel="stylesheet" href="css/libs/fullcalendar.css" type="text/css"/>
<link rel="stylesheet" href="css/libs/fullcalendar.print.css" type="text/css" media="print"/>
<link rel="stylesheet" href="css/compiled/calendar.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="css/libs/morris.css" type="text/css"/>
<link rel="stylesheet" href="css/libs/daterangepicker.css" type="text/css"/>
<link rel="stylesheet" href="css/libs/jquery-jvectormap-1.2.2.css" type="text/css"/>

<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

</head>
<body class="theme-blue-gradient fixed-header fixed-leftmenu">

<?php include_once 'navbar.php'; ?>

<div id="page-wrapper" class="container">
	<div class="row">
		
		<?php include_once 'navbar-col.php'; ?>

		<div id="content-wrapper">
			<div class="row">
			
				<div id="login-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div id="login-box" style="max-width:600px;">
									<div class="row">
										<div class="col-xs-12">
											<div id="login-box-inner">
											    <div id = "statusdiv" class="row">
													<div class="col-xs-12 col-md-12">
														<p id="status" class="alert fade in" style="padding:3px;"></p>
													</div>
												</div>
												
												<form role="form" action="scripts/check_signup_startup.php">
																						
													<div class="input-group col-md-12 col-xs-12">
														<input class="form-control " type="text" placeholder="Startup Name" name="name" required>
													</div>

													<div class="input-group col-md-12 col-xs-12">
														<div class="col-md-6 col-xs-12">
															<label>Space</label>
															<select class="form-control" name="space" required>
																<option>Launchpad</option>
																<option>Propel</option>
																<option>Leased Spaces</option>
															</select>
														</div>

														<div class="col-md-6 col-xs-12">
															<label>Status</label>
															<select class="form-control" name="startup_status" required>
																<option>Present</option>
																<option>Left</option>
															</select>
														</div>
													</div>
													
													<div class="input-group col-md-12 col-xs-12">
														<div class="col-md-6 col-xs-12">
															<label for="datepickerDate">Joining Date</label>
																<input type="text" class="form-control" id="datepickerjoin" name="joining_date" required>
														</div>

														<div class="col-md-6 col-xs-12">
															<label for="datepickerDate">Ending Date</label>
																<input type="text" class="form-control" id="datepickerend" name="ending_date">
														</div>
													</div>

													<div class="input-group col-md-12 col-xs-12">
															<input class="form-control" type="text" placeholder="Number of Employees" name="employees" style="height:45px;" required>
													</div>
														
													<div class="input-group col-md-12 col-xs-12">
															<input class="form-control" type="text" placeholder="Domain" name="domain" style="height:45px;"required>
													</div>

													<div class="input-group col-md-12 col-xs-12">
														<input class="form-control" type="text" placeholder="Startup Description" name="description">
													</div>

													<div class="input-group col-md-12 col-xs-12">
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

				<script src="js/demo-skin-changer.js"></script>  
				<script src="js/jquery.js"></script>
				<script src="js/bootstrap.js"></script>
				<script src="js/jquery.nanoscroller.min.js"></script>
				<script src="js/demo.js"></script>  
				 
				<script src="js/jquery.maskedinput.min.js"></script>
				<script src="js/bootstrap-datepicker.js"></script>
				<script src="js/moment.min.js"></script>
				<script src="js/daterangepicker.js"></script>
				<script src="js/bootstrap-timepicker.min.js"></script>
				<script src="js/select2.min.js"></script>
				<script src="js/hogan.js"></script>
				<script src="js/typeahead.min.js"></script>
				<script src="js/jquery.pwstrength.js"></script>
				 
				<script src="js/scripts.js"></script>
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

<!--script src="js/demo-skin-changer.js"></script-->  
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.nanoscroller.min.js"></script>
<script src="js/demo.js"></script>  

<script src="js/jquery-ui.custom.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/daterangepicker.js"></script>
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-merc-en.js"></script>
<script src="js/gdp-data.js"></script>
<script src="js/flot/jquery.flot.js"></script>
<script src="js/flot/jquery.flot.min.js"></script>
<script src="js/flot/jquery.flot.pie.min.js"></script>
<script src="js/flot/jquery.flot.stack.min.js"></script>
<script src="js/flot/jquery.flot.resize.min.js"></script>
<script src="js/flot/jquery.flot.time.min.js"></script>
<script src="js/flot/jquery.flot.threshold.js"></script>

<script src="js/scripts.js"></script>

</body>
</html>
