<?php
	session_start();
	require "lib/fonksiyon.php";
	$sayfaisim	= "İletişim";
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title><?php echo $sayfaisim;?>»<?php echo $ayaral->title;?></title>
<meta name="keywords" content="<?php echo $sayfaisim." , ".$ayaral->keywords;?>" />
<meta name="description" content="<?php echo $sayfaisim . " » ".  $ayaral->description;?>" />
<meta name="robots" content="index, follow" />
<meta name="revisit-after" content="7 days" />
<meta name="RATING" content="General / Mature / Adult" />
<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />
<meta name="author" content="voodore Studios Tube" />
<meta http-equiv="content-language" content="tr" />
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $ayaral->url;?>rss.xml"/>
<link rel="Shortcut Icon" type="image/ico" href="<?php echo $ayaral->url;?>img/favicon.png"/>
<meta http-equiv="Reply-to" content="<?php echo $ayaral->eposta;?>" />
<link rel="stylesheet" href="<?php echo $ayaral->url;?>css/style.css" />
<script type="text/javascript" src="<?php echo $ayaral->url;?>js/jquery.js"></script>
<script type="text/javascript">/*<![CDATA[*/function subb(){$("#succes").html('<img alt="Loading" src="<?php echo $ayaral->url;?>img/loading.gif">');$.ajax({type:"POST",url:"<?php echo $ayaral->url;?>lib/iletisim.php",data:$("#contactform").serialize(),success:function(a){$("#succes").html(a)}})};/*]]>*/</script>
</head>
<body>
<?php include "include/header.php"; ?>
<div id="mainblok">
  <?php include "include/sidebar.php"; ?>
  <div id="rightblok">
    <?php if ($rx==0 && $reklam->slot2 !="" && $ayaral->rkapat==0){ echo '<div class="ad_slot2">'.$reklam->slot2.'</div>'; }?>
    <h2>Bize Yazınız</h2>
    <div class="video_list_blok">
      <form id="contactform" action="">
        <div id="succes"></div>
        <ul id="contact">
          <li><span>isim</span>
            <input name="isim" class="contact-input" />
          </li>
          <li><span>Mail</span>
            <input name="eposta" class="contact-input" />
          </li>
          <li><span>Konu</span>
            <input name="konu" class="contact-input" />
          </li>
          <li><span>Güvenlik Kodu</span>
            <input name="guvenlik" class="contact-secure" />
            <img class="captcha" height="29" src="<?php echo $ayaral->url;?>lib/captcha.php?characters=4" alt="" /></li>
          <li><span>Mesajınız</span>
            <textarea cols="30" rows="10" style="margin-top:7px" name="mesaj" class="contact-text"></textarea>
          </li>
          <li><span></span>
            <input onclick="subb()" type="button" value="Gönder" class="contact-submit"/>
          </li>
        </ul>
      </form>
      <div class="clear"></div>
    </div>
  </div>
</div>
<div class="clear"></div>
<?php include "include/footer.php"; ?>
</body>
</html>
