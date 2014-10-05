<!DOCTYPE html>
<?php

session_start();

if(isset($_SESSION['user_type']))
{
	$url = "";
	if($_SESSION['user_type']=="admin")
		$url = "./dashboard.php";
	else if($_SESSION['user_type']=="startup")
		$url = "./startup_home.php";
	if($url == "")
		session_destroy();
	else
		header("location: ".$url);
}
?>

<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Login</title>

<link href="../asset/css/bootstrap/bootstrap.css" rel="stylesheet"/>
<link href="../asset/css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/elements.css">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

</head>

<body id="login-page">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div id="login-box">
					<div class="row">
						<div class="col-xs-12">
							<div id="login-box-inner">
							    <div id = "statusdiv" class="row">
									<div class="col-xs-12">
										<p id="status" class="alert fade in" style="padding:3px;"></p>
									</div>
								</div>
								<form role="form" action="../controller/check_login.php">
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
											<div class="col-md-3 col-xs-3">	</div>
											<button type="submit" class="btn btn-success col-xs-6 col-md-6">Login</button>
											<div class="col-md-3 col-xs-3"></div>
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

<script src="../asset/js/jquery.js"></script>
<script src="../asset/js/bootstrap.js"></script>

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

<script src="../asset/js/scripts.js"></script>

</body>
</html>
