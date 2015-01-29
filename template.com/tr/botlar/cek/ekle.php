<?php
		
		include	"../../../lib/fonksiyon.php";
		sleep(1);
		$baslik		=	$_POST['baslik'];
		$aciklama	=	$_POST['aciklama'];
		$vidlink	=	str_replace("http://www.redtube.com/","",$_POST['link']);
		$etiket		=	$_POST['etiket'];
		$resim		=	$_POST['resim'];
		$sure		=	$_POST['sure'];
		$kat		=	$_POST['kat'];
		$bot		=	$_POST['bot'];
		$seo		=	seocu($baslik);
		$rs			= 	$resim;
		$tarih		=   date("d/m/Y");
		
		$kontrol2	= mysql_num_rows(mysql_query("select title from video where title='$baslik'"));
		$kontrol3	= mysql_fetch_assoc(mysql_query("select * from video order by id desc limit 1"));
		$sonid		= $kontrol3[id] +1;
		if ($kontrol2==TRUE) 
		{
			$seo = seocu($baslik ."_".$sonid); $baslik = $baslik ." ".$sonid;
			
		}
		
		
		$ch = curl_init();  
		curl_setopt($ch, CURLOPT_URL, $resim);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		curl_exec($ch);  
		$httpfile  	= curl_multi_getcontent ($ch);  
		$resimcek	= file_put_contents("../../../thumb/".seocu($baslik).".jpg",$httpfile);  
		$resim=seocu($baslik).'.jpg';
		
		if ($resimcek==FALSE) exit;
		
				
		if(!$baslik) 	$hata .= '<div class="siralama"><span class="silinemedi">Başlık kısmı boş bırakılmaz!</span></div>';
		
		echo $hata;
		
	if($hata=="")
	{	
		##Db de varmı kontrol et		
		$kontrol	= mysql_query("select flv from video where flv='$vidlink'");
		$ettim		= mysql_fetch_array($kontrol);
		
				
		##Arkadaş etmiş birazdan cevaplar		
		if($ettim>=1) echo '<div class="gizlis_1"><span>DAHA ÖNCE EKLENMİŞ</span></div>';
		else
		{	
			
				
				## Veritabanı müsait yazabilirsin
				$ekle	= mysql_query("insert into video (title,description,keywords,seo,thumb,times,flv,bot,category,tarih)
				values ('$baslik','$aciklama','$etiket','$seo','$resim','$sure','$vidlink','redtube','$kat','$tarih')
				");
				
			if ($ekle>=1) 
			{
				echo '<div class="gizlis"><span>VİDEO EKLENDİ</span></div>';
			}
			else 
				{
							echo '<div class="gizlis_1"><span>VİDEO EKLENEMEDİ</span></div>';
				}
		}
	}
		

	
	
	

	
?>









