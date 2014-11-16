<?php


if(!isset($_SESSION['user_type']) || $_SESSION['user_type']=="")
	header("location: ../view/login.php");

?>
