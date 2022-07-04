<?php
exec("  stty -F /dev/ttyACM0 cs8 9600 ignbrk -brkint -imaxbel -opost -onlcr -isig -icanon -iexten -echo -echoe -echok -echoctl -echoke noflsh -ixon -crtscts  2>&1", $output, $return);
$dHandle=fopen("/dev/ttyACM0", "w+");
sleep(2);
fwrite( $dHandle,"on");
?>
