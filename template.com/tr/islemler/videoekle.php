<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}

	include "../../lib/fonksiyon.php";
	
	sleep(0);
	
	$title			= suzgec($_POST[title]);
	$keywords		= suzgec($_POST[keywords]);
	$description	= suzgec($_POST[description]);
	$resim			= suzgec($_POST[resim]);
	$sure			= suzgec($_POST[sure]);
	$flv			= suzgec($_POST[flv]);
	$tarih			= date("d/m/Y");
	$kategori		= suzgec($_POST[kategori]);
	$seo			= seocu($title);
	
	##Resmi Çek
	$rs	= vericek($resim);
	$resimcek= file_put_contents("../../thumb/".$seo.".jpg",$rs);  
	$resim= $seo.'.jpg';
	
	$update		= $db->sorgu("INSERT INTO video (title,description,keywords,seo,thumb,times,flv,bot,category,tarih)
	
	VALUES ('$title','$description','$keywords','$seo','$resim','$times','$flv','$bot','$category','$tarih')

	
	");
	
	if ($update==TRUE)
	{
		echo '<div class="sonucu sonucu_ok">İşlem Başarı İle Gerçekleştirildi!</div>';
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}

?>

