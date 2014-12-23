<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	$aujourdhui = date("Y-m-d H:i:s");                         

	$query  = "UPDATE produit ";
	$query .= "Set actif=0," ;
	$query .= "date_maj='". $aujourdhui ."' " ;
	$query .= " WHERE num_produit=". $_GET["num_produit"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
header("Location: produit_liste.php");
?>
<? include_once("../include/_connexion_fin.php"); ?>