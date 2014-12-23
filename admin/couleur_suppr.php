<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	$aujourdhui = date("Y-m-d H:i:s");                         
	
	$query  = "UPDATE couleur ";
	$query .= "Set actif=0 " ;
	$query .= " WHERE num_couleur=". $_GET["num_couleur"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	$query  = "UPDATE produit_sousref ";
	$query .= "Set actif=0 " ;
	$query .= " WHERE num_couleur=". $_GET["num_couleur"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	header("Location: couleur_liste.php");
?>
<? include_once("../include/_connexion_fin.php"); ?>