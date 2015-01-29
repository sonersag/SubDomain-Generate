<?php
	session_start();
	@header('Content-type: text/html; charset=utf-8');
	require "lib/fonksiyon.php";
	$say		= $db->rowsquery("SELECT id FROM video");
	$sayfala 	= $say;
	$sayi	 	= 20;
	$page 		= isset($_GET["page"]) ? intval($_GET["page"]) : 1;
	$s 			= ($page-1)*$sayi;
	$sayfa		= "yeni-porno-videolar";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title><?php echo $ayaral->title;?></title>
<meta name="keywords" content="<?php echo $ayaral->keywords;?>" />
<meta name="description" content="<?php echo $ayaral->description;?>" />
<meta name="robots" content="index, follow" />
<meta http-equiv="content-language" content="tr" />
<meta name="revisit-after" content="7 days" />
<meta name="RATING" content="General / Mature / Adult" />
<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />
<meta name="author" content="voodore Studios Tube" />
<meta http-equiv="Reply-to" content="<?php echo $ayaral->eposta;?>" />
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<link rel="canonical" href="<?php echo $ayaral->url;?>" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $ayaral->url;?>rss.xml"/>
<link rel="Shortcut Icon" type="image/ico" href="<?php echo $ayaral->url;?>img/favicon.png"/>
<link rel="stylesheet" href="<?php echo $ayaral->url;?>css/style.css" />
</head>

<body>
<?php include "include/header.php"; ?>
<div id="mainblok">
  <?php include "include/sidebar.php"; ?>
  <div id="rightblok">
    <?php if ($rx==0 && $reklam->slot2 !="" && $ayaral->rkapat==0){ echo '<div class="ad_slot2">'.$reklam->slot2.'</div>'; }?>
    <h2>POPÜLER PORNO VİDEOLAR</h2>
    <div class="video_list_blok">
      <?php
			
				$popular = $db->tablo("SELECT wievs,thumb,title,times,rating,seo FROM video ORDER BY RAND() DESC LIMIT 8");
				foreach ($popular as $px){
			
			?>
      <div class="porn_video"> <span class="porn_wievs"><?php echo $px->wievs;?> hit</span> <a title="<?php echo $px->title;?>" href="<?php echo $ayaral->url .VIDEO_LINK . $px->seo;?>.html"><img src="<?php echo $ayaral->url;?>thumb/<?php echo $px->thumb;?>" alt="<?php echo $px->title;?>" /></a> <a title="<?php echo $px->title;?>" class="porn_video_link" href="<?php echo $ayaral->url .VIDEO_LINK . $px->seo;?>.html"><?php echo $px->title;?></a> <span class="porn_time"><?php echo $px->times;?></span> <span class="porn_like"><?php echo $px->rating;?></span> </div>
      <?php } ?>
      <div class="clear"></div>
    </div>
    <h2 class="top-10">YENİ PORNO VİDEOLAR</h2>
    <div class="video_list_blok">
      <?php
			
				$new = $db->tablo("SELECT wievs,thumb,title,times,rating,seo FROM video ORDER BY id DESC LIMIT $s,56");
				foreach ($new as $nx){
			
			?>
      <div class="porn_video"> <span class="porn_wievs"><?php echo $nx->wievs;?> hit</span> <a title="<?php echo $nx->title;?>" href="<?php echo $ayaral->url .VIDEO_LINK . $nx->seo;?>.html"><img src="<?php echo $ayaral->url;?>thumb/<?php echo $nx->thumb;?>" alt="<?php echo $nx->title;?>" /></a> <a title="<?php echo $nx->title;?>" class="porn_video_link" href="<?php echo $ayaral->url .VIDEO_LINK . $nx->seo;?>.html"><?php echo $nx->title;?></a> <span class="porn_time"><?php echo $nx->times;?></span> <span class="porn_like"><?php echo $nx->rating;?></span> </div>
      <?php } ?>
      <div class="clear"></div>
    </div>
    <div id="pagination">
      <?
				if($sayfala > $sayi) : $x = 5;
				$sayfamiz = ceil($sayfala/$sayi);
				if($page > 1)
				{
					$sonraki = $page-1;
					echo '<a href="'.$sayfa.'-'.$sonraki.'.html" >« Geri</a>';
				}
				if($page==1) echo '<a href="#" id="active">1</a>';
				else { ?>
      <li><a href="<?php echo $sayfa;?>.html">1</a></li>
      <?php } ?>
      <?php
				if($page-$x > 2) {echo '<span>...</span>'; $i = $page-$x;} else 
				{$i = 2;}
				for($i; $i<=$page+$x; $i++) {if($i==$page) echo '<a id="active" href="'.$sayfa.'-'.$i.'.html">'.$i.'</a>';
				else { ?>
      <a href="<?php echo $sayfa;?>-<?php echo $i;?>.html"><?php echo $i;?></a>
      <?php } ?>
      <?php if($i==$sayfamiz) break;}
				if($page+$x < $sayfamiz-1) {echo "<span>...</span>";
				echo '<a href="'.$sayfa.'-'.$sayfamiz.'.html">'.$sayfamiz.'</a>';} 
				elseif($page+$x == $sayfamiz-1) {
				echo '<a href="'.$sayfa.'-'.$sayfamiz.'.html">'.$sayfamiz.'</a>';} 
				if($page < $sayfamiz){
				$sonraki = $page+1;
				echo '<a href="'.$sayfa.'-'.$sonraki.'.html" id="next">ileri »</a>';
				}endif;
				?>
    </div>
  </div>
</div>
<div class="clear"></div>
<?php include "include/footer.php"; ?>
</body>
</html>
