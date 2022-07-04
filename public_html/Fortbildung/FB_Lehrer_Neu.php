<html><head><title>Ergebnisse</title></head>
<body><h1>Neueintrag Lehrer</h1>
<?php
$username = $_POST["username"];
$passwort = $_POST["passwort"];
$pass = md5($passwort);
if($username=="hoetling" and $pass=="f145702a9cd9c53bf05cbfb952ad0e48")
{
 @ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");
 mysql_select_db("Fortbildung") or die ("Keine DB");
 // Datenübergabe als SQL-Statement vorbereiten
 $anfrage =
 "insert into Lehrer values ('','$Vorname','$Nachname','$Geburtsdatum')";
 // Anfrage ausführen, Daten eintragen
 $ergebnis =  mysql_query($anfrage) or die ("Keine Ergebnisse");

 // Mitteilung über erfolgte Eintragung
 if ($ergebnis)
      {echo "Eintrag ist erfolgt";}
   else
      {echo "Ein Fehler ist aufgetreten";}
}
else
   {
   echo "Login Fehlgeschlagen";
   }
/*
$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Anzahl der neu eingetragenen Lehrer: ".$anz_ergebnis."</p>";
echo "<table>";
echo "<th>Nummer</th><th>Vorname</th><th>Name</th><th>Geboren am</th>";
// Ausgabe der gefundenen Informationen
for ($i = 0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
echo"<tr><td>".($i+1)."</td>";
echo "<td>".($row["Vorname"])."</td>";
echo "<td>".($row["Nachname"])."</td>";
echo "<td>".($row["A_NR"])."</td>";
echo "<td>".($row["Bezeichnung"])."</td>";
echo"</tr>";
}
echo "</table>";
*/
?>
</body></html>