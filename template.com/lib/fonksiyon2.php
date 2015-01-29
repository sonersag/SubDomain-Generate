<?php
function get($data) {

	return suzgec($_GET[$data]);
}

function suzgec($veri) {

	$veri = addslashes($veri);
	$veri = mysql_escape_string($veri);
	$veri = strip_tags($veri);
	return $veri;
}

function seocu($data) {

	$data = trim($data);
	$tr = array("Ş", "Ğ", "İ", "Ü", "Ö", "Ç", "ş", "ğ", "ı", "ü", "ö", "ç", " ", "_", "--", "+", ")", "(", ".", "/", ":");
	$en = array("s", "g", "i", "u", "o", "c", "s", "g", "i", "u", "o", "c", "-", "-", "-", "-", "-", "-", "", "-", "-");
	$data = str_replace($tr, $en, $data);
	$data = preg_replace("#[^0-9a-z\\-\\+\\(\\)\\.\\/_]#si", "", $data);
	$data = preg_replace("#\\-\\-*#", "-", $data);
	$data = strtolower($data);
	return $data;
}

function vericek($url) {

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_REFERER, "www.google.com");
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function active($veri1, $veri2) {

	if ($veri1 == $veri2)
	{
		echo "id=\"a-active\"";
	}
	return;
}

function slash($item1, $clean = false) {

	if ($clean == 1)
	{
		return stripslashes($item1);
	}
	if ($clean == 2)
	{
		return str_replace("\\", "\\\\", $item1);
	}
	return addslashes(str_replace("\\", "\\\\", $item1));
}
function getVideoUrl($id){
    $link = file_get_contents("http://www.redtube.com/$id");
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
    trim($parse1);
	return  trim($parse1);
}

function cache($id, $seconds = "", $data = "") {

	$utime = time();
	$exptime = $utime + $seconds;
	if (!(mysql_query('' . "DELETE FROM cache WHERE id = '" . $id . "' && zaman <= UNIX_TIMESTAMP()")))
	{
		die(mysql_error());
	}
	if (!($result = mysql_query('' . "SELECT * FROM cache WHERE id = '" . $id . "'")))
	{
		die(mysql_error());
	}
	if (mysql_num_rows($result))
	{
		$db = mysql_fetch_row($result);
		$db[1] = slash($db[1], 1);
		$stored = unserialize($db[1]);
		if (is_array($stored))
		{
			foreach ($stored as $key => $store)
			{
				$stored[$key] = slash($stored[$key], 2);
				continue;
			}
		}
		 else
		{
			$stored = slash($stored, 2);
		}
		return $stored;
	}
	$data = serialize($data);
	$data = slash($data);
	$id = addslashes($id);
	if ($data)
	{
		if (!(mysql_query('' . "INSERT INTO cache (id, icerik, zaman) VALUES ('" . $id . "', '" . $data . "', '" . $exptime . "')")))
		{
			die(mysql_error());
		}
	}
	return FALSE;
}


require "lib.php";
$reklam = $db->satir("SELECT * FROM adversite WHERE id ='1'");
$ayaral = $db->satir("SELECT * FROM setting WHERE id ='1'");
if ($ayaral->autostart == 1)
{
	$autostart = "true";
}
 else
{
	$autostart = "false";
}
define("CODER", "wiplast");
require "json.php";



