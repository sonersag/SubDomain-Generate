<?php
	include "fonksiyon.php";
	$ref = $_SERVER['HTTP_REFERER'];
	$id = get("id");
	$bul = $db->satir("SELECT id,flv,bot,thumb,seo FROM video WHERE seo='$id'");
	$link = file_get_contents("http://www.redtube.com/$bul->flv");
	$baslikalan='#video_url(.*?)iframe#si';
	preg_match_all($baslikalan,$link,$baslikfonksiyon); 
	$parse1=$baslikfonksiyon[0][1];
	$parse1 = urldecode($parse1);
	$degistir = 'video_url=';
	$parse1= preg_replace("($degistir)" , "", $parse1 );
	 $degistir = '<iframe>';
        $parse1= preg_replace("($degistir)" , "", $parse1 );
	 $degistir = '<iframe';
        $parse1= preg_replace("($degistir)" , "", $parse1 );
	 trim($parse1);/*
	$link = vericek("http://saintx.net/dene.php?adres=".urlencode('http://www.redtube.com/'.$bul->flv));
	echo $link;
	exit;
	$data = json_decode($link); 
	if($data->do_update) {
		$db->query("UPDATE video SET flv = '$data->update_id' WHERE id = '$id'");
	}
	echo $data->url;*/
    header('Location : '. trim($parse1));
?>
