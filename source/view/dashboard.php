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

<!--<style>
#emp {
	display : none;
}
#empbut {
	display : none;
}
#back {
	display : none;
}
</style>-->

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
			<br />
			<div class = 'col-md-12 col-xs-12' style="text-align:center;"><h1>Dashboard</h1></div> 
				<br />
<!DOCTYPE html>
				<div class='col-md-8'>
					
					<?php
						require_once("../model/config_sql.php" );

						$sql = $mysqli->query("SELECT * FROM spaces");
							
						while($row = $sql->fetch_assoc()){
							echo "<div class='col-md-5 main-box clearfix' style='padding:10px;margin-left:25px;'>";
							$name = $row['name'];
							echo "<span><h4><b>".$row['name']."</b></h3><span>";						
							echo "<b>Type: </b>".$row['type'];						
							
							if($row['type'] == 'Wing'){
								echo "<br /><b>Located on: </b>".$row['floor'] . " Floor";
								$sql1 = $mysqli->query("SELECT COUNT(*) as total FROM rooms WHERE space LIKE '{$name}'");
								$row1 = $sql1->fetch_assoc();
								echo "<br /><b>Total No. of Rooms: </b>".$row1['total'];
								$month = date("m");	
								$year = date("Y");
								$sql1 = $mysqli->query("SELECT * FROM rooms WHERE space LIKE '{$name}'");
								$count=0;
								while($row1 = $sql1->fetch_assoc()){
									$room_id = $row1['id'];
									$sql2 = $mysqli->query("SELECT * FROM room_log WHERE room_id='{$room_id}' AND month='{$month}' AND year='{$year}' LIMIT 1");
									$count = $count + mysqli_num_rows($sql2);
								}
								echo "<br /><b>Rooms Occupied: </b>".$count;
							}
							else{
								echo "<br /><b>Rows: </b>".$row['rows'];
								$sql1 = $mysqli->query("SELECT COUNT(*) as total FROM desks WHERE space LIKE '{$name}'");
								$row1 = $sql1->fetch_assoc();
								echo "<br /><b>Total No. of Desks: </b>".$row1['total'];
								$month = date("m");	
								$year = '20'.date("y");

								$sql1 = $mysqli->query("SELECT * FROM desks WHERE space LIKE '{$name}'");
								$count=0;
								while($row1 = $sql1->fetch_assoc()){
									$desk_id = $row1['id'];
									$sql2 = $mysqli->query("SELECT * FROM desk_log WHERE desk_id='{$desk_id}' AND month='{$month}' AND year='{$year}' LIMIT 1");
									$count = $count + mysqli_num_rows($sql2);
								}
								echo "<br /><b>Desks Occupied: </b>".$count;
							}
							echo "</div>";
							//echo "<div class='col-md-1'></div>";
						}
					?>
				<!--<footer id="footer-bar" class="row">
				</footer> -->
			</div>
			<div class='col-md-4' style='margin-top:-32px;'>
				<h2>Pending Invoices</h2>
				<div class="form-group">
					<select class='form-control' onchange='changeajax(this.value)'>
						<option value=""> ---- Select Invoice Type ---- </option>
						<option value="general"> General Invoice </option>
						<option value="receipt"> Receipt Invoice </option>
						<option value="purchase_order"> Purchase Order </option>
						<option value="reimbursement"> Reimbursement Invoice </option>
						
					</select>
				</div>
				<div id='msgform'>
				</div>
				<div id='voiceofinvoice'>
				</div>
			</div>
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
	$("#dashboard").addClass("active");

var choice;

$( document ).ready(function() {
	$.ajax({
			url: "../controller/dashinvoice.php",
			type: 'POST',
			data: {"type": "all"},
			success: function(result) {
				$('#voiceofinvoice').html(result);
			}
		});
});

function changeajax(form) {
	choice = form;
	if (choice != "") {
		$.ajax({
			url: "../controller/dashinvoice.php",
			type: 'POST',
			data: {"type": choice},
			success: function(result) {
				$('#voiceofinvoice').html(result);
			}
		});
	} else {
		$.ajax({
			url: "../controller/dashinvoice.php",
			type: 'POST',
			data: {"type": "all"},
			success: function(result) {
				$('#voiceofinvoice').html(result);
			}
		});
	}
};

function invoice_confirm(invoice,type){
    $.ajax({
        url: "../controller/change_status.php",
        type: 'GET',
        data: {"id": invoice, "action":"confirm" },
        success: function(msg){
            $("#msgform").html("<div class='alert alert-success'>"+msg+"</div>");
            if(type == 'all')
            {
                changeajax("");
                console.log("type: all");
            }
            else
                changeajax(type);
        }
    });
};

function invoice_confirm1(invoice,type,type1){
    $.ajax({
        url: "../controller/change_status.php",
        type: 'GET',
        data: {"id": invoice, "action":"confirm" },
        success: function(msg){
            $("#msgform").html("<div class='alert alert-success'>"+msg+"</div>");
            changeajax(type1);
        }
    });
};

</script>
</body>
</html>
