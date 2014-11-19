<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Register Startup</title>

<!--Common Styles -->
<link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>
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
										<br />
											<div class="modal-body">
												<div class = 'col-md-12 col-xs-12' style="text-align:center;"><h1>Startup Details</h1></div> 
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
																<?php
																	require_once("../model/config_sql.php" );
																	
																	$sql = $mysqli->query("SELECT * FROM spaces");

																	while($row = $sql->fetch_assoc())
																		echo "<option class = '" .$row['type']. "' id = '" .$row['name']. "'>".$row['name']."</option>";
																?>
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
															<input id='employee_num' class="form-control" type="number" placeholder="Number of Employees" name="employees" required>
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
													<input class="form-control" type="number" placeholder="Contact Number" id="contact" name="contact" required>
												</div>
												<input name='startup_id' id='startup_id' type='hidden'>
												<input name='primary' id='primary'type='hidden'>
												<div class = 'col-md-4 col-xs-2'></div>
												<button type="submit" class="col-md-4 col-xs-8 btn btn-success"> <i class="icon-arrow-left"></i>Submit</button>
											</div>
										</form>	
									</div>
									<br />
									<div id='desks_view'>
										<br />
										<div class='col-md-4'></div>
										<div class='col-md-4'> 
											<form action="#" id='desk_selection'> 
											</form>
										<div class='col-md-4'></div>
									</div>
									
									<div id='rooms_view'>
										<br />
										<div class='col-md-4'></div>
										<div class='col-md-4' style='align'>
											<form action="#" id='room_selection'>
											</form>
										</div>
										<div class='col-md-4' style='margin-left:100px;'>
											<br />
											<br />
											<br />
											<div id='display_room_details' class='col-md-12'>
											</div>
										</div>
									</div>
									
									<div class="alert alert-success fade in" id="success_display" style="margin: 100px 0; display:none;">
										<i class="fa fa-check-circle fa-fw fa-lg"></i>
										<strong>Congratulations!</strong> You have successfully added a new space.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--<footer id="footer-bar" class="row">
			</footer> -->
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
				console.log(msg);
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
			alert("Connection Error");

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
				console.msg(msg);
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
						display();
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


<script type="text/javascript">

var global_obj;

function display(){
	var selected_space = document.getElementById('spacename');
	if(document.getElementById(selected_space.value).className == 'Co-Working'){
		display_desks();
	}
	else{
		total = 1;
		display_rooms();
	}
}

function display_desks()
{		
	var d = new Date();
	$.ajax({
		url: "../controller/desk.php",
		type: 'GET',
		data: "action=show_by_space_name&space="+document.getElementById('spacename').value+"&month="+(d.getMonth()+1)+"&year="+(d.getYear()+1900),

		contentType: false,
		cache: false,
		processData:false,

		success: function(msg){
			console.log(msg);
			var obj = JSON.parse(msg);
			global_obj = msg;
			var length = obj.length;
			var str='<div class = "col-md-12 col-xs-12"><h1>Select Desks</h1></div><br />';
			str += "<table style='font-size: 0.8em; text-align: center'>";
			for (var i = 0; i < length; i++) {
				str += "<tr>";
				for (var j = 0; j < obj[i].length; j++) {
					str += "<td>";
					if(obj[i][j].startup_id==0){
						var id = "'" + i + '-' + j + "'";
						str += "<img src='../asset/img/not_selected.png' id='" + i + "-" + j + "' class='not_selected'";
						str += ' onclick="change_image_desks('+id+')" /><br>'+obj[i][j].label;
			//			console.log(str);
					}
					else if(obj[i][j].startup_id==-1){
		//				str+= "<img src='../asset/img/not_available.png' id='" + i + "-" + j + "' class='not_available'/>";
					}
					else {
						str+= "<img src='../asset/img/booked.png' id='" + i + "-" + j + "' class='booked'/><br>"+obj[i][j].label;
					}
					str += "</td><td>&nbsp;&nbsp;</td>";
				};
				str+="</tr>";

			};
			str += "</table>";
			str+='<br /><button class="btn btn-success" id="desk_submit"> Submit </button>';
			document.getElementById('desk_selection').innerHTML=str;
		//	document.getElementById('display_room').innerHTML='';
		},
		error: function(){
			alert("Connection Error");
		}
	});

}

function display_rooms()
{		
	var d = new Date();
	$.ajax({
		url: "../controller/desk.php",
		type: 'GET',
		data: "action=show_by_space_name&space="+document.getElementById('spacename').value+"&month="+(d.getMonth()+1)+"&year="+(d.getYear()+1900),

		contentType: false,
		cache: false,
		processData:false,

		success: function(msg){
			console.log(msg);
			var obj = JSON.parse(msg);
			global_obj = msg;
			var length = obj.length;
			var str='<div class = "col-md-12 col-xs-12"><h1>Select Room</h1></div><br />';
			for (var i = 0; i < length; i++) {
				for (var j = 0; j < obj[i].length; j++) {
					//obj[i][j] = obj[i][j].startup_id;
					if(obj[i][j].startup_id == 0){
						var id = "'" + i + '-' + j + "'";
						str += "<img src='../asset/img/not_selected.png' id='" + obj[i][j].desk_id + "' class='not_selected'";
						str += ' onclick="change_image_rooms('+obj[i][j].desk_id+')" />';
			//			console.log(str);
					}
					else if(obj[i][j].startup_id == -1){
		//				str+= "<img src='../asset/img/not_available.png' id='" + i + "-" + j + "' class='not_available'/>";
					}
					else {
						str+= "<img src='../asset/img/booked.png' id='" + i + "-" + j + "' class='booked'/>";
					}
 
				};
				str+="<br />";

			};
			str+='<br /><button class="btn btn-success" id="desk_submit"> Submit </button>';
			document.getElementById('room_selection').innerHTML=str;
		//	document.getElementById('display_room').innerHTML='';
		},
		error: function(){
			alert("Connection Error");
		}
	});

}
</script>

<script type="text/javascript">

counter = 0;
var bookedImage = new Image();
bookedImage.src = "../asset/img/booked.png";

var selectedImage = new Image();
selectedImage.src = "../asset/img/selected.png";

var notSelectedImage = new Image();
notSelectedImage.src = "../asset/img/not_selected.png";

function change_image_rooms(id){

	if(document.getElementById(id).src == notSelectedImage.src){
		if(counter < total){
			document.getElementById(id).src = selectedImage.src;
			document.getElementById(id).className = 'selected';
			counter++;
		}
	}
	else{
		document.getElementById(id).src = notSelectedImage.src;
		document.getElementById(id).className = 'not_selected';
		counter--;
	}
	$.ajax({
		url: "../controller/room.php",
		type: 'GET',
		data: "action=show&id=" + id,

		contentType: false,
		cache: false,
		processData:false,

		success: function(msg){
			var obj = JSON.parse(msg);
		//	if(obj['status']) {
				var roomdetails = obj['row'];
				console.log(roomdetails);
				var roomdetails = obj['row'];
				console.log(roomdetails);
				str = "<b>Room id: </b>"+roomdetails['id']+"<br />";
				str += "<b>Area: </b>"+roomdetails['area']+"<br />";
				str += "<b>Desks: </b>"+roomdetails['desks']+"<br />";
				str += "<b>Side: </b>"+roomdetails['side']+"<br />";
				document.getElementById('display_room_details').innerHTML = str;
				//document.getElementById('display_cowork').innerHTML = "Room width : " + roomdetails['width'];
			//	console.log(obj);
		//	}
			//else {
			//	document.getElementById('display_cowork').innerHTML = "Startup Name : Not Booked";
			//}
		},
		error: function(){
			alert("Connection Error");
		}
	});
}	


function change_image_desks(id){

	if(document.getElementById(id).src == notSelectedImage.src){
		if(counter < total){
			document.getElementById(id).src = selectedImage.src;
			document.getElementById(id).className = 'selected';
			counter++;
		}
	}
	else{
		document.getElementById(id).src = notSelectedImage.src;
		document.getElementById(id).className = 'not_selected';
		counter--;
	}
}	

</script>

<script type="text/javascript">

	$("#desk_selection").on('submit',(function() {
		if(counter !=total){
			alert("Please select " + total + " desk(s)");
		}
		else{
	
			var obj = JSON.parse(global_obj);
			console.log(obj);
			var form_data = [];
			for (var i = 0; i < obj.length; i++) {
				for (var j = 0; j < obj[i].length; j++) {
					var id = i + '-' + j;
					console.log(id);
					if( document.getElementById(id).src == selectedImage.src) {
						form_data.push(obj[i][j].desk_id);
						console.log("INSIDE");
					}
	 			};
			};
			form_data = "desks=" + JSON.stringify(form_data);
			form_data +='&action=book';
			form_data +='&start_date=' + document.getElementById('datepickerjoin').value;
			form_data +='&end_date=' + document.getElementById('datepickerend').value;
			form_data +='&startup_id=' + document.getElementById('startup_id').value;

			console.log(form_data);

			$.ajax({
				url: "../controller/desk.php",
				type: 'GET',
				data: form_data,
				contentType: false,
				cache: false,
				processData:false,

				success: function(msg){
					console.log(msg);
					obj = JSON.parse(msg);
					if(obj['status'] == false){
						document.getElementById("status").innerHTML = "<i class='fa fa-warning fa-fw fa-lg'></i>"+obj['msg'];
						document.getElementById("status").className += " alert-warning";
					}
					else {
					//Success of this function
						document.getElementById('desk_selection').style.display = "none";
						document.getElementById("step3").className = "";
						document.getElementById("step4").className = "active";
						document.getElementById("step3_1").className = "badge badge-success";
						document.getElementById("step4_1").className = "badge badge-primary";
						document.getElementById("success_display").style.display = "";
					}
				},
				error: function(){
					alert("Connection Error");
				}
			});
		}
	}));


	$("#room_selection").on('submit',(function() {
		if(counter != total){
			alert("Please select " + total + " room");
		}
		else{
	
			var obj = JSON.parse(global_obj);
			console.log(obj);
			var form_data;
			for (var i = 0; i < obj.length; i++) {
				for (var j = 0; j < obj[i].length; j++) {
					var id = obj[i][j].desk_id;
					console.log(id);
					if( document.getElementById(id) && document.getElementById(id).src == selectedImage.src) {
						form_data = obj[i][j].desk_id;
						console.log("INSIDE");
					}
	 			};
			};
			form_data = "room_id=" + form_data;
			form_data +='&action=book';
			form_data +='&start_date=' + document.getElementById('datepickerjoin').value;
			form_data +='&end_date=' + document.getElementById('datepickerend').value;
			form_data +='&startup_id=' + document.getElementById('startup_id').value;

			console.log(form_data);

			$.ajax({
				url: "../controller/room.php",
				type: 'GET',
				data: form_data,
				contentType: false,
				cache: false,
				processData:false,

				success: function(msg){
					console.log(msg);
					obj = JSON.parse(msg);
					if(obj['status'] == false){
						document.getElementById("status").innerHTML = "<i class='fa fa-warning fa-fw fa-lg'></i>"+obj['msg'];
						document.getElementById("status").className += " alert-warning";
					}
					else {
					//Success of this function
						document.getElementById('room_selection').style.display = "none";
						document.getElementById('display_room_details').style.display = "none";
						document.getElementById("step3").className = "";
						document.getElementById("step4").className = "active";
						document.getElementById("step3_1").className = "badge badge-success";
						document.getElementById("step4_1").className = "badge badge-primary";
						document.getElementById("success_display").style.display = "";
					}
				},
				error: function(){
					alert("Connection Error");
				}
			});
		}
	}));
</script>

</body>
</html>