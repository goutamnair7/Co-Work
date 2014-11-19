<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: DashBoard</title>

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
<!--				<a data-toggle="modal" href="#adminModal" class="btn btn-primary btn-lg">Admin Register</a>

				<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Register New Admin</h4>
							</div>-->
							<form action="template/reimbursement.php" method="post">
								<br /><br />
								<div class = 'col-md-12 col-xs-12'><h1>Reimbursement</h1></div> 
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
										<label>Invoice Number</label>
										<input class="form-control" type="text" placeholder="Invoice Number" name="inum" required>
									</div>

									<div class="form-group">
										<label>Reimbursement to</label>
										<input class="form-control" type="text" placeholder="Name" name="name" required>
									</div>

									<div class="form-group">
										<label>Reason</label>
										<input class="form-control" type="text" placeholder="Reason for reimbursement" name="reason" required>
									</div>
									
									<div class="form-group">
										<label>Name of beneficiary</label>
										<input class="form-control" type="text" placeholder="Name of beneficiary" name="bname" required>
									</div>
                                    
                                    <div class="form-group">
										<label>Account to be debited from:</label>
										<input class="form-control" type="text" placeholder="Account" name="account" required>
									</div>
									
                                    <div class="form-group">
										<label>Enclosures</label>
										<input class="form-control" type="text" placeholder="Enclosures" name="enclosure" required>
									</div>

									<div class = 'col-md-12 col-xs-12'><h2>Reimbursement Information</h2></div> 
									<br />

									<div id = "statusdiv" class="row">
										<div class="col-xs-12">
											<p id="status" class="alert fade in" style="padding:3px;"></p>
										</div>
									</div>
									<label><strong>Element 1</strong></label>
									<div class="form-group">
										<label>Date on Bill</label>
										<input class="form-control" type="date" placeholder="Date on Bill" name="date1" required>
									</div>
									<div class="form-group">
										<label>Cheque Number</label>
										<input class="form-control" type="number" placeholder="Cheque Number" name="number1" required>
									</div>
									<div class="form-group">
										<label>Description</label>
										<input class="form-control" type="text" placeholder="Description" name="description1" required>
									</div>
									<div class="form-group">
										<label>Amount (Rs)</label>
										<input class="form-control" type="number" placeholder="Amount (Rs)" name="amount1" required>
									</div>
									<input type='hidden' value='1' id='total' name='total'>
									<div id = 'add'>
									</div>

									<button class="btn btn-primary" onclick="add_element()">Add one Element</button>
									<br><br>
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
										<select class="form-control" name='leftauth'>
											<option value="none" default> --- </option>
											<?php echo "$htmlecho"; ?>
										</select>
									</div>
									<div class="form-group">
										<label>Right Authorizaion</label>
										<select class="form-control" name='rightauth'>
											<option value="none" default> --- </option>
											<?php echo "$htmlecho"; ?>
										</select>
									</div>

								</div>

									<button type="submit" class="btn btn-primary">Generate PDF</button>

							</form>
							<br>
						<!--</div> 
					</div> 
				</div>--> 
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

<!-- Page specific js -->
<script>

counter = 2;
function add_element()
{
	var add = document.getElementById('add');

    _date = Array();
    desc = Array();
    _number = Array();
    amount = Array();
    _date[counter-1] = document.getElementsByName("date"+String(counter-1))[0].value;
    desc[counter-1] = document.getElementsByName("description"+String(counter-1))[0].value;
    _number[counter-1] = document.getElementsByName("number"+String(counter-1))[0].value;
    amount[counter-1] = document.getElementsByName("amount"+String(counter-1))[0].value;

	add.innerHTML += '<label><strong>Element ' +counter+ '</strong></label>'
	add.innerHTML += '<div class="form-group"><label>Date</label><input class="form-control" type="date" placeholder="Date" name="date'+ counter +'" required></div>';
	add.innerHTML += '<div class="form-group"><label>Cheque Number</label><input class="form-control" type="number" placeholder="Cheque Number" name="number' + counter +'" required></div>';
	add.innerHTML += '<div class="form-group"><label>Description</label><input class="form-control" type="text" placeholder="Description" name="description'+ counter +'" required></div>';
	add.innerHTML += '<div class="form-group"><label>Amount (Rs)</label><input class="form-control" type="number" placeholder="Amount (Rs)" name="amount' +counter+ '" required></div>';
	document.getElementById('total').value = counter; 

    for(i=counter-1;i>=2;i--)
    {
        document.getElementsByName("date"+String(i))[0].value = _date[i];
        document.getElementsByName("description"+String(i))[0].value = desc[i];
        document.getElementsByName("number"+String(i))[0].value = _number[i];
        document.getElementsByName("amount"+String(i))[0].value = amount[i];
    }

	counter++;
}

</script>
</body>
</html>
