<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	$aujourdhui = date("Y-m-d H:i:s");                         

	$query  = "DELETE FROM remise ";
	$query .= " WHERE num_remise=". $_GET["num_remise"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	$query  = "DELETE FROM produit_remise";
	$query .= " WHERE num_remise=". $_GET["num_remise"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	header("Location: remise_liste.php");
?>
<? include_once("../include/_connexion_fin.php"); ?>