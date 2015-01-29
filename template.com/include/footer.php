<div id="porn_tag">
  <?php
    $gettengelen = get("seo");
    $dilimler = explode("-", $gettengelen);
    $w_sorgu = "";
    foreach ($dilimler as $dilim) {
        $w_sorgu = $w_sorgu . " or seo like '%$dilim%' ";
    }
    /*
     * Orjinal olmasi gereken hali.
    $tagx = cache("etiketler");
    if (!$tagx) {
        $etx = $tagx;
    } else {
        $etiket = $db->tablo("SELECT * FROM tag WHERE statu='1' and seo like'%$gettengelen%' $w_sorgu  ORDER BY RAND() LIMIT 50");
        foreach ($etiket as $ets) {
            $etx .= '<a href="' . $ayaral->url . TAG_LINK . $ets->seo . '.html" title="' . $ets->title . '">' . $ets->title . '</a> ';
        }
        $tagx = cache("etiketler", 300, $etx);
    }
    echo $etx;
    */
    $etiket = $db->tablo("SELECT * FROM tag WHERE statu='1' and seo like'%$gettengelen%' $w_sorgu  ORDER BY RAND() LIMIT 49");
    foreach ($etiket as $ets) {
        $etx .= '<a href="' . $ayaral->url . TAG_LINK . $ets->seo . '.html" title="' . $ets->title . '">' . $ets->title . '</a> ';
    }
    echo $etx;
    ?>
</div>
<div class="clear"></div>
<div id="footer">
  <div class="footer_div">
    <p><?php echo $ayaral->copyright;?><br />
      <strong><font style="font-size:11px;color:#000"> Yetişkin Porno videolarını ücretsiz izleme keyfini sizlere sunuyoruz  Rahat porno izlemeniz için sizlere özel sunulan hd kaliteli pornoları donmadan reklamsız şekilde izleyebilirsiniz. Editörlerimiz özenle seçtiği porno videolarımız donma kasma gibi durumlar söz konusu olmayıp reklam gibi sinirinizi bozacak şeylerde çıkmamaktadır. +21 yönetmeliğine uygun şekildedir sitemiz, lütfen yaşınız uygun değilse sitemizi terk edin ve bir daha girmeyin. Videolarımız ile ilgili sorunlarınız olursa <a href="/contact.html">- ( İletişim ) -</a> 'Adresinden iletişime geçebilirsiniz.</font></strong><br />
     </p>
    <div class="online_sayac" style="margin-top:7.5px"><?php echo $ayaral->amung;?></div>
  </div>
</div>
<div align="center"><p><img src="/img/verified.gif" alt="Verified RTA member"/><div id="avgthreatlabs_safetybadge"><noscript><a href="http://www.avgthreatlabs.com?utm_source=Safety_Widget&utm_medium=NA&utm_campaign=MSBW" target="_blank">AVG Threatlabs</a></noscript></div><script language="javascript" src="https://api.avgthreatlabs.com/static/js/security.js"></script></p> </div>
<?php if ($reklam->slot8 !="") {?>
<div id="dost_siteler">
  <div id="dost_ic"> <br />
    <?php echo $reklam->slot8;?> </div>
</div>
<?php } ?>
<div class="clear"></div>
<?php if ($_COOKIE["rx"]!="1" && $reklam->slot4!=""){ echo $reklam->slot4; }?>
<?php if ($_COOKIE["rx"]!="1" && $ayaral->rkapat==0 && $reklam->slot6!=""){echo "<div id='solkayan'>".$reklam->slot6."</div>";}?>
<?php if ($_COOKIE["rx"]!="1" && $ayaral->rkapat==0 && $reklam->slot7!=""){echo "<div id='sagkayan'>".$reklam->slot7."</div>";}?>
<?php echo $ayaral->sayac;?>
<?php if ($ayaral->cache=="1") {

	$fp = fopen($cachefile, 'w+');

	fwrite($fp, ob_get_contents());

	fclose($fp);

	ob_end_flush();

}?>
