<?php
	/*
		buraya site adresini yaz kýsmýna sitenizin  www olmadanki halini yazýn
		örnek : sanaldev.com gibi 
		týrnak larý silmeyin
		çýkan lisans kodunu ayar.php de yazýn
	*/
	echo wordwrap(strtoupper(md5(sha1(md5($_GET['u'])))), 7, "-", true);
?>