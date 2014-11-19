<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Co-Work :: Invoice</title>

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
    require("../model/config_sql.php");
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
			    	<br /><br />
					<div class = 'col-md-12 col-xs-12' style="text-align:center;"><h1>Previous Invoices</h1></div> 
					    <br />
				    	<div class="modal-body">
					    	<label>Select Invoice Type</label>
						    	<select class="form-control" onchange='show(this.value)' name='invoice_type' id="selected">
									    <option value="nil" default> - </option>
									    <option value="1"> General Invoice </option>
										<option value="2"> Receipt Invoice </option>
										<option value="3"> Purchase Order Invoice </option>
										<option value="4"> Reimbursement </option>
									</select>
						</div><br><br>	
			        <div style='margin-left:30px' id="resultdiv">
                    </div>
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

<!-- Page specific JS -->

<script>
    function show(id){
        $.ajax({
            url: "../controller/previous_invoice.php",
            type: 'GET',
            data: {"id": id},

            success: function(result){
                $("#resultdiv").html(result);
                console.log("Done");
            }
        });
    }
    function invoice_confirm(invoice, id){
        if(id == "purchase_order")
            id = 3;
        else if(id == "receipt")
            id = 2;
        else if(id == "general")
            id = 1;
        $.ajax({
            url: "../controller/change_status?id="+invoice+"&action=confirm",
            type: 'GET',
            contentType: false,
            cache: false,
            processData: false,

            success: function(msg){
                        console.log(msg);
                        console.log("Status changed");
                        show(id);
            },
            error: function(msg){
                        console.log(msg);
                        console.log("Error occured");
            }
        });
    }
    
    function pending(invoice, id){
        if(id == "purchase_order")
            id = 3;
        else if(id == "receipt")
            id = 2;
        else if(id == "general")
            id = 1;

        $.ajax({
            url: "../controller/change_status?id="+invoice+"&action=pending&table="+id,
            type: 'GET',
            contentType: false,
            cache: false,
            processData: false,

            success: function(msg){
                        console.log(msg);
                        console.log("Status changed");
                        show(id);
            },
            error: function(msg){
                        console.log(msg);
                        console.log("Error occured");
            }
        });
    }
</script>
</body>
</html>
