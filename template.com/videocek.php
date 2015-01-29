<?
$veriler = array("xhamster", "redtube", "seslise3", "zarting", "ppornoiz", "escortw", "aquateen", "xvideost", "seslise2", "hdpornoi", "stories3", "ttakipci", "storiess", "escorton", "eccitato", "yesilcam", "sexstori", "sexstor2", "tostream", "tostrea2", "xhasmter", "seslisex", "yesilcm", "canlise3", "canlise", "canlise2", "canlis3", "sibelkek", "gizlisi2", "tenn1tub", "ectye", "xnxxtr", "yenibirf", "canlis2", "canlis", "stream3", "eskort2", "dpornoiz", "aminakoy", "theleaked", "desirant", "amateurpornizle", "outdoorpornvideo", "ebony3dp", "animetub", "azginkar", "azmisdul", "escortal", "hdamsiki", "liselisi", "maidenpo", "pornizle", "roiporn", "sexkrali", "stories2", "xgizlika", "xliselip", "xpornoiz", "pornoizl", "femmepas", "femmesch", "danslescoulisses", "donnaapp", "piacerea", "piacerem");

foreach ($veriler as $veri) {
    include "/home/" . $veri . "/public_html/lib/ayar.php";
    $baglan_sad = mysql_connect($server, $dbuser, $dbpass, TRUE);
    mysql_selectdb($dbadi, $baglan_sad);
    mysql_set_charset('utf8', $baglan_sad);
    date_default_timezone_set('Europe/Istanbul');
    $sql = mysql_query("select * from tag");
    while ($row = mysql_fetch_array($sql)) {
        $title = $row["title"];
        $seo = $row["seo"];
        tagGirr($title, $seo);

    }
}

function tagGirr($title, $seo)
{
    $baglan_sad = mysql_connect("cpmysqlserver", "winxgirl_db", "gelecek", TRUE);
    mysql_selectdb("winxgirl_db", $baglan_sad);
    mysql_set_charset('utf8', $baglan_sad);
    date_default_timezone_set('Europe/Istanbul');
    if (filmVarMi($seo)) {
        mysql_query("insert into tag (title,seo,statu) values('$title' , '$seo' , '1')");
        echo "girdim. ";
        echo $title . "----" .$seo . "\n";
    }
    else{
        echo "varmis. \n";
    }
}

function filmVarMi($seo)
{
    $baglan_sad = mysql_connect("cpmysqlserver", "winxgirl_db", "gelecek", TRUE);
    mysql_selectdb("winxgirl_db", $baglan_sad);
    mysql_set_charset('utf8', $baglan_sad);
    date_default_timezone_set('Europe/Istanbul');
    $skon = mysql_query("select * from tag where seo='$seo'");
    while ($sk = mysql_fetch_array($skon)) {
        $fisim = $sk['seo'];
        if ($fisim == $seo) {
            echo "var\n";
            return false;
        }
    }
    return true;
}
