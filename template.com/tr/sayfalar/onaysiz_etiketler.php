<script type="text/javascript"> 
	function gonder(){ 
	$('#sonuc').slideDown('slow'); 
	$("#sonuc").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'islemler/coklu_etisil.php', 
	data:$('#etis').serialize(), 
	success:function(cevap){ 
		$("#sonuc").html(cevap)}})} 
</script>
	
		<div id="sonuc"></div>
		
		<div class="sonucu basliks">ONAY BEKLEYEN ETİKETLER <span>Toplam ( <?php echo $oesay;?> Adet ) onaysız etiket bulunuyor</span></div>
		<div class="blok">
			<form id="etis">
			<div id="list_alani">
				<table>
					<tr class="tr_ust">
						<td width="10"><input name="checkall" onclick="checkUncheckAll(this);" type="checkbox" /></td> 
						<td width="50">ID</td> 
						<td width="670">Etiket</td> 
						<td width="80">İşlem</td> 
					</tr>
					
					
					<?php
					
						$say		= $db->rowsquery("SELECT id FROM tag WHERE statu='0'");
						$sayfala 	= $say;
						$sayi	 	= 20;
						$page 		= isset($_GET["page"]) ? intval($_GET["page"]) : 1;
						$s 			= ($page-1)*$sayi;
						$sayfa		= "index.php?etiket=onaysiz&page=";
						
						$vids	= $db->tablo("SELECT * FROM tag WHERE statu='0' ORDER BY id DESC LIMIT $s,$sayi");
						foreach ($vids as $kat){
					?>
					
					<tr class="tr_alt">
						<td width="10"><input type="checkbox" name="veti[]" value="<?php echo $kat->id;?>"/></td> 
						<td width="50"><?php echo $kat->id;?></td> 
						<td width="670">
							<span ><?php echo $kat->title;?></span>
						</td> 
						<td class="islem" width="80">
							<a href="index.php?etiket=duzenle&id=<?php echo $kat->id;?>"><img src="img/icon/edit.png" alt="" /></a>
							<a onClick="return confirm('Bu Etiketi Silmek istediğinize emin misiniz?')" href="islemler/etisil.php?eid=<?php echo $kat->id;?>"><img src="img/icon/delete.gif" alt="" /></a>
							<a onClick="return confirm('Bu Etiketi Onaylamak istediğinize emin misiniz?')" href="islemler/eti_onayla.php?eid=<?php echo $kat->id;?>"><img src="img/icon/onay.png" alt="" /></a>
						</td> 
					</tr>
					
					<?php } ?>
					

					
				</table>
				
				<div class="temizle"></div>
				<?php if ($vids==FALSE) echo '<div class="yok">Etiket Bulunamadı</div>'; ?>
					<div class="islemler">
						<select name="sec" class="sec">
							<option value="1">Seçili Olanları Sil</option>
							<option value="2">Seçili Olanları Onayla</option>
						</select>
						
						<input onClick="if (confirm('Seçili tüm etiketlere işlem yapılacak.Bu işlemi yapmak istediğinize eminmisiniz?')) {gonder();}" type="button" class="yap" value="İşlemi Gerçekleştir"/>
					
					<div class="temizle"></div>
					</div>
					
					<div class="temizle"></div>
				
				<div id="sayfalama">
				<?
				if($sayfala > $sayi) : $x = 5;
				$sayfamiz = ceil($sayfala/$sayi);
				if($page > 1)
				{
					$sonraki = $page-1;
					echo '<a href="'.$sayfa.$sonraki.'" >« indietro</a>';
				}
				if($page==1) echo '<a href="'.$sayfamiz.'1" class="aktif">1</a>';
				else { ?>
				<a href="<?php echo $sayfa;?>1">1</a>
				<?php } ?>
				<?php
				if($page-$x > 2) {echo '<span>...</span>'; $i = $page-$x;} else 
				{$i = 2;}
				for($i; $i<=$page+$x; $i++) {if($i==$page) echo '<a class="aktif" href="'.$sayfa.$i.'">'.$i.'</a>';
				else { ?> 
				<a href="<?php echo $sayfa;?><?php echo $i;?>"><?php echo $i;?></a> 
				<?php } ?>
				<?php if($i==$sayfamiz) break;}
				if($page+$x < $sayfamiz-1) {echo "<span>...</span>";
				echo '<a href="'.$sayfa.$sayfamiz.'">'.$sayfamiz.'</a>';} 
				elseif($page+$x == $sayfamiz-1) {
				echo '<a href="'.$sayfa.$sayfamiz.'">'.$sayfamiz.'</a>';} 
				if($page < $sayfamiz){
				$sonraki = $page+1;
				echo '<a href="'.$sayfa.$sonraki.'">Avanti »</a>';
				}endif;
				?>
				</div>
			</form>
			</div>
			
		</div>
