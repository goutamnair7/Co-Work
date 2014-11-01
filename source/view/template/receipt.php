<?php

    require_once("../../vendor/html2pdf_v4.03/html2pdf.class.php");

    $name = $_POST['name'];
    $designation = $_POST['desig'];
    $company = $_POST['company'];
    $address = $_POST['add'];

    $date = $_POST['date'];

    $from = $_POST['from'];
    $sum = $_POST['sum'];
    $start = $_POST['start'];
    $end = $_POST['end'];

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
                $name, $designation,<br>
                $company,<br>
                $address<br>
                </div><br><br>
                <div style='padding:0px 50px; font-size:16px;'>
                Received from <b><u>$from</u></b> the sum of Rs. <b><u>$sum</u></b> which is rent for using the Events Room from <b><u>$start</u></b> to <b><u>$end</u></b>.
                </div><br>
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
