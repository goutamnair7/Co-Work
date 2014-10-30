<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Centaurus - Bootstrap Admin Template</title>

<link href="../../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>


<link href="../../asset/css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="../../asset/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="../../asset/css/compiled/elements.css">

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
	require_once( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "../navbar.php" );
?>

<div id="page-wrapper" class="container">
	<div class="row">
		
		<?php
			require_once( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "../navbar-col.php" );
		?>
		
		<div id="content-wrapper">
		<form action="purchase_order.php" method="post">
	To name<input type="text" name="name"></input><br>
	To designation<input type="text" name="desig"></input><br>
	To company<input type="text" name="company"></input><br>
	To address<input type="text" name="add"></input><br>
	Purchase Order<input type="text" name="purchaseorder"></input><br>
	Check To<input type="text" name="checkto"></input><br>
	<hr>
	<strong>Invoice Information</strong><br>
	Description <input type='textbox' name="description"></input><br>
	No of units <input type='number' name='noofunits'></input><br>
	Rate per unit(Rs) <input type='number' name='rate'></input><br>
	<input type="submit" value="GENERATE PDF">
</form>	
			<footer id="footer-bar" class="row">
				<p id="footer-copyright" class="col-xs-12">
				&copy; 2014 <a href="http://www.adbee.sk/" target="_blank">Adbee digital</a>. Powered by Centaurus Theme.
				</p>
			</footer>
		</div>
	</div>
</div>


<script src="../../asset/js/jquery.js"></script>
<script src="../../asset/js/bootstrap.js"></script>
<script src="../../asset/js/demo.js"></script>  
 
<script src="../../asset/js/jquery.maskedinput.min.js"></script>
<script src="../../asset/js/jquery.pwstrength.js"></script> 
<script src="../../asset/js/scripts.js"></script>

<script type="text/javascript">
	$("#invoice").addClass("active");
</script>
</body>
</html>
