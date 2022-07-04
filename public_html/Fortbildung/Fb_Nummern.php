<html><head><title> Suchergebnisse </title></head>
<body><h1>Suchergebnisse Fortbildungen</h1>
<?php
@ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");
mysql_select_db("Fortbildung") or die ("Keine DB");
$anfrage =
"select A_NR, Bezeichnung from
Angebot
order by Angebot.A_NR
";

$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");

$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Anzahl der gefundenen Fortbildungen: ".$anz_ergebnis."</p>";
echo "<table>";
echo "<th>Nummer</th><th>Angebot</th><th>Bezeichnung</th>";
// Ausgabe der gefundenen Informationen
for ($i = 0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
echo"<tr><td>".($i+1)."</td>";
echo "<td>".($row["A_NR"])."</td>";
echo "<td>".($row["Bezeichnung"])."</td>";
echo"</tr>";
}
echo "</table>";
?> </body></html>