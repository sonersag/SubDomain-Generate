<!doctype html><html><head><meta charset="utf-8"></head></body><?php
		// http://www.xhamsteri.pro/arama.html
		
@		set_time_limit(0);
		
@		error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
		/**/
		include('lib/fonksiyon.php');
		$adres = "http://xhamsteri.pro/arama";
		$regex = "#<a href=\"(.*?)\" title=\"(.*?)\" style=\"(.*?)\"><b>(.*?)</b></a>#si";
		for($i=2;$i<10;++$i) {
			$baglan = curl($adres."-".$i.".html", true, "windows-1254", "utf-8");
			$esle = explode('<h2>TÜM ETİKETLER</h2><img src="images/rastgele-video.jpg" width="148" height="48" alt="#" />(.*?)',
			$baglan['content']);
			preg_match_all($regex, end($esle), $esle);
			$esle = $esle[4];
			foreach($esle as $es) {
				$etiketimiz = $es;
				$kelimeseo = str_seo($es);
				$kontrol = @mysql_query("SELECT count(id) FROM tag WHERE title='$etiketimiz' OR seo='$kelimeseo'");
				$toplamoyunsay = @mysql_result($kontrol,0,0);
				if($toplamoyunsay == "0") {
					$girsql = mysql_query("INSERT INTO `tag` (`id`, `title`, `seo`, `statu`) VALUES
(NULL, '$etiketimiz', '$kelimeseo', 1)");
					if($girsql) {
						echo "<font color=green>Eklendi : ".$es."</font> <br />";
					}
					else {
						echo "<font color=red>Eklenemedi : bir yerlerde bir sorun var !</font><br />";
					}
				} else {
					echo "<font color=red>DBde Varmış : ".$es."</font><br />";
				}
			}
		}
		/**/
		function curl($url, $iconv=false, $iconv_in_charset=null, $iconv_out_charset=null, $post=false, $post_fields=null, $ajax=false) {
			$curl = curl_init();
			$data = array('content' => '', 'errno' => '', 'err_msg' => '', 'info' => '');
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_NOBODY, false);
			curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
			curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; rv:18.0) Gecko/20100101 Firefox/18.0');
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
			curl_setopt($curl, CURLOPT_TIMEOUT, 60);
			curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_VERBOSE, true);
			if($ajax) {
				curl_setopt($curl, CURLOPT_HTTPHEADER, array(
					'X-Requested-With: XMLHttpRequest',
					'Content-Type: application/x-www-form-urlencoded'
				));
			}
			if($post) {
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, rtrim(implode('&', $post_fields), '&'));
			}
			$data['content'] = ($iconv) ? iconv($iconv_in_charset, $iconv_out_charset, curl_exec($curl)) : curl_exec($curl);
			$data['errno'] = curl_errno($curl);
			$data['err_msg'] = curl_error($curl);
			$data['info'] = curl_getinfo($curl);
			curl_close($curl);
			return $data;
		}
		
		function html($url, $iconv=false, $iconv_in_charset=null, $iconv_out_charset=null) {
			return ($iconv) ? iconv($iconv_in_charset, $iconv_out_charset, @file_get_contents($url)) : @file_get_contents($url);
		}
		
		function str_seo($url) {
			$trharf=array("İ","Ş"," ","Ü","Ç","Ğ","Ö","ı","ş","ü","ç","ğ","ö");
			$trharfdegis=array("I","S","-","U","C","G","O","i","s","u","c","g","o");
			$url=str_replace($trharf,$trharfdegis,$url);
			$url=preg_replace("@[^A-Za-z0-9\-_]+@i","",$url);
			$url = trim($url);
			$url = strtolower($url);
			$find = array('<b>', '</b>');
			$url = str_replace ($find, '', $url);
			$url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
			$find = array(' ', '&quot;', '&amp;', '&', '\r\n', '\n', '/', '\\', '+', '<', '>');
			$url = str_replace ($find, '-', $url);
			$find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
			$url = str_replace ($find, 'e', $url);
			$find = array('í', 'ì', 'î', 'ï', 'I', 'Í', 'Ì', 'Î', 'Ï');
			$url = str_replace ($find, 'i', $url);
			$find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
			$url = str_replace ($find, 'o', $url);
			$find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
			$url = str_replace ($find, 'a', $url);
			$find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
			$url = str_replace ($find, 'u', $url);
			$find = array('ç', 'Ç');
			$url = str_replace ($find, 'c', $url);
			$find = array('?', '!', '$', '#', '+');
			$url = str_replace ($find, '-', $url);
			$find = array('ğ', 'Ğ');
			$url = str_replace ($find, 'g', $url);
			$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
			$repl = array('', '-', '');
			$url = preg_replace($find, $repl, $url);
			$url = str_replace('--', '-', $url);
			$url = str_replace('&#039;', '', $url);
			return $url;
		}
		
		function cek($url) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			$browser = $_SERVER['HTTP_USER_AGENT'];
			curl_setopt($ch, CURLOPT_USERAGENT, $browser);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com/");
			$source = curl_exec($ch);
			curl_close($ch);
			return $source;
		}
?></body></html>