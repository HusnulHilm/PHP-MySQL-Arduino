<html><head>
<title>Fortbildung je Lehrkraft</title>
</head>
<h2><big><b>Welche Fortbildungen hat eine Lehrkraft besucht?</b></big></h2>
<form action="Fb_Lehrer_name_jahr.php" method="post">

<?php
echo "fange an<br>";
	
$DB_HOST = "localhost";    // Host-Adresse
$DB_NAME = "Fortbildung";  // Datenbankname
$DB_BENUTZER = "lehrer";   // Benutzername
$DB_PASSWORT = "teacher";  // Passwort 

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

$select = $db->query("SELECT `Nachname`, `aktuell`  
                      FROM `Lehrer` 
                       where
                       `aktuell`  = 'y'
                       order by Nachname                  
                      ");

                       
echo "<br>gelesen ...";                       
$Lehrer = $select->fetchAll();
echo "<br>schreibe die Tabelle ...";

$formname = "Nachname";
$defaultitem = "-";
$sql = $Lehrer;
function build_select_list($formname, $sql, $defaultitem)
{
  echo "<table><tr><td>";
  echo '<select name="', $formname, '">';
  echo '<option value = "-">(bitte w&auml;hlen)';
   foreach ($sql as $Teacher) {
	       echo "<option ";
		   echo '<p>' . $Teacher["Nachname"] .	'</p>';
           }
  echo "</select>\n";
  echo "</td><td>";
    echo "</td></tr>";
  echo "</table>";
}
build_select_list($formname, $sql, $defaultitem);
//Ende der Liste
echo "<br><br>";
echo "<input type=submit value='Suchen'>";
echo "</form>";

echo "<br><br><A href='index.html'>zur&uuml;ck</A>"

?>
</body></html>
