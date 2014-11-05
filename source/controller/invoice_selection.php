<?php

$invoice_type = $_POST['invoice_type'];
header("LOCATION: ../view/$invoice_type.php");

?>