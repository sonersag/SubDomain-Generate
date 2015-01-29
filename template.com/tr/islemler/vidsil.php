<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}

	include "../../lib/fonksiyon.php";
	
	$gelen	= $_SERVER['HTTP_REFERER'];
	$cid	= $_GET['cid'];
	
	$bul = $db->satir("SELECT * FROM video WHERE id='$cid'");
	@unlink("../../thumb/$bul->thumb");
	$sil 	= $db->sorgu("DELETE FROM video WHERE id='$cid'");
	
	if ($sil==TRUE)
	{
		echo "<script>window.location='$gelen';</script>";
		
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}
	

?>