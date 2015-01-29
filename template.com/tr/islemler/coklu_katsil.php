<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}
	
	include "../../lib/fonksiyon.php";
	
	$gelen	= $_SERVER['HTTP_REFERER'];
	
	$id	= $_POST['ckat'];
	
	if (!$id)
	{
		echo '<div class="sonucu sonucu_hata">Silinecek Kategori Seçilmedi!</div>';
		exit;
	}
	
	foreach ($id as $cid)
	{
		$sil = $db->sorgu("DELETE FROM category WHERE id='$cid'");
	}
	
	if ($sil==TRUE)
	{
		echo "<script>alert('Seçmiş Olduğunuz Kategoriler Silindi.')</script>";
		echo "<script>window.location='$gelen';</script>";
		
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}

?>