<?php

// 生成随机验证码
$str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$len = strlen($str) - 1;
$code = $str[rand(0, $len)].$str[rand(0, $len)].$str[rand(0, $len)].$str[rand(0, $len)];

session_start();
$_SESSION['captcha'] = $code;

$width = 200;
$height = 50;
$img = imagecreate($width, $height);
imagecolorallocate($img, 0, 255, 255);
$code_color = imagecolorallocate($img, 0, 0, 0);
$font = dirname(__FILE__).'/Andale Mono.ttf';
imagettftext($img, 20, 0, 70, 25, $code_color, $font, $code);
imagejpeg($img);
header('Content-type: image/jpeg');
