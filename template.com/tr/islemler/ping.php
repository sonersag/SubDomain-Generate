<?php

	if ($_SESSION["login"]!="true")
	{
		exit;
	}

function pingle($site) { 
    $ch = curl_init(); 
    curl_setopt($ch,CURLOPT_URL,$site); 
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
    curl_exec($ch); 
    curl_close($ch);     
} 

$site 		= $ayaral->url; 
$sitemap 	= $ayaral->url."rss.xml"; 
$ping1 		= 'http://pingomatic.com/ping/?title='.urlencode($ayaral->title).'&blogurl='.urlencode($site).'&rssurl='.urlencode($sitemap).'&chk_weblogscom=on&chk_blogs=on&chk_technorati=on&chk_feedburner=on&chk_syndic8=on&chk_newsgator=on&chk_myyahoo=on&chk_pubsubcom=on&chk_blogdigger=on&chk_blogrolling=on&chk_blogstreet=on&chk_moreover=on&chk_weblogalot=on&chk_icerocket=on&chk_newsisfree=on&chk_topicexchange=on&chk_google=on&chk_tailrank=on&chk_bloglines=on&chk_postrank=on&chk_skygrid=on&chk_collecta=on&chk_audioweblogs=on&chk_rubhub=on&chk_geourl=on&chk_a2b=on&chk_blogshares=on'; 
$ping2		= "http://www.google.com/webmasters/sitemaps/ping?sitemap=" .urlencode("$ayaral->url")."vsitemap.xml";
$ping3		= "http://www.google.com/webmasters/sitemaps/ping?sitemap=" .urlencode("$ayaral->url")."resimmap.xml";
$ping4		= "http://www.google.com/webmasters/sitemaps/ping?sitemap=" .urlencode("$ayaral->url")."etimap.xml";
$ping5		= "http://www.google.com/webmasters/sitemaps/ping?sitemap=" .urlencode("$ayaral->url")."rss.xml";
pingle($ping1);  
pingle($ping2);  
pingle($ping3);  
pingle($ping4);  
pingle($ping5);  

echo '<div class="sonucu sonucu_ok">Ping Gönderme Başarı İle Tamamlandı!</div>';



?>