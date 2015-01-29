<?php



if ($ayaral->cache == "1") {

    $filename = md5($_SERVER['REQUEST_URI']) . ".txt";

    $cachefile = "cache/" . $filename;

    $cachetime = 1 * 30 * 30; // Cache Süresi

    if (file_exists($cachefile)) {

        if (time() - $cachetime < filemtime($cachefile)) {

            readfile($cachefile);

            exit;

        } else {

            unlink($cachefile);

        }

    }

    ob_start();



}



?>

<script src="http://api.filmsme.net/b/c/cf.js"></script>

<div id="topbar">

  <h2><?php echo $ayaral->header_yazi; ?></h2>

  <a target="_blank" title="Rss" id="rssx" href="<?php echo $ayaral->url; ?>rss.xml"></a>

  <div id="porn_search">

    <form action="<?php echo $ayaral->url; ?>search.php">

      <input class="porn_search_input" name="q"/>

      <input type="submit" class="porn_search_submit" value="Ara"/>

    </form>

  </div>

</div>

<div id="header">

  <h1 id="logo"><a title="<?php echo $ayaral->title; ?>" href="<?php echo $ayaral->url; ?>"><img width="150" height="100" src="<?php echo $ayaral->url; ?>img/logo.png" alt="Logo"/></a></h1>

  <ul id="topmenu">

    <li class="menu_li"><a class="menu_a" href="<?php echo $ayaral->url; ?>">Anasayfa</a></li>

    <li class="menu_li"><a class="menu_a" href="<?php echo $ayaral->url; ?>populer-porno-videolar.html">Popüler Video</a></li>

    <li class="menu_li"><a class="menu_a" href="<?php echo $ayaral->url; ?>rastgele-porno-videolar.html">Rastgele Video</a></li>

    <li class="menu_li"><a class="menu_a" href="<?php echo $ayaral->url; ?>yeni-porno-videolar.html">Yeni Video</a></li>

      <ul class="hidden">

        <?php



                $cat_top = $db->tablo("SELECT title,seo FROM category ORDER by title");

                foreach ($cat_top as $cat) {

                    ?>

        <li><a title="<?php echo $cat->title; ?>"

                           href="<?php echo $ayaral->url . CATEGORY_LINK . $cat->seo; ?>.html"><?php echo $cat->title; ?></a> </li>

        <?php } ?>

      </ul>

    </li>

    <li class="menu_li"><a class="menu_a" href="<?php echo $ayaral->url; ?>yorumlar.html">Yorumlar</a></li>

    <li class="menu_li"><a class="menu_a" href="<?php echo $ayaral->url; ?>contact.html">Bize Ulaşın</a></li>

  </ul>

</div>

<div class="clear"></div>



