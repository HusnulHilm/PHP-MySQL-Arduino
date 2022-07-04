<?php
$username = $_POST["username"];
$passwort = $_POST["passwort"];

$pass = md5($passwort);

echo $pass;
if($username=="hoetling" and
$pass=="f145702a9cd9c53bf05cbfb952ad0e48")
   {
   echo "Herzlich Willkommen";
   }
else
   {
   echo "Login Fehlgeschlagen";
   }
?>
