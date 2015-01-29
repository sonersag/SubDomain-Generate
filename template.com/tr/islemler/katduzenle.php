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
	$seo			= seocu($title);
	
	$update		= $db->sorgu("UPDATE category SET 
	
	title 			= '$title',
	keywords 		= '$keywords',
	description		= '$description',
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

