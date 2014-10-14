<?php
/*    $content = "
    <page>
        <h1>Exemple d'utilisation</h1>
            <br>
                Ceci est un <b>exemple d'utilisation</b>
                    de <a href='http://html2pdf.fr/'>HTML2PDF</a>.<br>
                    </page>";
 */
$content = "<page><img src='cie-image.jpg' style='float:right;'></page>";
//<html><body style='padding: 20px 30px;'>".
 //     "<img src='../../SSAD/ssad32/source/asset/img/cie-image.jpg' style='float:left; height:100px; width:100px;'></img> ".
    //    "<center><h1 style='font-size:10px;'><strong>BANYAN INTELLECTUAL INITIATIVES</strong></h1></center>".
      //    "<center><h2>(The IIIT-H Foundation)</h2></center>".
        //    "</page>";

    require_once('html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','en');
        $html2pdf->WriteHTML($content);
        $html2pdf->Output('exemple.pdf');
?>
