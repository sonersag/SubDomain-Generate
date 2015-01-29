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
		<div class="sonucu basliks">SİTE GENEL AYARLARI</div>
		<div class="blok">
			
			<form id="update">
			<div id="form_alani">
				<div class="formlist"><span>Site Adresi</span><input name="url" class="inp" value="<?php echo $ayaral->url;?>"/></div>
				<div class="formlist"><span>Site Başlık</span><input name="title" class="inp" value="<?php echo $ayaral->title;?>" /></div>
				<div class="formlist"><span>Site Description</span><textarea name="description" class="text"><?php echo $ayaral->description;?></textarea></div>
				<div class="formlist"><span>Site Keywords</span><input name="keywords" class="inp" value="<?php echo $ayaral->keywords;?>" /></div>
				<div class="formlist"><span>Admin Eposta</span><input name="eposta" class="inp" value="<?php echo $ayaral->eposta;?>" /></div>
				<div class="formlist"><span>Site Copyright</span><input name="copyright" class="inp" value="<?php echo $ayaral->copyright;?>" /></div>
				<div class="formlist"><span>Header Yazi</span><input name="hyazi" class="inp" value="<?php echo $ayaral->header_yazi;?>" /></div>
				<div class="formlist"><span>Sayaç Kodu</span><textarea name="sayac" class="text"><?php echo $ayaral->sayac;?></textarea></div>
				<div class="formlist"><span>Online Sayaç (Amung)</span><textarea name="amung" class="text"><?php echo $ayaral->amung;?></textarea></div>
				<div class="formlist"><span>Reklamları Kapat</span>
					<?php echo select($ayaral->rkapat,"rkapat"); ?>
				</div>
				<div class="formlist"><span>Aramaları Kaydet</span>
					<?php echo select($ayaral->arama_kaydet,"arama_kaydet"); ?>	
				</div>
				<div class="formlist"><span>Player Autostart</span>
					<?php echo select($ayaral->autostart,"autostart"); ?>	
				</div>
				<div class="formlist"><span>Player Tema</span>
					<select name="skin" class="select">
						<option value="<?php echo $ayaral->skin;?>"><?php echo ucwords($ayaral->skin);?></option>
						<option value="beelden">Beelden</option>
						<option value="bekle">Bekle</option>
						<option value="glow">Glow</option>
						<option value="modieus">Modieus</option>
						<option value="nacht">Nacht</option>
						<option value="newtubedark">Newtubedark</option>
						<option value="slim">Slim</option>
						<option value="snel">Snel</option>
						<option value="stormtrooper">Stormtrooper</option>
						<option value="whotube">Whotube</option>
					</select>
				</div>
				<div class="formlist"><span>File Cache</span>
					<?php echo select($ayaral->cache,"cache"); ?>
				</div>
				<div class="formlist"><span></span><input onclick="gonder();" class="sub" type="button" value="Gönder"/></div>
			</div>
			</form>
			
		</div>