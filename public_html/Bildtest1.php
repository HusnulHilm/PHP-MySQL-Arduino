<?php
$image = imagecreate(400,300);
$farbe_body = imagecolorallocate($image,200,200,200);
$Schwarz = imagecolorallocate($image,0,0,0);
$weis = imagecolorallocate($image,255,255,255);
$red = imagecolorallocate($image,255,0,0);
$blau = imagecolorallocate($image,100,100,255);
imagefill($image, 0, 0, $farbe_body);
imageline($image, 300, 0, 300, 300, $red);
imageline($image, 300, 150, 400, 150, $red);
imagefill($image, 301, 0, $blau);
imagefilledrectangle($image, 50, 50, 250, 250, $weis);
//1.Punkt
$punkte[] = 0;
$punkte[] = 0;
//2.Punkt
$punkte[] = 50;
$punkte[] = 20;
//3.Punkt
$punkte[] = 100;
$punkte[] = 100;
//4.Punkt
$punkte[] = 250;
$punkte[] = 120;
//5.Punkt
$punkte[] = 400;
$punkte[] = 270;
//6.Punkt
$punkte[] = 400;
$punkte[] = 273;
//7.Punkt
$punkte[] = 250;
$punkte[] = 150;
//8.Punkt
$punkte[] = 100;
$punkte[] = 130;
//9.Punkt
$punkte[] = 50;
$punkte[] = 23;
//10.Punkt
$punkte[]= 0;
$punkte[]= 3;
imagefilledpolygon ($image, $punkte, count($punkte)/2, $red);
header("Content-Type: image/gif");
imagegif($image);
//header("Content-Type: image/png");
//imagepng($image);
//header("Content-Type: image/jpeg");
//imagejpeg($image,"",100);
imagedestroy($image);
?>

