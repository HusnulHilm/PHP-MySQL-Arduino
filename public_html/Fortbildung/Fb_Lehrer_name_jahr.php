<html><head><title> Suchergebnisse </title></head>
<body><h2>Suchergebnisse der Lehrer-Fortbildung</h2>
<?php
echo "fange an<br>";
if ("POST" == $_SERVER["REQUEST_METHOD"]) { 
	echo "Daten übertragen<br>";}
	
$DB_HOST = "localhost"; // Host-Adresse
$DB_NAME = "Fortbildung"; // Datenbankname
$DB_BENUTZER = "lehrer"; // Benutzername
$DB_PASSWORT = "teacher"; // Passwort 

$OPTION = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];            
try {           
  $db = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_NAME,
  $DB_BENUTZER, $DB_PASSWORT, $OPTION);
  echo "Mit Datenbank verbunden<br>";  
  }
  catch (PDOException $e) {
  // Bei einer fehlerhaften Verbindung eine Nachricht ausgeben
  exit("Verbindung fehlgeschlagen! <br>" . $e->getMessage());
  } 

// Datensätze auslesen.
echo "Lese Daten...";

$select = $db->query("SELECT `Vorname`, `Nachname`, `aktuell`  
                      FROM `Lehrer` 
                       where
                       `aktuell`  = 'y'
                       order by Nachname                  
                      ");

                       
echo "<br>gelesen ...";                       
$Lehrer = $select->fetchAll();
echo "<br>schreibe die Tabelle ...";

// Ausgabe über eine Foreach-Schleife.
foreach ($Lehrer as $Teacher) {
 echo '<p>' . $Teacher["Nachname"] . ', ' .
              $Teacher["Vorname"] . ' Fortbildung: ' . "<a href=' ./formblatt/".($Teacher["Vorname"]).($Teacher['Nachname']).".pdf' target='_blank'><img src='plan.jpg' /></a>".             
             // $Teacher["BA_NR"] . ', ' .
             // $Teacher["A_Name"] . 'von ' .
             // $Teacher["vom"] . 'bis ' .
             // $Teacher["bis"] . ' ' .
          //    $Teacher["Bezeichnung"] . '</p>';
             //
              '</p>';
} 

echo $Nachname;echo "<br>";
echo "Im Kalenderjahr ";
echo $schuljahr; 
$folgejahr = $schuljahr+2;
/*
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
Lehrer.Nachname like '".$Nachname."'
and
vom >=  '".$schuljahr."'
and
bis < '".$folgejahr."' 
order by vom
";
* */
//and
//bis < '".$folgejahr."' 
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
//echo "<td align='center'><a href=' ./fobis/".($row["Vorname"]).($row['Nachname']).($i+1).".pdf' target='_blank'</a><img src='zert.jpg' /></td>";
echo"</tr>";
}
echo "</table>";
echo "<A href='FB_Lehrer_name2.php'>zur&uuml;ck</A>"
?> </body></html>
