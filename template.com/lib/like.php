<?php
	
	include "fonksiyon.php";
    $one 	= get("one");
	$date	= date("d-m-Y");
	$IP		= $_SERVER['REMOTE_ADDR'];
	
	
	$sor	= $db->rowsquery("SELECT * FROM rating WHERE video='$one' and ip='$IP' and dates='$date' ");
	
	if ($sor==0)
	{	
		echo "<script>alert('Bu videoyu beğendiniz :)')</script>";
		
		$db->sorgu("INSERT INTO rating (video,ip,dates) values ('$one','$IP','$date')");
		
		$db->sorgu("UPDATE video SET rating = rating + 1 WHERE id = '$one'");
	
		$sonuc	= $db->satir("SELECT rating,id from video WHERE id='$one' ");
	
		echo $sonuc->rating;
		
	}else
	
	{
		
		echo "<script>alert('Bu Videoyu Daha Önce Beğenmişsiniz!')</script>";
		$sonuc	= $db->satir("SELECT rating,id from video WHERE id='$one' ");
		echo $sonuc->rating;
		
	}
	
	
	

?>
