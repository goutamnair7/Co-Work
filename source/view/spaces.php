<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Centaurus - Bootstrap Admin Template</title>
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
					<?php echo file_get_contents('http://localhost/ssad/source/controller/get_empty_desks.php?space=Launchpad+A&side=left');?>
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
	$("#page").addClass("active");
</script>


<script type="text/javascript">
	var bookedImage = new Image();
	bookedImage.src = "../asset/img/booked.png";

	var selectedImage = new Image();
	selectedImage.src = "../asset/img/selected.png";

	var notSelectedImage = new Image();
	notSelectedImage.src = "../asset/img/not_selected.png";

/*	var a="";
	for(i=1;i<=12;i++){
		
		for(j=1;j<=6;j++){
			var b=100*i+j;
			b=String(b);
			a=a+'<img src="'+notSelectedImage.src+'" class="not_selected" onclick="changeimage('+b+')" id='+b+'></img>';
		}
		a=a+'&nbsp&nbsp';
		for(j=7;j<=12;j++){
			var b=100*i+j;
			b=String(b);
			a=a+'<img src="'+notSelectedImage.src+'" class="booked" onclick="changeimage('+b+')"id='+b+'></img>';
		}
		a=a+'<br>';
	}
	document.getElementById('main').innerHTML=a;
*/
	function changeimage(id){
		if(document.getElementById(id).src==notSelectedImage.src){
			document.getElementById(id).src=selectedImage.src;
		}
		else{
			document.getElementById(id).src=notSelectedImage.src;
		}

	}

</script>
</body>
</html>