<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Startup Page</title>

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
			<div class='row'>
				<div class='col-md-6' style='margin-left:30px;'>
					<br />
					<div class = 'col-md-12 col-xs-12' style="text-align:center;"><h1>Startup Information</h1></div> 
					<br />
					<label>Select Startup</label> 
					
					<select class="form-control" id = 'spacename' name="space" required>
						<option id='0' class='useless' value = "0"> - </option>
						<?php
							$id = $_GET['id'];
							require_once("../model/config_sql.php" );
							$sql = $mysqli->query("SELECT * FROM startups");
							while($row = $sql->fetch_assoc()){
								if($row['id'] == $id){
									echo "<option class = '" .$row['space']. "' id = '" .$row['id']. "' selected='selected'>".$row['name']."</option>";
								}
								else{
									echo "<option onclick=\"choosestartup(".$row['id'].")\" class = '" .$row['space']. "' id = '" .$row['id']. "'>".$row['name']."</option>";
								}
							}
						?>
					</select>
					<br />
				</div>
				<div class='col-md-6'></div>
			</div>
			<div class='' style='margin-left:30px;'>
				<?php
					$id = @$_GET['id'];
					if($id>0){
						$sql = $mysqli->query("SELECT * FROM startups WHERE id='{$id}' LIMIT 1");
						
						$row = $sql->fetch_assoc();
						echo "<br /><b>Startup Name: </b>".$row['name'];						
						echo "<br /><b>Space: </b>".$row['space'];						
						echo "<br /><b>Status: </b>".$row['status'];						
						echo "<br /><b>Joining Date: </b>".$row['joining_date'];						
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<b>Ending Date: </b>".$row['ending_date'];						
						echo "<br /><b>No. of Employees: </b>".$row['employees'];						
						echo "<br /><b>Domain: </b>".$row['domain'];						
						echo "<br /><b>Description: </b>".$row['description'];						
						echo "<br /><b>Web Address: </b>".$row['web_address'];	
						$p1_id = $row['p1_id'];
						$p2_id = $row['p2_id'];
						echo "<br /><br /><b>Primary Contacts - </b><br />";
						$sql = $mysqli->query("SELECT * FROM startup_members WHERE id='$p1_id' LIMIT 1");
						$row = $sql->fetch_assoc();
						echo "<div class='col-md-4'>";
						echo "<br /><b>Name: </b>".$row['first_name']." ".$row['last_name'];
						echo "<br /><b>Contact: </b>".$row['contact'];
						echo "<br /><b>Email: </b>".$row['email'];
						echo "</div><div class='col-md-8'>";
						if($p2_id>0){
							$sql = $mysqli->query("SELECT * FROM startup_members WHERE id='{$p2_id}' LIMIT 1");
							$row = $sql->fetch_assoc();
							echo "<br /><b>Name: </b>".$row['first_name']." ".$row['last_name'];
							echo "<br /><b>Contact: </b>".$row['contact'];
							echo "<br /><b>Email: </b>".$row['email'];	
						}
						echo "</div>";
					}
				?>
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
	$("#startup_page").addClass("active");
</script>
<script>
	window.onload = function(){
		var url = window.location.href.split('?');
		if(url.length == 2){
			url = url[1].split('=')[1];
		}
	};
	function choosestartup(id){
		window.location.href = './startup_page.php?id='+id;
	}
</script>
</body>
</html>
