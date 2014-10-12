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


<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
</head>
<body>

<?php include_once 'navbar.php' ?>

<div id="page-wrapper" class="container">
	<div class="row">

		<?php include_once 'navbar-col.php' ?>

		<div id="content-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<div id="error-box">
						<div class="row">
							<div class="col-xs-12" style="min-height: 900px;">
								<div id="error-box-inner">
									<img src="img/error-404-v2.png" alt="Have you seen this page?"/>
								</div>
								<h1>ERROR 404</h1>
								<p>
								Page not found.<br/>
								If you find this page, let us know.
								</p>
								<p>
								Go back to <a href="/">homepage</a>.
								</p>
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

<script src="js/demo-skin-changer.js"></script>  
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.nanoscroller.min.js"></script>
<script src="js/demo.js"></script>  


<script src="js/scripts.js"></script>

</body>
</html>
