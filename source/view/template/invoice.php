<?php

require_once("../../vendor/html2pdf_v4.03/html2pdf.class.php");
require( dirname(dirname( dirname( __FILE__ ) ) ). DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$name = $_POST['name'];
$designation = $_POST['desig'];
$company = $_POST['company'];
$address = "2nd Floor, Vindya C4 Building, IIITH, Gachibowli, Hyderabad";

$date = $_POST['date'];
$invoice = $_POST['invoice'];
$total_number = $_POST['total'];

$table = "<table style='border:1px solid black;'>
            <tr>
            <td style='width:70px; border:1px solid; text-align:center;'><strong>S.No</strong></td>
            <td style='width:170px; border:1px solid; text-align:center;'><strong>Description</strong></td>
            <td style='width:100px; border:1px solid; text-align:center;'><strong>No. of units</strong></td>
            <td style='width:150px; border:1px solid; text-align:center;'><strong>Rate per unit (Rs)</strong></td>
            <td style='width:130px; border:1px solid; text-align:center;'><strong>Amount (Rs)</strong></td>
            </tr>
            ";
for($i=1;$i<=$total_number;$i++)
{
    $desc = $_POST['description'.$i];
    $noofdesks = $_POST['noofdesks'.$i];
    $rate = $_POST['rate'.$i];
    $total = $rate*$noofdesks;
    $table = $table . "<tr>
            <td style='width:70px; border:1px solid; text-align:center;'>$i.</td>
            <td style='width:170px; border:1px solid; text-align:center;'>$desc</td>
            <td style='width:100px; border:1px solid; text-align:center;'>$noofdesks</td>
            <td style='width:150px; border:1px solid; text-align:center;'>$rate</td>
            <td style='width:130px; border:1px solid; text-align:center;'>$total</td>
            </tr>";
}

$table .= "</table>";

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
			<strong>Invoice #:</strong> CIE0$invoice
			</div>
			<div style='padding:0px 50px; font-size:16px;'>
			<strong>Bill To:</strong><br>
			$name, $designation,<br>
			$company,<br>
			$address<br>
			</div><br>
			<div style='padding:0px 50px; font-size:16px;'>
		    $table	
			</div><br><br>
			<div style='padding:0px 50px; font-size:16px;'>
			<strong>Payment Terms & Conditions:</strong>
			<ol>
			<li>Payment of Rounded Amount to be made by the 5th of the month for which it is incurred. Any<br> delay in payments will incur interest charge of 1.5% per month.</li>
			<li>Mode of Payment:</li><br>
            <div style='padding:0px 25px;'>
                <ol>
                    <li>Cheques to be drawn in favour of \"Banyan Intellectual Initiatives\".</li>
                    <li>Wire transfer details:<br>
                    IFSC: SBHY0021161<br>A/C: 62218163026<br>Name: Banyan Intellectual Initiatives<br>Routing: 500004135</li>
                    <li>Confirmation of Wire transfer or cheque deposit to be emailed by the 5th of the month<br> for which it is being incurred.</li>
                    <li>Mention Banyan Intellectual Initiatives and the Invoice # on the back of your cheque<br> or in the wire transfer remarks.</li>
                </ol>
            </div>
			</ol>
			</div>
            <div style='padding-top:-250px;'>
            Regards<br><br><br><br><br>
			<table>
    		<tr>
        	<td>
        	<div style='width:450px; padding:0px 0px 0px 50px;'>
			$leftsign
			</div>
        	</td>
        	<td>
        	<div style='width:250px;'>
			$rightsign
            </div>
        	</td>
    		</tr>
			</table>
            </div>
			</page>";

$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('purchase_order.pdf');
?>
