<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/katekle.php', 
	data:$('#update').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>	
	
		<div id="sonuc"></div>
		<div class="sonucu basliks">KATEGORİ EKLE</div>
		<div class="blok">
			
			<?php
			
				$katx = $db->satir("SELECT * FROM category WHERE id='$id'");
			
			?>
			
			<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>Kategori Adı</span><input name="title" class="inp" value="<?php echo $katx->title;?>"/></div>
				<div class="formlist"><span>Kategori Keywords</span><input name="keywords" class="inp" value="<?php echo $katx->keywords;?>" /></div>
				<div class="formlist"><span>Kategori Description</span><textarea name="description" class="text"><?php echo $katx->description;?></textarea></div>
				<div class="formlist"><span></span><input onclick="gonder();" class="sub" type="button" value="Gönder"/></div>
			</div>
			</form>
			
		</div>