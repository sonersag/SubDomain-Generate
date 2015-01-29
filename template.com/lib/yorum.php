<?php
	session_start();
	include "fonksiyon.php";
	sleep(0);
	
	$isim		= suzgec($_POST[isim]);
	$eposta		= suzgec($_POST[eposta]);
	$guvenlik	= suzgec($_POST[guvenlik]);
	$mesaj		= suzgec($_POST[mesaj]);
	$video		= suzgec($_POST[video]);
	$tarih 		= date ("d/m/Y");
	$IP			= $_SERVER['REMOTE_ADDR'];
	$gelen		= $_SERVER['HTTP_REFERER'];

	if (!$isim || !$eposta || !$guvenlik || !$mesaj)
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
		
	
	$ddyaz	= $db->sorgu("INSERT INTO comment(user,eposta,ipadress,comment,video,statu,date) VALUES
	
	('$isim','$eposta','$IP','$mesaj','$video','0','$tarih')
	
	");
	
	if ($ddyaz==TRUE) 
	{
		echo "<script>alert('Yorumunuz başarı ile kaydedildi.Onaylandıktan sonra yayınlanacak.')</script>";

		echo '<script>window.location="'.$gelen.'";</script>';
	}

		
	
?>