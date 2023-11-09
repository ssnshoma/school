<?php
  session_start();
  $charcters = "";
  $Chars = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0", 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
  //$Chars = ["1", "2", "3", "4", "5", "6", "7", "8", "9"];
  for ($i = 0; $i <= 5; $i++) {
    $charcters = $charcters . $Chars[rand(0, sizeof($Chars) - 1)];
  }
  $captcha_code = $charcters;
  $target_layer = imagecreatetruecolor(180, 60);
  $captcha_bacground = imagecolorallocate($target_layer, 255, 255, 255);
  imagefill($target_layer, 0, 0, $captcha_bacground);
  $captcha_text_color = imagecolorallocate($target_layer, 39, 55, 70);
  $font_size = 42;
  $image_width = 80;
  $image_height = 48;
  $line_color = imagecolorallocate($target_layer, 64, 64, 64);
  for ($i = 0; $i < 6; $i++) {
    imageline($target_layer, 0, rand() % 50, 20, rand() % 50, $line_color);
  }
  $pixel_color = imagecolorallocate($target_layer, 0, 0, 255);
  for ($i = 0; $i < 1000; $i++) {
    imagesetpixel($target_layer, rand() % 200, rand() % 100, $pixel_color);
  }
  imagettftext($target_layer, $font_size, 0, 15, 45, $captcha_text_color, "./autumn.ttf", $captcha_code);
  header("Content-Type: image/jpeg");
  imagejpeg($target_layer);
  $_SESSION['captcha-code'] = $captcha_code;
?>