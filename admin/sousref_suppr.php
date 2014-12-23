<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	
	$query  = "UPDATE produit_sousref ";
	$query .= "Set actif=0 " ;
	$query .= " WHERE num_produit_sousref=". $_GET["num_produit_sousref"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	header("Location: sousref_liste_produit.php?num_produit=". $_GET["num_produit"]);
?>
<? include_once("../include/_connexion_fin.php"); ?>