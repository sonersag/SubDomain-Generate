<?php
	function _pingle($site) { 
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL,$site); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
		curl_exec($ch); 
		curl_close($ch);     
	} 
	function vid_ping($title, $url, $sitemap, $base) {
		$sitemap = $base."rss.xml"; 
		$ping1 = 'http://pingomatic.com/ping/?title='.urlencode($title).'&blogurl='.urlencode($site).'&rssurl='.urlencode($sitemap).'&chk_weblogscom=on&chk_blogs=on&chk_technorati=on&chk_feedburner=on&chk_syndic8=on&chk_newsgator=on&chk_myyahoo=on&chk_pubsubcom=on&chk_blogdigger=on&chk_blogrolling=on&chk_blogstreet=on&chk_moreover=on&chk_weblogalot=on&chk_icerocket=on&chk_newsisfree=on&chk_topicexchange=on&chk_google=on&chk_tailrank=on&chk_bloglines=on&chk_postrank=on&chk_skygrid=on&chk_collecta=on&chk_audioweblogs=on&chk_rubhub=on&chk_geourl=on&chk_a2b=on&chk_blogshares=on'; 
		_pingle($ping1);
	}
	
	if($_POST) {
	//	vid_ping($_POST['title'], $_POST['url'], $_POST['sitemap'], $_POST['base']);
	echo 'OK';
	}
?>