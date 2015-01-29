<?php
@session_start();
class CaptchaSecurityImages {
 
   var $font = 'BebasNeue.otf';
 
   function generateCode($characters) {
      /* Buraya Güvenlik Kodunda Çýkmasýný Ýstediðiniz Rakam veya Harfleri Yazýn */
      $possible = '1234567890';
      $code = '';
      $i = 0;
      while ($i < $characters) { 
         $code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
         $i++;
      }
      return $code;
   }
 
  function CaptchaSecurityImages($width='120',$height='40',$characters='6') {
      $code = $this->generateCode($characters);
      /* font size will be 75% of the image height */
      $font_size = $height * 0.70;
      $image = imagecreate($width, $height) or die('Cannot initialize new GD image stream');
      /* set the colours */
      $background_color = imagecolorallocate($image, 243, 243, 243);
      $text_color = imagecolorallocate($image, 9, 48, 87);
      $noise_color = imagecolorallocate($image, 243, 243, 243);
      /* generate random dots in background */
      for( $i=0; $i<($width*$height)/3; $i++ ) {
         imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 2, 1, $noise_color);
      }
      /* generate random lines in background */
      for( $i=0; $i<($width*$height)/150; $i++ ) {
         imageline($image, mt_rand(0,$width), mt_rand(2,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
      }
      /* create textbox and add text */
      $textbox = imagettfbbox($font_size, 0, $this->font, $code) or die('Error in imagettfbbox function');
      $x = ($width - $textbox[4])/2;
      $y = ($height - $textbox[5])/2;
      imagettftext($image, $font_size, 0, $x, $y, $text_color, $this->font , $code) or die('Error in imagettftext function');
      /* output captcha image to browser */
      header('Content-Type: image/png');
      imagejpeg($image);
      imagedestroy($image);
      $_SESSION['security_code'] = $code;
   }
 
}
 
$width = isset($_GET['width']) && $_GET['width'] < 600 ? $_GET['width'] : '120';
$height = isset($_GET['height']) && $_GET['height'] < 200 ? $_GET['height'] : '40';
$characters = isset($_GET['characters']) && $_GET['characters'] > 2 ? $_GET['characters'] : '6';
 
$captcha = new CaptchaSecurityImages($width,$height,$characters);
 
?>