<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}
	
	include "../../lib/fonksiyon.php";
	
	$gelen	= $_SERVER['HTTP_REFERER'];
	$yid	= $_GET['yid'];
	
	$bul = $db->sorgu("UPDATE comment SET statu='1' WHERE id='$yid'");

	
	if ($bul==TRUE)
	{
		echo "<script>window.location='$gelen';</script>";
		
	}
	

?>