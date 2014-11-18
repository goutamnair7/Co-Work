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
						    	<select class="form-control" name='invoice_type' id="selected">
									    <option value="nil" default> - </option>
									    <option onclick="show('1')" value="invoice_form"> General Invoice </option>
										<option onclick="show('2')" value="receipt_form"> Receipt Invoice </option>
										<option onclick="show('3')" value="purchase_order_form"> Purchase Order Invoice </option>
										<option onclick="show('4')" value="reimbursement_form"> Reimbursement </option>
									</select>
						</div><br><br>	
			    <div class="" style='margin-left:30px'>
                <?php
                   $id = @$_GET['id'];
                   if($id > 0)
                   {
                        echo "<table class=\"table table-hover\">";
                        echo "<tr>
                                <th>Invoice Numbers</th>
                                <th>Confirm Invoice</th>
                                <th>Pending Invoice</th>
                                <th>Invoice Status</th>
                              </tr>";
                        $query1 = "SELECT DISTINCT I.id, I.status FROM invoice I INNER JOIN ";
                        $query2 = "SELECT DISTINCT invoice_number FROM ";
                        if($id == 1)
                        {
                            $query1 .= "general G ON I.type=\"general\" WHERE G.invoice_number=I.invoice_number;";
                            $query2 .= "general;";
                            $table = "invoice";
                        }
                        else if($id == 2)
                        {
                            $query1 .= "receipt R ON I.type=\"receipt\" WHERE R.invoice_number=I.invoice_number;";
                            $query2 .= "receipt;";
                            $table = "receipt";
                        }
                        else if($id == 3)
                        {
                            $query1 .= "purchase_order P ON I.type=\"purchase_order\" WHERE P.invoice_number=I.invoice_number;";
                            $query2 .= "purchase_order;";
                            $table = "purchase_order";
                        }
                        else if($id == 4)
                        {
                            $query1 .= "reimbursement R ON I.type=\"reimbursement\" WHERE G.invoice_number=R.invoice_number;";
                            $query2 .= "reimbursement;";
                            $table = "reimbursement";
                        }
                        $rows = $mysqli->query($query1);
                        $rows2 = $mysqli->query($query2);
                        while($row = $rows->fetch_assoc() and $row2 = $rows2->fetch_assoc())
                        {
                            $inv_id = $row['id'];
                            echo "<tr>
                                    <td><a href=template/$table.php?id=".$row['id'].">".$row2['invoice_number']."</a></td>
                                    <td><a class=\"btn btn-success\" onclick=\"invoice_confirm($inv_id, $id)\">Confirm</a></td>
                                    <td><a class=\"btn btn-danger\" onclick=\"pending($inv_id, $id)\">Pending</a></td>";
                                    if($row['status'] == 0)
                                        echo "<td>Pending</td>";
                                    else
                                        echo "<td>Confirmed</td>";
                                  echo "</tr>";
                        }
                        echo "</table>";
                   }
                ?>
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
        window.location.href = 'previous_invoice.php?id='+id;
    }
    function invoice_confirm(invoice, id){
        $.ajax({
            url: "../controller/change_status?id="+invoice+"&action=confirm&table="+id,
            type: 'GET',
            contentType: false,
            cache: false,
            processData: false,

            success: function(msg){
                        window.location.href = "previous_invoice.php?id="+id;
                        console.log(msg);
                        console.log("Status changed");
            },
            error: function(msg){
                        console.log(msg);
                        console.log("Error occured");
            }
        });
    }
    
    function pending(invoice, id){
        $.ajax({
            url: "../controller/change_status?id="+invoice+"&action=pending&table="+id,
            type: 'GET',
            contentType: false,
            cache: false,
            processData: false,

            success: function(msg){
                        window.location.href = "previous_invoice.php?id="+id;
                        console.log(msg);
                        console.log("Status changed");
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
