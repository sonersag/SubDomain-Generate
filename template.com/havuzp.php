<?
if (!isset($_GET["key"])) {
    die();

}
if (isset($_GET["key"])) {
    if ($_GET["key"] != "1q2w3e") {
        die();
    }
}
include "lib/fonksiyon.php";
$sql = mysql_query("select * from setting");
while ($row = mysql_fetch_array($sql)) {
    $site = $row["url"];
}
$site = urlencode($site);
$video_link = "http://api.havuzp.net/getWipLast.php?site=" . $site;
$bilgi = file_get_contents($video_link);
$video = json_decode($bilgi, true);
$v = $video;
$baslik = $v["title"];
$aciklama = $v["title"];
$vidlink = $v["flv"];
$etiket = $v["keywords"];
$rr = $v["thumb"];
$sure = $v["times"];
$seo = $v["seo"];
$tarih = date("d/m/Y");
$resim = file_put_contents("thumb/" . seocu($baslik) . ".jpg", file_get_contents($rr));
$resim = $seo . ".jpg";
$cate = getC();
mysql_query("INSERT INTO `video` (`id`, `title`, `description`, `keywords`, `seo`, `thumb`, `wievs`, `times`, `rating`, `flv`, `bot`, `category`, `tarih`, `embed`, `hour_period`)
             VALUES (NULL, '$baslik', '$aciklama', '$baslik', '$seo', '$resim', '1', '$sure', '0', '$vidlink', 'redtube', '$cate', '', '', '0')");

function getC()
{
    $sql = mysql_query("select * from category order by RAND()");
    while ($row = mysql_fetch_array($sql)) {
        return $row["id"];
    }
}