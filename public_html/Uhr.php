<?php
$aktuhrzeit =date("H:i:s");

if ( $aktuhrzeit == "12:00:00" )
{
echo "<p>high noon</p>" ;
}
else{

echo "<p>aktuelle uhrzeit: $aktuhrzeit</p>" ;

}
?>
