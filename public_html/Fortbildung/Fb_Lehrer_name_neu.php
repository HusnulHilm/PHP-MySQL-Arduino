<html>
<head>
<title>Hauptflugbuch F-Schlepp</title>
<meta name="author" content="hoetling">
<meta name="generator" content="Ulli Meybohms HTML EDITOR">
</head>
<body background="backgrnd.png" text="#000000" bgcolor="#FFFFFF" link="#FF0000" alink="#FF0000" vlink="#FF0000">
<h1>Hauptflugbuch F-Schlepp</h1>
<form action="Fb_Lehrer_name.php" method="post">
<table border=0>
<tr>
<td>Nummer</td><td><input type=text name=Nummer maxlength=2 size=2></td>
<td>Datum</td><td><input type=text name=Datum maxlength=10 size=10>  Beispiel: 2012-03-29</td>
</tr>
<tr>
<td>Pilot</td>

<!-- <td><select name="Pilot"> -->

<?
include("../sql/connect.inc.php");
$connID=connect_to_flugbuch();

$sql = "select Kurzbezeichnung, Name, Vorname  from Mitglieder where aktiv ='j' order by Name";
$formname = "Pilot";
$defaultitem = "-";


function build_select_list($formname, $sql, $defaultitem)
{
$result=mysql_query($sql);
$anz_ergebnis = mysql_num_rows($result);

echo '<select name="', $formname, '">';
echo "<br>";
echo '<option value = "-">(choose)';
while($row=mysql_fetch_row($result))
{
echo "<option ";
if($defaultitem==$row[0]) echo "selected";
echo "value=\"$row[0]\"> ", htmlentities($row[1].", ".$row[2]),"\n";
}

echo "</select>\n";
}

echo "<td>";
build_select_list($formname, $sql, $defaultitem);
//mysql_free_result($ergebnis);
//mysql_close($db);

echo "</td>";


//echo "<td>Begleiter</td>";
//echo "<td>";
//echo '<select name= "Begleiter" >';
//$formname = "Begleiter";
//build_select_list($formname, $sql, $defaultitem);
echo "</select>\n";

?>
</td>
</tr>

<tr>
<td>Flugtyp</td>
<td><select name="Flugtyp">
<option value="1">100% mit Baustunden
<option value="2">50% mit Baustunden
<option value="3">Gastflug bis 14 Minuten
<option value="4">Nur Schleppkosten (100%)
<option value="5">50% Schleppkosten, 100% Flug
<option value="9">Familienflug (Pilot)
<option value="12">Gastflug &uuml;ber 14 Minuten
<option value="13">Schlepp unter 50 Baustunden
<option value="14">F_Schlepp Familie
<option value="20">25% Schlepp Rest ohne Zahlung
<option value="21">25% Schlepp Rest ohne Zahlung
<option value="22">25% Schlepp volle Baustunden
<option value="23">F-Schlepp Flugsch&uuml;ler
<option value="25">50% von 13
<option value="0">ohne Bezahlung
</select></td>

<td>Flugtyp</td>
<td><select name="Flugtyp_Begleiter">
<option value="0">ohne Bezahlung
<option value="1">100% mit Baustunden
<option value="2">50% mit Baustunden
<option value="3">Gastflug bis 14 Minuten
<option value="4">Nur Schleppkosten (100%)
<option value="5">50% Schleppkosten, 100% Flug
<option value="9">Familienflug (Pilot)
<option value="12">Gastflug &uuml;ber 14 Minuten
<option value="13">Schlepp unter 50 Baustunden
<option value="14">F_Schlepp Familie
<option value="20">25% Schlepp Rest ohne Zahlung
<option value="21">25% Schlepp Rest ohne Zahlung
<option value="22">25% Schlepp volle Baustunden
<option value="23">F-Schlepp Flugsch&uuml;ler
<option value="25">50% von 13
<option value="0">ohne Bezahlung
</select></td>
</tr>

<tr><td>Fluglehrer</td>
<td><select name="Fluglehrer">
<option value="">

<option value="Fischer">Fischer
<option value="Hoetling">Hoetling
<option value="Koeneke">Koeneke
<option value="Lange">Lange
<option value="N.N.">Andere
</select></td>
</tr>
<tr>
<td>Segelflugzeug</td>
<td><select name="SFTyp">
<option value="Bocian">Bocian
<option value="Pirat">Pirat
<option value="Puchacz">Puchacz
<option value="Foka">Foka
<option value="Cobra 15">Cobra 15
<option value="SB 5">SB 5
<option value="Elfe">Elfe
<option value="Jantar">Jantar
<option value="ASK 21">ASK 21
<option value="ASK 13">ASK 13
<option value="DG-100">DG-100
<option value="DG-101">DG-101
<option value="DG-300">DG-300
<option value="DG-500">DG-500
<option value="Blanik">Blanik
<option value="ASW 15">ASW 15
<option value="ASW 19">ASW 19
<option value="ASW 22">ASW 22
<option value="Discus">Discus
<option value="Duo-Discus">Duo-Discus
<option value="LS 1">LS 1
<option value="LS 3">LS 3
<option value="LS 4">LS 4
<option value="ASG 29">ASG 29
<option value="Mistral">Mistral
<option value="Astir">Astir
<option value="Ka 6">Ka 6
<option value="Ka 8">Ka 8
</select></td>

<td>Kennung D -</td><td><input type=text name=SFKennung maxlength=5 size=5><br></td>

</tr>
<tr>
<td>Schleppilot</td>
<td><select name="Schleppilot">
<option value="Adloff">Adloff
<option value="Baethge">Baethge
<option value="Beyer">Beyer
<option value="Hoetling">Hoetling
<option value="Koesling">Koesling, Tim
<option value="KR">Koch, Roland
<option value="Fischer">Fischer
<option value="Becker">Becker
<option value="N.N.">Andere

</select></td>
</tr>
<tr>
<td>Schleppflugzeug</td>
<td><select name="MFZTyp">
<option value="DR-400">DR-400
<option value="Wilga">Wilga
<option value="Falke">Falke
<option value="Maule">Maule
</select></td>
<td>Kennung D -</td><td><input type=text name=MFZKennung maxlength=5 size=5><br></td>
</tr>
<tr>
<td>Strecke</td><td><input type=text name=Strecke maxlength=5 size=5></td>
<td>Bemerkung</td><td><input type=text name=Bemerkung maxlength=20 size=20></td>
</tr>
</table>
<table border=0>
<tr>
<td>Startzeit_(Stunde)</td><td><input type=text name=Startzeit_Stunde maxlength=2 size=3</td>
<td>Startzeit_(Minute)</td><td><input type=text name=Startzeit_Minute maxlength=2 size=3><br></td>
</tr>
<tr>
<td>Landezeit_Motorflugzeug_(Stunde)</td><td><input type=text name=Landezeit_MFZ_Stund maxlength=2 size=3</td>
<td>Landezeit_Motorflugzeug_(Minute)</td><td><input type=text name=Landezeit_MFZ_Minut maxlength=2 size=3><br></td>
</tr>
<tr>
<td>Landezeit_Segelflugzeug_(Stunde)</td><td><input type=text name=Landezeit_SFZ_Stund maxlength=2 size=3</td>
<td>Landezeit_Segelflugzeug_(Minute)</td><td><input type=text name=Landezeit_SFZ_Minut maxlength=2 size=3><br></td>
</tr>
<tr>
<td colspan=20><h2>Bitte die Eintragungen pr&uuml;fen!</h2></td>
<td colspan=2><input type=reset value="Zur&uuml;cksetzen"></td>
<td colspan=2><input type=submit value="Eintragen"></td>
</tr>
</table></form>
 <a href="index.html">zur&uuml;ck      </a><br>
 <a href="index.html">Startseite   </a><br>
</body>
</html>