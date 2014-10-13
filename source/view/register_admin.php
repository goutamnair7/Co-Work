<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Register Admin</title>

<link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>


<link href="../asset/css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="../asset/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/elements.css">

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
			<div class="main-box clearfix" style="min-height: 820px;">
				
				<div class = 'col-md-2'></div>
				<div class="row col-md-8 col-xs-12">
			
				
				
<!--				<a data-toggle="modal" href="#adminModal" class="btn btn-primary btn-lg">Admin Register</a>

				<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Register New Admin</h4>
							</div>-->
							<form role="form" action="../controller/admin.php">
								<br /><br />
								<div class = 'col-md-12 col-xs-12'><h1>Admin Details</h1></div> 
								<br />
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

                                    <div class="form-group">
										<input class="form-control" type="hidden" value="create" name="action" required hidden>
                                    </div>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary">Register</button>
								</div>

							</form>	
						<!--</div> 
					</div> 
				</div>--> 
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


<script src="../asset/js/jquery.js"></script>
<script src="../asset/js/bootstrap.js"></script>
<script src="../asset/js/demo.js"></script>  
 
<script src="../asset/js/jquery.maskedinput.min.js"></script>
<script src="../asset/js/jquery.pwstrength.js"></script> 
<script src="../asset/js/scripts.js"></script>

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
<script type="text/javascript">
	$("#register_admin").addClass("active");
</script>
</body>
</html>
