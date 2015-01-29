<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}

	include "../../lib/fonksiyon.php";
	
	sleep(1);
	
	$title			= suzgec($_POST[title]);
	$keywords		= suzgec($_POST[keywords]);
	$description	= suzgec($_POST[description]);
	$seo			= seocu($title);
	
	if (!$title)
	{
		echo '<div class="sonucu sonucu_hata">Kategori İsmi Boş Olmaz!</div>';
		exit;
	}
	$ekle		= $db->sorgu("INSERT INTO category(title,description,keywords,seo) VALUES 
	
	('$title','$description','$keywords','$seo')
	
	");
	
	if ($ekle==TRUE)
	{
		echo '<div class="sonucu sonucu_ok">İşlem Başarı İle Gerçekleştirildi!</div>';
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}

?>

