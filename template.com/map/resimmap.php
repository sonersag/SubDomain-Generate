<?php print_r('<?xml version="1.0" encoding="UTF-8"?> 
<urlset 
  xmlns="http://www.google.com/schemas/sitemap/0.84" 
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
  xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" 
  xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 
                      http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">'.PHP_EOL);
	include "../lib/fonksiyon.php";
	$new = $db->tablo("SELECT wievs,thumb,title,times,rating,seo FROM video ORDER BY id DESC LIMIT 2500");
	foreach ($new as $nx){	?>
	<url>
		<loc><?php echo $ayaral->url .VIDEO_LINK . $nx->seo;?>.html</loc>
		<image:image>
			<image:loc><?php echo $ayaral->url . "thumb/" .$nx->thumb?></image:loc>
		</image:image>
	</url>
<?php } ?></urlset>