<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/parola.php', 
	data:$('#update').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>	
	
		<div id="sonuc"></div>
		<div class="sonucu basliks">PAROLA DEĞİŞTİR</div>
		<div class="blok">
			
			
			<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>Eski Parola</span><input name="parola" class="inp" value="<?php echo $katx->title;?>"/></div>
				<div class="formlist"><span>Yeni Parola</span><input name="parola1" class="inp" /></div>
				<div class="formlist"><span>Yeni Parola ( Tekrar )</span><input name="parola2" class="inp" /></div>
				<div class="formlist"><span></span><input onclick="gonder();" class="sub" type="button" value="Gönder"/></div>
			</div>
			</form>
			
		</div>