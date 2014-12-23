<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<?	

	$maintenant = date("Y-m-d H\:i\:s\ ");

	$query  = "UPDATE marque ";
	$query .= "Set marque='". $_POST["marque"] ."' " ;
	$query .= " WHERE num_marque=". $_POST["num_marque"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);

	header("Location: marque_modif.php?num_marque=". $_POST["num_marque"]);

?>
<? include_once("../include/_connexion_fin.php"); ?>