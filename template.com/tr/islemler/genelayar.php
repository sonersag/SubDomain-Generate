<?php

	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}

	include "../../lib/fonksiyon.php";
	
	function atislas($veri){ 
    if (!get_magic_quotes_gpc()) {  
        $veri = addslashes($veri);  
        }  
    return $veri; 
}  
	
	sleep(1);

	$url			= $_POST[url];
	$cache			= $_POST[cache];
	$title			= $_POST[title];
	$description	= $_POST[description];
	$keywords		= $_POST[keywords];
	$eposta			= $_POST[eposta];
	$copyright		= $_POST[copyright];
	$rkapat			= $_POST[rkapat];
	$akaydet		= $_POST[arama_kaydet];
	$autostart		= $_POST[autostart];
	$skin			= $_POST[skin];
	$hyazi			= $_POST[hyazi];
	$sayac			= atislas($_POST[sayac]);
	$amung			= $_POST[amung];
	
	if (!$url || !$title || !$eposta) exit;
	
	
	$update		= $db->sorgu("UPDATE setting SET 
	
	url 			= '$url',
	title 			= '$title',
	description 	= '$description',
	keywords 		= '$keywords',
	eposta 			= '$eposta',
	copyright 		= '$copyright',
	rkapat 			= '$rkapat',
	arama_kaydet	= '$akaydet',
	autostart 		= '$autostart',
	sayac	 		= '$sayac',
	header_yazi		= '$hyazi',
	amung			= '$amung',
	cache			= '$cache',
	skin 			= '$skin' WHERE id ='1'
	
	");
	
	if ($update==TRUE)
	{
		echo '<div class="sonucu sonucu_ok">İşlem Başarı İle Gerçekleştirildi!</div>';
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}

?>

