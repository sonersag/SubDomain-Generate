		<div id="sonuc"></div>
		<div class="sonucu basliks">İLETİŞİM MESAJI OKU</div>
		<div class="blok">
			
		<?php
		
		
			$id		= suzgec($_GET[id]);
			
			$sor	= $db->satir("SELECT * FROM iletisim WHERE id='$id'");
		
		?>	
			
			<ul id="gitoku">
				
				<li><b>İsim Soyisim </b> <?php echo $sor->isim;?> </li>
				<li><b>Eposta </b> <?php echo $sor->eposta;?> </li>
				<li><b>Eposta </b> <?php echo $sor->eposta;?> </li>
				<li><b>Konu </b> <?php echo $sor->konu;?> </li>
				<li><b>IP Adresi</b> <?php echo $sor->IP;?> </li>
				<li><b>Tarih </b> <?php echo $sor->tarih;?> </li>
				<li><b>Tarayıcı </b> <span><?php echo $sor->tarayici;?></span></li>
				<li><b>Mesaj </b> <?php echo $sor->mesaj;?> </li>
			</ul>
			
			<?php if ($sor->durum==0) {?><a id="okudum" href="index.php?iletisim=okundu&id=<?php echo $sor->id;?>">OKUNDU OLARAK İŞARETLE</a><?php } ?>
		
			
			
		</div>