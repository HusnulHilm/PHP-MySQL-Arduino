<html>
<head><title>Suchergebnisse Buchladen</title></head>
<body>
<h1>Suchergebnisse Buchladen</h1>
<?
trim($suchbegriff);
if (!$suchtyp || !$suchbegriff)
{
echo "Sie haben keine Suchbegriffe eingegeben. Bitte gehen Sie zurück";
#exit;
}
$suchtyp = addslashes($suchtyp);
$suchbegriff = addslashes($suchbegriff);
@ $db = mysql_pconnect("localhost", gast, "gast");
if (! $db)
{
echo "Fehler: Verbindung zur Datenbank konnte nicht hergestellt werden";
exit;
}
mysql_select_db("buchladen");
$anfrage = "select * from buecher where ".$suchtyp." like '%".$suchbegriff."%'";
$ergebnis = mysql_query($anfrage);
$anz_ergebnis = mysql_num_rows($ergebnis);
echo "<p>Anzahl der gefundenen Bücher: ".$anz_ergebnis."</p>";
for ($i=0; $i < $anz_ergebnis; $i++)
{
$row = mysql_fetch_array($ergebnis);
echo "<p><strong>".($i+1).".Titel: ";
echo stripslashes($row["titel"]);
echo "</strong><br>Autor: ";
echo stripslashes($row["autor"]);
echo "<br>ISBN: ";
echo stripslashes($row["isbn"]);
echo "<br>Preis: ";
echo stripslashes($row["preis"]);
echo "</p>";
}
?>
</body></html>
