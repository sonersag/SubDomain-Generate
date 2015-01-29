<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/vidduzenle.php', 
	data:$('#update').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>	
	
		<div id="sonuc"></div>
		<div class="sonucu basliks">VİDEO DÜZENLE</div>
		<div class="blok">
			
			<?php
			
				$id		= suzgec($_GET[id]);
				$katx 	= $db->satir("SELECT * FROM video WHERE id='$id'");
			
			?>
			
			<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>Video Başlık</span><input name="title" class="inp" value="<?php echo $katx->title;?>"/></div>
				<div class="formlist"><span>Video Keywords</span><input name="keywords" class="inp" value="<?php echo $katx->keywords;?>" /></div>
				<div class="formlist"><span>Video Description</span><textarea name="description" class="text"><?php echo $katx->description;?></textarea></div>
				<div class="formlist"><span class="alticizgi vtip" title='<img src="<?php echo $ayaral->url."thumb/".$katx->thumb;?>" alt="" />'>Video Resim</span><input name="resim" class="inp" value="<?php echo $katx->thumb;?>" /></div>
				<div class="formlist"><span>Video Hit</span><input name="hit" class="inp" value="<?php echo $katx->wievs;?>" /></div>
				<div class="formlist"><span>Video Süre</span><input name="sure" class="inp" value="<?php echo $katx->times;?>" /></div>
				<div class="formlist"><span>Video Rating</span><input name="rating" class="inp" value="<?php echo $katx->rating;?>" /></div>
				<div class="formlist"><span>Video Flv</span><input name="flv" class="inp" value="<?php echo $katx->flv;?>" /></div>
				<div class="formlist"><span>Ekleyen Bot</span><input name="bot" class="inp" value="<?php echo $katx->bot;?>" /></div>
				<div class="formlist"><span>Eklenme Tarihi</span><input name="tarih" class="inp" value="<?php echo $katx->tarih;?>" /></div>
				<div class="formlist"><span>Kategori</span>
					<?php echo catxbul($katx->category);?>	
				</div>
				
				<input name="id" type="hidden" value="<?php echo $katx->id;?>"/>
				<div class="formlist"><span></span><input onclick="gonder();" class="sub" type="button" value="Gönder"/></div>
			</div>
			</form>
			
		</div>