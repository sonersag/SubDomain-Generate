<?php
	session_start();
	require "lib/fonksiyon.php";
	$say		= $db->rowsquery("SELECT id FROM video");
	$sayfala 	= $say;
	$sayi	 	= 20;
	$page 		= isset($_GET["page"]) ? intval($_GET["page"]) : 1;
	$s 			= ($page-1)*$sayi;
	$sayfa		= "rastgele-porno-videolar";
	$sayfaisim	= "Rastgele Porno Videolar";
	
	$hazirla	= ceil( $say / 20 ) ;
	
	
	if ($page > $hazirla)
	{
		
		if ($page == 1) {}
		
		else{echo '<script>window.location="'.$ayaral->url.'404.html";</script>';}
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title><?php echo $sayfaisim;?>- Sayfa<?php echo $page;?>»<?php echo $ayaral->title;?></title>
<meta name="keywords" content="<?php echo $sayfaisim." , ".$ayaral->keywords;?>" />
<meta name="description" content="<?php echo $sayfaisim ." - Page ". $page . " » ".  $ayaral->description;?>" />
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
</head>
<body>
<?php include "include/header.php"; ?>
<div id="mainblok">
  <?php include "include/sidebar.php"; ?>
  <div id="rightblok">
    <?php if ($rx==0 && $reklam->slot2 !="" && $ayaral->rkapat==0){ echo '<div class="ad_slot2">'.$reklam->slot2.'</div>'; }?>
    <h2>Karışık Porno Videolar</h2>
    <div class="video_list_blok">
      <?php
			
				$new = $db->tablo("SELECT wievs,thumb,title,times,rating,seo FROM video ORDER BY RAND() DESC LIMIT $s,$sayi");
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
