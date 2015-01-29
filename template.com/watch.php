<?php
session_start();
require "lib/fonksiyon.php";
$veri = get("seo");
$video = $db->satir("SELECT * FROM video WHERE seo ='$veri' ");
function title_karistir($title)
{
    $title = explode(',', $title);
    $title = array_map('trim', $title);
    shuffle($title);
    shuffle($title);
    return implode(', ', $title);
}

function vid_url()
{
    global $ayaral, $video;
    return $ayaral->url . VIDEO_LINK . $video->seo . '.html';
}

function _pingle($site)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $site);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_exec($ch);
    curl_close($ch);
}

function vid_ping($title, $url)
{
    global $ayaral;
    $site = $url;
    $sitemap = $ayaral->url . "rss.xml";
    $ping1 = 'http://pingomatic.com/ping/?title=' . urlencode($title) . '&blogurl=' . urlencode($site) . '&rssurl=' . urlencode($sitemap) . '&chk_weblogscom=on&chk_blogs=on&chk_technorati=on&chk_feedburner=on&chk_syndic8=on&chk_newsgator=on&chk_myyahoo=on&chk_pubsubcom=on&chk_blogdigger=on&chk_blogrolling=on&chk_blogstreet=on&chk_moreover=on&chk_weblogalot=on&chk_icerocket=on&chk_newsisfree=on&chk_topicexchange=on&chk_google=on&chk_tailrank=on&chk_bloglines=on&chk_postrank=on&chk_skygrid=on&chk_collecta=on&chk_audioweblogs=on&chk_rubhub=on&chk_geourl=on&chk_a2b=on&chk_blogshares=on';
    _pingle($ping1);
}

xxxx($video->keywords);
if ($_get['xxx'] == '1') {
    vid_ping(vid_url(), $video->title);
    exit;
}
function xxxx($keywords)
{
    global $db;
    $keywords = explode(',', $keywords);
    foreach ($keywords as $key => $value) {
        $kelime = seocu($keywords[$key]);
        $sorgu = (array)$db->satir("SELECT id FROM tag WHERE statu='1' AND seo='{$kelime}'");
        if (empty($sorgu[0])) {
            $db->sorgu("INSERT INTO tag (title,seo,statu) values('{$keywords[$key]}','{$kelime}','1')");
        }
    }
}

$db->sorgu("UPDATE video SET wievs = wievs + 1 WHERE id = '$video->id'");

if ($video == FALSE) {
    echo '<script>window.location="' . $ayaral->url . '404.html";</script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
        <head>
        <meta content="<?= vid_url(); ?>" name="saintx_url"/>
        <title><?php echo $video->title; ?>»<?php echo $ayaral->title; ?></title>
        <meta name="keywords" content="<?php echo $video->keywords; ?>"/>
        <meta name="description" content="<?php echo $video->description; ?>"/>
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
        <link rel="image_src" href="<?php echo $ayaral->url . "thumb/" . $video->thumb; ?>"/>
        <script type="text/javascript" src="<?php echo $ayaral->url; ?>js/jquery.js"></script>
        <script type="text/javascript">/*<![CDATA[*/
        $(document).ready(function () {
            $("a#like").click(likes)
        });
        $.ajaxSetup({type: "GET", url: "<?php echo $ayaral->url;?>lib/like.php", success: function (a) {
            $("div#like_s").html(a)
        }});
        function likes() {
            $.ajax({data: "one=<?php echo $video->id;?>"});
            return false
        }
        /*]]>*/</script>
        <!--<script type="text/javascript">
function ping(){
	var ajax = $.ajax({
		url: '/video-ping.php',
		data:{
			title: "<?=$video->title?>",
			url: "<?=vid_url()?>",
			sitemap: "<?=$ayaral->url."rss.xml"?>",
			base: "<?=$ayaral->url?>"
		},
		type: "POST",
		async: true
	});
	ajax.done(function(ht){
		//
	});
}
$(document).ready(function(){ping();});</script>-->
        </head>
        <body>
<h2 class="none"><?php echo $video->keywords; ?></h2>
<?php include "include/header.php"; ?>
<div id="mainblok">
          <?php include "include/sidebar.php"; ?>
          <div id="rightblok">
    <?php if ($rx == 0 && $reklam->slot2 != "" && $ayaral->rkapat == 0) {
            echo '<div class="ad_slot2">' . $reklam->slot2 . '</div>';
        } ?>
    <h2><?php echo $video->title; ?></h2>
    <div class="video_list_blok">
              <div id="watch">
        <?php if ($rx == 0 && $ayaral->rkapat == 0 && $reklam->slot3 != "") {
                    echo '<div class="ad_slot2">' . $reklam->slot3 . '</div>';
                } ?>
        <?php if ($video->embed == "") { ?>
        <div id="player"> 
                  <script type="text/javascript" src="<?php echo $ayaral->url; ?>player/jwplayer.js"></script>
                  <div id="mediaplayer2">Video Player Yukleniyor...</div>
                  <script
                        type="text/javascript">
                        jwplayer("mediaplayer2").setup({
                            flashplayer: "<?php echo $ayaral->url;?>player/player.swf",
                            file: "<?= getVideoUrl($video->flv);?>",
                            image: "<?php echo $ayaral->url."thumb/".$video->thumb;?>",
                            width: "718",
                            height: "481",
                            'logo': {'file': '<?php echo $ayaral->url;?>img/logo.png',
                            'hide': 'false',
                            'out': '0.9',
                            'position': 'top-right',
                            'link': '<?= "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]?>'},
                            autostart: "false",
                            'http.startparam': "start",
                            'provider': "http",
                            stretching: "exactfit",
                            quality: "false",
                            repeat: "single" });
                    </script>
                  <?
                    /*
                        <script type="text/javascript" src="<?php echo $ayaral->url;?>js/swfobject.js"></script>
                <script type="text/javascript">var so=new SWFObject("<?php echo $ayaral->url;?>player/player.swf","mpl","718","500","9.0.0");
                so.addParam("allowscriptaccess","always");
                so.addParam("allowfullscreen","true");
                so.addVariable("height","500");
                so.addVariable("width","718");
                so.addVariable("volume","100");
                so.addVariable("skin","<?php echo $ayaral->url;?>player/skin/<?php echo $ayaral->skin;?>.zip");
                so.addVariable("config","<?php echo $ayaral->url."porntube-";?><?php echo $video->seo.".mp4";?>");/*

                so.addVariable("autostart","<?php echo $autostart;?>");
                so.addVariable("http.startparam","ec_seek");
                so.addVariable("stretching","exactfit");
                so.addVariable("image","<?php echo $ayaral->url."thumb/".$video->thumb;?>");
                so.addVariable("provider","http");
                so.write("player");</script>
                     */
                    ?>
                </div>
        <?php
                } else {
                    echo $video->embed;
                } ?>
        <?php if ($rx == 0 && $ayaral->rkapat == 0 && $reklam->slot5 != "") {
                    echo '<div class="ad_slot5">' . $reklam->slot5 . '</div>';
                } ?>
      </div>
              <div class="clear"></div>
            </div>
    <div class="watch_blok"> <a href="1" id="like"></a>
              <div style="color:#fff" id="like_s"><?php echo $video->rating; ?></div>
              <a class="facebook_share"
               href="http://www.facebook.com/sharer.php?u=<?php echo $ayaral->url . VIDEO_LINK . $video->seo; ?>.html"
               target="blank"></a>
              <div class="clear"></div>
            </div>
    <h2 class="top-10">BENZER VİDEOLAR</h2>
    <div class="video_list_blok">
              <?php

            $gettengelen = get("seo");
            $dilimler = explode("-", $gettengelen);
            $w_sorgu = "";
            foreach ($dilimler as $dilim) {
                $w_sorgu = $w_sorgu . " or seo like '%$dilim%' ";
            }
            $popular = $db->tablo("SELECT wievs,thumb,title,times,rating,seo FROM video where seo like '%$gettengelen%' $w_sorgu ORDER BY RAND() DESC LIMIT 4");
            foreach ($popular as $px) {
                ?>
              <div class="porn_video"> <span class="porn_wievs"><?php echo $px->wievs; ?> hit</span> <a title="<?php echo $px->title; ?>"
                   href="<?php echo $ayaral->url . VIDEO_LINK . $px->seo; ?>.html"><img
                        src="<?php echo $ayaral->url; ?>thumb/<?php echo $px->thumb; ?>"
                        alt="<?php echo $px->title; ?>"/></a> <a title="<?php echo $px->title; ?>" class="porn_video_link"
                   href="<?php echo $ayaral->url . VIDEO_LINK . $px->seo; ?>.html"><?php echo $px->title; ?></a> <span class="porn_time"><?php echo $px->times; ?></span> <span class="porn_like"><?php echo $px->rating; ?></span> </div>
              <?php } ?>
              <div class="clear"></div>
            </div>
    <h2 class="top-10"><?php echo $video->title; ?> / VİDEOSUNA YORUM YAP</h2>
    <div class="video_list_blok"> 
              <script type="text/javascript">/*<![CDATA[*/
                function subb() {
                    $("#succes").html('<img alt="Loading" src="<?php echo $ayaral->url;?>img/loading.gif">');
                    $.ajax({type: "POST", url: "<?php echo $ayaral->url;?>lib/yorum.php", data: $("#yorumform").serialize(), success: function (a) {
                        $("#succes").html(a)
                    }})
                }
                ;
                /*]]>*/</script>
              <form id="yorumform" action="">
        <div id="succes"></div>
        <ul id="contact">
                  <li><span>İsim</span>
            <input name="isim" class="contact-input"/>
          </li>
                  <li><span>Eposta</span>
            <input name="eposta" class="contact-input"/>
          </li>
                  <li><span>Güvenlik Kodu</span>
            <input name="guvenlik" class="contact-secure"/>
            <img class="captcha" height="28" src="<?php echo $ayaral->url; ?>lib/captcha.php?characters=4" alt=""/></li>
                  <li><span>Yorumunuz</span>
            <textarea cols="30" rows="10" name="mesaj" class="contact-text" style="margin-top:7px"></textarea>
          </li>
                  <li><span></span>
            <input onclick="subb()" type="button" value="Yorumu Gönder"
                                            class="contact-submit"/>
          </li>
                </ul>
        <input type="hidden" name="video" value="<?php echo $video->id; ?>"/>
      </form>
              <div class="clear"></div>
            </div>
    <h2 class="top-10"><?php echo $video->title; ?> / VİDEOSUNA AİT YORUMLAR</h2>
    <div class="video_list_blok">
              <div id="comments">
        <?php
                $comments = $db->tablo("SELECT id,user,date,comment,video FROM comment WHERE video='$video->id' and statu='1' ORDER BY ID DESC");
                foreach ($comments as $comment) {
                    ?>
        <div id="video-comments-<?php echo $comment->id; ?>" class="comment_blok">
                  <div class="comment_user yuz"><?php echo $comment->user; ?> <span><?php echo $comment->date; ?></span></div>
                  <div class="clear"></div>
                  <div class="comment_cm"><?php echo $comment->comment ?>..</div>
                </div>
        <?php
                }
                if ($comments == FALSE) echo '<div class="warning">Bu Videoya Ait Yorum Bulunamadı!</div>'; ?>
      </div>
              <div class="clear"></div>
            </div>
  </div>
        </div>
<div class="clear"></div>
<?php include "include/footer.php"; ?>
</body>
</html>
