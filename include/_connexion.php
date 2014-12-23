<?
// Paramètres
$host = "localhost"; 
$user = "collants";
$pass = "collants";
$bdd = "collants"; 
// connexion
$mysql_link=@mysql_connect($host,$user,$pass)
   or die("1 : Impossible de se connecter à la base de données");
@mysql_select_db($bdd)
   or die("2 : Impossible de se connecter à la base de donnée");
?>