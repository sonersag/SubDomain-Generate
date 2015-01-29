<div id="leftblok">
  <?php if ($_COOKIE["rx"]!="1") { if ($ayaral->rkapat==1) echo "<a href='{$ayaral->url}exit.php' id='reklamkapat'>Close</a>";} ?>
  <h2>KATEGORİLER</h2>
  <ul id="left_categories">
    <?php $categories = $db->tablo("SELECT title,seo FROM category ORDER by title");
	foreach ($categories as $category){
?>
    <li><a <?php echo active($gelen_veri,$category->seo);?> title="<?php echo $category->title;?>" href="<?php echo $ayaral->url . CATEGORY_LINK . $category->seo;?>.html"> <?php echo $category->title;?></a></li>
    <?php } ?>
  </ul>
  <?php if ($rx==0 || $ayaral->rkapat==0){ echo '<div class="ad_slot1">'.$reklam->slot1.'</div>'; }?>
</div>
