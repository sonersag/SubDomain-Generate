<!doctype html><html><head><meta charset="utf-8" /></head><body><?php @header('Content-type: text/html; charset=utf-8');
	require "lib/fonksiyon.php";
	$cek = $db->tablo("SELECT * FROM tag2");
	foreach($cek as $ce) {
		echo '<a href="etiketurl" title="'.$ce->baslik.'" style="asd"><b>'.$ce->baslik.'</b></a>'.PHP_EOL;
	}
?></body></html>