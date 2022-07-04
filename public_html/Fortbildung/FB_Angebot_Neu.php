<html><head><title>Ergebnisse</title></head>
<body><h1>Neueintrag Angebot</h1>
<?php
@ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");
mysql_select_db("Fortbildung") or die ("Keine DB");
// Datenübergabe als SQL-Statement vorbereiten
$anfrage =
"insert into Angebot values ('$A_NR','$Regelangebot','$Ergaenzungsangebot','$Ersatzangebot',
'$Bezeichnung','$Kapazitaet','$vom','$bis','$Tagesveranstaltung','$Reihen','$Betriebspraktikum',
'$Abrufangebot','$elearning','$Unterrichtsbesuch','$Dauer')";
// Anfrage ausführen, Daten eintragen
$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");

// Mitteilung über erfolgte Eintragung
if ($ergebnis)
      {echo "Eintrag ist erfolgt";}
   else
      {echo "Ein Fehler ist aufgetreten";}

?> </body></html>