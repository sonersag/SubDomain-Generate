<?php
	
	session_start();
	if ($_SESSION["login"]!="true")
	{
		exit;
	}

	include "../../lib/fonksiyon.php";

	sleep(1);
	
	$slot1			= $_POST[slot1];
	$slot2			= $_POST[slot2];
	$slot3			= $_POST[slot3];
	$slot4			= $_POST[slot4];
	$slot5			= $_POST[slot5];
	$slot6			= $_POST[slot6];
	$slot7			= $_POST[slot7];
	$slot8			= $_POST[slot8];

	
	$update		= $db->sorgu("UPDATE adversite SET 
	
	slot1 			= '$slot1',
	slot2 			= '$slot2',
	slot3 			= '$slot3',
	slot4 			= '$slot4',
	slot5 			= '$slot5',
	slot6 			= '$slot6',
	slot7 			= '$slot7',
	slot8 			= '$slot8' WHERE id ='1'
	
	");
	
	if ($update==TRUE)
	{
		echo '<div class="sonucu sonucu_ok">İşlem Başarı İle Gerçekleştirildi!</div>';
	}else{
		echo '<div class="sonucu sonucu_hata">İşlem Yapılırken Hata Oluştu!</div>';
	}

?>

