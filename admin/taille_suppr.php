<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	$aujourdhui = date("Y-m-d H:i:s");                         

	$query  = "UPDATE taille ";
	$query .= "Set actif=0 " ;
	$query .= " WHERE num_taille=". $_GET["num_taille"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	$query  = "UPDATE produit_sousref ";
	$query .= "Set actif=0 " ;
	$query .= " WHERE num_taille=". $_GET["num_taille"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	header("Location: taille_liste.php");
?>
<? include_once("../include/_connexion_fin.php"); ?>