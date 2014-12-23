<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<?
	$aujourdhui = date("Y-m-d H:i:s");                         

	$query  = "UPDATE marque ";
	$query .= "Set actif=0 " ;
	$query .= " WHERE num_marque=". $_GET["num_marque"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	$query  = "UPDATE produit ";
	$query .= "Set actif=0," ;
	$query .= "date_maj='". $aujourdhui ."' " ;
	$query .= " WHERE num_marque=". $_GET["num_marque"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);
	
	header("Location: marque_liste.php");
?>
<? include_once("../include/_connexion_fin.php"); ?>