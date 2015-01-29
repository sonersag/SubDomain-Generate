<?php 
	include "../lib/fonksiyon.php"; 
	include "lib/fonksiyon.php"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Admin Panel</title>
	<meta name="robots" content="noindex, nofollow" />
	
	<!-- Css Dosyaları-->
		<link rel="stylesheet" href="css/style.css" />
	<!-- Css Dosyaları-->
	
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript"> 
	function gonder(){ 
	$('#snx').slideDown('slow'); 
	$("#snx").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'lib/login.php', 
	data:$('#login').serialize(), 
	success:function(cevap){ 
		$("#snx").html(cevap)}})} 
	</script>	
		<script type="text/javascript"> 
	function hatirlat(){ 
	$('#snx').slideDown('slow'); 
	$("#snx").html('<img src="img/yukleniyor.gif">'); 
	$.ajax({ 
	type:'POST', 
	url:'lib/hatirlat.php', 
	data:$('#hatirlat').serialize(), 
	success:function(cevap){ 
		$("#snx").html(cevap)}})} 
	</script>	
</head>
<body>	
		
		
		
		<div id="blok">
			
		<div id="snx"></div>
		
		
		<div id="loginform">
			
			
			<div id="loginsol">
				<img width="118" height="128" src="img/icon/secure.png" alt="" />
			</div>
			
			<div id="loginsag">
				<h3>Yönetim Paneli</h3>
				<form id="login">
					<ul>
						<li><span>Eposta Adresi</span><input name="eposta" class="lip" /></li>
						<li><span>Parola</span><input name="parola" type="password" class="lip" /></li>
						<li><span></span><input onclick="gonder();" type="button" class="lsb" value="Giriş Yap"/></li>
						<small><a id="unuttum" href="#">Şifremi Unuttum</a></small>
					</ul>
				</form>
			</div>
			<div class="temizle"></div>
		</div>
		<div class="admin"></div>
		
		
		<div class="temizle"></div>
	
		<div id="hatirla">
			<form id="hatirlat">
				<input name="posta" value="Eposta Adresi" onfocus="if(this.value == 'Eposta Adresi') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Eposta Adresi'; }" class="lip ws" />
				<input onclick="hatirlat();" type="button" class="hatirlat" value="Şifre Sıfırlama Gönder"/>
			</form>
		</div>
		
		<script type="text/javascript">
			$("#unuttum").click(function () {$("#hatirla").toggle("slow");});
		</script>
		
		</div>

</body>
</html>