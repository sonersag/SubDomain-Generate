<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/genelayar.php', 
	data:$('#update').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>	
	
		<div id="sonuc"></div>
		<div class="sonucu basliks">BOTLAR</div>
		<div class="blok">
			
			<div class="botlist">
				<a href="index.php?bot=m_v5_etiket">Etiket Botu 1 <span> ( Mahirix v5 )</span></a>
				<a href="index.php?bot=v7_etiket">Etiket Botu 2 <span> ( Webloader 7 )</span></a>
				<a href="index.php?bot=redtube">Video Botu 1 <span> ( Redtube Kategori )</span></a>
			</div>
			
			
		</div>