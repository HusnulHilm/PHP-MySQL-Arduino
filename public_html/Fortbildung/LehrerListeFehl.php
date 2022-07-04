<html><head><title> Suchergebnisse </title></head>
<body><h2>Fortbildungsplanung der Lehrkr&auml;fte</h2>
<?php
@ $db = mysql_pconnect("localhost", "gast", "gast") or die ("Keine Verbindung");
mysql_select_db("Fortbildung") or die ("Keine DB");
// DB-Anfrage
$anfrage =
"select Vorname, Nachname, abgabe2016
from
    Lehrer
where
    aktuell = 'y'
and
   abgabe2016 = 'n'
order by Nachname
";

$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");

$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Anzahl der gefundenen Lehrer: ".$anz_ergebnis."</p>";
echo "<table border='1'>";
echo "<th>Nummer</th><th>Vorname</th><th>Name</th><th>Abgegeben 2016</th>";
// Ausgabe der gefundenen Informationen
for ($i = 0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
echo"<tr><td>".($i+1)."</td>";
echo "<td>".($row["Vorname"])."</td>";
echo "<td>".($row["Nachname"])."</td>";
echo "<td>".($row["abgabe2016"])."</td>";
echo "<td></td>";
// Ausnahmen
if (($row["Nachname"] == "Nebelung") && ($row["Vorname"] == "Jutta")) {
     $row["Nachname"] = "NebelungJ";
    // echo "<td><a href=' ./formblatt/".($row['Nachname']).".pdf' target='_blank'</a><img src='plan.jpg' /></td>";
     //echo "<td><a href=' ./formblatt/".($row['Nachname'])."2015.pdf'</a><img src='plan.jpg' /></td>";
    // echo "<td>". $row["Nachname"]."</td>";
     }
else

if (($row["Nachname"] == "Nebelung") && ($row["Vorname"] == "Karlheinz")) {
     $row["Nachname"] = "NebelungK";
    // echo "<td>". $row["Nachname"]."</td>";
    // echo "<td><a href=' ./formblatt/".($row['Nachname']).".pdf' target='_blank'</a><img src='plan.jpg' /></td>";
   //  echo "<td><a href=' ./formblatt/".($row['Nachname'])."2015.pdf'</a><img src='plan.jpg' /></td>";
     }
else
if (($row["Nachname"] == "Wagner") && ($row["Vorname"] == "Gregor")) {
     $row["Nachname"] = "WagnerG";
    // echo "<td><a href=' ./formblatt/".($row['Nachname']).".pdf' target='_blank'</a><img src='plan.jpg' /></td>";
    // echo "<td><a href=' ./formblatt/".($row['Nachname'])."2015.pdf'</a><img src='plan.jpg' /></td>";
    // echo "<td>". $row["Nachname"]."</td>";
     }
else

if (($row["Nachname"] == "Wagner") && ($row["Vorname"] == "Udo")) {
     $row["Nachname"] = "WagnerU";
    // echo "<td>". $row["Nachname"]."</td>";
    // echo "<td><a href=' ./formblatt/".($row['Nachname']).".pdf' target='_blank'</a><img src='plan.jpg' /></td>";
    // echo "<td><a href=' ./formblatt/".($row['Nachname'])."2015.pdf'</a><img src='plan.jpg' /></td>";
     }
else
    //echo "<td>". $row["Nachname"]."</td>";
// Alle ohne Ausnahme
//echo "<td><a href=' ./formblatt/".($row['Nachname']).".pdf' target='_blank'</a><img src='plan.jpg' /></td>";
//echo "<td><a href=' ./formblatt/".($row['Nachname'])."2015.pdf' target='_blank'</a><img src='plan.jpg' /></td>";
/*
echo "<td>".($row["A_NR"])."</td>";
echo "<td>".($row["A_Name"])."</td>";
echo "<td>".($row["Bezeichnung"])."</td>";
echo "<td>".($row["vom"])."</td>";
echo "<td>".($row["bis"])."</td>";
*/

echo"</tr>";
}
echo "</table>";
echo "<A href='index.html'>zur&uuml;ck</A>"
?> </body></html>