<?php 
session_start();
//////// la création d'un fichier vide /////////////////////
 // le nom de fichier sera la concaténation de "l'année-le mois-le jour-l'heure-minute-second.txt"
 //$fichier = date('Y-m-d-H-i-s').'.txt';
 
$filename = 'Ard.txt';
$result = $_SESSION['result'];
 // ouverture du fichier en lecture et écriture
// Assurons nous que le fichier est accessible en écriture
if (is_writable($filename)) {

    // Dans notre exemple, nous ouvrons le fichier $filename en mode d'ajout
    // Le pointeur de fichier est placé à la fin du fichier
    // c'est là que $somecontent sera placé
    if (!$handle = fopen($filename, 'w+')) {
        echo "Impossible d'ouvrir le fichier ($filename)";
         exit;
    }

	
	for ($j = 0; $j < 203; $j++) {
    // Ecrivons quelque chose dans notre fichier.
	
	$somecontent = $result[$j];
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Impossible d'écrire dans le fichier ($filename)";
        exit;
    }
	
    echo "L'écriture de ($somecontent) dans le fichier ($filename) a réussi";
	}
     // fermeture du fichier
    fclose($handle);

} else {
	exit;
   echo "Le fichier $filename n'est pas accessible en écriture.";
}
session_destroy();
?>