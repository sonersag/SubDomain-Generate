<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/reklam.php', 
	data:$('#update').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>	
	
		<div id="sonuc"></div>
		<div class="sonucu basliks">REKLAM ALANLARI</div>
		<div class="blok">
			
			<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>Slot 1 ( Sidebar ) </span><textarea name="slot1" class="text"><?php echo $reklam->slot1;?></textarea></div>
				<div class="formlist"><span>Slot 2 ( Header )</span><textarea name="slot2" class="text"><?php echo $reklam->slot2;?></textarea></div>
				<div class="formlist"><span>Slot 3 ( Video Üstü )</span><textarea name="slot3" class="text"><?php echo $reklam->slot3;?></textarea></div>
				<div class="formlist"><span>Slot 4 ( Splash & Popup)</span><textarea name="slot4" class="text"><?php echo $reklam->slot4;?></textarea></div>
				<div class="formlist"><span>Slot 5 ( Video Altı )</span><textarea name="slot5" class="text"><?php echo $reklam->slot5;?></textarea></div>
				<div class="formlist"><span>Slot 6 ( Sol Kayan )</span><textarea name="slot6" class="text"><?php echo $reklam->slot6;?></textarea></div>
				<div class="formlist"><span>Slot 7 ( Sağ Kayan )</span><textarea name="slot7" class="text"><?php echo $reklam->slot7;?></textarea></div>
				<div class="formlist"><span>Footer Linkleri </span><textarea name="slot8" class="text"><?php echo $reklam->slot8;?></textarea></div>
				<div class="formlist"><span></span><input onclick="gonder();" class="sub" type="button" value="Gönder"/></div>
			</div>
			</form>
			
		</div>