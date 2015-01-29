<?php
	$saintx_saintx_charset = array(
		'saintx_charset' => 'utf8',
		'collation' => 'utf8_general_ci'
	);
	
	mysql_query('SET NAMES '.$saintx_charset['saintx_charset'].' COLLATE '.$saintx_charset['collation']);
	mysql_query('SET character_set_client = '.$saintx_charset['saintx_charset']);
	mysql_query('SET character_set_results = '.$saintx_charset['saintx_charset']);
	mysql_query('SET character_set_connection = '.$saintx_charset['saintx_charset']);
	mysql_query('SET collation_connection = '.$saintx_charset['collation']);
	
	$oesay	= $db->rowsquery("SELECT statu FROM tag WHERE statu='0'");
	$ysay	= $db->rowsquery("SELECT statu FROM comment WHERE statu='0'");
	$isay	= $db->rowsquery("SELECT durum FROM iletisim WHERE durum='0'");
	$o_et	= $db->rowsquery("SELECT statu FROM tag WHERE statu='1'");
	$oyo	= $db->rowsquery("SELECT statu FROM comment WHERE statu='1'");
	$s_kat	= $db->rowsquery("SELECT * FROM category");
	$vsay	= $db->rowsquery("SELECT * FROM video");
	
	## Kategorideki Videoları Say
	function catsay($data)
	{
		echo mysql_num_rows(mysql_query("SELECT * FROM video WHERE category='$data'"));
	}
	
	## Video List Kategori Bul
	function kbuls($data)
	
	{
		$cbul = mysql_fetch_assoc(mysql_query("SELECT * FROM category WHERE id='$data'"));
		echo $cbul[title];
		
	}
	
	## Video Düzenle Kategori Bulma
	function catxbul($data)
	{
		$xbul = mysql_fetch_assoc(mysql_query("SELECT * FROM category WHERE id='$data'"));
		
		echo '<select class="select" name="kategori" id="">';
		
		echo '<option value="'.$xbul[id].'">'.$xbul[title].'</option>';
		$bulx = mysql_query("SELECT * FROM category");
		while ($bll=mysql_fetch_assoc($bulx))
		{
			echo '<option value="'.$bll[id].'">'.$bll[title].'</option>';
		}
		
		echo '</select>';
	}
	
	## Genel Ayarlar Değer Bulma
	function select($data,$name)
	{
		if ($data=='1')
		{
			echo '
			<select name="'.$name.'" class="select">
				<option value="1">Açık</option>
				<option value="0">Kapalı</option>
			</select>';
		}else{
		
			echo '
			<select name="'.$name.'" class="select">
				<option value="0">Kapalı</option>
				<option value="1">Açık</option>
			</select>';
			
		}
	}
	
	function okunmamis ($data)
	{
		if ($data==0)
		{
			echo 'id="okunmamis"';
		}else {}
	
	}
	
	function videobul ($data)
	{
		$bul = mysql_fetch_assoc(mysql_query("SELECT * FROM video WHERE id='$data'"));
		
		echo VIDEO_LINK . $bul[seo].".html";
		
	}
	
	

?>