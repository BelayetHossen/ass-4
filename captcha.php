<?php
  session_start();
  $str_rand = md5(rand());
  $str = substr($str_rand, 0, 6);

  $_SESSION['captcha'] = $str;

  $new_image = imagecreate(230, 50);
  imagecolorallocate($new_image, 11, 234, 0);
  $color = imagecolorallocate($new_image, 0, 0, 0);
  imagestring($new_image, 50, 80, 18, $str, $color);
  header('content:image/jpeg');
  imagejpeg($new_image);







?>
