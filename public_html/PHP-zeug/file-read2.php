
<?php
$handle = @fopen("kluengel.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer;
    }
    if (!feof($handle)) {
        echo "Fehler: unerwarteter fgets() Fehlschlag\n";
    }
    fclose($handle);
}
?>

