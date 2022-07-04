<html><head><title> Suchergebnisse </title></head>
<body><h1>Suchergebnisse Lehrer Fortbildung</h1>
<?php
$username = $_POST["username"];
$passwort = $_POST["passwort"];

$pass = md5($passwort);
if($username=="hoetling" and
$pass=="f145702a9cd9c53bf05cbfb952ad0e48")
{
@ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");
mysql_select_db("Fortbildung") or die ("Keine DB");

$anfrage =
"select Vorname, Nachname, Lehrer.P_NR, Besucht.P_NR, Angebot.A_Name, Besucht.A_NR, Angebot.ID_AN, Bezeichnung, vom, bis
from
Lehrer, Angebot, Besucht
where
Lehrer.P_NR = Besucht.P_NR
and
Besucht.A_NR = Angebot.ID_AN
and
Lehrer.P_NR like '".$Nachname."'
order by vom
";

$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");

$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Bisher besuchte Fortbildungen: ".$anz_ergebnis."</p>";
echo "<table>";
echo "<th>Nummer</th><th>Vorname</th><th>Name</th><th>FB-Nummer</th><th>Bezeichnung</th><th>am / von</th><th>bis</th>";

// Ausgabe der gefundenen Informationen
for ($i = 0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
echo"<tr><td>".($i+1)."</td>";
echo "<td>".($row["Nachname"])."</td>";
echo "<td>".($row["Vorname"])."</td>";
//echo "<td>".($row["A_NR"])."</td>";
echo "<td>".($row["A_Name"])."</td>";
echo "<td>".($row["Bezeichnung"])."</td>";
echo "<td>".($row["vom"])."</td>";
echo "<td>".($row["bis"])."</td>";

echo"</tr>";
}
echo "</table>";

// Eintragung der Fortbildung

$eintrag =
"insert into Besucht values(' ', '".$Nachname."', '".$Fortbildung."')";

$ergebnis =  mysql_query($eintrag) or die ("Keine Ergebnisse");

// Tabelle nocheinmal

$anfrage =
"select Vorname, Nachname, Lehrer.P_NR, Besucht.P_NR, Angebot.A_Name, Besucht.A_NR, Angebot.ID_AN, Bezeichnung, vom, bis
from
Lehrer, Angebot, Besucht
where
Lehrer.P_NR = Besucht.P_NR
and
Besucht.A_NR = Angebot.ID_AN
and
Lehrer.P_NR like '".$Nachname."'
order by vom
";

$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");

$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Aktualisiert: ".$anz_ergebnis."</p>";
echo "<table>";
echo "<th>Nummer</th><th>Vorname</th><th>Name</th><th>FB-Nummer</th><th>Bezeichnung</th><th>am / von</th><th>bis</th>";

// Ausgabe der gefundenen Informationen
for ($i = 0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
echo"<tr><td>".($i+1)."</td>";
echo "<td>".($row["Nachname"])."</td>";
echo "<td>".($row["Vorname"])."</td>";
//echo "<td>".($row["A_NR"])."</td>";
echo "<td>".($row["A_Name"])."</td>";
echo "<td>".($row["Bezeichnung"])."</td>";
echo "<td>".($row["vom"])."</td>";
echo "<td>".($row["bis"])."</td>";

echo"</tr>";
}
echo "</table>";
echo "<A href='FB_Lehrer_besucht.php'>zur&uuml;ck</A>";
}
else
   {
   echo "Login Fehlgeschlagen";
   }

?> </body></html>