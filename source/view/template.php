<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Centaurus - Bootstrap Admin Template</title>

<!--Common Styles -->
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

<script type="text/javascript">
	$("#pagenamehere").addClass("active");
</script>
</body>
</html>
