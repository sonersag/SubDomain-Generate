<?php

	if ($_SESSION["login"]!="true") {
		exit;
	}
	
	$sil = $db->sorgu("TRUNCATE TABLE cache");
	
	if ($sil==TRUE) {
		echo '<div class="sonucu sonucu_ok">Cache Başarı İle Temizlendi!</div>';
	} else {

		echo '<div class="sonucu sonucu_hata">Cache Silinirken Hata Oluştu!</div>';
	}
	
	$anadizin = "../cache";
	if ($kaynak = opendir($anadizin)) { 
		while (false !== ($file = readdir($kaynak))) {
			if ($file != "." AND $file != ".." AND $file != "index.html") {
				unlink($anadizin."/".$file);
			}
		}
	}
?>