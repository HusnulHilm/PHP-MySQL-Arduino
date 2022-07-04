<?php
// Datei öffnen zum lesen und schreiben
$handle = fopen ("kluengel.txt", "r");
//$handle = fopen ("/dev/ttyACM0", "r");
while ( $inhalt = fgets ($handle, 4096 ))
{
  echo "<li> $inhalt ";
}
 
fclose($handle);
?>
