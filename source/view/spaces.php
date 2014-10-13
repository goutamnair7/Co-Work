<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Space</title>
<link href="../asset/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>

<!--Common Styles -->
<link href="../asset/css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="../asset/css/compiled/elements.css">
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

<!-- Page specific Styles -->

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
			<div class="row" id="main">

				<div class="col-md-6 form-group">

					<label>Space</label>
					<select class="form-control" id = 'spacename' name="space" required>
					<?php
					require_once("../model/config_sql.php" );
					
					$sql = $mysqli->query("SELECT name FROM spaces");

					while($row = $sql->fetch_assoc())
						echo "<option>".$row['name']."</option>";
					?>
					</select>
					<br/>

					<div id='display_space' class='col-md-6'>
					</div>
					<div id='display_room' class='col-md-6'>
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
<!--Common js-->
<script src="../asset/js/jquery.js"></script>
<script src="../asset/js/bootstrap.js"></script>
<script src="../asset/js/demo.js"></script>  
<script src="../asset/js/scripts.js"></script>
<script src="../asset/js/demo-skin-changer.js"></script>
<script src="../asset/js/jquery.nanoscroller.min.js"></script> 
<script src="../asset/js/jquery.maskedinput.min.js"></script>
<!--Page specific js-->

<script type="text/javascript">
var space=document.getElementById('spacename');
space.addEventListener('change', display);

window.onload=display();

function display()
{		
	$.ajax({
		url: "../controller/get_empty_desks.php",
		type: 'GET',
		data: "space="+document.getElementById('spacename').value,

		contentType: false,
		cache: false,
		processData:false,

		success: function(msg){
			console.log(msg);
			var obj = JSON.parse(msg);
			var length = obj.length;
			var str='';
			for (var i = 0; i < length; i++) {
				for (var j = 0; j < obj[i].length; j++) {
					if(obj[i][j]==0){
						str+= "<img src='../asset/img/not_selected.png' id='" + i + "-" + j + "' />";
					}
					else if(obj[i][j]==-1){
					//	str+= "<img src='../asset/img/not_available.png' id='" + i + "-" + j + "' />";
					}
					else {
						str+= "<img src='../asset/img/booked.png' id='" + i + "-" + j + "' onclick='show_details("+obj[i][j]+")' />";
					}

				};
				str+="<br />";

			};
			document.getElementById('display_space').innerHTML=str;
			document.getElementById('display_room').innerHTML='';
		},
		error: function(){
			alert("Connection Error");
		}
	});

}

function show_details(id){
	$.ajax({
		url: "../controller/startup.php",
		type: 'GET',
		data: "action=show&id=" + id,

		contentType: false,
		cache: false,
		processData:false,

		success: function(msg){
			//console.log(msg);
			var obj = JSON.parse(msg);
			if(obj['status']) {
				var startup = obj['row'];
				document.getElementById('display_room').innerHTML = "Startup Name : " + startup['name'];
			//	console.log(obj);
			}
			else
				alert("There is some major problem. Contact developers ASAP");
		},
		error: function(){
			alert("Connection Error");
		}
	});

}
</script>

<script type="text/javascript">
	$("#spaces").addClass("active");
</script>
</body>
</html>