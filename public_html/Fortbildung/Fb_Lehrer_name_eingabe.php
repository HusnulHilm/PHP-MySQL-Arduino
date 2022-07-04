<html><head><title> Suchergebnisse </title></head>
<body><h1>Suchergebnisse Lehrer Fortbildung</h1>
<?php
//trim($suchbegriff);
//if (!$suchbegriff)
//{
//echo "Sie haben keinen Suchbegriff eingegeben. Bitte gehen Sie zurueck.";
//exit;
//}
echo $Nachname;
//$suchtyp = addslashes($suchtyp);
//echo $suchtyp; echo "<br>";
//echo "Ihre Suche nach "; echo $suchbegriff; echo " ergab:<br>";

@ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");
mysql_select_db("Fortbildung") or die ("Keine DB");
// Datensuche
//<?
//include("../sql/connect.inc.php");
//$connID=connect_to_flugbuch();

$sql = "select P_NR, Nachname, Vorname  from Lehrer order by Nachname";
$formname = "Name";
$defaultitem = "-";


function build_select_list($formname, $sql, $defaultitem)
{
$result=mysql_query($sql);
$anz_ergebnis = mysql_num_rows($result);

echo '<select name="', $formname, '">';
echo "<br>";
echo '<option value = "-">(choose)';
while($row=mysql_fetch_row($result))
{
echo "<option ";
if($defaultitem==$row[0]) echo "selected";
echo "value=\"$row[0]\"> ", htmlentities($row[1].", ".$row[2]),"\n";
}

echo "</select>\n";
}

echo "<td>";
build_select_list($formname, $sql, $defaultitem);
//mysql_free_result($ergebnis);
//mysql_close($db);

echo "</td>";



// Ende Datensuche



$anfrage =
"select Vorname, Nachname, Lehrer.P_NR, Besucht.P_NR, Angebot.A_Name, Besucht.A_NR, Angebot.ID_AN, Bezeichnung, vom, bis
from
Lehrer, Angebot, Besucht
where
Lehrer.P_NR = Besucht.P_NR
and
Besucht.A_NR = Angebot.ID_AN
and
Nachname like '%".$suchbegriff."%'
order by vom
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
echo "<p>Anzahl der gefundenen Eintr&auml;ge: ".$anz_ergebnis."</p>";
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
?> </body></html>