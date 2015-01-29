<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/etiduzenle.php', 
	data:$('#update').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>	
	
		<div id="sonuc"></div>
		<div class="sonucu basliks">ETİKET DÜZENLE</div>
		<div class="blok">
			
			<?php
				
				
				$id		= $_GET[id];
				$katx 	= $db->satir("SELECT * FROM tag WHERE id='$id'");
			
			?>
			
			<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>Etiket</span><input name="title" class="inp" value="<?php echo $katx->title;?>"/></div>
				<input name="id" type="hidden" value="<?php echo $katx->id;?>"/>
				<input name="ref" type="hidden" value="<?php echo $_SERVER['HTTP_REFERER']?>"/>
				<div class="formlist"><span></span><input onclick="gonder();" class="sub" type="button" value="Gönder"/></div>
			</div>
			</form>
			
		</div>