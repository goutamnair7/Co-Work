<?php

//require_once( dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "dompdf" . DIRECTORY_SEPARATOR . "dompdf_config.inc.php" );
require_once("../../vendor/dompdf/dompdf_config.inc.php");

$hello = "hello";

$html =
  "<html><body style='padding: 20px 30px;'>".
  "<img src='../../asset/img/cie-image.jpg' style='float:left; height:100px; width:100px;'></img> ".
  "<center><h1 style='font-size:10px;'><strong>BANYAN INTELLECTUAL INITIATIVES</strong></h1></center>".
  "<center><h2>(The IIIT-H Foundation)$hello</h2></center>".
  "</body></html>";
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");

?>