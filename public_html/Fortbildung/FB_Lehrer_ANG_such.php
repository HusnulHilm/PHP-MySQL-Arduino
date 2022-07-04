<html>
<head><title> Suchergebnisse </title></head>
<body>
<h1>Suchergebnisse Lehrer Fortbildung</h1>
<?php

@ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");

mysql_select_db("Fortbildung") or die ("Keine DB");

$anfrage =
"select Vorname, Nachname, Besucht.A_NR, Bezeichnung, vom from
Lehrer, Besucht, Angebot
where
Lehrer.P_NR = Besucht.P_NR
and
Besucht.A_NR = Angebot.A_NR
and
Angebot.A_NR  = '$FBNR'
order by Nachname
";
$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");
$anz_ergebnis = mysql_num_rows($ergebnis);

// Abbrechen, wenn Ergebnis = 0 ist
if ($anz_ergebnis == 0)
   {
    echo "Für diesen Kurs sind bisher keine Teilnehmer eingetragen";
   }
   else  // Ausgabe, wenn Ergebnis vorhanden ist
{
echo "<p>Anzahl der Teilnehmer: ".$anz_ergebnis."</p>";
$row = mysql_fetch_array($ergebnis);
echo ($row["A_NR"])." ".($row["Bezeichnung"])."<br> Beginn: ";
echo ($row["vom"]);
$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");
$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<table>";
echo "<th>Nummer</th><th>Vorname</th><th>Name</th>";
// Ausgabe der gefundenen Informationen
for ($i = 0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
echo"<tr><td>".($i+1)."</td>";
echo "<td>".($row["Vorname"])."</td>";
echo "<td>".($row["Nachname"])."</td>";
//echo "<td>".($row["A_NR"])."</td>";
//echo "<td>".($row["Bezeichnung"])."</td>";
echo"</tr>";
}
echo "</table>";
}
?>
</body></html>