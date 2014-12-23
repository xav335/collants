<? include_once("../include/_session.php");?>
<? include_once("../include/_securite.php");?>
<? include_once("../include/_connexion.php"); ?>
<? include_once("_fonctions.php")?>
<?	

	$maintenant = date("Y-m-d H\:i\:s\ ");

	$query  = "UPDATE categorie ";
	$query .= "Set categorie='". $_POST["categorie"] ."' " ;
	$query .= ", categorie_en='". $_POST["categorie_en"] ."' " ;
	$query .= " WHERE num_categorie=". $_POST["num_categorie"];
	//echo $query ."<br>";
	$rstemp = mysql_query($query);

	header("Location: categorie_modif.php?num_categorie=". $_POST["num_categorie"]);

?>
<? include_once("../include/_connexion_fin.php"); ?>