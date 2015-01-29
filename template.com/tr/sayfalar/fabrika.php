<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/fabrika.php', 
	data:$('#update').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>	
	
		<div id="sonuc"></div>
		<div class="sonucu basliks">FABRİKA AYARLARINA DÖN</div>
		<div class="blok">
			
		<div class="uyx">Fabrika ayarlarına dön butonuna bastığınızda veritabanındaki (video,etiket,kategori,yorum,iletişim,önbellek,reklam,rating) tablolarının tamamı boşaltılır.Videolara ait resimler sunucudan silinir.</div>
		
		<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>Mevcut Admin Şifreniz</span><input type="password" name="sifre" class="inp" value="<?php echo $katx->title;?>"/></div>
				<div class="formlist"><span></span><input onclick="gonder();" class="sub" type="button" value="Fabrika Ayarlarına Dön"/></div>
			</div>
		</form>
		
			
		</div>