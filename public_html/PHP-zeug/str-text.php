<?php
$string = 'HerrGmih';
echo "$string[2]", PHP_EOL;
//$string[-3] = 'o';
//echo "Changing the character at index -3 to o gives $string.", PHP_EOL;
echo "$string[4]", PHP_EOL;
$len=strlen($string);
echo "Laenge der Zeichenkette: $len", PHP_EOL;
for($i=0; $i< $len; ++$i)
  echo "$string[$i]", PHP_EOL;
  //ctype functions
?>
