<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: DashBoard</title>

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
							<form action="template/receipt.php" method="post">
								<br /><br />
								<div class = 'col-md-12 col-xs-12'><h1>Receipt</h1></div> 
								<br />
								<div class="modal-body">
									<div class = 'col-md-12 col-xs-12'><h2>General Information</h2></div> 
									<br />	
									 <div id = "statusdiv" class="row">
										<div class="col-xs-12">
											<p id="status" class="alert fade in" style="padding:3px;"></p>
										</div>
									</div>
										
									<div class="form-group">
										<label>Name</label>
										<input class="form-control" type="text" placeholder="Name" name="name" required>
									</div>

									<div class="form-group">
										<label>Designation</label>
										<input class="form-control" type="text" placeholder="Designation" name="desig" required>
									</div>
									
									<div class="form-group">
										<label>Company</label>
										<input class="form-control" type="text" placeholder="Company" name="company" required>
									</div>

									<div class="form-group">
										<label>Address</label>
										<input class="form-control" type="text" placeholder="Password" name="add" required>
									</div>
									
                                    <div class="form-group">
										<label>Date</label>
										<input class="form-control" type="date" placeholder="Date" name="date" required>
									</div>

                                    <div class="form-group">
										<label>Received From</label>
										<input class="form-control" type="text" placeholder="Received from" name="from" required>
                                    </div>

									<div class="form-group">
										<label>Amount Received</label>
										<input class="form-control" type="number" placeholder="Amount Received" name="sum" required>
                                    </div>
                                    <div class="form-group">
										<label>Start Date</label>
										<input class="form-control" type="date" placeholder="Start Date" name="start" required>
                                    </div>
                                    <div class="form-group">
										<label>End Date</label>
										<input class="form-control" type="date" placeholder="End Date" name="end" required>
                                    </div>

                                    <div class = 'col-md-12 col-xs-12'><h2>Authorization Information</h2></div> 
									<br />
									<?php
										require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );
										$name = $mysqli->query("select * from sign_auth;");
										$count = mysqli_num_rows($name);
										$htmlecho = "";
										for ($x=0; $x<$count; $x++) {
											$rows = mysqli_fetch_array($name);
											$nameofperson = $rows['name'];
											$htmlecho = $htmlecho . "<option value='$nameofperson'> $nameofperson </option>";
										}
									?>
									<div id = "statusdiv" class="row">
										<div class="col-xs-12">
											<p id="status" class="alert fade in" style="padding:3px;"></p>
										</div>
									</div>

									<div class="form-group">
										<label>Left Authorization</label>
										<select name='leftauth'>
											<option value="none" default> --- </option>
											<?php echo "$htmlecho"; ?>
										</select>
                                    </div>
                                    <div class="form-group">
										<label>Right Authorizaion</label>
										<select name='rightauth'>
											<option value="none" default> --- </option>
											<?php echo "$htmlecho"; ?>
										</select>
                                    </div>
                                    
								</div>

									<button type="submit" class="btn btn-primary">Generate PDF</button>

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
	$("#dashboard").addClass("active");
</script>
</body>
</html>
