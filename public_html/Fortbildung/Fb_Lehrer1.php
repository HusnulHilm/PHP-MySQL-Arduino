<html><head><title> Suchergebnisse </title></head>
<body><h1>Suchergebnisse Lehrer Fortbildung</h1>
<?php
@ $db = mysql_pconnect("localhost", "lehrer", "teacher" or die ("Keine Verbindung");
mysql_select_db("Fortbildung") or die ("Keine DB");
$anfrage =
"select Vorname, Nachname, Lehrer.P_NR, Besucht.P_NR, Angebot.A_Name, Besucht.A_NR, Angebot.ID_AN, Bezeichnung, vom, bis
from
Lehrer, Angebot, Besucht 
where
Lehrer.P_NR = Besucht.P_NR
and
Besucht.A_NR = Angebot.ID_AN
order by Nachname
";
//, Besucht, Angebot
//where
//Lehrer.P_NR = Besucht.P_NR
//and
//Besucht.A_NR = Angebot.A_NR
//order by Angebot.A_NR
//, Besucht.P_NR, Angebot.A_NR, Besucht.A_NR, Bezeichnung
$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");

$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Anzahl der gefundenen Lehrer: ".$anz_ergebnis."</p>";
echo "<table>";
echo "<th>Nummer</th><th>Vorname</th><th>Name</th><th>Angebot</th><th>FB-Nummer</th><th>Bezeichnung</th><th>am / von</th><th>bis</th>";
// Ausgabe der gefundenen Informationen
for ($i = 0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
echo"<tr><td>".($i+1)."</td>";
echo "<td>".($row["Vorname"])."</td>";
echo "<td>".($row["Nachname"])."</td>";
echo "<td>".($row["A_NR"])."</td>";
echo "<td>".($row["A_Name"])."</td>";
echo "<td>".($row["Bezeichnung"])."</td>";
echo "<td>".($row["vom"])."</td>";
echo "<td>".($row["bis"])."</td>";

echo"</tr>";
}
echo "</table>";
echo "<A href='index.html'>zur&uuml;ck</A>"
?> </body></html>