<html><head><title>Ergebnisse</title></head>
<body><h1>Neueintrag Lehrer</h1>
<?php
echo $Vorname." ";
echo $Nachname."<br>";

@ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");
mysql_select_db("Fortbildung") or die ("Keine DB");
// Pr&uuml;fen, ob Eintrag vorhanden
$anfrage =
"select Vorname, Nachname from Lehrer where Vorname = '$Vorname' and Nachname = '$Nachname'
";

$ergebnis =  mysql_query($anfrage);// or die ("Keine Ergebnisse");
echo $ergebnis."<br>";
$anz_ergebnis = mysql_num_rows($ergebnis);
echo $anz_ergebnis."<br>";
if ($anz_ergebnis > 0)
      {echo "Der Eintrag ist vorhanden<br>Es erfolgt keine Neueintrag in die Datenbank.<br>";
       echo "Abbruch";
       die; }
else
{
// Daten�bergabe als SQL-Statement vorbereiten
$anfrage =
"insert into Lehrer values ('','$Vorname','$Nachname','$Geburtsdatum')
";
// Anfrage ausf�hren, Daten eintragen
$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");

// Mitteilung �ber erfolgte Eintragung
if ($ergebnis)
      {echo "Eintrag ist erfolgt";}
   else
      {echo "Ein Fehler ist aufgetreten";}
}

$anfrage =
"select Vorname, Nachname, Geburtsdatum  from Lehrer where Vorname = '$Vorname' and Nachname = '$Nachname'
";

$ergebnis =  mysql_query($anfrage);// or die ("Keine Ergebnisse");
echo $ergebnis."<br>";
$anz_ergebnis = mysql_num_rows($ergebnis);
//echo "<p>Anzahl der neu eingetragenen Lehrer: ".$anz_ergebnis."</p>";
echo "<table>";
echo "<th>Nummer</th><th>Vorname</th><th>Name</th><th>Geboren am</th>";
// Ausgabe der gefundenen Informationen
for ($i = 0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
echo"<tr><td>".($i+1)."</td>";
echo "<td>".($row["Vorname"])."</td>";
echo "<td>".($row["Nachname"])."</td>";
echo "<td>".($row["A_NR"])."</td>";
echo "<td>".($row["Bezeichnung"])."</td>";
echo"</tr>";
}
echo "</table>";

?> </body></html>