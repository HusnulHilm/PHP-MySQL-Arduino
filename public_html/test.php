<?php
echo "Ser";
require('Ser.php');
$device="/dev/ttyACM0";
$BaudRate= 9600;
$serial = new phpSerial();
$serial->deviceSet($device);
$serial->confBaudRate($BaudRate);
$serial->deviceOpen();
$serial->sendMessage("on");
?>
