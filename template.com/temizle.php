<?php 
	include('lib/ayar.php');
	$con=mysql_connect("$server","$dbuser","$dbpass")
    or die("Mysql ile bağlanti kurulamadi.");
   $db=mysql_select_db("$dbadi",$con)
    or die("Database Bulunamadi.");
	
	$akelime="akelime";
	$silkelime=array("cocuk","çocuk","child","chid","cild","kid","DAUGHTER","daughter","COCUK","ÇOCUK","bebe","bebek","baby","BEBEK","babas","BABY",
	"www","www.",".com",".net",".org","animal","zoo","eşşek","hayvan","fi","dunyaburada","tanrı","allah","islam","iman","namaz");
	$degersayisi=count($silkelime);
	for($i=0;$i<$degersayisi;$i++){
	if($akelime == "akelime"){
		mysql_query("delete from tag where title like '%$silkelime[$i]%'");
		echo "Silinen Video Sayisi : " .mysql_affected_rows()."<br/>";
	}
	else{
		echo "Anahtar Kelime Yanlis";
	}
	}

?>