<?php
	include "../../../lib/fonksiyon.php";
	
	echo '<div class="blok">';
	
	$sayfa	= $_POST[url];
	$durum	= $_POST[durum];
	
	if (!$sayfa)
	{
		echo '<div class="sonucu sonucu_hata">Sayfa adresi boş bırakılmaz!</div>';
		die;
	}
	
	if ($durum=="")
	{
		echo '<div class="sonucu sonucu_hata">Durum alanı boş bırakılmaz!</div>';
		die;
	}
	
	$cek 	= vericek("$sayfa");
	
	preg_match_all('~<a href=(.*?)font></a>~si', $cek, $bloklar);

	for ($i = 0; $i < count($bloklar[1]); $i++)
	{
		
		
		preg_match('~"(.*?)" title="(.*?)"><font color="(.*?)">(.*?)</~i', $bloklar[1][$i], $parse1);
		
		$etiket	= iconv("windows-1254","UTF-8",$parse1[2]);
		
		$ksay	= strlen($etiket);
		
		if ($etiket!="" && $ksay <= 15 )
		{
			$etiket	= strip_tags($etiket);
			
			$ekle	= $db->sorgu("INSERT INTO tag (title,seo,statu) values('$etiket','".seocu($etiket)."','$durum')");
			
			if ($ekle==TRUE)
			{
				echo '<div class="etti">'.$etiket.' <span class="oksc">Eklendi</span></div>';
			}else{
			
				echo '<div class="etti">'.$etiket.' <span class="oksd">Eklenemedi</span></div>';
			
			}
			
		}
		
	}
	
?>
<div class="temizle"></div>
</div>