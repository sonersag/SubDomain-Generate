<?php

	include "../../lib/fonksiyon.php";
	sleep(1);

	$eposta	= suzgec($_POST[posta]);
	
	if ($eposta==$ayaral->eposta)
	{
		
		$pasx 	= rand(111111,999999);
		$hash	= md5(sha1(md5($pasx)));
		
		$dbx	= $db->sorgu("UPDATE setting SET parola='$hash' WHERE id='1' ");

		## Şifreyi Postala
		$subject	 = "Websitenizden parola yenileme maili";
		$headers	 = 'MIME-Version: 1.0' . "\r\n";
		$headers	.= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers 	.= "From: Wiplast v1 <$ayaral->eposta>" . "\r\n";
		$mesaj		 = "Yeni Şifreniz : $pasx";
		
		## İletiyi postalayalım
		@mail($ayaral->eposta, $subject, $mesaj, $headers);
		
		echo '<div class="hatirlatx okx">Yeni Şifreniz Mail Adresinize Yollandı!</div>';
		
	}else{
		
		echo '<div class="hatirlatx nox">Eposta Adresini Hatalı Girdiniz!</div>';
	}

?>