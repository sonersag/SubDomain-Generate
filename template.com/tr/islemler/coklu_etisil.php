<?php
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}
	
	include "../../lib/fonksiyon.php";
	
	$gelen	= $_SERVER['HTTP_REFERER'];
	
	$sid	= $_POST['veti'];
	$sec	= $_POST['sec'];
	
	if (!$sid)
	{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılacak Etiket Seçilmedi!</div>';
		exit;
	}
	
	if ($sec=="1")
	{
		foreach ($sid as $cid)
		{
			$sil = $db->sorgu("DELETE FROM tag WHERE id='$cid'");
			
		}
		
		
		if ($sil==TRUE)
		{
			echo "<script>alert('Seçmiş Olduğunuz Etiketler Silindi.')</script>";
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
			$onayla = $db->sorgu("UPDATE tag SET statu='1' WHERE id='$cid'");
		}
		
		if ($onayla==TRUE)
		{
			echo "<script>alert('Seçmiş Olduğunuz Etiketler Onaylandı.')</script>";
			echo "<script>window.location='$gelen';</script>";
		
		}else{
			echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
		}
	}
	
	
	
	
?>