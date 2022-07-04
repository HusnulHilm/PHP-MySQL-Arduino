<html>
<head>
<title>Fortbildung der Lehrkr&auml;fte</title>
</head>
<h1><big><b>Neueintrag besuchte Fortbildung</b></big></h1>
<form action="FB_Lehrer_besucht_ausgabe.php" method="post">


<?php
/*
$username = $_POST["username"];
$passwort = $_POST["passwort"];

$pass = md5($passwort);
if($username=="hoetling" and
$pass=="f145702a9cd9c53bf05cbfb952ad0e48")
{
*/
@ $db = mysql_pconnect("localhost", "lehrer", "teacher") or die ("Keine Verbindung");
mysql_select_db("Fortbildung") or die ("Keine DB");
echo "<table><tr><td>Name: </td>";
// Eingabe der lehrer
$sql = "select P_NR, Nachname, Vorname from Lehrer order by Nachname";
$formname = "Nachname";
$defaultitem = "-";


function build_select_list($formname, $sql, $defaultitem) {
$result=mysql_query($sql);
$anz_ergebnis = mysql_num_rows($result);
echo "<td>";
echo '<select name="', $formname, '">';
//echo "<br>";
echo '<option value = "-">(Name, Vorname)';
while($row=mysql_fetch_row($result))  {
    echo "<option ";
    if($defaultitem==$row[0]) echo "selected";
    echo "value=\"$row[0]\"> ", htmlentities($row[1].", ".$row[2]),"\n";
   }
echo "</select>\n";
}

echo "</td><td>";
build_select_list($formname, $sql, $defaultitem);

//mysql_free_result($ergebnis);
//mysql_close($db);


// Eingabe der FB
echo "<td>Fortbildung: </td>";
$sql1 = "select ID_AN, A_Name, Bezeichnung, vom from Angebot order by ID_AN";
$formname1 = "Fortbildung";
$defaultitem1 = "+";

//function build_select_list($formname1, $sql1, $defaultitem1) {
   $result=mysql_query($sql1);
   $anz_ergebnis = mysql_num_rows($result);
   echo "<td>";
   echo '<select name="', $formname1, '">';
   echo '<option value = "-">(Fortbildung)';
   while($row=mysql_fetch_row($result)) {
      echo "<option ";
      if($defaultitem1==$row[0]) echo "selected";
      echo "value=\"$row[0]\"> ", htmlentities($row[1].", ".$row[2].", ".$row[3]),"\n";
      }
  echo "</select>\n";
 //}
echo "</td><td></tr></table>";
/*
//build_select_list($formname1, $sql1, $defaultitem1);

//Suchbegriff eingeben (Name der Lehrkraft: <br><br>
echo "<br><br>";
echo "<br><br>";
echo "<input type=submit value='Eintragen'>";
echo "</form>";
echo "<br><br>";
*/
echo "<br><br>";
echo "Bitte geben Sie Namen und Passwort ein!";
echo "<br>";
echo "<table>";
echo "<tr><td>Benutzername: </td><td><input type='Text' name='username'></td></tr>";
echo "<tr><td>Passwort:</td><td><input type='Password' name='passwort'></td></tr>";
echo "<tr><td><input type='reset'></td><td><input type='submit'></td></tr>";
echo "</table>";
echo "<br><br>";
echo "<A href='index.html'>zur&uuml;ck</A>";
?>


</body>
</html>