<?php
	/*
		buraya site adresini yaz k�sm�na sitenizin  www olmadanki halini yaz�n
		�rnek : sanaldev.com gibi 
		t�rnak lar� silmeyin
		��kan lisans kodunu ayar.php de yaz�n
	*/
	echo wordwrap(strtoupper(md5(sha1(md5($_GET['u'])))), 7, "-", true);
?>