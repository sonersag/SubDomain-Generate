<?php
	session_start();
	include "../../lib/fonksiyon.php";
	$eposta	= $_POST[eposta];
	$parola	= $_POST[parola];
	$parola	= md5(sha1(md5($parola)));
	
	if ($eposta==$ayaral->eposta && $parola==$ayaral->parola)
	{
		$_SESSION["login"]="true";
		echo "<script>window.location='index.php';</script>";
	}else
	{
		echo '<div class="login_hata">Eposta Adresi veya Şifre Hatalı!</div>';
	}

?>