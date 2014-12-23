<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	$aujourdhui = date("Y-m-d H:i:s");                         

	$query  = "DELETE FROM categorie ";
	$query .= " WHERE num_categorie=". $_GET["num_categorie"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	$query  = "DELETE FROM produit_categorie ";
	$query .= " WHERE num_categorie=". $_GET["num_categorie"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	header("Location: categorie_liste.php");
?>
<? include_once("../include/_connexion_fin.php"); ?>