<?php

require_once("../../vendor/html2pdf_v4.03/html2pdf.class.php");

$name = $_POST['name'];
$designation = $_POST['desig'];
$company = $_POST['company'];
$address = $_POST['add'];

$date = "15th October 2014";
$PurchaseOrder = $_POST['purchaseorder'];

$checkto = $_POST['checkto'];

$desc=$_POST['description'];
$noofunits=$_POST['noofunits'];
$rate=$_POST['rate'];
$total = $rate*$noofunits;

$content = "<page>
			<div style='padding:30px 50px;'>
			<img src='cie-image.jpg' style='height:148px; float:left;'>
			<h1 style='text-align:center;'>BANYAN INTELLECTUAL INITIATIVES</h1>
			<h3 style='text-align:center;'>(The IIIT-H Foundation)</h3><br>
			</div>
			<div style='padding:0px 50px; font-size:16px; text-align:right; position:absolute; top:221px; right:50px;'>
			<strong>Date:</strong> $date<br>
			<strong>Purchase Order:</strong> $PurchaseOrder
			</div>
			<div style='padding:0px 50px; font-size:16px;'>
			<strong>To:</strong><br>
			$name, $designation,<br>
			$company,<br>
			$address<br>
			</div><br>
			<div style='padding:0px 50px; font-size:16px;'>
			<table style='border:1px solid black;'>
			<tr>
			<td style='width:70px; border:1px solid; text-align:center;'><strong>S.No</strong></td>
			<td style='width:170px; border:1px solid; text-align:center;'><strong>Description</strong></td>
			<td style='width:100px; border:1px solid; text-align:center;'><strong>No. of units</strong></td>
			<td style='width:150px; border:1px solid; text-align:center;'><strong>Rate per unit (Rs)</strong></td>
			<td style='width:130px; border:1px solid; text-align:center;'><strong>Amount (Rs)</strong></td>
			</tr>
			<tr>
			<td style='width:70px; border:1px solid; text-align:center;'>1.</td>
			<td style='width:170px; border:1px solid; text-align:center;'>$desc</td>
			<td style='width:100px; border:1px solid; text-align:center;'>$noofunits</td>
			<td style='width:150px; border:1px solid; text-align:center;'>$rate</td>
			<td style='width:130px; border:1px solid; text-align:center;'>$total</td>
			</tr>
			</table>
			</div><br><br>
			<div style='padding:0px 50px; font-size:16px;'>
			<strong>Payment Terms & Conditions:</strong>
			<ol>
			<li>Payment of Rounded Amount to be made within 30 days of receipt of invoice.</li>
			<li>Mode of Payment will be by cheque to \"<strong>$checkto</strong>\". A receipt will be required<br>after receiving the funds.</li>
			</ol>
			</div><br><br>
			<div style='padding:0px 50px; font-size:16px;'>
			Regards,<br><br>
			Raghu Prodduturi<br>
			Manager<br>
			Banyan Intellectual Initiatives<br>
			</div>
			</page>";

$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('purchase_order.pdf');
?>