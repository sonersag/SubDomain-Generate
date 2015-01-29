<?php
	
@	ini_set("max_execution_time", 0);
	
@	set_time_limit(0);
	
	require("lib/fonksiyon.php");
	
	$step = ($_GET['step']) ? $_GET['step'] : '1';
	
	if($step == '1') {
		$basla = $_GET['basla'];
		$bitir = $_GET['bitir'];
		$sorgu = $db->tablo("SELECT id, flv FROM `video` WHERE flv != '3113311331' ORDER BY id DESC LIMIT {$basla}, {$bitir}");
		
		foreach($sorgu as $veri) {
			$veri = vericek("http://www.redtube.com/{$veri->flv}");
			if(preg_match('#class="error404"#si', $veri)) {
				$db->sorgu("UPDATE video SET flv = '3113311331' WHERE id = {$veri->id}");
			}
		}
	} else if($step == '2') {
		$sorgg = $db->tablo("SELECT id, flv FROM `video` WHERE flv = '3113311331' ORDER BY id DESC");
		echo '<pre>';
		print_r($sorgg);
		
	}