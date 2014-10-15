<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Centaurus - Bootstrap Admin Template</title>
<link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>

<!--Common Styles -->
<link href="../asset/css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/elements.css">
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

<!-- Page specific Styles -->
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/wizard.css">
<link rel="stylesheet" href="../asset/css/libs/datepicker.css" type="text/css"/>
<link rel="stylesheet" href="../asset/css/libs/fullcalendar.css" type="text/css"/>
<link rel="stylesheet" href="../asset/css/libs/fullcalendar.print.css" type="text/css" media="print"/>
<link rel="stylesheet" href="../asset/css/compiled/calendar.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="../asset/css/libs/daterangepicker.css" type="text/css"/>

<style>
#employee_reg {
	display: none;
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
				<div class="col-lg-12">
					<div class="main-box clearfix" style="min-height: 820px;">
						<header class="main-box-header clearfix">
							<h2></h2>
						</header>
						<div class="main-box-body clearfix">
							<div id="myWizard" class="wizard">
								<div class="wizard-inner">
									<ul class="steps">
										<li data-target="#step1" class="active" id='step1'><span class="badge badge-primary" id='step1_1'>1</span>Step 1<span class="chevron"></span></li>
										<li data-target="#step2" id='step2'><span class="badge" id='step2_1'>2</span>Step 2<span class="chevron"></span></li>
										<li data-target="#step3" id='step3'><span class="badge" id='step3_1'>3</span>Step 3<span class="chevron"></span></li>
										<li data-target="#step4" id='step4'><span class="badge" id='step4_1'>4</span>Step 4<span class="chevron"></span></li>
									</ul>
								</div>
								<div class="step-content">
									<div class = 'col-md-2'></div>
									<div class="step-pane active col-md-8 col-xs-12" id="step1">
										<form role="form" id = "start_up" action="" onsubmit="">
											<div class="modal-body">
												<div class = 'col-md-12 col-xs-12'><h1>Startup Details</h1></div> 
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
													<input name='action' value='create' type='hidden'>
													<div class="form-group">
														<div class="col-md-6 form-group">
															<label>Space</label>
															<select class="form-control" id = 'spacename' name="space" required>
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
															<input id='employee_num' class="form-control" type="text" placeholder="Number of Employees" name="employees" required>
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
												<div class = 'col-md-4 col-xs-2'></div>
												<button type="submit" class="col-md-4 col-xs-8 btn btn-success"> <i class="icon-arrow-left"></i>Submit</button>

											</div>
										</form>	
									
										<form role="form" id = "employee_reg"  action="">		
											<div id = 'emp' style='dislay:none;'>
												<div class = 'col-md-12 col-xs-12'><h1>Employee Details</h1></div> 
												<div id = "statusdiv2" class="row">
													<div class="col-xs-12">
														<p id="status2" class="alert fade in" style="padding:3px;"></p>
													</div>
												</div>
												
												<input name='action' value='create' type='hidden'>
												
												<div class="form-group">
													<div class="col-md-6 form-group">
														<label>First Name</label>
														<input class="form-control" type="text" placeholder="First Name" id= "first_name" name="first_name" required>
													</div>
													
													<div class="col-md-6 form-group">
														<label>Last Name</label>										
														<input class="form-control" type="text" placeholder="Last Name" id="last_name" name="last_name" required>
													</div>
												</div>

												<div class="form-group">
													<label>Email Id</label>
													<input class="form-control" type="text" placeholder="Email id" id="email" name="email" required>
												</div>

												<div class="form-group">
													<label>Contact Number</label>
													<input class="form-control" type="text" placeholder="Contact Number" id="contact" name="contact" required>
												</div>
												<input name='startup_id' id='startup_id' type='hidden'>
												<input name='primary' id='primary'type='hidden'>
												<div class = 'col-md-4 col-xs-2'></div>
												<button type="submit" class="col-md-4 col-xs-8 btn btn-success"> <i class="icon-arrow-left"></i>Submit</button>
											</div>
										</form>	
									</div>
							
									<div id='booking_launchpad' class='col-md-12 col-xs-12' style="display:none">
										<br>
										<?php echo file_get_contents('http://localhost/ssad/source/controller/get_empty_desks.php?space=Launchpad+A&side=left');?>
										<div id='col-md-4 col-xs-2'></div>
										<button type="button" class="col-md-4 col-xs-8 btn btn-success" id='booking_submit'> <i class="icon-arrow-left"></i>Submit</button>
									</div>
									<div id='booking_leased' class='col-md-12 col-xs-12' style="display:none">
										<br>
										<?php echo file_get_contents('http://localhost/ssad/source/controller/get_empty_desks.php?space=Launchpad+A&side=left');?>
										<div id='col-md-4 col-xs-2'></div>
										<button type="button" class="col-md-4 col-xs-8 btn btn-success" id='booking_submit'> <i class="icon-arrow-left"></i>Submit</button>
									</div>
									<div id='booking_propel' class='col-md-12 col-xs-12' style="display:none">
										<br>
										<?php echo file_get_contents('http://localhost/ssad/source/controller/get_empty_desks.php?space=Launchpad+A&side=left');?>
										<div id='col-md-4 col-xs-2'></div>
										<button type="button" class="col-md-4 col-xs-8 btn btn-success" id='booking_submit'> <i class="icon-arrow-left"></i>Submit</button>
									</div>
								
								</div>
							</div>
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
<!--Common js-->
<script src="../asset/js/jquery.js"></script>
<script src="../asset/js/bootstrap.js"></script>
<script src="../asset/js/demo.js"></script>  
<script src="../asset/js/scripts.js"></script>
<script src="../asset/js/demo-skin-changer.js"></script>
<script src="../asset/js/jquery.nanoscroller.min.js"></script> 
<script src="../asset/js/jquery.maskedinput.min.js"></script>

<!--Page specific js-->
<script src="../asset/js/bootstrap-datepicker.js"></script>
<script src="../asset/js/daterangepicker.js"></script>
<script src="../asset/js/bootstrap-timepicker.min.js"></script>
<script src="../asset/js/jquery.pwstrength.js"></script>
<script src="../asset/js/wizard.js"></script>


<script type="text/javascript">
	$("#register_startup").addClass("active");
</script>
<script type="text/javascript">
	var startupid;
	var total;
	var num;
	var obj;
	$("#start_up").on('submit',(function(e) {
		e.preventDefault();
		var formData = $(this).serializeArray();
		for (var i = formData.length - 1; i >= 0; i--) {
			formData[i] = formData[i]['name'] + '=' + formData[i]['value'];
		};
		formData = formData.join('&')
		$.ajax({
			url: "../controller/startup.php",
			type: 'GET',
			data: formData,
			contentType: false,
			cache: false,
			processData:false,

			success: function(msg){
			obj = JSON.parse(msg);
				if(obj['status'] == false){
				document.getElementById("status").innerHTML = "<i class='fa fa-warning fa-fw fa-lg'></i>"+obj['msg'];
				document.getElementById("status").className += " alert-warning";
				}
				else {
				//Success of this function
				startupid = obj['id'];
				document.getElementById('startup_id').value = obj['id'];
				document.getElementById('start_up').style.display = "none"; 
				document.getElementById('employee_reg').style.display = "inline"; 
				document.getElementById("step1").className = "";
				document.getElementById("step2").className = "active";
				document.getElementById("step1_1").className = "badge badge-success";
				document.getElementById("step2_1").className = "badge badge-primary";	
					num = total = document.getElementById('employee_num').value;
				}
			},
			error: function(){
			console.log("Connection Error");

			}
		});		
	}));

	$("#employee_reg").on('submit',(function(e) {
		generate(num, total);
		e.preventDefault();
		var formData = $(this).serializeArray();
		
		for (var i = formData.length - 1; i >= 0; i--) {
			formData[i] = formData[i]['name'] + '=' + formData[i]['value'];
		};
		
		formData = formData.join('&')
		
		$.ajax({
			url: "../controller/startup_member.php",
			type: 'GET',
			data: formData,
			contentType: false,
			cache: false,
			processData:false,

			success: function(msg){
				var obj = JSON.parse(msg);
				if(obj['status'] == false){
					document.getElementById("status2").innerHTML = "<i class='fa fa-warning fa-fw fa-lg'></i>"+obj['msg'];
					document.getElementById("status2").className += " alert-warning";
				}
				else {
					if(num>1){
						document.getElementById('first_name').value = "";
						document.getElementById('last_name').value = "";
						document.getElementById("email").value = "";
						document.getElementById('contact').value = "";
						num -= 1;
					}
					else{
						document.getElementById("step2").className = "";
						document.getElementById("step3").className = "active";
						document.getElementById("step2_1").className = "badge badge-success";
						document.getElementById("step3_1").className = "badge badge-primary";
						document.getElementById('employee_reg').style.display = "none";
						var s = document.getElementById('spacename').value;
						if(s == 'Launchpad') {
							document.getElementById('booking_launchpad').style.display='inline';
						}
						else if(s == 'Propel') {
							document.getElementById('booking_propel').style.display='inline';
						}
						else if(s == 'Leased Spaces') {
							document.getElementById('booking_leased').style.display='inline';
						}
					}
				}
			},
			error: function(){
				alert("Connection Error");
			}
		});
	}));
	function generate(num,total) {
		if(num==total){
			document.getElementById('primary').value='1';
		}
		else if(num==total-1){
			document.getElementById('primary').value='2';
		}
		else{
			document.getElementById('primary').value='0';	
		}
		document.getElementById('startup_id').value = obj['id'];
	}
</script>
<!-- JS of date picker-->
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


</body>
</html>
