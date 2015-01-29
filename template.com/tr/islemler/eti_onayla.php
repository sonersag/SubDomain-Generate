<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}
	
	include "../../lib/fonksiyon.php";

	$gelen	= $_SERVER['HTTP_REFERER'];
	$eid	= $_GET['eid'];
	
	$bul = $db->sorgu("UPDATE tag SET statu='1' WHERE id='$eid'");

	
	if ($bul==TRUE)
	{
		echo "<script>window.location='$gelen';</script>";
		
	}
	

?>