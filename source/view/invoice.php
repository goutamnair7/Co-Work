<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Invoice</title>

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
			<div class="main-box clearfix" style="min-height: 820px;">
				
				<div class = 'col-md-2'></div>
				<div class="row col-md-8 col-xs-12">
								<br /><br />
								<div class = 'col-md-12 col-xs-12' style="text-align:center;"><h1>Invoices</h1></div> 
								<br />
								<div class="modal-body">
									<div class = 'col-md-12 col-xs-12'><h2>Generate New Invoice</h2></div> 
									<br />	
									 <div id = "statusdiv" class="row">
										<div class="col-xs-12">
											<p id="status" class="alert fade in" style="padding:3px;"></p>
										</div>
									</div>
									<form action="../controller/invoice_selection.php" method="post">
										<div class="form-group">
											<label>Select Invoice Type</label>
											<select class="form-control" name='invoice_type'>
												<option value="invoice_form" default> General Invoice </option>
												<option value="receipt_form" default> Receipt Invoice </option>
												<option value="purchase_order_form" default> Purchase Order Invoice </option>
												<option value="reimbursement_form" default> Reimbursement </option>
											</select>
										</div>
										<button type="submit" class="btn btn-primary">Generate Invoice</button>
									</form>
									<hr>
									<div class = 'col-md-12 col-xs-12'><h2>Authorisers</h2></div> 
									<br />	
									<div id = "statusdiv" class="row">
										<div class="col-xs-12">
											<p id="status" class="alert fade in" style="padding:3px;"></p>
										</div>
									</div>
									<?php
									require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );
									$name = $mysqli->query("select * from sign_auth;");
									$count = mysqli_num_rows($name);
									$htmlecho = "";
									for ($x=0; $x<$count; $x++) {
										$rows = mysqli_fetch_array($name);
										$idofperson = $rows['id'];
										$nameofperson = $rows['name'];
										$desigofperson = $rows['designation'];
										$companyofperson = $rows['company'];
										$htmlecho = $htmlecho . "<span style='float:left;'><strong>$nameofperson</strong> ($desigofperson) - $companyofperson</span><span style='float:right'><a class='btn btn-sm btn-primary' href='../view/auth_edit.php?id=$idofperson'>Edit</a> <a class='btn btn-sm btn-danger' href='../controller/auth_delete.php?id=$idofperson'>Delete</a></span><br><br>";
									}
									echo "$htmlecho"
									?>
									<br>
									<a class='btn btn-primary' href='register_authoriser.php'>Add New Authoriser</a>
								</div>	
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

<script type="text/javascript">
	$("#invoice").addClass("active");

</script>

</body>
</html>
