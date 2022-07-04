<html><head>  <title>Beispieldatenbank Buch</title></head>
<body> 
<h3>Datensatz einfuegen</h3><hr>
<?php
echo "fange an<br>";
if ("POST" == $_SERVER["REQUEST_METHOD"]) { 
	echo "Daten übertragen<br>";
	
$DB_HOST = "localhost"; // Host-Adresse
$DB_NAME = "buchladen"; // Datenbankname
$DB_BENUTZER = "maria"; // Benutzername
$DB_PASSWORT = "maria"; // Passwort 

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
echo "Daten bearbeiten<br>";

$insert = $db->prepare("INSERT INTO `buecher`
                     SET
                    `isbn`  = :isbn,
                    `autor` = :autor,
                    `titel` = :titel,
                    `preis` = :preis ");
                   
 $insert->bindValue(':isbn',  $_POST["isbn"]);  
 $insert->bindValue(':autor', $_POST["autor"]);                 
 $insert->bindValue(':titel', $_POST["titel"]);
 $insert->bindValue(':preis', $_POST["preis"]);

 
if ($insert->execute()) {
  echo '<p>&#9655; Die Nachricht wurde eingetragen.</p>';
  // $id = $db->lastInsertId(); 
  // echo '<p><a href="bearbeiten.php?id=' . $id . '">Nachricht bearbeiten</a></p>'; 
  }
  else{                     
       echo "Datensatz nicht eingefuegt<br>";
        print_r($insert->errorInfo());
       }
}
?>
<hr>
<A href='eingabe.html'>Neue Eingabe</A><br>
<A href='start.html'>Startseite</A>
</body>
</html>
