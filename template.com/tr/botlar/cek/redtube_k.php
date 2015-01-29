<?php

	include			"../../../lib/fonksiyon.php";
	
	function googleTranslate($string,$from='en',$to='en'){
    $string = urlencode($string);
    $url = "http://translate.google.com/translate_a/t?client=t&text=$string&hl=en&sl=$from&tl=$to&multires=1&oc=0&prev=btn&sc=1";
    $askGoogle = vericek($url);
    $askGoogle = substr($askGoogle,4,strpos(substr($askGoogle,4),'"'));
   
    return $askGoogle;
	}
	
	$kategori		= $_POST['kategori'];
	$sayfa			= $_POST['sayfa'];
	$arama			= $_POST['arama'];

	
	$site			= "http://www.redtube.com/";
	$kat1			= $site."redtube/".$kategori."?page=".$sayfa;

	if ($arama=="1")
	{
		$gelen	= $_POST['search'];
		$sayfa	= $_POST['sayfa'];
		$gelen	= str_replace(" ","+",$gelen);
		
		if ($sayfa=="1")
		{
			$kat	= $site."?search=".$gelen;
		}
		else
		{
			$kat	= $site."?search=".$gelen."&page=".$sayfa;
		}
		
	}
	else
	{
		$kat	= $kat1;
	}
	
	
	$sayfa	= vericek("$kat");
	
	preg_match_all('~<div class="video">(.*?)<div class="lastMovieRow">~si', $sayfa, $bloklar);

	for ($i = 0; $i < count($bloklar[1]); $i++)
	{
		
		
		preg_match('~<a href="(.*?)" title="(.*?)" class="s" >~i', $bloklar[1][$i], $parse1);
		preg_match('~src="(.*?)"~i', $bloklar[1][$i], $parse2);
		preg_match('~<span class="d">(.*?)</span>~i', $bloklar[1][$i], $parse3);
		
		$link	= "http://www.redtube.com".$parse1[1];
		$baslik	= $parse1[2];
		$resim	= $parse2[1];
		$sure	= $parse3[1];
		$vidl	= str_replace("http://www.redtube.com/","",$link);
		
		$bakdb	= mysql_num_rows(mysql_query("select flv from video where flv='$vidl'"));
		
		$keyw	= googleTranslate($parse1[2]);
		$keyw	= str_replace(" ",",|",$keyw);
		$k1		= explode("|",$keyw);
		

?>
<script type="text/javascript"> 
function kaydet<?php echo $i;?>()
	{ 
		$('#sonuc<?php echo $i;?>').slideDown('slow'); 
		$("#sonuc<?php echo $i;?>").html('<div id="lele"><img src="img/yukleniyor.gif"><\/div>'); 
		$.ajax(
		{ 
			type:'POST', 
			url:'botlar/cek/ekle.php', 
			data:$('#kayit<?php echo $i;?>').serialize(), 
			success:function(cevap){ 
			$("#sonuc<?php echo $i;?>").html(cevap) 
		} 

	})} 
</script>

<form id="kayit<?php echo $i;?>">
		<div class="blok" <?php if ($bakdb==TRUE) echo 'style="display:none"'; ?>>
			<div class="botsol">
				<div id="sonuc<?php echo $i;?>"></div>
				<img width="150" height="119" src="<?php echo $resim;?>" alt="" />
			</div>
			
			<div class="botsag">
				<div class="botlists"><span>Video Başlık</span><input name="baslik" class="ipx" value="<?php echo googleTranslate($parse1[2]);?>"/></div>
				<div class="botlists"><span>Video Description</span><input name="aciklama" value="<?php echo googleTranslate($parse1[2]);?>" class="ipx" /></div>
				<div class="botlists"><span>Video Keywords</span><input name="etiket" class="ipx" value="<?php foreach ($k1 as $k2) echo $k2;?>"/></div>
				<div class="botlists"><span>Video Kategori</span>
				
					<select name="kat" class="scx">
						<?php 
						
							$kk = $db->tablo("SELECT * FROM category ORDER BY title ASC");
							foreach ($kk as $kkx){
						?>
						<option value="<?php echo $kkx->id;?>"><?php echo $kkx->title;?></option>
						<?php } ?>
					</select>
					
					<input type="button" onclick="kaydet<?php echo $i;?>();" class="subx" value="Videoyu Ekle"/>
					
				</div>
			</div>
			
		<div class="temizle"></div>
		</div>
<input type="hidden" name="bot" value="redtube">
<input type="hidden" name="link" value="<?php echo $link;?>">
<input type="hidden" name="resim" value="<?php echo $resim;?>">
<input type="hidden" name="sure" value="<?php echo $sure;?>">
</form>

<?php } ?>
