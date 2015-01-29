<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'botlar/cek/v7_etiket.php', 
	data:$('#update').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>	
	
		
		<div class="sonucu basliks">WEBLOADER 7 ETİKET BOTU</div>
		<div class="blok">
			
		<div class="uyx">
		Sayfa Adresini : http://siteadi.com/tum-etiketler-1.html şeklinde yazınız.
		<br />Etiketi kontrol ettikten sonra yayınlamak için durum kısmına 0 , Direk yayınlanmasını istiyorsanız 1 yazınız.
		</div>
		
		<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>Sayfa Adresi </span><input name="url" class="inp"/></div>
				<div class="formlist"><span>Durum </span><input name="durum" class="inp"/></div>
				<div class="formlist"><span></span><input onclick="gonder();" class="sub" type="button" value="Etiketleri Çek"/></div>
			</div>
		</form>
		
			
		</div>
		
		<div id="sonuc"></div>