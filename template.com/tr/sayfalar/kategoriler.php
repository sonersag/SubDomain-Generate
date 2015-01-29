<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/coklu_katsil.php', 
	data:$('#kategori').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>
	
		<div id="sonuc"></div>
		
		<div class="sonucu basliks">KATEGORİLER <span>Toplam ( <?php echo $s_kat;?> Adet ) kategori bulunuyor</span></div>
		<div class="blok">
			<form id="kategori">
			<div id="list_alani">
				<table>
					<tr class="tr_ust">
						<td width="10"><input name="checkall" onclick="checkUncheckAll(this);" type="checkbox" /></td> 
						<td width="50">ID</td> 
						<td width="200">Kategori Adı</td> 
						<td width="350">Keywords</td> 
						<td width="100">Video Sayısı</td> 
						<td width="62">İşlem</td> 
					</tr>
					
					
					<?php
					
						$kats	= $db->tablo("SELECT * FROM category ORDER BY title");
						foreach ($kats as $kat){
					?>
					
					<tr class="tr_alt">
						<td width="10"><input type="checkbox" name="ckat[]" value="<?php echo $kat->id;?>"/></td> 
						<td width="50"><?php echo $kat->id;?></td> 
						<td width="200">
							<span class="tool"><?php echo $kat->title;?></span>
						</td> 
						<td width="350"><?php echo $kat->keywords;?></td> 
						<td width="100"><?php echo catsay($kat->id); ?></td> 
						<td class="islem" width="62">
							<a href="index.php?kategori=duzenle&id=<?php echo $kat->id;?>"><img src="img/icon/edit.png" alt="" /></a>
							<a onclick="return confirm('Bu Kategoriyi Silmek istediğinize emin misiniz?')" href="islemler/katsil.php?cid=<?php echo $kat->id;?>"><img src="img/icon/delete.gif" alt="" /></a>
						</td> 
					</tr>
					
					<?php } ?>
					
					
				</table>
				
				<div class="temizle"></div>
				<?php if ($kats==FALSE) echo '<div class="yok">Kategori Bulunamadı</div>'; ?>
				
					<div class="islemler">
						<select class="sec">
							<option value="">Seçili Olanları Sil</option>
						</select>
						
						<input onClick="if (confirm('Seçili tüm kategoriler silinecek.Bu işlemi yapmak istediğinize eminmisiniz?')) {gonder();}" type="button" class="yap" value="İşlemi Gerçekleştir"/>
					
					<div class="temizle"></div>
					</div>
					
					<div class="temizle"></div>

			</div>
			</form>
		</div>