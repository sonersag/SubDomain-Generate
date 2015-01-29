
	
	<div id="anablok">
		<div id="header">
			<div id="logo">
				<a href="index.php"><img width="177" height="50" src="../img/logo.png" alt="" /></a>
			</div>
			
			<ul id="anamenu">
				<li><a target="_blank" href="<?php echo $ayaral->url;?>">Site</a></li>
				<li><a href="index.php?video=ekle">Video Ekle</a></li>
				<li><a href="index.php?kategori=ekle">Kategori Ekle</a></li>
				<li><a href="index.php?yorum=onaysiz">Bekleyen Yorum <span>( <?php echo $ysay;?> )</span></a></li>
				<li><a href="index.php?etiket=onaysiz">Bekleyen Etiket <span>( <?php echo $oesay;?> )</span></a></li>
				<li><a href="#">İstatistik</a></li>
				<li><a onclick="return confirm('Çıkış Yapmak İstiyor musunuz?')" id="cikis" href="cikis.php">Çıkış</a></li>
			</ul>
		</div>
		<div class="temizle"></div>
		
		<div id="navigasyon">
		
			<div class="icon">
				<a href="index.php?ayar=genelayar"><img src="img/icon/ayar.png" alt="" /></a>
				<a class="icona" href="index.php?ayar=genelayar">Genel Ayarlar</a>
			</div>
			
			<div class="icon">
				<a href="index.php?ayar=reklam"><img src="img/icon/reklam.png" alt="" /></a>
				<a class="icona" href="index.php?ayar=reklam">Reklam Slotları</a>
			</div>
			
			<div class="icon">
				<a href="index.php?kategori=list"><img src="img/icon/kategoriler.png" alt="" /></a>
				<a class="icona" href="index.php?kategori=list">Kategoriler</a>
			</div>
			
			<div class="icon">
				<a href="index.php?video=list"><img src="img/icon/videolar.png" alt="" /></a>
				<a class="icona" href="index.php?video=list">Videolar</a>
			</div>
			
			<div class="icon">
				<a href="index.php?yorum=list"><img src="img/icon/yorumlar.png" alt="" /></a>
				<a class="icona" href="index.php?yorum=list">Onaylı Yorumlar</a>
			</div>
			
			<div class="icon">
				<a href="index.php?iletisim=oku"><img src="img/icon/iletisim.png" alt="" /></a>
				<a class="icona" href="index.php?iletisim=oku">İletişim Mesajları <span class="isay">( <?php echo $isay;?> )</span></a>
			</div>
			
			<div class="icon">
				<a href="index.php?etiket=list"><img src="img/icon/etiket.png" alt="" /></a>
				<a class="icona" href="index.php?etiket=list">Etiketler</a>
			</div>
			
			<div class="icon">
				<a onClick="return confirm('Cache Boşaltılsınmı?')" href="index.php?cache=temizle"><img src="img/icon/cache.png" alt="" /></a>
				<a onClick="return confirm('Cache Boşaltılsınmı?')" class="icona" href="index.php?cache=temizle">Cache Boşalt</a>
			</div>
			
			<div class="icon">
				<a onClick="return confirm('Yedekleme Başlatılsınmı?')" href="index.php?yedek=al"><img src="img/icon/yedek.png" alt="" /></a>
				<a onClick="return confirm('Yedekleme Başlatılsınmı?')" class="icona" href="index.php?yedek=al">Sql Yedekle</a>
			</div>
			
			<div class="icon">
				<a href="index.php?ayar=parola"><img src="img/icon/parola.png" alt="" /></a>
				<a class="icona" href="index.php?ayar=parola">Parola Değiştir</a>
			</div>
			
			<div class="icon">
				<a href="index.php?ayar=fabrika"><img src="img/icon/fabrika.png" alt="" /></a>
				<a class="icona" href="index.php?ayar=fabrika">Fabrika Ayarları</a>
			</div>
			
			<div class="icon">
				<a href="index.php?ayar=bakim"><img src="img/icon/bakim.png" alt="" /></a>
				<a class="icona" href="index.php?ayar=bakim">Bakım Yap</a>
			</div>
			
			<div class="icon">
				<a href="index.php?ayar=ping"><img src="img/icon/ping.png" alt="" /></a>
				<a class="icona" href="index.php?ayar=ping">Ping Gönder</a>
			</div>
			
			<div class="icon">
				<a href="index.php?bot=list"><img src="img/icon/bot.png" alt="" /></a>
				<a class="icona" href="index.php?bot=list">Botlar</a>
			</div>
			
			<div class="icon">
				<a onClick="return confirm('SAINTX videoFixer çalıştırılsın mı?')" href="index.php?saintx=videoFixer"><img src="img/icon/backlink.png" alt="" /></a>
				<a onClick="return confirm('SAINTX videoFixer çalıştırılsın mı?')" class="icona" href="index.php?saintx=videoFixer">VideoFixer!</a>
			</div>
			
		<div class="temizle"></div>
		</div>