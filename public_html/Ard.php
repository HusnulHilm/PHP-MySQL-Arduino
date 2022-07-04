<?php

$i =0;
//////// la création d'un fichier vide /////////////////////
 // le nom de fichier sera la concaténation de "l'année-le mois-le jour-l'heure-minute-second.txt"
 
 $rootPath = $_SERVER['DOCUMENT_ROOT'];
 $fileDate = date('Y-m-d-H-i-s');
// $filename = $rootPath.'version.txt';

echo "rootPath est  =>".$rootPath;
echo "<br>";
// $filename = $rootPath.'version.txt';
 
 
 //$fichier = date('Y-m-d-H-i-s').'.txt';
 $fichier = "Ard.txt";
 // ouverture du fichier en lecture et écriture

if (!$fp = fopen($fichier, 'w+')) {
echo "Echec de l'ouverture du fichier";
exit;

}

else {
echo "le fichier ".$fichier." à été créer avec succès \n";
echo "<br>";
}
 
 
while ($i < 20) { 
    usleep(10000);
    $message=$i;
	
	//if (!empty($message)) { 
	//if ($message != "") { 
	
	
	if (isset($message)) {
	echo "\n la valleur de i est : ".$i;
    echo "<br>";
	// mis la valleur du message dans le fihcier txt
	fputs($fp,$message);
	// retour a la ligne
	fputs($fp,"\n"); 
	
    }
	$i=$i+1;
}
// fermeture
fclose($fp);

?>
