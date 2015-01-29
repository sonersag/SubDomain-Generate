<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}
	
	include "../../lib/fonksiyon.php";
	
	$gelen	= $_SERVER['HTTP_REFERER'];
	
	$id		= $_POST['cyorum'];
	$sec	= $_POST['sec'];
	
	if (!$id)
	{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılacak Yorum Seçilmedi!</div>';
		exit;
	}
	
	if ($sec=="1")
	{
		foreach ($id as $cid)
		{
			$sil = $db->sorgu("DELETE FROM comment WHERE id='$cid'");
		}
		
		
		if ($sil==TRUE)
		{
			echo "<script>alert('Seçmiş Olduğunuz Yorumlar Silindi.')</script>";
			echo "<script>window.location='$gelen';</script>";
			
		
		}else{
				echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
			 }
		exit;
	}
	
	

	
	
	if ($sec=="2")
	{
		foreach ($id as $cid)
		{
			$onayla = $db->sorgu("UPDATE comment SET statu='1' WHERE id='$cid'");
		}
		
		if ($onayla==TRUE)
		{
			echo "<script>alert('Seçmiş Olduğunuz Yorumlar Onaylandı.')</script>";
			echo "<script>window.location='$gelen';</script>";
		
		}else{
			echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
		}
	}
	
	
	
	
?>