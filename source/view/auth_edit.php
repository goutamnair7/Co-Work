<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Edit Authors</title>

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
					<?php
					require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );
					$id = $_GET['id'];
					$query = "SELECT * FROM sign_auth WHERE id=$id";
					$result = $mysqli->query($query);
					$rows = mysqli_fetch_array($result);
					$name = $rows['name'];
					$design = $rows['designation'];
					$company = $rows['company'];
					?>
					<form action="../controller/auth_edit.php" method="post">
						<br /><br />
						<div class = 'col-md-12 col-xs-12'><h1>Edit Authorisers</h1></div> 
						<br />
						<div class="modal-body">
							<div class = 'col-md-12 col-xs-12'><h2><?php echo "$name"; ?></h2></div> 
							<br />	
							<div id = "statusdiv" class="row">
								<div class="col-xs-12">
									<p id="status" class="alert fade in" style="padding:3px;"></p>
								</div>
							</div>

							<div class="form-group">
								<input class="form-control hidden" type="number" placeholder="ID" name="id"  value=<?php echo "'$id'"; ?> required>
							</div>
										
							<div class="form-group">
								<label>Name</label>
								<input class="form-control" type="text" placeholder="Name" name="name"  value=<?php echo "'$name'"; ?> required>
							</div>

							<div class="form-group">
								<label>Designation</label>
								<input class="form-control" type="text" placeholder="Designation" name="desig"  value=<?php echo "'$design'"; ?> required>
							</div>

							<div class="form-group">
								<label>Company</label>
								<input class="form-control" type="text" placeholder="Company" name="company"  value=<?php echo "'$company'"; ?> required>
							</div>
									
									
						</div>

						<button type="submit" class="btn btn-primary">Edit Information</button>

					</form>	 
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
	$("#invoice").addClass("active");
</script>

</body>
</html>
