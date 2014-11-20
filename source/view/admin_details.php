<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Admin Details</title>

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
					<div class = 'col-md-12 col-xs-12' style="text-align:center;"><h1>Admin Details</h1></div> 
					<br />
					<label>Select Admin</label> 
					
					<select onchange='chooseadmin(this)' class="form-control" id = 'adminid' name="space" required>
						<option id='0' class='useless' value = "0"> - </option>
						<?php
							$id = $_GET['id'];
							require_once("../model/config_sql.php" );
							$sql = $mysqli->query("SELECT * FROM admins WHERE is_super='0'");
							while($row = $sql->fetch_assoc()){
								if($row['id'] == $id){
									echo "<option id = '" .$row['id']. "' selected='selected'>".$row['first_name']. " " . $row['last_name']."</option>";
								}
								else{
									echo "<option value=\"".$row['id']."\" id = '" .$row['id']. "'>".$row['first_name']. " " . $row['last_name']."</option>";
								}
							}
						?>
					</select>
					<br />
				</div>
				<div class='col-md-6'></div>
			</div>
			<div id='info' class='' style='margin-left:30px;'>
				<?php
					$id = @$_GET['id'];
					if($id>0){
						$sql = $mysqli->query("SELECT * FROM admins WHERE id='{$id}' LIMIT 1");
						if($sql->num_rows)
						{
							$row = $sql->fetch_assoc();
							echo "<br /><b>Name: </b>".$row['first_name'] . " " . $row['last_name'];						
							echo "<br /><b>Email: </b>".$row['email'];
							echo "<br /><br />";
							echo "<a href='../controller/admin.php?action=delete&id=".$row['id']."'><button class='btn btn-box btn-primary'>Delete</button></a>";
							echo "&nbsp;&nbsp;&nbsp;&nbsp;<button class='btn btn-box btn-primary' onclick=\"showform()\">Edit Details</button</a>";
						}
					}
				?>
			</div>
			<form class='col-md-6' id='reg_admin' role="form" action="../controller/admin.php" style='margin-left:30px;display:none;'>
				<br /><br />
					<input name='action' type='hidden' value='update' />
					<input name='id' type='hidden' value='<?php echo $_GET['id'];?>' />
					<div class="form-group">
						<label>First Name</label>
						<input class="form-control" type="text" placeholder="First Name" name="first_name" value='<?php echo $row["first_name"];?>' required>
					</div>

					<div class="form-group">
						<label>Last Name</label>
						<input class="form-control" type="text" placeholder="Last Name" name="last_name" value='<?php echo $row["last_name"];?>' required>
					</div>
					
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" type="email" placeholder="Email" name="email" value='<?php echo $row["email"];?>' required>
					</div>

					<div class="form-group">
						<label>Password (Leave Empty If you don't want to change it)</label>
						<input class="form-control" type="password" placeholder="New Password" name="password">
					</div>

					<div class="form-group">
						<label>Confirm Password</label>
						<input class="form-control" type="password" placeholder="Confirm New Password" name="verify_password">
                    </div>


				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update Details</button>
				</div>

			</form>	
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
	function showform() {
		document.getElementById('info').style.display = "none";
		document.getElementById('reg_admin').style.display = "";
	}
</script>

<script type="text/javascript">
	$("#admin_details").addClass("active");
</script>
<script>
	function chooseadmin(startups){
		var id = startups.value;
		window.location.href = './admin_details.php?id='+id;
	}
</script>
</body>
</html>
