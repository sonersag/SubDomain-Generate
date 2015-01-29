<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/yorumduzenle.php', 
	data:$('#update').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>	
	
		<div id="sonuc"></div>
		<div class="sonucu basliks">YORUM DÜZENLE</div>
		<div class="blok">
			
			<?php
			
				$id		= suzgec($_GET[id]);
				$katx 	= $db->satir("SELECT * FROM comment WHERE id='$id'");
			
			?>
			
			<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>User</span><input name="user" class="inp" value="<?php echo $katx->user;?>"/></div>
				<div class="formlist"><span>Eposta</span><input name="eposta" class="inp" value="<?php echo $katx->eposta;?>" /></div>
				<div class="formlist"><span>Yorum</span><textarea name="yorum" class="text"><?php echo $katx->comment;?></textarea></div>
				<div class="formlist"><span>İp Adresi</span><input name="ip" class="inp" value="<?php echo $katx->ipadress;?>" /></div>
				<div class="formlist"><span>Video Adresi</span><input class="inp" value="<?php echo $ayaral->url ;?><?php echo videobul($katx->video);?>" /></div>
				<div class="formlist"><span>Durum</span>
					<select name="durum" class="select">
						<option value="1">Onaylı</option>
						<option value="0">Onaysız</option>
					</select>
				</div>
				<input name="id" type="hidden" value="<?php echo $katx->id;?>"/>
				<div class="formlist"><span></span><input onclick="gonder();" class="sub" type="button" value="Gönder"/></div>
			</div>
			</form>
			
		</div>