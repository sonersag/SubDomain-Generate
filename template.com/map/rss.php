<?='<?'?>xml version='1.0' encoding='UTF-8'<?='?>'?>
<?php
	include ("../lib/fonksiyon.php");
	@header("Content-Type:application/xhtml+xml");
?>
<rss version="2.0"> 
<channel> 
<title><?php echo $ayaral->title;?> | Video RSS</title> 
<description><?php echo $ayaral->description;?></description> 
<link><?php echo $ayaral->url;?></link> 
<language>tr</language> 

<?php
	
	$videolar = $db->tablo("SELECT * FROM video ORDER BY id DESC LIMIT 10");
	foreach ($videolar as $video){

?>
<item> 
<title><![CDATA[<?php echo $video->tarih. " : " . $video->title;?>]]></title> 
<description><img style="float:left" width="100" src="<?php echo $ayaral->url."thumb/".$video->thumb?>" alt="" /><?php echo $video->tarih ." ". $video->description;?></description> 
<link><?php echo $ayaral->url .VIDEO_LINK . $video->seo;?>.html</link> 
<pubDate><?php echo $video->tarih;?></pubDate>
</item>
<?php } ?>


</channel> 
</rss>