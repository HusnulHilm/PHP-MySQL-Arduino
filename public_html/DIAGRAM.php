<?php
$email = "hier kommt Ihre E-Mail-Adresse";
$textnr = 8;
$textbreite = imagefontwidth($textnr) * strlen($email);
$texthoehe  = imagefontheight($textnr);
 
header ("Content-type: image/png");
$bild = imagecreate ($textbreite , $texthoehe);
 
$hintergund_farbe  = imagecolorallocate ($bild, 400, 400, 400);
$text_farbe        = imagecolorallocate ($bild, 1, 1, 1);
 
imagestring ($bild, $textnr, 0, 0, $email, $text_farbe);
imagepng ($bild);
?>


