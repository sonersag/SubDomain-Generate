<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/coklu_vidsil.php', 
	data:$('#vidz').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>
	
		<div id="sonuc"></div>
		
		<div class="sonucu basliks">VİDEOLAR <span>Toplam ( <?php echo $bck;?> Adet ) backlink bulunuyor</span></div>
		<div class="blok">
			<form id="vidz">
			<div id="list_alani">
				<table>
					<tr class="tr_ust">
						<td width="250">Site Adresi</td> 
						<td width="120">Başlama Tarihi</td> 
						<td width="120">Bitiş Tarihi</td> 
						<td width="120">Site Sahibi</td> 
						<td width="120">Mail Adresi</td> 
						<td width="100">Durum</td> 
					</tr>
					
					
					<?php
					
						$vids	= $db->tablo("SELECT * FROM backlink ORDER BY id DESC");
						foreach ($vids as $kat){
					?>
					
					<tr class="tr_alt">
						<td width="250"><?php echo $kat->site_adresi;?></td> 
						<td width="120"><?php echo $kat->baslama_tarihi;?></td> 
						<td width="120"><?php echo $kat->bitis_tarihi;?></td> 
						<td width="120"><?php echo $kat->site_sahibi;?></td> 
						<td width="120"><?php echo $kat->mail_adresi;?></td> 
						<td width="100"><?php echo backlink($kat->id);?></td> 
					</tr>
					
					<?php } ?>
					

					
				</table>
				
				<div class="temizle"></div>
				<?php if ($vids==FALSE) echo '<div class="yok">Video Bulunamadı</div>'; ?>
					
					
					<div class="temizle"></div>
				

			</form>
			</div>
			
		</div>