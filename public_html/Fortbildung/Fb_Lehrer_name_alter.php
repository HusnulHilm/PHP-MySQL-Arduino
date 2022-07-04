<html><head><title> Suchergebnisse </title></head>
<body><h1>Suchergebnisse Lehrer Fortbildung</h1>
<?php
@ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");
mysql_select_db("Fortbildung") or die ("Keine DB");


$anfrage =
"select Vorname,  Nachname, Geburtsdatum , Date_format(Geburtsdatum,'%Y') as RuhestandJ, rente,
 Date_format(Geburtsdatum,'%M') as RuhestandM
from
Lehrer
where
aktuell = 'y'
order by Geburtsdatum";
/*
where
Lehrer.P_NR = Besucht.P_NR
and
Besucht.A_NR = Angebot.ID_AN
and
Lehrer.P_NR like '".$Nachname."'
and
vom >=  '".$schuljahr."'
order by vom
";
*/
//, Besucht, Angebot
//where
//Lehrer.P_NR = Besucht.P_NR
//and
//Besucht.A_NR = Angebot.A_NR
//order by Angebot.A_NR
//, Besucht.P_NR, Angebot.A_NR, Besucht.A_NR, Bezeichnung

$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");

$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Anzahl der gefundenen Eintr&auml;ge: ".$anz_ergebnis."</p>";
echo "<table>";

echo "<th>Nummer</th><th>Vorname</th><th>Name</th><th>Geburtsdatum</th><th>Rentenalter</th><th><th>Ruhestand</th>";
// Ausgabe der gefundenen Informationen
for ($i = 0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
//$renteneinritt = $row[3]+65;
//echo date($renteneinritt,"%Y");
echo"<tr><td>".($i+1)."</td>";
echo "<td>".($row["Nachname"])."</td>";
echo "<td>".($row["Vorname"])."</td>";
echo "<td>".($row["Geburtsdatum"])."</td>";
// Renteneintritt berechnen
//
//if ($row[3]==1955) $row[5]= $row[5]+ '9 month';
if ($row[3]>=1958) $row[3]= $row[3]+1;
if ($row[3]>=1964) $row[3]= $row[3]+2;

echo "<td>".($row[5])."</td>";
echo "<td>".($row[3]+65)."</td>";
echo "<td>".($row["rente"])."</td>";
//echo "<td>".($row[5])."</td>";
//echo "<td>".($row["bis"])."</td>";

echo"</tr>";
}
echo "</table>";
echo "<A href='FB_Lehrer_name1.php'>zur&uuml;ck</A>"
?> </body></html>