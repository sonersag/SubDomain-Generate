<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}

	include "../../lib/fonksiyon.php";

	sleep(1);
	
	$id				= suzgec($_POST[id]);
	$title			= suzgec($_POST[title]);
	$keywords		= suzgec($_POST[keywords]);
	$description	= suzgec($_POST[description]);
	$resim			= suzgec($_POST[resim]);
	$hit			= suzgec($_POST[hit]);
	$sure			= suzgec($_POST[sure]);
	$rating			= suzgec($_POST[rating]);
	$flv			= suzgec($_POST[flv]);
	$bot			= suzgec($_POST[bot]);
	$tarih			= suzgec($_POST[tarih]);
	$kategori		= suzgec($_POST[kategori]);
	$seo			= seocu($title);
	
	$update		= $db->sorgu("UPDATE video SET 
	
	title 			= '$title',
	keywords 		= '$keywords',
	description		= '$description',
	thumb			= '$resim',
	wievs			= '$hit',
	times			= '$sure',
	rating			= '$rating',
	flv				= '$flv',
	bot				= '$bot',
	tarih			= '$tarih',
	category		= '$kategori',
	seo				= '$seo'
	WHERE id ='$id'
	
	");
	
	if ($update==TRUE)
	{
		echo '<div class="sonucu sonucu_ok">İşlem Başarı İle Gerçekleştirildi!</div>';
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}

?>

