<?php

require_once("../../vendor/html2pdf_v4.03/html2pdf.class.php");
require( dirname(dirname( dirname( __FILE__ ) ) ). DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "config_sql.php" );

$name = $_POST['name'];
$designation = $_POST['desig'];
$company = $_POST['company'];
$address = $_POST['add'];
$date_to_store = date("Y-m-d");
$date = date("F d, Y", strtotime($date_to_store));
$from = $_POST['from'];
$sum = $_POST['sum'];
$start = $_POST['start'];
$end = $_POST['end'];
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
                    $name, $designation,<br>
                    $company,<br>
                    $address<br>
                </div><br><br>
                <div style='padding:0px 50px; font-size:16px;'>
                    Received from <b><u>$from</u></b> the sum of Rs. <b><u>$sum</u></b> which is rent for using the Events Room from <b><u>$start</u></b> to <b><u>$end</u></b>.<br>
                    <br>Regards,
                </div><br><br><br>
                <div style='font-size:16px;'>
                    <table>
                        <tr>
                            <td>
                                <div class='float' style='width:450px; padding:0px 0px 0px 50px;'>
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
$html2pdf->Output('purchase_order.pdf');
?>
