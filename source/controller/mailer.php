<?php

    function sendmail($to, $subject, $body, $from)
    {
	    $headers = "MIME-Version: 1.0\r\n";
	    $headers .= "Content-type:text/html;charset=iso-8859-1\r\n";
	    $headers .= "From: {$from}\r\n";
	    $headers .= "X-Mailer: PHP/".phpversion();
	    if(mail($to, $subject, $body, $headers))
		    return true;
	    return false;
    }
?>
