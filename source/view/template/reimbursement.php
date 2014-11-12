<?php

require_once("../../vendor/html2pdf_v4.03/html2pdf.class.php");
require( dirname(dirname( dirname( __FILE__ ) ) ). DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$date = $_POST['date'];
$name = $_POST['name'];
$reason = $_POST['reason'];
$account = $_POST['account'];
$bname = $_POST['bname'];
$enclosure = $_POST['enclosure'];
$total_element = $_POST['total'];

$table = "<table style='border:1px solid black;'>
			<tr>
			<td style='width:70px; border:1px solid; text-align:center;'><strong>S.No</strong></td>
			<td style='width:70px; border:1px solid; text-align:center;'><strong>Bill Date</strong></td>
			<td style='width:100px; border:1px solid; text-align:center;'><strong>Cheque No.</strong></td>
			<td style='width:170px; border:1px solid; text-align:center;'><strong>Description</strong></td>
			<td style='width:130px; border:1px solid; text-align:center;'><strong>Amount (Rs)</strong></td>
			</tr>
			";
$total = 0;

for ($i = 1; $i <= $total_element; $i++) {

	$_date=$_POST['date'.$i];
	$desc=$_POST['description'.$i];
	$number=$_POST['number'.$i];
	$amount=$_POST['amount'.$i];
	$table = $table . "<tr>
			<td style='width:70px; border:1px solid; text-align:center;'>$i.</td>
			<td style='width:170px; border:1px solid; text-align:center;'>$_date</td>
			<td style='width:100px; border:1px solid; text-align:center;'>$number</td>
			<td style='width:150px; border:1px solid; text-align:center;'>$desc</td>
			<td style='width:130px; border:1px solid; text-align:center;'>$amount</td>
			</tr>";
    $total += intval($amount);

}

$table = $table . "</table>";

$left_auth = $_POST['leftauth'];
$right_auth = $_POST['rightauth'];
$leftsign = '';
$rightsign = '';

if (isset( $left_auth )) {
	
	if ( $left_auth == 'none') {
		$leftsign = ""; 
	} else {
		$lname = $mysqli->query("select * from sign_auth where name='$left_auth';");
		$rows = mysqli_fetch_array($lname);
		$nameofperson = $rows['name'];
		$desigofperson = $rows['designation'];
		$companyofperson = $rows['company'];
		$leftsign = "$nameofperson<br>$desigofperson<br>$companyofperson<br>";
	}

}

if (isset( $right_auth )) {

	if ( $right_auth == 'none') {
		$rightsign = ""; 
	} else {
		$rname = $mysqli->query("select * from sign_auth where name='$right_auth';");
		$rows = mysqli_fetch_array($rname);
		$nameofperson = $rows['name'];
		$desigofperson = $rows['designation'];
		$companyofperson = $rows['company'];
		$rightsign = "$nameofperson<br>$desigofperson<br>$companyofperson<br>";
	}
}

$content = "<page>
			<div style='padding:30px 50px;'>
			<img src='cie-image.jpg' style='height:148px; float:left;'>
			<h1 style='text-align:center;'>BANYAN INTELLECTUAL INITIATIVES</h1>
			<h3 style='text-align:center;'>(The IIIT-H Foundation)</h3><br>
			</div>
			<div style='padding:0px 50px; font-size:16px; text-align:right; position:absolute; top:221px; right:50px;'>
			<strong>Date:</strong> $date<br>
			</div>
			<div style='padding:0px 50px; font-size:16px;'>
			<strong>To:</strong><br>
			CEO,<br>
			Banyan Intellectual Initiatives
			</div><br>
            <div style='text-align:center; font-size:16px;'>
                <b>Sub: Reimbursement to $name for <br>$reason</b>
            </div><br>
			<div style='padding:0px 30px; font-size:16px;'>
			$table
			</div><br><br>
            <div style='padding:0px 600px; font-size:16px;'>
                <strong>Total: </strong>$total
            </div><br><br>
            <div style='padding:0px 40px; font-size:16px;'>
            <strong>Name of beneficiary:</strong>$bname<br>
            <strong>Account to be debited from:</strong>$account<br>
            <strong>Enclosures:</strong>$enclosure<br>
            </div><br><br>
			<div style='padding:0px 40px; font-size:16px;'>
			Regards,<br><br><br><br>
            Approved / Not Aprooved
			</div><br><br>
			<div style='font-size:16px;'>
			<table>
    		<tr>
        	<td>
        	<div class='float' style='width:450px; padding:0px 0px 0px 40px;'>
			$leftsign
			</div>
        	</td>
        	<td>
        	<div class='float' style='width:250px;'>
			$rightsign
			</div>
        	</td>
    		</tr>
			</table>
			</div>
			</page>";

$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('reimbursement.pdf');
?>
