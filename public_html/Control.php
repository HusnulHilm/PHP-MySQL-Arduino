<?php
require('serialComunication.php');
$device="/dev/ttyACM0";
$BaudRate= 9600;
$serial = new phpSerial();
$serial->deviceSet($device);
$serial->confBaudRate($BaudRate);
$serial->deviceOpen();
sleep(2);
if (!empty($_POST))
{
$ON=$_POST['ON'];
$OFF=$_POST['OFF'];
$READ=$_POST['READ'];
if( $ON =='on')
{
  
$serial->sendMessage("on");
}
if( $OFF =='off')
{
   
$serial->sendMessage("off");
}
}
?>
