<html><head><title> Suchergebnisse </title></head>
<body><h2>Fortbildungsplanung der Lehrkr&auml;fte</h2>
<?php
echo "fange an<br>";
	
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
echo "<br>schreibe die Tabelle ...<br>";

// Ausgabe über eine Foreach-Schleife.
foreach ($Lehrer as $Teacher) {
 echo $Teacher["Nachname"] . ', ' .
              $Teacher["Vorname"] . ' Fortbildungsplan: ' . "<a href=' ./formblatt/".($Teacher['Nachname']).".pdf' target='_blank'><img src='plan.jpg' /></a>".             
             '<br>';
} 

echo "<A href='index.html'>zur&uuml;ck</A>"
?> </body></html>
