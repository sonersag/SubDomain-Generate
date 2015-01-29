<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}
	
	include "../../lib/fonksiyon.php";
	
	$gelen	= $_SERVER['HTTP_REFERER'];
	$eid	= $_GET['eid'];
	$sil 	= $db->sorgu("DELETE FROM tag WHERE id='$eid'");
	
	if ($sil==TRUE)
	{
		echo "<script>window.location='$gelen';</script>";
		
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}
	

?>