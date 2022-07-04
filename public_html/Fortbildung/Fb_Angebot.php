<html>
<head><title> Suchergebnisse </title></head>
<body>
<h1>Suchergebnisse Lehrer Fortbildung</h1>
<form action="Fb_Angebot.php" method="POST" >
Angebotsnummer <input name="anr" type="text" >
<input type="submit" name="sub" value="Suche">
</form>
<?php

error_reporting(E_ALL);
@ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");
if (! $db)
{echo "Fehler: Verbindung zur Datenbank konnte nicht hergestellt werden";
exit;}

mysql_select_db("Fortbildung") or die ("Keine DB");
$anr = "";
if(isset($_POST['sub']))
{
         $anr = "WHERE A_NR ='".$_POST['anr']."'";

}

$anfrage =
"SELECT ID_AN,A_NR,Bezeichnung,vom,bis,(bis - vom) as Dauer FROM Angebot ORDER BY vom";
//".$anr."
//ORDER BY A_NR";

$ergebnis =  mysql_query($anfrage) or die("Keine Ergebnisse");

$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Anzahl der gefundenen Angebote: ".$anz_ergebnis."</p>";

echo "<table align='left'>";
echo "<th>Nummer</th><th>A_NR</th><th>Bezeichnung</th><th>von</th><th>bis</th><th>Dauer</th>";


// Ausgabe der gefundenen Informationen
for ($i = 0; $i < $anz_ergebnis; $i++)

{
$row = mysql_fetch_array($ergebnis);


echo "<tr>";
echo"<td>".$row['ID_AN']."</td>";
echo "<td><a href='FB_Lehrer_t_ANR.php?a_nr=".$row['A_NR']."'>".$row['A_NR']."</a></td>";
//echo "<td><a href=http://www.eltis-online.de>".$row['A_NR']."</a></td>";
echo "<td>".$row['Bezeichnung']."</td>";
echo "<td>".$row['vom']."</td>";
echo"<td>".$row['bis']."</td>";
if ( $row['Dauer'] >= 1) {
   $row['Dauer'] = $row['Dauer'] + 1;
   echo"<td align='right'>".$row['Dauer'].' Tage'."</td>";
   echo"</tr>";
   }
else
 if ( $row['Dauer'] < 1)  {
      $row['Dauer'] = 1;
      echo"<td align='right'>".$row['Dauer'].' Tag'."</td>";
      echo"</tr>";      }

//echo "Bezeichnung: ";

}
echo "</table>";
?>

</body></html>