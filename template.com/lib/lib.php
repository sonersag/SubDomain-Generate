<?php
	
	require "ayar.php";
	
	$b1			=	@mysql_connect($server,$dbuser,$dbpass);
	$b2			=	@mysql_select_db($dbadi);
	mysql_query('SET NAMES utf8');
	mysql_query('SET CHARACTER_SET utf8');
	mysql_query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'");
	
	define ('VIDEO_LINK','porno/');
	define ('TAG_LINK','videolar/');
	define ('CATEGORY_LINK','kanal/');


	class dbclass
	{
		
		function sorgu($result)
			{
				return mysql_query($result);
			}
		
		function farray($result)
			{
				return mysql_fetch_array($result);
			}
		
		function fassoc($result)
			{
				return mysql_fetch_assoc($result);
			}
		
		function numrows($result)
			{
				return mysql_num_rows($result);
			}
		
		function arrayquery($result)
			{
				return mysql_fetch_array(mysql_query($result));
			}
		
		function assocquery($result)
			{
				return mysql_fetch_assoc(mysql_query($result));
			}
		
		function rowsquery($result)
			{
				return mysql_num_rows(mysql_query($result));
			}
		
		function insertid()
			{
				return mysql_insert_id();
			}
			
			function tablo($sorgu)
        {
			$tablo = $this->sorgu($sorgu);
			$sonuc = array();
			while($sonuclar = mysql_fetch_object($tablo)):
				$sonuc[] = $sonuclar;
			endwhile;
			return $sonuc;
        }
		
		
		 function satir($sorgu)
        {
            $satir = $this->sorgu($sorgu);
            if($satir)
                return mysql_fetch_object($satir);
        }
		
		
		function ekle($tablo, $veriler)
        {
            if(is_array($veriler)):
                $alanlar = array_keys($veriler);
                $alan = implode(',', $alanlar); 
                $veri = '\''.implode("', '",array_map(array($this, 'tirnakKes'), $veriler)).'\'';
            else:
                $parametreler = func_get_args();
                $tablo = array_shift($parametreler);
                $alan = $veri = null;
                $toplamParametre = count($parametreler)-1;
                foreach($parametreler as $NO => $parametre):
                    $bol = explode('=', $parametre, 2);
                    if($toplamParametre == $NO):
                        $alan .= $bol[0];
                        $veri .= '\''.$this->tirnakKes($bol[1]).'\'';
                    else:
                        $alan .= $bol[0].',';
                        $veri .= '\''.$this->tirnakKes($bol[1]).'\',';                    
                    endif;
                endforeach;
            endif;
            
            $ekle = $this->sorgu('INSERT INTO '.$tablo.' ('.$alan.') VALUES ('.$veri.')');
            if($ekle)
                return mysql_insert_id();
        }
		
		
		function tirnakKes($veri)
        {
            if(!get_magic_quotes_gpc())
                return mysql_real_escape_string($veri);
                
            return $veri;
        }
		
		function sil($tablo, $kosul = null)
        {
            if($kosul):
                if(is_array($kosul)):
                    $kosullar = array();
                    foreach($kosul as $alan => $veri)
                        $kosullar[] = $alan.'=\''.$veri.'\'';
                endif;
                return $this->sorgu('DELETE FROM '.$tablo.' WHERE '.(is_array($kosul)?implode(' AND ',$kosullar):$kosul));
            else:
                return $this->sorgu('TRUNCATE TABLE '.$tablo);
            endif;
        }
        
        function duzenle($tablo, $deger, $kosul)
        {
            if(is_array($deger)):
                $degerler = array();
                foreach($deger as $alan => $veri)
                    $degerler[] = $alan."='".addslashes($veri)."'";
            endif;
            
            if(is_array($kosul)):
                $kosullar = array();
                foreach($kosul as $alan => $veri)
                    $kosullar[] = $alan."='".addslashes($veri)."'";
            endif;
            
            return $this->sorgu('UPDATE '.$tablo.' SET '.(is_array($deger) ? implode(',',$degerler):$deger).' WHERE '.(is_array($kosul)?implode(' AND ',$kosullar):$kosul));
        }
		
	
	}
	
	$db = new dbclass;

		function TirnakTemizle($a){
$tirnak = array("'","''");
$temizle = array("'","'");

return str_replace($tirnak,$temizle,$a);

}
?>
