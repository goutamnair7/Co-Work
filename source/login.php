<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Login</title>

<link href="css/bootstrap/bootstrap.css" rel="stylesheet"/>

<link href="css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="css/compiled/elements.css">


<!--link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'-->

<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

</head>
<body id="login-page-full">
<div id="login-full-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div id="login-box">
					<div class="row">
						<div class="col-xs-12">
							<header id="login-header">
								<div id="login-logo">
									<img src="img/logo.png" alt=""/>
								</div>
							</header>
							<div id="login-box-inner">
							    <div id = "statusdiv" class="row">
									<div class="col-xs-12">
										<p id="status" class="alert fade in" style="padding:3px;"></p>
									</div>
								</div>
								<form role="form" action="scripts/check_login.php">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input class="form-control" type="text" placeholder="Email address" name="email">
									</div>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-key"></i></span>
										<input type="password" class="form-control" placeholder="Password" name="password">
									</div>
									<div id="remember-me-wrapper">
										<div class="row">
											<div class="col-xs-6">
												<div class="checkbox-nice">
													<input type="checkbox" id="remember-me" checked="checked"/>
													<label for="remember-me">
														Remember me
													</label>
												</div>
											</div>
											<a href="#" id="login-forget-link" class="col-xs-6">
												Forgot password?
											</a>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<button type="submit" class="btn btn-success col-xs-12">Login</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

<script type="text/javascript">
	var status = "<?php echo $_GET['status'] ?>";
	var msg = "<?php echo $_GET['message'] ?>";
	
	if(status.toLowerCase() == "fail"){
		document.getElementById("status").innerHTML = "<i class='fa fa-warning fa-fw fa-lg'></i>"+msg;
		document.getElementById("status").className += " alert-warning";
	}
	else{
		document.getElementById("statusdiv").style.display = "none";
	}

</script>

<script src="js/scripts.js"></script>

</body>
</html>
