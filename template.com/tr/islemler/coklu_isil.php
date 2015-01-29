<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}
	
	include "../../lib/fonksiyon.php";
	
	$gelen	= $_SERVER['HTTP_REFERER'];
	
	$sid	= $_POST['iid'];
	$sec	= $_POST['sec'];
	
	if (!$sid)
	{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılacak Mesaj Seçilmedi!</div>';
		exit;
	}
	
	if ($sec=="1")
	{
		foreach ($sid as $cid)
		{
			$sil = $db->sorgu("DELETE FROM iletisim WHERE id='$cid'");
			
		}
		
		
		if ($sil==TRUE)
		{
			echo "<script>alert('Seçmiş Olduğunuz Mesajlar Silindi.')</script>";
			echo "<script>window.location='$gelen';</script>";
			
		
		}else{
				echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
			 }
		exit;
	}

	
	if ($sec=="2")
	{
		foreach ($sid as $cid)
		{
			$onayla = $db->sorgu("UPDATE iletisim SET durum='1' WHERE id='$cid'");
		}
		
		if ($onayla==TRUE)
		{
			echo "<script>alert('Seçmiş Olduğunuz Mesajlar Okundu Olarak İşaretlendi.')</script>";
			echo "<script>window.location='$gelen';</script>";
		
		}else{
			echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
		}
	}
	
	
	
	
?>