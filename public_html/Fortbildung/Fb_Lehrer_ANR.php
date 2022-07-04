<html>
<head><title> Suchergebnisse </title></head>
<body>
<h1>Suchergebnisse Lehrer Fortbildung</h1>
<?php

@ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");

if (! $db)
{echo "Fehler: Verbindung zur Datenbank konnte nicht hergestellt werden";
exit;}

mysql_select_db("Fortbildung") or die ("Keine DB");

$anfrage =
"select Vorname, Nachname, Besucht.A_NR, Bezeichnung from
Lehrer, Besucht, Angebot
where
Lehrer.P_NR = Besucht.P_NR
and
Besucht.A_NR = Angebot.A_NR
and
Angebot.A_NR  = '513'
order by Nachname
";
$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");
$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Anzahl der Teilnehmer: ".$anz_ergebnis."</p>";
$row = mysql_fetch_array($ergebnis);
echo ($row["A_NR"])." ".($row["Bezeichnung"]);
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
?>
</body></html>