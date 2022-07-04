<html><head><title> Suchergebnisse </title>
<style type="text/css">
<!--
.tableLine
{
    font-family:      Verdana,Arial,sans-serif;
    font-style:       normal;
    font-size:        9px;
    BORDER-TOP:       #A6A6A6 1px solid;
    BORDER-LEFT:      #A6A6A6 1px solid;
    BORDER-BOTTOM:    #A6A6A6 1px solid;
    BORDER-RIGHT:     #A6A6A6 1px solid;
}
.row_0 {
    background-color:        #FFFFFF;
}
.row_1 {
    background-color:        #E1E8F1;
}
-->
</style>
</head>
<body><h1>Suchergebnisse Lehrer Fortbildung</h1>
<?php
@ $db = mysql_pconnect("localhost", "gast", "gast") or die ("Keine Verbindung");
mysql_select_db("Fortbildung") or die ("Keine DB");
$anfrage =
"select Vorname, Nachname, Lehrer.P_NR, Besucht.P_NR, Angebot.A_Name, Besucht.A_NR, Angebot.ID_AN, Bezeichnung, vom, bis
from
Lehrer, Angebot, Besucht
where
Lehrer.P_NR = Besucht.P_NR
and
Besucht.A_NR = Angebot.ID_AN
and vom >= '2015-12-31'
and vom <= '2016-12-31'
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
echo "<p>Anzahl: ".$anz_ergebnis."</p>";
?>
<table border ="0">
<th>Nummer</th><th>Vorname</th><th>Name</th><th>Angebot</th><th>FB-Nummer</th><th>Bezeichnung</th><th>am / von</th><th>bis</th>

<?php
// Ausgabe der gefundenen Informationen
$j = true;

for ($i = 0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
echo"<tr>";
echo "<td>".($i+1)."</td>";
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
?>
</table> </body></html>