<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}
	
	include "../../lib/fonksiyon.php";

	sleep(1);
	
	$id				= suzgec($_POST[id]);
	$user			= suzgec($_POST[user]);
	$eposta			= suzgec($_POST[eposta]);
	$yorum			= suzgec($_POST[yorum]);
	$ip				= suzgec($_POST[ip]);
	$durum			= suzgec($_POST[durum]);

	
	$update		= $db->sorgu("UPDATE comment SET 
	
	user 			= '$user',
	eposta	 		= '$eposta',
	comment			= '$yorum',
	ipadress		= '$ip',
	statu			= '$durum'
	WHERE id ='$id'
	
	");
	
	if ($update==TRUE)
	{
		echo '<div class="sonucu sonucu_ok">İşlem Başarı İle Gerçekleştirildi!</div>';
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}

?>

