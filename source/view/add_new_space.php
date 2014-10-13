<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Add Space</title>
<link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>

<!--Common Styles -->
<link href="../asset/css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/elements.css">
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

<!-- Page specific Styles -->
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/wizard.css">

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
									</ul>
								</div>
								<div class="step-content">
									<div class = 'col-md-2'></div>
									<div class="step-pane active col-md-8 col-xs-12" id="step1">
										
										<form role="form" id = "add_space" action="" onsubmit="">
											<div class="modal-body">
												<div id = "statusdiv" class="row">
													<div class="col-xs-12">
														<p id="status" class="alert fade in" style="padding:3px;"></p>
													</div>
												</div>	
											
												<div class="form-group">
													<label>Type Of Space</label>
														<select class="form-control" id = 'type' name="type" required>
															<option onclick='showrows()'>Co-Working</option>
															<option onclick='hiderows()'>Room</option>
														</select>
												</div>
											
												<input name="action" value="create" hidden>
												<div class="form-group" id='namediv'>
													<label>Name Of Space</label>
													<input class="form-control" type="text" placeholder="Space Name" id='name' name="name">
												</div>

												<div class="form-group" id='rowdiv'>
													<label>Number Of Rows</label>
													<input value = '0' class="form-control" type="text" placeholder="Number of Rows" id='rows' name="rows" required>
												</div>
									
												<div class = 'col-md-4 col-xs-2'></div>
													<button type="submit" class="col-md-4 col-xs-8 btn btn-success"> <i class="icon-arrow-left"></i>Submit</button>
												</div>
										</form>	

										<form role="form" id = "columns" action="" onsubmit="" style='display:none;'>
											<input name='space_id' value='' type='hidden' id='space_id'>

										</form>

										<form role="form" id = "dimensions" action="" onsubmit="" style='display:none;' required>
											<div class="form-group">
												<label>Length</label>
												<input class="form-control" type="text" placeholder="Length" name="length" required>
											</div>
											<div class="form-group">
												<label>Width</label>
												<input class="form-control" type="text" placeholder="Width" name="width" required>
											</div>
											<div class="form-group">
												<label>Area</label>
												<input class="form-control" type="text" placeholder="Area" name="area" required>
											</div>
											<div class="form-group">
												<label>Number of Desks</label>
												<input class="form-control" type="text" placeholder="Number of Desks" name="desks" required>
											</div>
											<div class="form-group">
												<label>Side</label>
												<select class="form-control" id = 'typeofspace' name="type" required>
													<option>Left</option>
													<option>Right</option>
												</select>
											</div>
											<input name='room_id' value='' type='hidden' id='room_id'>

											<button type="submit" class="col-md-4 col-xs-8 btn btn-success"> <i class="icon-arrow-left"></i>Submit</button>

										</form>	
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
	$("#newspace").addClass("active");
</script>
<script type="text/javascript">
	function showrows(){
		document.getElementById('rowdiv').style.display = '';
		document.getElementById('namediv').style.display = '';
	}
	function hiderows(){
		document.getElementById('rowdiv').style.display = 'none';
		document.getElementById('namediv').style.display = 'none';
		document.getElementById('rows').value = '0';
		document.getElementById('name').value = '';
	}

</script>

<script type="text/javascript">

$("#add_space").on('submit',(function(e) {
	e.preventDefault();
	var formData = $(this).serializeArray();
	for (var i = formData.length - 1; i >= 0; i--) {
		formData[i] = formData[i]['name'] + '=' + formData[i]['value'];
	};
	formData = formData.join('&')
	console.log("submitted");
	if(document.getElementById('type') == 'Room'){
		document.getElementById('add_space').style.display = "none";
		document.getElementById('dimensions').style.display = ""; 	
		document.getElementById("step1").className = "";
		document.getElementById("step2").className = "active";
		document.getElementById("step1_1").className = "badge badge-success";
		document.getElementById("step2_1").className = "badge badge-primary";				
	}
	else{
		$.ajax({
			url: "../controller/space.php",
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
					document.getElementById('add_space').style.display = "none";

					document.getElementById('space_id').value = obj['space_id'];
					console.log(obj);
					document.getElementById('columns').style.display = ""; 
					num = total = document.getElementById('rows').value;
					var i;
					for(i=1;i<=num;i++){
						document.getElementById('columns').innerHTML += '<div class="form-group"><label>Number of columns in Row '+i+'</label><input class="form-control" type="text" placeholder="Columns" name="columns" id="row'+i+'" required></div>';
					}
					document.getElementById('columns').innerHTML += '<button type="submit" class="col-md-4 col-xs-8 btn btn-success"> <i class="icon-arrow-left"></i>Submit</button>';

					document.getElementById("step1").className = "";
					document.getElementById("step2").className = "active";
					document.getElementById("step1_1").className = "badge badge-success";
					document.getElementById("step2_1").className = "badge badge-primary";
				}
			},
			error: function(){
				alert("Connection Error");
			}
		});
	}
}));
</script>

<script type="text/javascript">

$("#columns").on('submit',(function(e) {
	e.preventDefault();
	var i, num = document.getElementById('rows').value, spaceid=document.getElementById('space_id').value;
	var arr = [];
	for(i=1;i<=num;i++)
		{arr[i-1] = document.getElementById('row'+i).value;
			console.log(document.getElementById('row'+i))
		}
	$.ajax({
		url: "../controller/desk.php",
		type: 'GET',
		data: "action=create&space_id="+spaceid+"&desk_count_array="+JSON.stringify(arr),
		contentType: false,
		cache: false,
		processData:false,

		success: function(msg){
			
			obj = JSON.parse(msg);
			console.log(obj);
			if(obj['status'] == false){
				document.getElementById("status").innerHTML = "<i class='fa fa-warning fa-fw fa-lg'></i>"+obj['msg'];
				document.getElementById("status").className += " alert-warning";
			}
			else {
			//Success of this function
				startupid = obj['id'];
				document.getElementById('dimensions').style.display = "none";
				document.getElementById("step2").className = "";
				document.getElementById("step3").className = "active";
				document.getElementById("step2_1").className = "badge badge-success";
				document.getElementById("step3_1").className = "badge badge-primary";
			}
		},
		error: function(){
			alert("Connection Error");
		}
	});
}));
</script>

<script type="text/javascript">

$("#dimensions").on('submit',(function(e) {
	e.preventDefault();
	var i, num = document.getElementById('rows'), spaceid=document.getElementById('space_id').value;
	var arr = [];
	for(i=1;i<=num;i++)
		arr[i-1] = document.getElementById('row'+i).value;
	$.ajax({
		url: "../controller/room.php",
		type: 'GET',
		data: "space_id="+spaceid+"&desk_count_array="+JSON.stringify(arr),
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
				document.getElementById('dimensions').style.display = "none";
				document.getElementById("step2").className = "";
				document.getElementById("step3").className = "active";
				document.getElementById("step2_1").className = "badge badge-success";
				document.getElementById("step3_1").className = "badge badge-primary";
			}
		},
		error: function(){
			alert("Connection Error");
		}
	});
}));
</script>

</body>
</html>