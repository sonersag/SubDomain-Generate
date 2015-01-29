<?php
	session_start();
	setcookie("rx", "1", time()+120);
	$rx = $_COOKIE["rx"];
	
	$gelen	= $_SERVER['HTTP_REFERER'];
	echo "<script>window.location='$gelen';</script>";
?>