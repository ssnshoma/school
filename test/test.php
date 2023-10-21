<?php
session_start();
header("Content-Type: image/jpeg");
function getChars()
{
 $charcters = "";
 $Chars = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0", 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
 for ($i = 0; $i <= 5; $i++) {
  $charcters = $charcters . $Chars[rand(0, sizeof($Chars) - 1)];
 }
 return $charcters;
}

$captcha_code = getChars();
$_SESSION['captcha_code'] = $captcha_code;
$target_layer = imagecreatetruecolor(170, 70);
$captcha_bacground = imagecolorallocate($target_layer, 255, 255, 255);
imagefill($target_layer, 0, 0, $captcha_bacground);
$captcha_text_color = imagecolorallocate($target_layer, 39, 55, 70);
$font_size = 32;
$image_width = 80;
$image_height = 48;
$line_color = imagecolorallocate($target_layer, 64, 64, 64);
for ($i = 0; $i < 6; $i++) {
 imageline($target_layer, 0, rand() % 50, 200, rand() % 50, $line_color);
}
$pixel_color = imagecolorallocate($target_layer, 0, 0, 255);
for ($i = 0; $i < 1000; $i++) {
 imagesetpixel($target_layer, rand() % 200, rand() % 50, $pixel_color);
}
imagettftext($target_layer, $font_size, 0, 25, 35, $captcha_text_color, "Wicked Autumn.ttf", $captcha_code);
?>