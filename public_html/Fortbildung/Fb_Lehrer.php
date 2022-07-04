<html><head><title> Suchergebnisse </title></head>
<body><h1>Suchergebnisse Lehrer-Fortbildung</h1>
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

$select = $db->query("SELECT `Vorname`, `Nachname`, `LP_NR`, `Kurzbez`,`ID_AN`, `A_Name`,
                      `BA_NR`,  `BP_NR` ,  `Bezeichnung` ,`aktuell` , `vom`, `bis`    
                      FROM `Lehrer`, `Angebot`, `Besucht`
                      where
                      `LP_NR` = `BP_NR`
                      and
                      `BA_NR` = `ID_AN`
                      order by BA_NR
                      ");

                       
echo "<br>gelesen ...";                       
$Lehrer = $select->fetchAll();
echo "<br>schreibe die Tabelle ...";

// Ausgabe über eine Foreach-Schleife.
$i = 1;
foreach ($Lehrer as $Teacher) {
 echo '<p>' . $Teacher["Nachname"] . ', ' .
              $Teacher["Vorname"] . ' Fortbildung: ' .              
              $Teacher["BA_NR"] . ', ' .
              $Teacher["A_Name"] . ' von ' .
              $Teacher["vom"] . ' bis ' .
              $Teacher["bis"] . ' ' .           
              '</p>';
                 $i++;
} 


echo "<A href='index.html'>zur&uuml;ck</A>"
?> </body></html>
