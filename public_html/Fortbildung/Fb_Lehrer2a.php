<?php
@ $db = mysql_pconnect("localhost","lehrer", "teacher");
if (! $db) {
   echo "Fehler: Verbindung zur Datenbank konnte nicht hergestellt werden";
   exit;
   }
mysql_select_db("Fortbildung");

// Tabelle erstellen
function show_table($ergebnis)
{
if (!$ergebnis) 	{ 	echo "Fehler"; 	exit; 	}
$row = mysql_num_rows($ergebnis);
$col = mysql_num_fields($ergebnis);
 if ($row)
 {
     if ($row > 0) 	{
        	echo "<table border=0>";
	        echo "<tr>";
	   // Spaltenbeschriftung
	   for ($i=0; $i<= $col-1; $i++) {
        	echo "<th bgcolor=#aabbc>", 
               "<font size=+1>",
               htmlentities(mysql_field_name($ergebnis, $i)),"</font>", "</th>";
	        }
          echo "<tr>";
 $j = true;
	// Tabelleninhalt
while($row = mysql_fetch_row($ergebnis))
	{
    if ($j)
          { $j = false;
            echo "<tr bgcolor=#e6eef7>";
          }
           else
          { $j = true;
            echo "<tr bgcolor=#ffffff>";
            }
      //      echo"<tr>";

	for ($i=0; $i < $col; $i++)
	{
 	echo "<td>", "<center>","<font size=+1>", 
  htmlentities($row[$i]), "</font>", "</center>", "</td>";
	}
	echo "<tr>\n";
	}
  echo "</table>";
	}
	}
 }
// Tabelle ende
?>
<html><head><title> Suchergebnisse </title></head>
<body><h1>Suchergebnisse Lehrer Fortbildung</h1>
<?php
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
$ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");
$row = mysql_num_rows($ergebnis);
$col = mysql_num_fields($ergebnis);
show_table($ergebnis);
$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Anzahl der gefundenen Datens&auml;tze: ".$anz_ergebnis."</p>";
echo "<A href='index.html'>zur&uuml;ck</A>"
?>
</body></html>