<?php
session_start();
require "lib/fonksiyon.php";
$veri = get("seo");
$sayi = 20;
$tagbul = $db->satir("SELECT * FROM tag WHERE seo='$veri'");
$sayfaisim = $tagbul->title;
if ($tagbul == FALSE) {
    echo '<script>window.location="' . $ayaral->url . '404.html";</script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title><?php echo $sayfaisim; ?>porno ,<?php echo $sayfaisim; ?>sikiş »<?php echo $ayaral->title; ?></title>
<meta name="keywords" content="<?php echo $sayfaisim . ", " . $ayaral->keywords; ?>"/>
<meta name="description" content="<?php echo $sayfaisim; ?> porno , <?php echo $sayfaisim; ?> sikiş, <?php echo $sayfaisim; ?> sex, <?php echo $sayfaisim; ?> pornolar, <?php echo $sayfaisim; ?> porno izle."/>
<meta name="robots" content="index, follow"/>
<meta name="revisit-after" content="7 days" />
<meta name="RATING" content="General / Mature / Adult" />
<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />
<meta name="author" content="voodore Studios Tube" />
<meta http-equiv="content-language" content="tr"/>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $ayaral->url; ?>rss.xml"/>
<link rel="Shortcut Icon" type="image/ico" href="<?php echo $ayaral->url; ?>img/favicon.png"/>
<meta http-equiv="Reply-to" content="<?php echo $ayaral->eposta; ?>"/>
<link rel="stylesheet" href="<?php echo $ayaral->url; ?>css/style.css"/>
</head>
<body>
<?php include "include/header.php"; ?>
<div id="mainblok">
  <?php include "include/sidebar.php"; ?>
  <div id="rightblok">
    <?php if ($rx == 0 && $reklam->slot2 != "" && $ayaral->rkapat == 0) {
            echo '<div class="ad_slot2">' . $reklam->slot2 . '</div>';
        } ?>
    <h2><?php echo $tagbul->title; ?> Porno Video Etiketi</h2>
    <div class="video_list_blok">
      <?php
            $new = $db->tablo("SELECT wievs,thumb,title,times,rating,seo FROM video WHERE MATCH (title,description,keywords) AGAINST ('*$veri*' IN BOOLEAN MODE) LIMIT $sayi");
            foreach ($new as $nx) {
                ?>
      <div class="porn_video"> <span class="porn_wievs"><?php echo $nx->wievs; ?> hit</span> <a title="<?php echo $nx->title; ?>"
                       href="<?php echo $ayaral->url . VIDEO_LINK . $nx->seo; ?>.html"><img
                            src="<?php echo $ayaral->url; ?>thumb/<?php echo $nx->thumb; ?>"
                            alt="<?php echo $nx->title; ?>"/></a> <a title="<?php echo $nx->title; ?>" class="porn_video_link"
                       href="<?php echo $ayaral->url . VIDEO_LINK . $nx->seo; ?>.html"><?php echo $nx->title; ?></a> <span class="porn_time"><?php echo $nx->times; ?></span> <span class="porn_like"><?php echo $nx->rating; ?></span> </div>
      <?php
            }
            if ($new == FALSE) {
                $new = $db->tablo("SELECT wievs,thumb,title,times,rating,seo FROM video ORDER BY RAND() DESC LIMIT $sayi");
                foreach ($new as $nx) {
                    ?>
      <div class="porn_video"> <span class="porn_wievs"><?php echo $nx->wievs; ?> hit</span> <a title="<?php echo $nx->title; ?>"
                           href="<?php echo $ayaral->url . VIDEO_LINK . $nx->seo; ?>.html"><img
                                src="<?php echo $ayaral->url; ?>thumb/<?php echo $nx->thumb; ?>"
                                alt="<?php echo $nx->title; ?>"/></a> <a title="<?php echo $nx->title; ?>" class="porn_video_link"
                           href="<?php echo $ayaral->url . VIDEO_LINK . $nx->seo; ?>.html"><?php echo $nx->title; ?></a> <span class="porn_time"><?php echo $nx->times; ?></span> <span class="porn_like"><?php echo $nx->rating; ?></span> </div>
      <?php }
            } ?>
      <div class="clear"></div>
    </div>
  </div>
</div>
<div class="clear"></div>
<?php include "include/footer.php"; ?>
</body>
</html>