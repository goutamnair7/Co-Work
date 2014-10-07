<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Centaurus - Bootstrap Admin Template</title>

<link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>


<link href="../asset/css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" href="../asset/css/libs/nanoscroller.css" type="text/css"/>

<link rel="stylesheet" type="text/css" href="../asset/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/elements.css">

<link rel="stylesheet" href="../asset/css/libs/fullcalendar.css" type="text/css"/>
<link rel="stylesheet" href="../asset/css/libs/fullcalendar.print.css" type="text/css" media="print"/>
<link rel="stylesheet" href="../asset/css/compiled/calendar.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="../asset/css/libs/morris.css" type="text/css"/>
<link rel="stylesheet" href="../asset/css/libs/daterangepicker.css" type="text/css"/>
<link rel="stylesheet" href="../asset/css/libs/jquery-jvectormap-1.2.2.css" type="text/css"/>

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
			<div class="row">				

				<!--INCLUDE CODE HERE-->
				<div class="form-group col-md-3 col-xs-12">
					<label>Select Space</label>
					<select class="form-control">
						<option>Select Space</option>
						<option onclick="viewspace(this.value)">Leased Spaces</option>
						<option onclick="viewspace(this.value)">Propel</option>
						<option onclick="viewspace(this.value)">Launchpad</option>
					</select>
					<a data-toggle="modal"></a>
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

<script type="text/javascript">
	function viewspace(x)
	{
		alert(x);
	}
</script>

<script src="../asset/js/demo-skin-changer.js"></script>  
<script src="../asset/js/jquery.js"></script>
<script src="../asset/js/bootstrap.js"></script>
<script src="../asset/js/jquery.nanoscroller.min.js"></script>
<script src="../asset/js/demo.js"></script>  
<script src="../asset/js/bootstrap-datepicker.js"></script>

<script src="../asset/js/jquery-ui.custom.min.js"></script>
<script src="../asset/js/fullcalendar.min.js"></script>
<script src="../asset/js/jquery.slimscroll.min.js"></script>
<script src="../asset/js/raphael-min.js"></script>
<script src="../asset/js/morris.min.js"></script>
<script src="../asset/js/moment.min.js"></script>
<script src="../asset/js/daterangepicker.js"></script>
<script src="../asset/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../asset/js/jquery-jvectormap-world-merc-en.js"></script>
<script src="../asset/js/gdp-data.js"></script>
<script src="../asset/js/flot/jquery.flot.js"></script>
<script src="../asset/js/flot/jquery.flot.min.js"></script>
<script src="../asset/js/flot/jquery.flot.pie.min.js"></script>
<script src="../asset/js/flot/jquery.flot.stack.min.js"></script>
<script src="../asset/js/flot/jquery.flot.resize.min.js"></script>
<script src="../asset/js/flot/jquery.flot.time.min.js"></script>
<script src="../asset/js/flot/jquery.flot.threshold.js"></script>

<script src="../asset/js/scripts.js"></script>

</body>
</html>
