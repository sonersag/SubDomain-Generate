<?  
//powered by Vendetta
//r10.net


ini_set("max_execution_time","150000"); 
$ne=$_GET['ne'];
if($ne=="hepsi") {
for($si=0; $si<601; $si++){

$veri=file_get_contents("http://www.porno8.info/liste/arananlar-sayfa$si");


preg_match('#<div id="colTwo">(.*?)</div>#si',$veri,$temiz);

$temiz2=$temiz[1];
preg_match_all('#title="(.*?)"#si',$temiz2,$m1,PREG_SET_ORDER);
$say=count($m1);
for($i=0; $i<$say; $i++){
$gelen=$m1[$i][1];


$ekle=cevir($gelen);
$kontrol=mysql_query("select * from tag where tr='$ekle'");
if(mysql_num_rows($kontrol)==0)
{
$sql2 = mysql_query("insert into tag (baslik,tr,tarih) values ('$gelen','$ekle',now()) ");
echo $gelen."<br>";
}
} } }

if($ne=="sec") {


$count = 90000; 
$perpage = 150;    
         $page = !empty($_GET["page"]) ? intval($_GET["page"]) : 1;
 $s = ($page-1)*$perpage;  if($count > $perpage) :   $x = 5; // akrif sayfadan önceki/sonraki sayfa gösterim sayýsý 
  $lastP = ceil($count/$perpage);    // sayfa 1'i yazdýr 
  if($page==1) echo " <span class=\"ThisPage\">1</span>"; 
  else echo " <a href=\"admin.php?yonetim=etibot&ne=sec&page=1\">1</a>";   // "..." veya direkt 2   
if($page-$x > 2) {     echo "<span>&#8230;&#8230;&#8230;</span>";  
   $i = $page-$x;   } else {     $i = 2;   }   // +/- $x sayfalarý yazdýr   
for($i; $i<=$page+$x; $i++) {     if($i==$page) echo " <span class=\"ThisPage\">[$i]</span>"; 
    else echo " <a href=\"admin.php?yonetim=etibot&ne=sec&page=".$i."\">$i</a>";     if($i==$lastP) break;   }   // "..." veya son sayfa 
  if($page+$x < $lastP-1) {     echo "<span>&#8230;&#8230;&#8230;</span>";     
echo " <a href=\"admin.php?yonetim=etibot&ne=sec&page=".$lastP."\">$lastP</a>";  
 } elseif($page+$x == $lastP-1) {     echo " <a href=\"admin.php?yonetim=etibot&ne=sec&page=".$lastP."\">$lastP</a>";
   } endif; ?> <br /><br /> <?



$veri=file_get_contents("http://www.sexdiyari.net/liste/arananlar-sayfa$page");


preg_match('#<div id="colTwo">(.*?)</div>#si',$veri,$temiz);

$temiz2=$temiz[1];
preg_match_all('#title="(.*?)"#si',$temiz2,$m1,PREG_SET_ORDER);
$say=count($m1);
for($i=0; $i<$say; $i++){
$gelen=$m1[$i][1];


$ekle=cevir($gelen);
$kontrol=mysql_query("select * from tag where tr='$ekle'");
if(mysql_num_rows($kontrol)==0)
{
$sql2 = mysql_query("insert into tag (baslik,tr,tarih) values ('$gelen','$ekle',now()) ");
echo $gelen."<br>";
}
} 
}
?>

<a href="admin.php?yonetim=etibot&ne=sec">Ben Secerim (Secerek Sayfalar halinde 150 þer tane ekler)</a>