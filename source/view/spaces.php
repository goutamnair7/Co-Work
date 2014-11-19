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
			<div class="main-box clearfix" style="min-height: 820px;">
				<div class="row" id="main">
					<br />
					<div class='row'>
						<div class = 'col-md-6' style="text-align:center;">
							<h1>View Space </h1> 
						</div>

						<div class = 'col-md-5' style="text-align:right;"> 
							<a href="add_new_space.php"><button class="btn btn-primary">Add Space</button></a>
						</div>

						<div class = 'col-md-1'></div>
					</div>
					<br />
					<div class="col-md-6 form-group" style='margin-left:10px;'>
						<label>Space</label>
						<select class="form-control" id = 'spacename' name="space" required>
							<option id='0' class='useless' value = "0"> - </option>
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
						<br />
						<div id='display_space' class='col-md-6'>
						</div>
						<div id='startup_details'>
							<div id='display_cowork' class='col-md-6'>
							</div>
							<div id='display_room_details' class='col-md-6'>
							</div>
						</div>

				</div>
				<div class='col-md-5'>
					<br />
					<div class='col-md-3'></div>
					<div class='col-md-6' id='startupinfo'></div>
					<div class='col-md-3'></div>
				</div>
			<!--<footer id="footer-bar" class="row">
			</footer> -->
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

<script type='text/javascript'>
	<?php
	$query = 'SELECT * FROM startups';
	$result = $mysqli->query($query);
	$names = array();
	while($row=$result->fetch_assoc()){
		$names['row_'.$row['id']]=$row['name'];
	}
	?>
	var names = <?php echo json_encode($names);?>;
//	console.log(names);
</script>

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
		document.getElementById("startupinfo").innerHTML = "";
		display_desks();
	}
	else{
		document.getElementById("startupinfo").innerHTML = "";
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
			//console.log(msg);
			var obj = JSON.parse(msg);
			var length = obj.length;
			var str='';
			var info = "";
			document.getElementById('startupinfo').innerHTML = "";
			str = "<table style='font-size: 0.8em; text-align: center'>";
			for (var i = 0; i < length; i++) {
				str += "<tr>";
				for (var j = 0; j < obj[i].length; j++) {
					str += "<td>";
					if(obj[i][j].startup_id==0){
							str+= "<img src='../asset/img/not_selected.png' id='" + i + "-" + j + "' /><br>"+obj[i][j].label;
					}
					else if(obj[i][j].startup_id==-1){
					//	str+= "<img src='../asset/img/not_available.png' id='" + i + "-" + j + "' />";
					}
					else {
							str+= "<img src='../asset/img/booked.png' id='" + i + "-" + j + "' onclick='show_details(0, "+obj[i][j].startup_id+")' /><br />"+obj[i][j].label;
					}
					str += "</td><td>&nbsp;&nbsp;</td>";
					info += "<b>"+obj[i][j].label+"</b>";

					if(names['row_'+obj[i][j].startup_id] != undefined){
						info += ': ' + "<a href='startup_page.php?id="+obj[i][j].startup_id+"'>" + names['row_'+obj[i][j].startup_id] + "</a>";
					}
					else{
						info += ': Not Booked';
					}
					info += "<br />";
				};
				str+="</tr>";


			};
			str += "</table>";

			if(month.value!='0' && year.value != '0'){
				document.getElementById('startupinfo').innerHTML = "<h1>Desk Details</h1><br />";
				document.getElementById('startupinfo').innerHTML += info;
			}
			else {
				document.getElementById("startupinfo").innerHTML = "";
			}
			document.getElementById('display_space').innerHTML=str;
			document.getElementById('display_cowork').innerHTML='';
			document.getElementById('display_room_details').innerHTML='';
		},
		error: function(){
			alert("Connection Error");
		}
	});

}

function show_details(id, startup_id){
	if(startup_id != 0) {
		$.ajax({
			url: "../controller/startup.php",
			type: 'GET',
			data: "action=show&id=" + startup_id,

			contentType: false,
			cache: false,
			processData:false,

			success: function(msg){
				var obj = JSON.parse(msg);
				//console.log(obj);
				if(obj['status']) {
					var startup = obj['row'];
				//	console.log(startup);
					document.getElementById('display_cowork').innerHTML = "<b>Startup Name : </b><a href='startup_page.php?id="+startup['id']+"'>" + startup['name']+"</a>";
				//	console.log(obj);
				}
				else {
					document.getElementById('display_cowork').innerHTML = "<b>Startup Name : </b>Not Booked";
				}
			},
			error: function(){
				alert("Connection Error");
			}
		});
	}
	else{
		document.getElementById('display_cowork').innerHTML = "<b>Startup Name : </b>Not Booked";
	}

	if(document.getElementById(space.value).className == 'Wing'){
		$.ajax({
			url: "../controller/room.php",
			type: 'GET',
			data: "action=show&id=" + id,

			contentType: false,
			cache: false,
			processData:false,

			success: function(msg){
				var obj = JSON.parse(msg);
			//	if(obj['status']) {
					var roomdetails = obj['row'];
				//	console.log(roomdetails);
					str = "<b>Room id: </b>"+roomdetails['id']+"<br />";
					str += "<b>Area: </b>"+roomdetails['area']+"<br />";
					str += "<b>Desks: </b>"+roomdetails['desks']+"<br />";
					str += "<b>Side: </b>"+roomdetails['side']+"<br />";
					document.getElementById('display_room_details').innerHTML = str;
				//	console.log(obj);
			//	}
				//else {
				//	document.getElementById('display_cowork').innerHTML = "Startup Name : Not Booked";
				//}
			},
			error: function(){
				alert("Connection Error");
			}
		});
	}

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
		//	console.log(msg);
			var obj = JSON.parse(msg);
			var length = obj.length;
			var str='';
			for (var i = 0; i < length; i++) {
				for (var j = 0; j < obj[i].length; j++) {
					//obj[i][j] = obj[i][j].startup_id;
					if(obj[i][j].startup_id==0){
						if(spacename == ''){
							str+= "<img onclick='show_details("+obj[i][j].desk_id+", 0)' src='../asset/img/not_selected.png' id='" + i + "-" + j + "' />";
						}
						else{
							str+= "<img onclick='show_details("+obj[i][j].desk_id+", 0)' src='../asset/img/not_selected.png' id='" + i + "-" + j + "' />";
						}
					}
					else if(obj[i][j].startup_id==-1){
					//	str+= "<img src='../asset/img/not_available.png' id='" + i + "-" + j + "' />";
					}
					else {
						if(spacename == ''){
							str+= "<img src='../asset/img/booked.png' id='" + i + "-" + j + "' onclick='show_details("+obj[i][j].desk_id+","+obj[i][j].startup_id+")' />";
						}
						else{
							str+= "<img src='../asset/img/booked.png' id='" + i + "-" + j + "' onclick='show_details("+obj[i][j].desk_id+","+obj[i][j].startup_id+")' />";
						}
					}
				};
				str+="<br />";

			};
			document.getElementById('display_space').innerHTML=str;
			document.getElementById('display_cowork').innerHTML='';
			document.getElementById('display_room_details').innerHTML='';
		},
		error: function(){
			alert("Connection Error");
		}
	});

}
</script>
<script>
document.getElementById('year').innerHTML += '<option value = "0"> - </option>';
for(var i=2005;i<2025;i++)
    document.getElementById('year').innerHTML += '<option>'+i+'</option>'
</script>

<script type="text/javascript">
	$("#spaces").addClass("active");
</script>
</body>
</html>
