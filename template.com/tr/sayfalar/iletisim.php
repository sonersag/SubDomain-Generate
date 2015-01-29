<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/coklu_isil.php', 
	data:$('#kategori').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>
	
		<div id="sonuc"></div>
		
		<div class="sonucu basliks">İLETİŞİM MESAJLARI</div>
		<div class="blok">
			<form id="kategori">
			<div id="list_alani">
				<table>
					<tr class="tr_ust">
						<td width="10"><input name="checkall" onclick="checkUncheckAll(this);" type="checkbox" /></td> 
						<td width="200">Konu</td> 
						<td width="350">Mesaj</td> 
						<td width="180">Tarih</td> 
						<td width="62">İşlem</td> 
					</tr>
					
					
					<?php
					
						$kats	= $db->tablo("SELECT * FROM iletisim ORDER BY id DESC");
						foreach ($kats as $kat){
					?>
					
					<tr class="tr_alt" <?php echo okunmamis($kat->durum);?>>
						<td width="10"><input type="checkbox" name="iid[]" value="<?php echo $kat->id;?>"/></td> 
						<td width="200">
							<span class="tool"><?php echo $kat->konu;?></span>
						</td> 
						<td width="350"><?php echo $kat->mesaj;?></td> 
						<td width="180"><?php echo $kat->tarih; ?></td> 
						<td class="islem" width="62">
							<a title="Mesajı Oku" href="index.php?iletisim=git&id=<?php echo $kat->id;?>"><img src="img/icon/gor.png" alt="" /></a>
							<?php if ($kat->durum==0) {?><a title="Okundu" href="index.php?iletisim=okundu&id=<?php echo $kat->id;?>"><img src="img/icon/onay.png" alt="" /></a><?php } ?>
							<a onclick="return confirm('Bu Mesajı Silmek istediğinize emin misiniz?')" href="islemler/i_sil.php?id=<?php echo $kat->id;?>"><img src="img/icon/delete.gif" alt="" /></a>
						</td> 
					</tr>
					
					<?php } ?>
					
					
				</table>
				
				<div class="temizle"></div>
				<?php if ($kats==FALSE) echo '<div class="yok">Mesaj Bulunamadı</div>'; ?>
				
					<div class="islemler">
						<select name="sec" class="sec">
							<option value="1">Seçili Olanları Sil</option>
							<option value="2">Okundu Olarak İşaretlle</option>
						</select>
						
						<input onClick="if (confirm('Seçili tüm mesajlara işlem yapılacak.Bu işlemi yapmak istediğinize eminmisiniz?')) {gonder();}" type="button" class="yap" value="İşlemi Gerçekleştir"/>
					
					<div class="temizle"></div>
					</div>
					
					<div class="temizle"></div>

			</div>
			</form>
		</div>