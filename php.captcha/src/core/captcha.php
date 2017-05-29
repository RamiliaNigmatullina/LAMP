<?php

include("random.php");
$captcha = generate_code();

$cookie = md5($captcha);
$cookietime = time() + 120;
setcookie("captcha", $cookie, $cookietime);

function generate_image($code) {
  header("Expires: Mon, 26 Jul 2017 05:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s", 10000) . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  header("Content-Type:image/png");

  $linenum = rand(3, 7);
  $font = "Users/ramilanigmatullina/University/PHP/php.captcha/src/core/DroidSans.ttf";
  $size = 22;

  $im = imagecreatefrompng ("Users/ramilanigmatullina/University/PHP/php.captcha/src/core/1.png");

  for ($i=0; $i < $linenum; $i++) {
    $color = imagecolorallocate($im, rand(0, 150), rand(0, 100), rand(0, 150));
    imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
  }

  $color = imagecolorallocate($im, rand(0, 200), 0, rand(0, 200));

  $x = rand(0, 35);
  for($i = 0; $i < strlen($code); $i++) {
    $x += 15;
    $letter=substr($code, $i, 1);
    imagettftext ($im, $size, rand(2, 4), $x, rand(50, 55), $color, $font, $letter);
  }

  for ($i=0; $i < $linenum; $i++) {
    $color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
    imageline($im, rand(0, 20), rand(1, 50), rand(150, 180), rand(1, 50), $color);
  }

  ImagePNG($im);
  ImageDestroy($im);
}

generate_image($captcha);
?>
