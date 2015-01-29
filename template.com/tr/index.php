<?php 
	session_start();
	include "../lib/fonksiyon.php"; 
	include "lib/fonksiyon.php"; 

	if ($_SESSION["login"]!="true")
	{
		echo '<script>window.location="login.php";</script>';
	}
	
	function base($path='') {
		$run_script = dirname(dirname($_SERVER['SCRIPT_NAME']));
		$http_url = rtrim('http'.':'.'//'.$_SERVER['HTTP_HOST'].str_replace('\\', '/', $run_script), '/').'/';
		if(!empty($path))
			$http_url .= $path;
		return $http_url;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta name="robots" content="noindex,nofollow">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Admin Panel</title>
	
	<!-- Css Dosyaları-->
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/vtip.css" />
	<!-- Css Dosyaları-->
	
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/vtip-min.js"></script>
	
	
	
</head>
<body>	

		<?php 
			
			include "include/header.php"; 
			
			
			## Sayfalar
			if (@$_GET['ayar']=="genelayar"){  include 'sayfalar/genelayar.php';}
			if (@$_GET['ayar']=="reklam"){  include 'sayfalar/reklam.php';}
			if (@$_GET['kategori']=="list"){  include 'sayfalar/kategoriler.php';}
			if (@$_GET['kategori']=="duzenle"){  include 'sayfalar/katduzenle.php';}
			if (@$_GET['kategori']=="ekle"){  include 'sayfalar/katekle.php';}
			if (@$_GET['video']=="list"){  include 'sayfalar/videolar.php';}
			if (@$_GET['video']=="duzenle"){  include 'sayfalar/vidduzenle.php';}
			if (@$_GET['video']=="ekle"){  include 'sayfalar/videoekle.php';}
			if (@$_GET['yorum']=="list"){  include 'sayfalar/yorumlar.php';}
			if (@$_GET['yorum']=="onaysiz"){  include 'sayfalar/onaysiz_yorumlar.php';}
			if (@$_GET['yorum']=="duzenle"){  include 'sayfalar/yorumduzenle.php';}
			if (@$_GET['etiket']=="list"){  include 'sayfalar/etiketler.php';}
			if (@$_GET['etiket']=="onaysiz"){  include 'sayfalar/onaysiz_etiketler.php';}
			if (@$_GET['etiket']=="duzenle"){  include 'sayfalar/etiduzenle.php';}
			if (@$_GET['cache']=="temizle"){  include 'lib/cachesil.php';}
			if (@$_GET['ayar']=="parola"){  include 'sayfalar/parola.php';}
			if (@$_GET['yedek']=="al"){  include 'yedek/yedek.php';}
			if (@$_GET['iletisim']=="oku"){  include 'sayfalar/iletisim.php';}
			if (@$_GET['iletisim']=="git"){  include 'sayfalar/i_git.php';}
			if (@$_GET['iletisim']=="okundu"){  include 'islemler/i_okundu.php';}
			if (@$_GET['ayar']=="fabrika"){  include 'sayfalar/fabrika.php';}
			if (@$_GET['ayar']=="fabrika_don"){  include 'islemler/fabrika.php';}
			if (@$_GET['ayar']=="ping"){  include 'islemler/ping.php';}
			if (@$_GET['ayar']=="bakim"){  include 'islemler/bakim.php';}
			if (@$_GET['bot']=="list"){  include 'sayfalar/botlist.php';}
			if (@$_GET['bot']=="v7_etiket"){  include 'botlar/v7_etiket.php';}
			if (@$_GET['bot']=="m_v5_etiket"){  include 'botlar/m_v5_etiket.php';}
			if (@$_GET['bot']=="redtube"){  include 'botlar/redtube_k.php';}
			if (@$_GET['saintx']=="videoFixer"){ include 'saintx.plugins.videoFixer.php'; }
		
		
		?>
		
		
		

		
	</div>
	
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
</body>
</html>
