<?php

function ensureLoggedIn()
{
	session_start();
	if(!isset($_SESSION['is_super']))
		header("location: ../view");
}

function isSuper()
{
	session_start();
	return (isset($_SESSION['is_super']) && $_SESSION['is_super']==1);
}

function ensureLoggedOut()
{
	session_start();
	if(isset($_SESSION['is_super']))
		header("location: ../view/dashboard.php");
}

?>
