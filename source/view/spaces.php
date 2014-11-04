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
				<br />
				<div class = 'col-md-10 col-xs-12' align='right'>
					<button type="submit" class="btn btn-primary">Add Space</button>
				</div>
				<br />
				<div class="col-md-6 form-group">
					<label>Space</label>
					<select class="form-control" id = 'spacename' name="space" required>
						<option value = "0"> - </option>
					<?php
						require_once("../model/config_sql.php" );
						$sql = $mysqli->query("SELECT * FROM spaces");
						while($row = $sql->fetch_assoc())
							echo "<option class = '" .$row['type']. "' id = '" .$row['name']. "'>".$row['name']."</option>";
					?>
					</select>
					<br/>

					<div id = "monthandyear" style="display:none;">
						<label>Month</label>
						<select class="form-control" id = 'month' name="month" required>
							<option value="0"> - </option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select><br />
						<label>Year</label>
						<select class="form-control" id = 'year' name="year" required>
						</select><br />
					</div>

					<div id='display_space' class='col-md-6'>
					</div>
					<div id='display_cowork' class='col-md-6'>
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
var space = document.getElementById('spacename');
var month = document.getElementById('month');
var year = document.getElementById('year');
space.addEventListener('change', show);
month.addEventListener('change', display);
year.addEventListener('change', display);

window.onload=initialize();
window.onload=display();

function initialize()
{
	space.value = '0';
	month.value = '0';
	year.value = '0';
}

function show(){
	month.value = "0";
	year.value = "0";
	if(space.value == "0"){
		document.getElementById('monthandyear').style.display = "none";
	}
	else {
		document.getElementById('monthandyear').style.display = "";
	}

	if(document.getElementById(space.value).className == 'Co-Working'){
		display_desks();
	}
	else{
		display_rooms();
	}
}

function display(){
	if(document.getElementById(space.value).className == 'Co-Working'){
		display_desks();
	}
	else{
		display_rooms();
	}
}

function display_desks()
{		
	$.ajax({
		url: "../controller/desk.php",
		type: 'GET',
		data: "action=show_by_space_name&space="+document.getElementById('spacename').value+'&month='+document.getElementById('month').value+'&year='+document.getElementById('year').value,

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
					obj[i][j] = obj[i][j].startup_id;
					if(obj[i][j]==0){
						if(spacename == ''){
							str+= "<img src='../asset/img/not_selected.png' id='" + i + "-" + j + "' />";
						}
						else{
							str+= "<img src='../asset/img/not_selected.png' id='" + i + "-" + j + "' />";
						}
					}
					else if(obj[i][j]==-1){
					//	str+= "<img src='../asset/img/not_available.png' id='" + i + "-" + j + "' />";
					}
					else {
						if(spacename == ''){
							str+= "<img src='../asset/img/booked.png' id='" + i + "-" + j + "' onclick='show_details("+obj[i][j]+")' />";
						}
						else{
							str+= "<img src='../asset/img/booked.png' id='" + i + "-" + j + "' onclick='show_details("+obj[i][j]+")' />";
						}
					}

				};
				str+="<br />";

			};
			document.getElementById('display_space').innerHTML=str;
			document.getElementById('display_cowork').innerHTML='';
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
				document.getElementById('display_cowork').innerHTML = "Startup Name : " + startup['name'];
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

function display_rooms()
{		
	$.ajax({
		url: "../controller/desk.php",
		type: 'GET',
		data: "action=show_by_space_name&space="+document.getElementById('spacename').value+'&month='+document.getElementById('month').value+'&year='+document.getElementById('year').value,

		contentType: false,
		cache: false,
		processData:false,

		success: function(msg){
			console.log(msg);
			var obj = JSON.parse(msg);
			var length = obj.length;
			var str='';
			for (var i = 0; i < length; i++) {
	/*				obj[i][j] = obj[i][j].startup_id;
					if(obj[i][j]==0){
						if(spacename == ''){
							str+= "<img src='../asset/img/not_selected.png' id='" + i + "-" + j + "' />";
						}
						else{
							str+= "<img src='../asset/img/not_selected.png' id='" + i + "-" + j + "' />";
						}
					}
					else if(obj[i][j]==-1){
					//	str+= "<img src='../asset/img/not_available.png' id='" + i + "-" + j + "' />";
					}
					else {
						if(spacename == ''){
							str+= "<img src='../asset/img/booked.png' id='" + i + "-" + j + "' onclick='show_details("+obj[i][j]+")' />";
						}
						else{
							str+= "<img src='../asset/img/booked.png' id='" + i + "-" + j + "' onclick='show_details("+obj[i][j]+")' />";
						}
					}

				str+="<br />";

	*/		};
			document.getElementById('display_space').innerHTML=str;
			document.getElementById('display_cowork').innerHTML='';
		},
		error: function(){
			alert("Connection Error");
		}
	});

}
</script>
<script>
document.getElementById('year').innerHTML += '<option value = "0"> - </option>';
for(var i=2010;i<2016;i++)
    document.getElementById('year').innerHTML += '<option>'+i+'</option>'
</script>

<script type="text/javascript">
	$("#spaces").addClass("active");
</script>
</body>
</html>