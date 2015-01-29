<?php
ini_set("memory_limit","256M");
header('Content-Type:text/xml;charset=utf-8'); print_r('<?xml version="1.0" encoding="UTF-8"?>
<urlset 
  xmlns="http://www.google.com/schemas/sitemap/0.84" 
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
  xmlns:mobile="http://www.google.com/schemas/sitemap-mobile/1.0" 
  xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 
                      http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">'.PHP_EOL);
	include "../lib/fonksiyon.php";
	$page = $_GET['p'];
	if(!$page) {
		$new = $db->tablo("SELECT * FROM tag WHERE statu ='1' ORDER BY id DESC LIMIT 2500");
	} else {
		if($page == '2') { $new = $db->tablo("SELECT * FROM tag WHERE statu ='1' ORDER BY id DESC LIMIT 50000, 100000"); }
		if($page == '3') { $new = $db->tablo("SELECT * FROM tag WHERE statu ='1' ORDER BY id DESC LIMIT 100000, 150000"); }
	}
	foreach ($new as $nx): ?>
	<url>
		<loc><?php echo $ayaral->url . TAG_LINK . $nx->seo;?>.html</loc>
		<priority>0.500</priority>
	</url>
<?php endforeach; ?>
</urlset>