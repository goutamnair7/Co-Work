<?php
/*    ob_start();
    include("../../view/template/receipt.php");
    $content = ob_get_clean();*/
    
    $htmlfile = "http://localhost/source/view/template/receipt.php";
    require("html2pdf.class.php");
    try
    {
        $html2pdf = new HTML2FPDF('P', 'mm', 'Letter');
//        $fp = fopen("../../view/template/receipt.php", "r");
        $contents = file_get_contents($htmlfile);
//        fclose($fp);
//        echo $contents;
        $html2pdf->WriteHTML($contents);
        $html2pdf->Output('receipt.pdf');
    }
    catch(HTML2PDF_exception $e)
    {
        echo $e;
        exit;
    }
?>
