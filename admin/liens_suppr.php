<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	
	$query  = "DELETE FROM liens";
	$query .= " WHERE num_liens=". $_GET["num_liens"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	header("Location: liens_liste.php");
?>
<? include_once("../include/_connexion_fin.php"); ?>