<?php
    
    header('Content-type: application/pdf');
    require("../vendor/html2fpdf.php");

    $htmlfile = "http://localhost/source/view/template/receipt.php";
    $contents = file_get_contents($htmlfile);
    try
    {
        $pdf = new HTML2FPDF('P', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->WriteHTML($contents);
        $pdf->Output('receipt.pdf', 'I');
    }
    catch(HTML2PDF_exception $e)
    {
        echo $e;
        exit;
    }
?>
