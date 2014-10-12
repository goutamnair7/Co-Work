<?php

//phpinfo();

include 'connect_to_mysql.php';

$mysqli->query("UPDATE desks SET leased_to='5' WHERE desk_no<'21'");

?>