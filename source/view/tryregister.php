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
							<h2>Try the demo wizard bellow</h2>
						</header>
						<div class="main-box-body clearfix">
							<div id="myWizard" class="wizard">
								<div class="wizard-inner">
									<ul class="steps">
										<li data-target="#step1" class="active"><span class="badge badge-primary">1</span>Step 1<span class="chevron"></span></li>
										<li data-target="#step2"><span class="badge">2</span>Step 2<span class="chevron"></span></li>
										<li data-target="#step3"><span class="badge">3</span>Step 3<span class="chevron"></span></li>
										<li data-target="#step4"><span class="badge">4</span>Step 4<span class="chevron"></span></li>
									</ul>
									
								</div>
								<div class="step-content">
									<div class = 'col-md-2'></div>
									<div class="step-pane active col-md-8 col-xs-12" id="step1">
										<form role="form" id = "start_up" action="">
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
													<input name='action' value='create' type='hidden'>
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
												<div id = "statusdiv2" class="row">
													<div class="col-xs-12">
														<p id="status2" class="alert fade in" style="padding:3px;"></p>
													</div>
												</div>
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
												<input name='startup_id' id='startup_id' type='hidden'>
											</div>
										</form>	
									</div>
							
									<div class="step-pane" id="step3">
									</div>

									<div class="step-pane" id="step4">
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

<script src="../asset/js/wizard.js"></script>
<script type="text/javascript">
	$("#register_startup").addClass("active");
</script>
<script type="text/javascript">
	var startupid;
	$("#start_up").on('submit',(function(e) {
		e.preventDefault();
	    $.ajax({
		    url: "../controller/startup.php",
		    type: 'GET',
		    data: new FormData(this),
		    contentType: false,
    		cache: false,
    		processData:false,
		    
		    success: function(msg){
		    	var obj = JSON.parse(msg);
		       	if(obj['status'] == false){
					document.getElementById("status").innerHTML = "<i class='fa fa-warning fa-fw fa-lg'></i>"+msg;
					document.getElementById("status").className += " alert-warning";
				}
		        else {
		    	    startupid = obj['id'];
		    	    document.getElementById('startup_id').value = obj['id'];
		  	 	    document.getElementById('start_up').style.display = "none"; 
		    	    document.getElementById('employee_reg').style.display = "inline"; 
		  		}
		    },
		    error: function()
		    {
		    	alert("Connection Error");
		   	    document.getElementById('startup_id').value = 5;
		    	document.getElementById('start_up').style.display = "none"; 
		        document.getElementById('employee_reg').style.display = "inline"; 
	
		    }
		});
	}));
	var i;
	for(i=0;i<document.getElementById('employee_num').value;i++){
		
  	    document.getElementById('startup_id').value = obj['id'];

		$("#employee_reg").on('submit',(function(e) {
		e.preventDefault();
	    $.ajax({
		    url: "../controller/startup_member.php",
		    type: 'GET',
		    data: new FormData(this),
		    contentType: false,
    		cache: false,
    		processData:false,
		    
		    success: function(msg){
		    	var obj = JSON.parse(msg);
		       	if(obj['status'] == false){
					document.getElementById("status2").innerHTML = "<i class='fa fa-warning fa-fw fa-lg'></i>"+msg;
					document.getElementById("status2").className += " alert-warning";
				}
		        else { 
		  		}
		    },
		    error: function(){
		    	alert("Connection Error");
		    }
		});
	}));
		
	}


</script>
</body>
</html>