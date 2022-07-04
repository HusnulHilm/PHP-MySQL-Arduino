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
echo "fange an<br>";
//if ("POST" == $_SERVER["REQUEST_METHOD"]) { 
//	echo "Daten übertragen<br>";
	
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

$select = $db->query("SELECT `Vorname`, `Nachname`, `P_NR`, `Kurzbez`,`ID_AN`, `A_Name`,
                      `BA_NR`,  `BP_NR` ,  `Bezeichnung` ,`aktuell` , `vom`, `bis`    
                      FROM `Lehrer`, `Angebot`, `Besucht`
                      where
                      `P_NR` = `BP_NR`
                      and
                      `BA_NR` = `ID_AN`
                      order by Nachname
                      ");

                       
echo "<br>gelesen ...";                       
$Lehrer = $select->fetchAll();
echo "<br>schreibe die Tabelle ...";

// Ausgabe über eine Foreach-Schleife.
foreach ($Lehrer as $Teacher) {
 echo '<p>' . $Teacher["Nachname"] . ', ' .
              $Teacher["Vorname"] . ' Fortbildung: ' . "<a href=' ./formblatt/".($Teacher['Nachname']).".pdf' target='_blank'</a><img src='plan.jpg' />".             
             // $Teacher["BA_NR"] . ', ' .
             // $Teacher["A_Name"] . 'von ' .
             // $Teacher["vom"] . 'bis ' .
             // $Teacher["bis"] . ' ' .
              $Teacher["Bezeichnung"] . '</p>';
             //
} 

/*
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
and vom >= '2016-12-31'
and vom <= '2017-12-31'
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
*/
echo "<A href='index.html'>zur&uuml;ck</A>"
?>
</table> </body></html>
