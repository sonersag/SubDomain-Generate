<?php
	sleep(1);

	$onar	.= $db->sorgu("REPAIR TABLE adversite");
	$onar	.= $db->sorgu("REPAIR TABLE cache");
	$onar	.= $db->sorgu("REPAIR TABLE category");
	$onar	.= $db->sorgu("REPAIR TABLE comment");
	$onar	.= $db->sorgu("REPAIR TABLE iletisim");
	$onar	.= $db->sorgu("REPAIR TABLE rating");
	$onar	.= $db->sorgu("REPAIR TABLE tag");
	$onar	.= $db->sorgu("REPAIR TABLE video");
	

	if ($onar==TRUE)	
	{
		echo '<div class="sonucu sonucu_ok">Bakım Başarı İle Tamamlandı!</div>';
	}else{
	
		echo '<div class="sonucu sonucu_hata">Bakım Yapılırken Hata Oluştu!</div>';
	}
	
	

?>