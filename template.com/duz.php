<?php
	require "lib/fonksiyon.php";
	
	$x = $db->tablo("SELECT * FROM `video` WHERE thumb LIKE 'thumb/%'");
	
	foreach($x as $y) {
		$z = trim($y->thumb, 'thumb/');
		$db->sorgu("UPDATE video SET thumb = '{$z}' WHERE id = '{$y->id}'");
	}