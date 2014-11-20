<?php

require( dirname( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$type = $_POST['type'];
$html = "";

$html = $html . "<table class='table table-bordered' style='background:white; text-align:center'><tr><th style='background:white; text-align:center'>Invoice Number</th><th style='background:white; text-align:center'>Action</th></tr>";
if($type == "all")
{
    $query1 = "SELECT * FROM invoice WHERE status=0;";
    $result1 = $mysqli->query($query1);
    $i = 0;
    while ($rows=mysqli_fetch_array($result1)) {
        $table = $rows['type'];
        if($table == "general")
            $table = "invoice";
	    $i++;
	    $invoice_number = $rows['invoice_number'];
	    $inv_id = $rows['id'];
	    $html = $html . "<tr>
	                        <td><a href=template/$table.php?id=".$inv_id.">".$invoice_number."</a></td>
	                        <td><a class=\"btn btn-success\" onclick=\"invoice_confirm($inv_id,'all')\">Confirm</a></td>
                        </tr>";
    }
}
else{
    $query1 = "SELECT * FROM invoice where status=0 AND type='$type'";
    $result1 = $mysqli->query($query1);
    $i = 0;
    while ($rows=mysqli_fetch_array($result1)) {
	    $i++;
	    $invoice_number = $rows['invoice_number'];
	    $inv_id = $rows['id'];
	    $html = $html . "<tr>
	                        <td><a href=template/$type.php?id=".$inv_id.">".$invoice_number."</a></td>
	                        <td><a class=\"btn btn-success\" onclick=\"invoice_confirm($inv_id,'$type')\">Confirm</a></td>
                        </tr>";
    }
}

$html = $html . "</table>";

if ($i == 0)
	$html = "<b>No Pending Invoice for ".ucfirst(strtolower($type))."</b>";

echo "$html";

?>
