<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}
	
	include "../../lib/fonksiyon.php";
	sleep(1);
	$sifre	= suzgec($_POST[sifre]);
	$sifre	= md5(sha1(md5($sifre)));
	
	if ($ayaral->parola != $sifre)
	{
		echo '<div class="sonucu sonucu_hata">Şifreyi Hatalı Girdiniz!</div>';
		exit;
	}
	
	
	$sil	.= $db->sorgu("TRUNCATE TABLE adversite");
	$sil	.= $db->sorgu("INSERT INTO adversite (id,slot1,slot2,slot3,slot4,slot5,slot6,slot7,slot8) values ('1','','','','','','','','')");
	$sil	.= $db->sorgu("TRUNCATE TABLE cache");
	$sil	.= $db->sorgu("TRUNCATE TABLE category");
	$sil	.= $db->sorgu("TRUNCATE TABLE comment");
	$sil	.= $db->sorgu("TRUNCATE TABLE iletisim");
	$sil	.= $db->sorgu("TRUNCATE TABLE rating");
	$sil	.= $db->sorgu("TRUNCATE TABLE tag");
	$sil	.= $db->sorgu("TRUNCATE TABLE video");
	$sil	.= $db->sorgu("UPDATE setting SET rkapat='0'");
	$sil	.= $db->sorgu("UPDATE setting SET parola='526641bd710f0e083d38ed9a216391c3'");
	$sil	.= $db->sorgu("UPDATE setting SET eposta='v1'");
	$sil	.= $db->sorgu("UPDATE setting SET url='http://localhost/adult/'");
	$sil	.= $db->sorgu("UPDATE setting SET title='Site Title'");
	$sil	.= $db->sorgu("UPDATE setting SET description='Site Description'");
	$sil	.= $db->sorgu("UPDATE setting SET keywords='Site Keywords'");
	$sil	.= $db->sorgu("UPDATE setting SET copyright='Copyright Yazısı'");
	$sil	.= $db->sorgu("UPDATE setting SET arama_kaydet='0'");
	$sil	.= $db->sorgu("UPDATE setting SET header_yazi='Header Yazısı'");
	
	$anadizin = "../../thumb";
	
	if ($kaynak = opendir($anadizin)) 
		{ 
			while (false !== ($file = readdir($kaynak))) 
				{
					if ($file != "." AND $file != ".." AND $file != "index.html" AND file !=".htaccess") 
					{
						unlink($anadizin."/".$file);
					}
				}
		}
	
	$anadizin = "../yedek/SQLYedek";
	if ($kaynak = opendir($anadizin)) 
		{ 
			while (false !== ($file = readdir($kaynak))) 
				{
					if ($file != "." AND $file != ".." AND $file != "index.html" AND file !=".htaccess") 
					{
						unlink($anadizin."/".$file);
					}
				}
		}
		
	echo '<div class="sonucu sonucu_ok">Fabrika Ayarlarına Dönüldü!</div>';
	

?>