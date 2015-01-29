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
	$ref			= suzgec($_POST[ref]);
	$seo			= seocu($title);
	
	$update		= $db->sorgu("UPDATE tag SET 
	
	title 			= '$title',
	seo		 		= '$seo',
	statu			= '1'
	WHERE id ='$id'
	
	");
	
	if ($update==TRUE)
	{
		echo '<div class="sonucu sonucu_ok">İşlem Başarı İle Gerçekleştirildi!</div>';
		echo '<meta http-equiv="refresh" content="1;URL='.$ref.'">';
		
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}

?>

