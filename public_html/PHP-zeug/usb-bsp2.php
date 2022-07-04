<?

include "php_serial.class.php";

// Let's start the class
$serial = new phpSerial;
$serial->deviceSet("/dev/ttyACM0");
$serial->confBaudRate(9600);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->confFlowControl("none");
$serial->deviceOpen();

$serial->sendMessage("a\r");

$serial->deviceClose();


?>
