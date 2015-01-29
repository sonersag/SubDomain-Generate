<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}

	include "../../lib/fonksiyon.php";

	sleep(1);
	
	$parola		= md5(sha1(md5($_POST['parola'])));
	$parola1	= $_POST['parola1'];
	$parola2	= $_POST['parola2'];
	
	if (!$parola || !$parola1 || !$parola2)
	{
		echo '<div class="sonucu sonucu_hata">Boş alan bırakmayınız!</div>';
		exit;
	}
	
	if ($parola!=$ayaral->parola)
	{
		echo '<div class="sonucu sonucu_hata">Eski Şifrenizi Hatalı Girdiniz!</div>';
		exit;
	}
	
	if ($parola1!=$parola2)
	{
		echo '<div class="sonucu sonucu_hata">Şifreleriniz Eşleşmiyor!</div>';
		exit;
	}
	
	$yp				= md5(sha1(md5($parola2)));
	$update			= $db->sorgu("UPDATE setting SET parola='$yp' WHERE id='1'");
	
	if ($update==TRUE)
	{
		echo '<div class="sonucu sonucu_ok">Şifreleriniz Başarı İle Değiştirildi!</div>';
	}
	
	
	
	

	

?>