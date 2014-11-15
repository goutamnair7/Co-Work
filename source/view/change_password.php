<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Reset Password</title>

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
				
				<div class = 'col-md-2'></div>
				<div class="row col-md-8 col-xs-12">

					<form id='changepass' role="form" action="../controller/change_password.php">
						<br /><br />
						<div class = 'col-md-12 col-xs-12'><h1>Reset Password</h1></div> 
						<br />
						<div class="modal-body">
							
							 <div id = "statusdiv" class="row">
								<div class="col-xs-12">
									<p id="status" class="alert fade in" style="padding:3px;"></p>
								</div>
							</div>
								
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" id="reset_email" type="text" name="email" required>
							</div>

							<div class="form-group">
								<label>Old Password</label>
								<input class="form-control" id="reset_old_password" type="password" name="old_pass" required>
							</div>
							
							<div class="form-group">
								<label>New Password</label>
								<input class="form-control" id="reset_new_password" type="password" name="new_pass" required>
							</div>

							<div class="form-group">
								<label>Confirm Password</label>
								<input class="form-control" id="reset_confirm_password" type="password" name="confirm_pass" required>
							</div>
							<div class='col-md-4 col-xs-2'></div>
							<button type="submit" class="col-xs-8 col-md-4 btn btn-primary">Reset Password</button>

						</div>


					</form>	



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

<!-- page specific js -->
<script src="../asset/js/jquery.pwstrength.js"></script> 

<script type="text/javascript">
	$("#changepass").on('submit',(function(e) {
		e.preventDefault();
		var formData = $(this).serializeArray();
		for (var i = formData.length - 1; i >= 0; i--) {
			formData[i] = formData[i]['name'] + '=' + formData[i]['value'];
		};
		formData = formData.join('&')
		$.ajax({
			url: "../controller/change_password.php",
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
					document.getElementById("status").className = "alert fade in alert-warning";
				}
				else {
				//Success of this function
					document.getElementById("status").innerHTML = "<i class='fa fa-check-circle fa-fw fa-lg'></i>"+obj['msg'];
					document.getElementById("status").className = "alert fade in alert-success";
				}
			},
			error: function(){
				alert("Connection Error");
			}
		});		
	}));

</script>
<script type="text/javascript">
	$("#chpasswd").addClass("active");
</script>
</body>
</html>
