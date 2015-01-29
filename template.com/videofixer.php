<?php
	
	function resimyazz($resim_veri,$title){
		$handle = fopen('thumb/'.$title, 'w+');
		fwrite($handle,$resim_veri);
		fclose($handle);
	}
	
	require('lib/fonksiyon.php');
	
	$news = $db->tablo("SELECT * FROM video ORDER BY id DESC");
	
	foreach($news as $new) {
		if(!file_exists('thumb/'.$new->thumb)) {
			$cek = vericek('http://www.redtube.com/'.$new->flv);
			preg_match('#<meta property="og\:image" content="(.*?)"#si', $cek, $resim);
			$resim = end($resim);
			$resim_veri = vericek($resim);
			resimyazz($resim_veri,$new->thumb);
			echo $new->thumb.' resimi duzeltildi.<br />';
		} else {
			echo $new->thumb.' resimi duzgun.<br />';
		}
	}