<?php
	session_start();
	include "fonksiyon.php";
	sleep(1);
	
	$isim		= suzgec($_POST[isim]);
	$eposta		= suzgec($_POST[eposta]);
	$konu		= suzgec($_POST[konu]);
	$guvenlik	= suzgec($_POST[guvenlik]);
	$mesaj		= suzgec($_POST[mesaj]);
	$tarih 		= date ("d/m/Y - G:i:s");
	$IP			= $_SERVER['REMOTE_ADDR'];
	$tarayici	= $_SERVER['HTTP_USER_AGENT'];

	if (!$isim || !$eposta || !$guvenlik || !$konu || !$mesaj)
		{
			echo '<div class="contact-succes">Formda Boş Alan Bırakmayın.</div>';
			die();
		}
	
	
	if	(!filter_var($eposta, FILTER_VALIDATE_EMAIL))
		{
			echo '<div class="contact-succes">Lütfen geçerli eposta adresi yazınız</div>';
			die();
		}
	
	if(strtolower($guvenlik) != $_SESSION["security_code"])
		{
			echo '<div class="contact-succes">Güvenlik Kodu Hatalı</div>';
			die();
		}
		
	## Eposta ek başlıklar
	$subject	 = "Websitenizden iletisim maili";
	$headers	 = 'MIME-Version: 1.0' . "\r\n";
	$headers	.= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers 	.= "From: Wiplast V1 <$ayaral->eposta>" . "\r\n";
	
	$mesajx ="

	Tarih : $tarih <br />
	İsim : $isim <br />
	Email : $eposta <br />
	Konu : $konu <br />
	IP Adresi : $IP <br />
	Mesaj : $mesaj <br />

	";

	
	$ddyaz	= $db->sorgu("INSERT INTO iletisim(isim,eposta,konu,mesaj,IP,tarih,durum,tarayici) VALUES
	
	('$isim','$eposta','$konu','$mesaj','$IP','$tarih','$durum','$tarayici')
	
	");
	
	
	// İletiyi postalayalım
	@mail($ayaral->eposta, $subject, $mesajx, $headers);
	
	echo "<script>alert('Mesajınız başarı ile alındı.En kısa sürede sizinle iletişim sağlanacaktır')</script>";

	echo '<script>window.location="'.$ayaral->url.'";</script>';
		
	
?>