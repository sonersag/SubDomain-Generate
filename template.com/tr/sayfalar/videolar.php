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
		
		<div class="sonucu basliks">VİDEOLAR <span>Toplam ( <?php echo $vsay;?> Adet ) video bulunuyor</span></div>
		<div class="blok">
			<form id="vidz">
			<div id="list_alani">
				<table>
					<tr class="tr_ust">
						<td width="10"><input name="checkall" onclick="checkUncheckAll(this);" type="checkbox" /></td> 
						<td width="50">ID</td> 
						<td width="420">Video Adı</td> 
						<td width="150">Keywords</td> 
						<td width="70">Tarih</td> 
						<td width="62">İşlem</td> 
					</tr>
					
					
					<?php
					
						$say		= $db->rowsquery("SELECT id FROM video");
						$sayfala 	= $say;
						$sayi	 	= 20;
						$page 		= isset($_GET["page"]) ? intval($_GET["page"]) : 1;
						$s 			= ($page-1)*$sayi;
						$sayfa		= "index.php?video=list&page=";
						
						$vids	= $db->tablo("SELECT * FROM video ORDER BY id DESC LIMIT $s,$sayi");
						foreach ($vids as $kat){
					?>
					
					<tr class="tr_alt">
						<td width="10"><input type="checkbox" name="cvid[]" value="<?php echo $kat->id;?>"/></td> 
						<td width="50"><?php echo $kat->id;?></td> 
						<td title='<img src="<?php echo $ayaral->url."thumb/".$kat->thumb;?>" alt="" />' class="vtip" width="420">
							<span ><?php echo $kat->title;?></span>
						</td> 
						<td width="150"><?php kbuls($kat->category);?></td> 
						<td width="70"><?php echo $kat->tarih;?></td> 
						<td class="islem" width="62">
							<a href="index.php?video=duzenle&id=<?php echo $kat->id;?>"><img src="img/icon/edit.png" alt="" /></a>
							<a onClick="return confirm('Bu Videoyu Silmek istediğinize emin misiniz?')" href="islemler/vidsil.php?cid=<?php echo $kat->id;?>"><img src="img/icon/delete.gif" alt="" /></a>
						</td> 
					</tr>
					
					<?php } ?>
					

					
				</table>
				
				<div class="temizle"></div>
				<?php if ($vids==FALSE) echo '<div class="yok">Video Bulunamadı</div>'; ?>
					<div class="islemler">
						<select class="sec">
							<option value="">Seçili Olanları Sil</option>
						</select>
						
						<input onClick="if (confirm('Seçili tüm videolar silinecek.Bu işlemi yapmak istediğinize eminmisiniz?')) {gonder();}" type="button" class="yap" value="İşlemi Gerçekleştir"/>
					
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
