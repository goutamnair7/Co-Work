<?php

$content = "<page>
            <body>
            <div>
                <img src='http://localhost/source/asset/img/cie-image.jpg' style='float:right;'>
            </div>
            </body>
            </page>";
    
require_once('html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('exemple.pdf');

?>

