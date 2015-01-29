<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/videoekle.php', 
	data:$('#update').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>	
	
		<div id="sonuc"></div>
		<div class="sonucu basliks">VİDEO EKLE</div>
		<div class="blok">
			
			<?php
			
				$katx = $db->satir("SELECT * FROM video WHERE id='$id'");
			
			?>
			
			<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>Video Başlık</span><input name="title" class="inp" /></div>
				<div class="formlist"><span>Video Keywords</span><input name="keywords" class="inp" /></div>
				<div class="formlist"><span>Video Description</span><textarea name="description" class="text"></textarea></div>
				<div title="Resim Url Adresini Yazınız.Sunucuya Kendisi Çekecektir." class="formlist vtip"><span class="alticizgi">Video Resim</span><input name="resim" class="inp" value="" /></div>
				<div title="45:25 Formatında arasında ( : ) kullanarak yazınız" class="formlist vtip"><span class="alticizgi">Video Süre</span><input name="sure" class="inp" /></div>
				<div class="formlist"><span>Video Flv</span><input name="flv" class="inp" /></div>
				<div class="formlist"><span>Kategori</span>
				<select class="select" name="kategori">
					<?php
					
						$kids = $db->tablo("SELECT * FROM category ORDER by title ASC");
						foreach ($kids as $kid){
					
					?>
					<option value="<?php echo $kid->id;?>"><?php echo $kid->title;?></option>
					<?php } ?>
					
				</select>
				</div>
				
				<input name="id" type="hidden" value="<?php echo $katx->id;?>"/>
				<div class="formlist"><span></span><input onclick="gonder();" class="sub" type="button" value="Gönder"/></div>
			</div>
			</form>
			
		</div>