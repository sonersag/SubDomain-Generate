<?php
	

	$gelen	= $_SERVER['HTTP_REFERER'];
	$cid	= $_GET['id'];
	$sil 	= $db->sorgu("UPDATE iletisim SET durum='1' WHERE id='$cid'");
	
	if ($sil==TRUE)
	{
		echo "<script>window.location='index.php?iletisim=oku';</script>";
		
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}
	

?>